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
            <div class="container-ppd-body-left">
                <span class="text-content"><?php the_content(); ?></span>
                <span class="text-content">Como chegar:</span>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3752.2292860882276!2d-43.96706048476907!3d-19.872537841657653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa690f2f0b38883%3A0xa0bad2642c22ecc8!2sAv.%20Pres.%20Ant%C3%B4nio%20Carlos%2C%206627%20-%20Pampulha%2C%20Belo%20Horizonte%20-%20MG%2C%2031275-013!5e0!3m2!1spt-BR!2sbr!4v1625031538313!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="container-ppd-body-right">
                <form action="/action_page.php">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="assunto">Assunto:</label>
                        <input type="text" class="form-control" id="assunto">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Sua mensagem:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="button" class="btn btn-lg btn-block">Enviar sua mensagem</button>
                </form>
            </div>
        </div>
        
    </main>
    <?php
    endwhile;
endif;
require_once get_template_directory() . '/pages/template/footer.php';