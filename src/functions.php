<?php
    function register_navwalker() {
        require_once get_template_directory() . '/class/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );

    function pegandoTextosParaBanner() {
    
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
            'Texto para a home',
            'ppd_funcao_callback_home',
            'banners'
        );
    }
    add_action('add_meta_boxes', 'ppd_home_metabox');

    function ppd_home_page_personalizada() {
        register_post_type( 
            'banners', 
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

    function ppd_adicionando_recursos() {
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
        add_theme_support('custom-logo');
    }
    add_action('after_setup_theme', 'ppd_adicionando_recursos');

    function ppd_menu() {
        register_nav_menus( array(
            'primary' => __('Menu navegação','menu-navegacao' )
        ) );
    }
    add_action('init', 'ppd_menu');


    if ( ! defined( 'AQUILA_DIR_PATH' ) ) {
        define( 'AQUILA_DIR_PATH', untrailingslashit( get_template_directory() ) );
    }
    
    if ( ! defined( 'AQUILA_DIR_URI' ) ) {
        define( 'AQUILA_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
    }
    
    if ( ! defined( 'AQUILA_BUILD_URI' ) ) {
        define( 'AQUILA_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
    }
    
    if ( ! defined( 'AQUILA_BUILD_PATH' ) ) {
        define( 'AQUILA_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/build' );
    }
    
    if ( ! defined( 'AQUILA_BUILD_JS_URI' ) ) {
        define( 'AQUILA_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/js' );
    }
    
    if ( ! defined( 'AQUILA_BUILD_JS_DIR_PATH' ) ) {
        define( 'AQUILA_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/js' );
    }
    
    if ( ! defined( 'AQUILA_BUILD_IMG_URI' ) ) {
        define( 'AQUILA_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/src/img' );
    }
    
    if ( ! defined( 'AQUILA_BUILD_CSS_URI' ) ) {
        define( 'AQUILA_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/css' );
    }
    
    if ( ! defined( 'AQUILA_BUILD_CSS_DIR_PATH' ) ) {
        define( 'AQUILA_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/css' );
    }
    
    if ( ! defined( 'AQUILA_BUILD_LIB_URI' ) ) {
        define( 'AQUILA_BUILD_LIB_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/library' );
    }
    
    require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';
    require_once AQUILA_DIR_PATH . '/inc/helpers/template-tags.php';
    
    function aquila_get_theme_instance() {
        \AQUILA_THEME\Inc\AQUILA_THEME::get_instance();
    }
    
    aquila_get_theme_instance();
?>