<?php
class ThemeSetup
{
    private $menus = [];
    private $themeSupport = [];

    public function setMenus($menus)
    {
        $this->menus = $menus;
    }

    public function setThemeSupport($themeSupport)
    {
        $this->themeSupport = $themeSupport;
    }

    public function initialize()
    {
        foreach ($this->themeSupport as $item) {
            add_theme_support($item);
        }

        register_nav_menus($this->menus);

        register_sidebar([
            'name'          => 'Sidebar',
            'id'            => 'sidebar',
        ]);

        function blank_theme_copyright()
        {
            echo "Created using <a href='https://github.com/devnicholas/blank-theme' target='_blank'>Blank Theme</a> in v" . _S_VERSION . ' | ';
            echo "Wordpress in v";
            echo bloginfo('version');
        }
        add_filter('admin_footer_text', 'blank_theme_copyright');

        function my_login_logo()
        { ?>
            <style type="text/css">
                #login h1 a,
                .login h1 a {
                    background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/static/images/blank.png);
                    height: 65px;
                    width: 320px;
                    background-repeat: no-repeat;
                    padding-bottom: 30px;
                }
            </style>
<?php }
        add_action('login_enqueue_scripts', 'my_login_logo');
    }
}
