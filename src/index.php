<?php
    $estiloPagina = 'contato.css';  
    require_once get_template_directory() . '/pages/template/header.php';

    if (is_home() && ! is_front_page()) {
?>
<div class="primary">
    <main id="main" class="site-main mt-5" role="main">
        <div class="container-title">
            <span class="text-title"><?php single_post_title(); ?></span>
        </div>
        <div class="container">
            <?php
                if (have_posts()):
            ?>
                <div class="row">
                    <?php
                    $index = 0;
                    $no_of_columns = 3;               
                    while (have_posts()): the_post();
                        if (0 === $index % $no_of_columns ) {                       
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                    <?php
                        }
                        get_template_part('template-parts/content');
                        $index++;

                        if (0 !== $index && 0 === $index % $no_of_columns) {
                    ?>
                    </div>
                    <?php
                        }
                    endwhile;
                    ?>
                </div>
            <?php
                else:
                    get_template_part('template-parts/content-none');
                endif;
            ?>
        </div>
    </main>
</div>
<?php
    }
    require_once get_template_directory() . '/pages/template/footer.php';
?>