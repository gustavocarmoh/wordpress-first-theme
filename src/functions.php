<?php
    function register_navwalker(){
        require_once get_template_directory() . '/class/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );

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