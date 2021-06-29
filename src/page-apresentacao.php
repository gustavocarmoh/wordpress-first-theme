<?php
    $estiloPagina = 'apresentacao.css';
    require_once get_template_directory() . '/pages/template/header.php';
    if (have_posts()): 
?>
    <main class="apresentacao">
        <?php
            while(have_posts()): the_post();
                the_post_thumbnail('post-thumbnail', array('class' => 'bg-banner'));
                echo'<div class="conteudo container-ppd">';
                    the_title('<h1 class="title">','</h1>');
                    the_content();
                echo'</div>';
            endwhile;
        ?>
    </main>
<?php
    endif;

    require_once get_template_directory() . '/pages/template/footer.php';
?>