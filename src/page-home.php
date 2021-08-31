<?php
$estiloPagina = 'home.css';
require_once get_template_directory() . '/pages/template/header.php';

$args = array(
        'post_type' => 'banners',
        'post_status' => 'publish',
        'posts_per_page' => 1
);

$query = new WP_Query($args);
if($query->have_posts()):
    while($query->have_posts()): $query->the_post();
    ?>
    <main>
        <div class="imagem-banner">
            <?php the_post_thumbnail(); ?>
        </div>
        <div id="background"> </div>
        
        <div class="texto-banner-dinamico-container">
            <div class="banner-logo-container">
                <img class="banner-logo" src="<?php echo get_template_directory_uri() . '/assets/cedeplar-logo.png' ?>" alt="UFMG" >
                <div class="text-container">
                    <img class="icon-banner" src="<?php echo get_template_directory_uri() . '/assets/logo-ppd.png' ?>" alt="UFMG" >
                    
                </div>              
            </div>
        </div>
        <div class="text-ppd">
            <span class="texto-banner">
                GRUPO DE PESQUISA EM POLÍTICAS
                <br>
                PÚBLICAS E DESENVOLVIMENTO
            </span>
        </div>
    </main>
    <?php
    endwhile;
endif;
require_once get_template_directory() . '/pages/template/footer.php';