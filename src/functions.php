<?php
    function register_navwalker() {
        require_once get_template_directory() . '/class/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );

    function pegandoTextosParaAluno() {   
        $args = array(
            'post_type' => 'banners',
            'post_status' => 'publish',
            'posts_per_page' => 1
        );
    
        $query = new WP_Query($args);
        if ($query->have_posts()):
            while ($query->have_posts()): $query->the_post();
                $texto1 = get_post_meta(get_the_ID(), '_texto_home_1', true);
                $texto2 = get_post_meta(get_the_ID(), '_texto_home_2', true);
                return array(
                    'texto_1' => $texto1,
                    'texto_2' => $texto2
                );
            endwhile;
        endif;
    }

    function ppd_home_salvando_dados_metabox($post_id) {
        foreach($_POST as $key => $value) {
            if($key !== 'texto_home_1' && $key !== 'texto_home_2'){
                continue;
            }

            update_post_meta(
                $post_id,
                '_'.$key,
                $_POST[$key]
            );
        }
    }
    add_action('save_post', 'ppd_home_salvando_dados_metabox');

    function ppd_funcao_callback_home($post){

        $texto_home_1 = get_post_meta($post->ID, '_texto_home_1', true);
        $texto_home_2 = get_post_meta($post->ID, '_texto_home_2', true);
        ?>
            <label for="texto_home_1">Nome completo do aluno:</label>
            <input type="text" name="texto_home_1" style="width: 100%" value="<?= $texto_home_1 ?>"/>
            <br>
            <br>
            <label for="texto_home_2">Informações</label>
            <input type="text" name="texto_home_2" style="width: 100%" value="<?= $texto_home_2 ?>"/>
        <?php
    }

    function ppd_home_metabox() {
        add_meta_box(
            'ppd_home_page_personalizada',
            'Texto para o aluno',
            'ppd_funcao_callback_home',
            'alunos'
        );
    }
    add_action('add_meta_boxes', 'ppd_home_metabox');

    function ppd_home_page_personalizada() {
        register_post_type( 
            'alunos', 
            array(
                'labels' => array('name' => 'Alunos'),
                'public' => true,
                'menu_position' => 1,
                'menu_icon' => 'dashicons-admin-users',
                'supports' => array('title', 'thumbnail')
            )
        );
    }
    add_action('init', 'ppd_home_page_personalizada');

    function ppd_registrando_taxonomia() {
        register_taxonomy(
            'artigo',
            'article',
            array(
                'labels' => array('name' => 'Temas'),
                'hierarchical' => true
            )
        );
    }
    add_action('init', 'ppd_registrando_taxonomia');

    function ppd_tipo_post_artigo() {
        register_post_type('article', array(
            'labels' => array('name' => 'Artigo'),
            'public' => true,
            'menu_position' => 0,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-welcome-write-blog'
        ));
    }
    add_action('init', 'ppd_tipo_post_artigo');
   
    function ppd_registrando_taxonomia_noticias() {
        register_taxonomy(
            'noticias',
            'news',
            array(
                'labels' => array('name' => 'Temas'),
                'hierarchical' => true
            )
        );
    }
    add_action('init', 'ppd_registrando_taxonomia_noticias');

    function ppd_tipo_post_noticias() {
        register_post_type('news', array(
            'labels' => array('name' => 'Noticias'),
            'public' => true,
            'menu_position' => 1,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-welcome-add-page'
        ));
    }
    add_action('init', 'ppd_tipo_post_noticias');

    function ppd_menu() {
        register_nav_menu('menu-navegacao',__('Menu navegação'));
    }
    add_action('init', 'ppd_menu');

        /**
         * Sets up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support for post thumbnails.
         */
        function theme_setup() {
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             * If you're building a theme based on Screenr, use a find and replace
             * to change 'screenr' to the name of your theme in all the template files.
             */
            load_theme_textdomain( 'screenr', get_template_directory() . '/languages' );
    
            // Add default posts and comments RSS feed links to head.
            add_theme_support( 'automatic-feed-links' );
    
            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support( 'title-tag' );
    
            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support( 'post-thumbnails' );
            add_post_type_support( 'page', 'excerpt' );
            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
             */
            add_theme_support( 'post-thumbnails' );
            add_image_size( 'blog-grid-small', 350, 200, true );
            add_image_size( 'blog-grid', 540, 300, true );
            add_image_size( 'blog-list', 790, 400, true );
            add_image_size( 'service-small', 538, 280, true );
    
            add_theme_support(
                'custom-logo',
                array(
                    'height'      => 60,
                    'width'       => 240,
                    'flex-height' => true,
                    'flex-width'  => true,
                // 'header-text' => array( 'site-title', 'site-description' ),
                )
            );
    
            // This theme uses wp_nav_menu() in one location.
            register_nav_menus(
                array(
                    'primary' => esc_html__( 'Primary', 'screenr' ),
                )
            );
    
            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support(
                'html5',
                array(
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                )
            );
    
            // Set up the WordPress core custom background feature.
            add_theme_support(
                'custom-background',
                apply_filters(
                    'screenr_custom_background_args',
                    array(
                        'default-color' => 'ffffff',
                        'default-image' => '',
                    )
                )
            );
        }
    add_action( 'after_setup_theme', 'theme_setup' );
?>