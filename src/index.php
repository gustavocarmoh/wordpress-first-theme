<?php
if (is_home() && ! is_front_page()):
    $estiloPagina = 'blog.css';  
    require_once get_template_directory() . '/pages/template/header.php';

    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
 
    $args = array(
        'posts_per_page' => 5,
        'category_name' => 'blog',
        'paged' => $paged,
    );
    
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
         <?php  
            echo bootstrap_pagination(new WP_Query( $args ));
        ?>
    </main>
</div>
<?php
    else:
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
    endif;
    require_once get_template_directory() . '/pages/template/footer.php';
?>