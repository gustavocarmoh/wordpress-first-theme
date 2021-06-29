<?php
    function register_navwalker() {
        require_once get_template_directory() . '/class/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );

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
            'menu_position' => 1,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-admin-site'
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
            'menu_position' => 0,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-admin-site'
        ));
    }
    add_action('init', 'ppd_tipo_post_noticias');

    function ppd_adicionando_recursos() {
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo');
    }
    add_action('after_setup_theme', 'ppd_adicionando_recursos');

    function ppd_menu() {
        register_nav_menu('menu-navegacao',__('Menu navegação'));
    }
    add_action('init', 'ppd_menu');
?>