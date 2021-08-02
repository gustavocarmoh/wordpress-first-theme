<?php
    $estiloPagina = 'noticias.css';
    require_once get_template_directory() . '/pages/template/header.php';
?>
<?php
    if(!empty($_GET['noticias'])) {
        $paisSelecionado = array(array(
            'taxonomy' => 'noticias',
            'field' => 'name',
            'terms' => $_GET['noticias']
        ));
    }

    $args = array(
        'post_type' => 'news',
        'tax_query' => !empty($_GET['noticias']) ? $paisSelecionado : ''
    );
    $query = new WP_Query($args);
    if ($query->have_posts()):
        echo '<main id="main" class="site-main mt-5" role="main">';
        ?>
        <div class="container-title">
            <span class="text-title"><?php single_post_title(); ?></span>
        </div>
        <?php
            echo '<ul class="container">';
            while ($query->have_posts()): $query->the_post();
                echo '<div class="col-sm-3 noticias" >';
                    echo '<div class="noticias-container">';
                        echo '<div class="noticias-thumbnail">';
                            the_post_thumbnail(array(340,250));
                        echo '</div>';
                        echo '<div class="noticias-title">';
                            the_title('<p class="titulo-noticias">', '</p>');
                        echo '</div>';
                        echo '<div class="noticias-text">';
                            the_content();
                        echo '</div>';
                    echo '</div>';  
                echo '</div>';
            endwhile;
            echo '</ul>';
        echo '</main>';
    endif;
    require_once get_template_directory() . '/pages/template/footer.php';
?>