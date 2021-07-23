<?php
    $estiloPagina = 'home.css';
    require_once get_template_directory() . '/pages/template/header.php';


    $images = array(
        0 => get_template_directory_uri() . '/assets/img/slider/1.png',
        1 => get_template_directory_uri() . '/assets/img/slider/2.png',
        2 => get_template_directory_uri() . '/assets/img/slider/3.png',
        3 => get_template_directory_uri() . '/assets/img/slider/4.png',
        4 => get_template_directory_uri() . '/assets/img/slider/5.png'
    );
?>
    <main>
        <div class="imagem-banner">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php 
                        foreach($images as $image):
                            if($contador == 0):
                        ?>
                <div class="carousel-item active">
                    <?php
                        else:
                    ?>
                <div class="carousel-item">
                    <?php endif; ?>
                        <img class="d-block w-100" src="<?php echo $image ?>" alt="First slide">    
                </div>
                <?php 
                $contador++;
                endforeach; ?>
            </div>  
        </div>
        <div id="background"></div>
        <div class="texto-banner-dinamico-container">
            <div class="banner-logo-container">
                <img class="banner-logo" src="<?php echo get_template_directory_uri() . '/assets/img/cedeplar-logo.png' ?>" alt="UFMG" >            
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
