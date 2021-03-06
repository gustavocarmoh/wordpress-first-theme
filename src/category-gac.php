<?php
global $post;
    $estiloPagina = 'blog.css';  
    require_once get_template_directory() . '/pages/template/header.php';

    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    
 
    $args = array(
        'paged' => $paged,
    );
?>
<div class="primary">
    <main id="main" class="site-main mt-5" role="main">
        <div class="container-title">
            <span class="text-title">GAC</span>
        </div>
        <div class="container">
            <?php
                if (have_posts()):
            ?>
                <div class="row">
                    <div class="col-8 row">
                    <?php
                    $index = 0;
                    $no_of_columns = 1;             
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
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php 
            
                else:
                    get_template_part('template-parts/content-none');
                endif;
                
            ?>
            <?php  
                echo bootstrap_pagination(new WP_Query( $args ));
            ?>
        </div>
        
    </main>
</div>
<?php
    require_once get_template_directory() . '/pages/template/footer.php';
?>