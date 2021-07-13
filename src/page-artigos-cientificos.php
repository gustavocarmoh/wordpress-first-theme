<?php
$estiloPagina = 'noticias.css';
require_once get_template_directory() . '/pages/template/header.php';

if(have_posts()):
    while(have_posts()): the_post();
    ?>
    <main id="main" class="site-main mt-5" role="main">
        <div class="container-title">
            <span class="text-title"><?php single_post_title(); ?></span>
        </div>
        <div class="container">
            <span class="text-content"><?php the_content(); ?></span>
        </div>               
    </main>
    <?php
    endwhile;
endif;
require_once get_template_directory() . '/pages/template/footer.php';