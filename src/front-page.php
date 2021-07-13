<?php
    $estiloPagina = 'home.css';
    require_once get_template_directory() . '/pages/template/header.php';
?>
    <main>
        <div class="imagem-banner">
            <?php 
                the_post_thumbnail();
            ?>
        </div>
        <div id="background"></div>
        <div class="texto-banner-dinamico-container">
            <div class="banner-logo-container">
                <img class="banner-logo" src="<?php echo get_template_directory_uri() . '/assets/img/cedeplar-logo.png' ?>" alt="UFMG" >
                <div class="text-container">
                    <img class="icon-banner" src="<?php echo get_template_directory_uri() . '/assets/img/logo-ppd.png' ?>" alt="UFMG" >
                </div>              
            </div>
        </div>
        <div class="text-ppd">
            <h4 class="texto-banner">
                GRUPO DE PESQUISA EM POLÍTICAS
                <br>
                PÚBLICAS E DESENVOLVIMENTO
            </h4>
        </div>
    </main>
