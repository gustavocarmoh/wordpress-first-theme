<?php
$estiloPagina = 'contato.css';
require_once get_template_directory() . '/pages/template/header.php';

if(have_posts()):
    while(have_posts()): the_post();
    ?>
    <main>
        <div class="container-title">
            <span class="text-title"><?php single_post_title(); ?></span>
        </div>
        <div class="container-ppd-body">
        <?php


				get_template_part('./template-parts/content', 'page' );

				?>
        </div>
        
    </main>
    <?php
    endwhile;
endif;
require_once get_template_directory() . '/pages/template/footer.php';