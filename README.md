![WordPress Boilerplate](https://uploaddeimagens.com.br/images/003/190/560/full/screenshot.png)
# WP Boilerplate
Esse tema se trata de um boilerplate - uma estrutura básica já pronta - com estilizações simples, ferramentas e métodos para uma inicialização de projetos personalizados em WordPress.
# O que vem nesse boilerplate?
Um tema personalizado com suporte para o [WooCommerce](https://br.wordpress.org/plugins/woocommerce/), estrutura pronta para criação de template personalizado com possibilidade de múltiplos idiomas. Possui o [Tailwind CSS v2.2.9](https://tailwindcss.com/docs) instalado por padrão.

# Setup

## Instalação do WP Boilerplate
Baixe o tema no formato .zip e vá até `Aparência > Temas` no seu painel do WordPress e clique em _Adicionar novo_. Envie o arquivo .zip que você baixou previamente e o tema estará pronto para ser ativado!
## Plugins recomendados
1. **É fortemente recomendado o uso do [Advanced Custom Fields](https://www.advancedcustomfields.com)** para a criação de campos personalizados para conteúdos.
2. Para lidar com formulários é recomendado o uso do [Contact Form 7](https://contactform7.com). Ele suporta formulários escritos em HTML e lida bem com exceções.
3. Para instalar um site multi-idiomas é recomendado o uso do [TranslatePress](https://translatepress.com/) que possibilita uma tradução simples pelo painel do Wordpress de textos e imagens.

## Usando o Tailwind CSS
Como framework frontend está pré-configurado o uso do [Tailwind CSS](https://tailwindcss.com/docs). Para fazer a estilização das páginas usar o arquivo `tailwind.css` e para compilar rodar o comando `yarn build`. Pode ser usado o parâmetro `--watch` para a ferramenta ficar escutando as modificações no arquivo e buildar automáticamente. 
No momento da publicação em produção deve-se informar o `NODE_ENV=production` antes de executar o comando do build.

# Estrutura de arquivos
**A estrutura informada a seguir fica em `wp-content\themes\wp-boilerplate`.**
## Pastas
| Titulo | Objetivo |
|--|--|
| [Hooks](#hooks) | Armazenar os hooks do WooCommerce.
| Inc | Armazenar customizações em partes do tema e suporte a algumas ferramentas
| JS | Armazenar arquivos .js consumidos no frontend
| Languages | Armazenar os arquivos de tradução do tema
| Template Parts | Armazenar partes isoladas do template, como componentes
| Woocommerce | Armazenar arquivos do tema do woocommerce 
| Pages | Armazena arquivos de páginas
| Contents | Armazena a página de um conteúdo específico, normalmente a página interna.
| Custom fields | Armazena os campos e tipos customizados presentes no projeto.
| Configs | Configurações do tema que se relacionam com o Wordpress em si
## Arquivos
Não serão explorados todos os arquivos do tema, apenas os considerados mais importantes e os customizados desse tema. Para consultar o significado de algum arquivo que não esteja listado aqui [consulte a documentação](https://codex.wordpress.org/Theme_Development) ou entre em contato.
|Nome| Objetivo |
|--|--|
| functions.php | Armazenar as funções básicas relacionadas ao Tema. O arquivo base para a construção do tema. 
| header.php | Armazenar a estrutura inicial, ou cabeçalho, de qualquer página do tema.  Esse arquivo é invocado através da função `get_header()`.
| footer.php | Armazenar a estrutura final, ou rodapé, de qualquer página do tema. Esse arquivo é invocado através da função `get_footer()`.
| sidebar.php | Armazenar a estrutura de uma barra lateral ou qualquer seção que necessite de um widget do Wordpress. Esse arquivo é invocado através da função `get_sidebar()`.
| page.php | Armazenar a estrutura de uma página. Para ver como cria um arquivo para diferentes páginas veja o [tópico relacionado](#new-pages).
| single.php | Armazena a estrutura de um post. Para ver como cria um arquivo para diferentes tipos de posts veja o [tópico relacionado](#new-posts).
| woocommerce.php | Armazena a estrutura da página inicial da loja
| style.css | Armazena toda a estilização do tema que foi buildado pelo Tailwind CSS. Não é indicado fazer modificações nesse arquivo. Caso queira criar outros arquivos para segmentar a estilização lembre-se de chama-lo dentro do `functions.php`
| tailwind.css | Armazena toda a estilização customizada do projeto (botões, campos, etc).
| tailwind.config.js | Arquivo responsável pelas configurações do tailwind, como cores padrões, modificações do tema, etc.
| configs/default-contents.php | Contém todas as páginas que serão automaticamente geradas no wordpress após a instalação do tema. Lembre-se que esse evento só é chamado uma única vez quando o tema é ativado.
| configs/smtp.php | Contém as configurações de disparo de e-mails utilizando o protocolo SMTP.
| custom-fields/helper.php | Contém funções auxiliares a criação de conteúdos customizados para o ACF.
| custom-fields/theme-options.php | Contém opções editáveis referentes ao tema que podem ser chamadas em todos os arquivos.
| custom-fields/custom-types.php | Contém tipos de posts customizados.
| custom-fields/index.php | Contém campos customizados.

Na ausência de um arquivo com o slug da página/tipo de post o Wordpress chamará outros arquivos conforme a [hierarquia de templates](https://developer.wordpress.org/themes/basics/template-hierarchy).

<a id="new-pages"></a>
# Como criar novas páginas
Para criar novas páginas e ter acesso a um arquivo único especifico para aquela página, deve-se criar um arquivo dentro da pasta `pages` e salva-lo com o nome `page-{slug}.php`, onde o slug deve ser substituído pelo slug da página criada. 
Por exemplo para a página com o slug `sobre` o arquivo ficaria `page-sobre.php`. Para a página `fale-conosco` ficaria `page-fale-conosco.php`.

Também é possível definir uma página para ser criada automáticamente no momento da instalação do tema. Para isso, basta acessar o arquivo `configs/default-contents.php` e adicionar no array a página desejada.

Na ausência de um arquivo com o slug da página o Wordpress chamará outros arquivos conforme a [hierarquia de templates](https://developer.wordpress.org/themes/basics/template-hierarchy).

<a id="new-posts"></a>
# Como criar tipos de posts
Para criar um novo tipo de post deve-se acessar o arquivo `custom-fields/custom-types.php` e utilizar a função `create_custom_type` conforme modelo:
```php
create_custom_type(
    $slug, // Define o slug do tipo de post
    $name, // Define como esse tipo de post será chamado no wordpress
    $haveCategories // Define se esse tipo de post terá categorias. [Default: false]
)
```

Para ter acesso a um arquivo único específico para aquele tipo de post deve-se criar um arquivo dentro da pasta `contents` e salva-lo com o nome `content-{post-type}.php` onde o post-type equivale ao slug do tipo do post.
Por exemplo para os posts do tipo `servicos` ficaria `content-servicos.php`.

Na ausência de um arquivo com o slug do tipo de post o Wordpress chamará outros arquivos conforme a [hierarquia de templates](https://developer.wordpress.org/themes/basics/template-hierarchy).

<a id="custom-fields"></a>
# Como criar campos customizados
*Para os recursos abaixo é requerido a utilização do [ACF Pro](https://github.com/wp-premium/advanced-custom-fields-pro) pelo Wordpress.*

Os campos customizados permitem a criação de campos no wordpress para cada tipo de página ou post que desejar. Esse tema possui helpers que facilitam a criação de campos customizados via PHP, mas também é possível cria-los utilizando a interface visual que o ACF fornece.

Para a criação de novos campos deve-se acessar o arquivo `custom-fields/index.php` e adicionar novos grupos ou campos conforme modelo a seguir:
```php
acf_add_local_field_group([
    'key' => 'my-group', // Slug do grupo
    'title' => 'My Group', // Como o grupo será chamado no wordpress
    'fields' => [ // Lista de campos que esse grupo terá
        create_field_custom(
            'my-field', // Slug do field [ÚNICO]
            'My Field', // Label do field
            'text', // Tipo do field ['text','image','file','repeater'...]
            [], // Sub-fields, se do tipo 'group' ou 'repeater', 
            [] // Demais opções do field
        ),
    ],
    'location' => [ // Para quais páginas/tipos de posts esses campos aparecerão
        [
            [
                'param' => 'page_slug', // Slug da página ou tipo do post. ['post_type']
                'operator' => '==', // ['==', '!=', '>', '<']
                'value' => 'home', // Valor que será comparado
            ],
        ],
    ],
]);
```
Se houver a necessidade da criação de mais arquivos/pastas para melhor organização, lembrar de chamar no arquivo `functions.php`.

Para exibir os campos criados no tema, deve-se seguir a [documentação do ACF](https://www.advancedcustomfields.com/resources/displaying-custom-field-values-in-your-theme/).

<a id="hooks"></a>
# O que são e como usar os hooks?
Hooks são recursos que possibilitam a inserção de conteúdos por meio de funções dentro de uma determinada área do site sem precisar alterar o arquivo correspondente aquela área diretamente. Além de manter uma maior compatibilidade no site, faz com que a estrutura seja mais segmentada, facilitando manutenções futuras.

Esses recursos não estão presentes por padrão nesse tema, mas são facilmente incorporados caso haja necessidade.
Basta adicionar o seguinte código no template: `do_action('action_name')` e chamar dentro do arquivo `inc\template-functions.php` usando essa estrutura:

```php
add_action('action_name', 'your_function_name');
function your_function_name() {
    // Seu código
}
```


## Hooks no WooCommerce
O WooCommerce por padrão possui uma imensa lista de hooks que podem ser aproveitados sem a necessidade de criar novos. Para visualizar consulte a [WooCommerce Code Reference](https://woocommerce.github.io/code-reference/hooks/hooks.html#hooks-template-files).

Para usar os hooks no WP Boilerplate basta seguir a estrutura indicada na pasts `hooks` na raiz do tema.

# Disparo de e-mails com SMTP
Para configurar o disparo de e-mails utilizando o SMTP basta acessar o arquivo `configs/smtp.php` e alterar os dados de conexão.
