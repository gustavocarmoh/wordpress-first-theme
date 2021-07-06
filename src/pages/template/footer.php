<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script></body>
        <footer class="footer">
            <div class="infos">
                <div class="info"> 
                    <h6 class="text">
                        Centro de Desenvolvimento e Planejamento
                    </h6>
                    <h6 class="text">
                        Av. Antônio Carlos, 6627 - Pampulha, Belo Horizonte - MG, 31270-901
                    </h6>
                    <h6 class="text">
                        FACE - Faculdade de Ciências Econômicas
                    </h6>
                </div>
                <div class="logo">
                    <img src="<?php echo get_template_directory_uri() . '/assets/ufmg-logo.png' ?>" alt="UFMG" >
                    <img src="<?php echo get_template_directory_uri() . '/assets/cedeplar-logo.png' ?>" alt="UFMG" >
                    <img src="<?php echo get_template_directory_uri() . '/assets/face-logo.png' ?>" alt="UFMG" >
                </div>
            </div>
            <hr/>
            <div class="footer-ppd">
                <p class="container-ppd">&copy; <?php echo date("Y"); ?> - Todos os direito reservados a Políticas Públicas e Desenvolvimento</a>
            </div>
        </footer>
    </body>
    <?php wp_footer(); ?>
</html>