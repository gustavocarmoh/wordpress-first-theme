<?php
    require_once get_template_directory() . '/pages/template/header.php';

    if (have_posts()):
        while (have_posts()): the_post(); ?>
        <div class="post-header">
            <div class="post-title">
                <?php the_title(); ?>
            </div>
            <div class="post-author">
               postado por: <?php the_author_posts(); ?>
            </div>
            <div class="post-body">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
    <?php        
        endwhile;
    endif;

    require_once get_template_directory() . '/pages/template/footer.php';
?>