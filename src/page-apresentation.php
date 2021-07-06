<?php
$estiloPagina = 'apresentacao.css';
require_once get_template_directory() . '/pages/template/header.php';

if(have_posts()):
    while(have_posts()): the_post();
    ?>
    <main>
        <div class="imagem-banner">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="text-banner-dinamico-container">
            <span class="text-title"><?php single_post_title(); ?></span>
            <span class="text-content"><?php the_content(); ?></span>
        </div>
    </main>
    <?php
    endwhile;
endif;
require_once get_template_directory() . '/pages/template/footer.php';