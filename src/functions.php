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
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo');
    }
    add_action('after_setup_theme', 'ppd_adicionando_recursos');

    function ppd_menu() {
        register_nav_menu('menu-navegacao',__('Menu navegação'));
    }
    add_action('init', 'ppd_menu');
?>