<?php
// run: php wp-content/themes/blank-theme/setup.php

if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    die("Este script só pode ser executado via terminal (CLI).\n");
}

require_once(dirname(__FILE__, 4) . '/wp-load.php');

class WPSetup {

    private $log = [];
    private $summary = [
        'timezone'      => null,
        'theme'         => null,
        'language'      => null,
        'permalink'     => null,
        'plugins'       => [],
    ];

    public function run() {
        $this->logStep("Iniciando setup...");

        $this->setTimezone();
        $this->activateTheme();
        $this->installLanguage('pt_BR');
        $this->setPermalinks('/%postname%/');
        $this->installThemePlugins();

        $this->logStep("Setup finalizado.");
        $this->printLog();
        $this->printSummary();
    }

    private function setTimezone() {
        $ok = update_option('timezone_string', 'America/Sao_Paulo');
        $this->summary['timezone'] = $ok ? 'definido' : 'falhou';
        $this->logStep("Timezone configurado: " . ($ok ? "OK" : "ERRO"));
    }

    private function activateTheme() {
        $theme_slug = wp_get_theme()->get_stylesheet();
        switch_theme($theme_slug);
        $this->summary['theme'] = $theme_slug;
        $this->logStep("Tema ativado: {$theme_slug}");
    }

    private function installLanguage($locale) {
        $lang_dir = WP_LANG_DIR . '/';
        $mo_file = $lang_dir . $locale . '.mo';

        if (file_exists($mo_file)) {
            update_option('WPLANG', $locale);
            $this->summary['language'] = "já existia, ativado";
            $this->logStep("Idioma já existe. Ativado: {$locale}");
            return;
        }

        $this->logStep("Idioma não encontrado. Baixando...");

        if (!wp_mkdir_p($lang_dir)) {
            $this->summary['language'] = "erro ao criar diretório";
            $this->logStep("Erro ao criar pasta de idiomas.");
            return;
        }

        $url = "https://downloads.wordpress.org/translation/core/latest/{$locale}.zip";
        $zip_path = $lang_dir . "{$locale}.zip";

        $download = wp_remote_get($url, ['timeout' => 20]);

        if (is_wp_error($download)) {
            $this->summary['language'] = "falha no download";
            $this->logStep("Falha no download do idioma {$locale}.");
            return;
        }

        file_put_contents($zip_path, wp_remote_retrieve_body($download));
        $this->logStep("Download concluído: {$zip_path}");

        $zip = new ZipArchive;

        if ($zip->open($zip_path) === true) {
            $zip->extractTo($lang_dir);
            $zip->close();
            update_option('WPLANG', $locale);
            $this->summary['language'] = "instalado e ativado";
            $this->logStep("Idioma instalado e ativado.");
        } else {
            $this->summary['language'] = "erro na extração";
            $this->logStep("Erro ao extrair o idioma baixado.");
        }
    }

    private function setPermalinks($structure) {
        $ok = update_option('permalink_structure', $structure);
        $this->summary['permalink'] = $ok ? $structure : 'erro';
        $this->logStep("Permalinks atualizados para '{$structure}': " . ($ok ? "OK" : "ERRO"));
    }

    private function installThemePlugins() {
        $plugin_dir = get_template_directory() . '/plugins';

        if (!is_dir($plugin_dir)) {
            $this->logStep("Nenhuma pasta /plugins no tema.");
            return;
        }

        $files = glob($plugin_dir . '/*.zip');

        foreach ($files as $zip_path) {
            $plugin_slug = basename($zip_path, '.zip');
            $this->summary['plugins'][$plugin_slug] = 'pendente';
            $this->logStep("Processando plugin: {$plugin_slug}");

            $target_dir = WP_CONTENT_DIR . '/plugins/';
            $zip = new ZipArchive;

            if ($zip->open($zip_path) === true) {
                $zip->extractTo($target_dir);
                $zip->close();
                $this->logStep("Plugin extraído.");
            } else {
                $this->logStep("Erro ao extrair {$plugin_slug}");
                $this->summary['plugins'][$plugin_slug] = 'erro na extração';
                continue;
            }

            $plugin_file = $this->findPluginFile($target_dir . $plugin_slug);

            if ($plugin_file) {
                activate_plugin($plugin_file);
                $this->summary['plugins'][$plugin_slug] = 'ativado';
                $this->logStep("Plugin ativado: {$plugin_slug}");
            } else {
                $this->summary['plugins'][$plugin_slug] = 'arquivo principal não encontrado';
                $this->logStep("Arquivo principal não encontrado para {$plugin_slug}");
            }
        }
    }

    private function findPluginFile($dir) {
        foreach (glob($dir . '/*.php') as $file) {
            $data = get_plugin_data($file, false, false);
            if (!empty($data['Name'])) return plugin_basename($file);
        }
        return false;
    }

    private function logStep($msg) {
        $this->log[] = "[ " . date('H:i:s') . " ] " . $msg;
    }

    private function printLog() {
        echo "\n=============================\n";
        echo "     LOG DE EXECUÇÃO\n";
        echo "=============================\n\n";

        foreach ($this->log as $l) echo $l . "\n";
    }

    private function printSummary() {
        echo "\n=============================\n";
        echo "        RESUMO FINAL\n";
        echo "=============================\n\n";

        print_r($this->summary);

        echo "\nFinalizado.\n\n";
    }
}

$setup = new WPSetup();
$setup->run();
