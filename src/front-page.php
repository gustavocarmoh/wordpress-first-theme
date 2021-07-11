<?php
$estiloPagina = 'home.css';
require_once get_template_directory() . '/pages/template/header.php';

?>
    <main>
        </div>
            <div class="imagem-banner">
            <?php the_post_thumbnail( 'full', array( 'class'=>'card-img img-fluid' ) ); ?>
            </div>
            <div id="background"> </div>
            
            <div class="texto-banner-dinamico-container">
                <div class="banner-logo-container">
                    <img class="banner-logo" src="<?php echo get_template_directory_uri() . '/assets/img/cedeplar-logo.png' ?>" alt="UFMG" >
                    <div class="text-container">
                    <?php the_custom_logo(); ?>
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
        </div>
    </main>
    <div class="rodape">
        <?php require_once get_template_directory() . '/pages/template/footer.php'; ?>
    </div>
