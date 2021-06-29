<?php
global $more;

$more = 1;
$estiloPagina = 'noticias.css';
require_once get_template_directory() . '/pages/template/header.php';
?>
    <form action="#" class="container-ppd formulario-pesquisa-noticias">
        <h2>Conheça nossos noticias</h2>
        <select name="noticias" id="noticias">
            <option value="">--Selecione--</option>
            <?php
            $paises = get_terms(array('taxonomy' => 'noticias'));
            foreach ($paises as $pais):?>
                <option value="<?= $pais->name ?>"
                <?= !empty($_GET['noticias']) && $_GET['noticias'] === $pais->name ? 'selected' : '' ?>><?= $pais->name ?></option>
            <?php endforeach;
            ?>
        </select>
        <input type="submit" value="Pesquisar">
    </form>
<?php

if(!empty($_GET['noticias'])) {
    $paisSelecionado = array(array(
        'taxonomy' => 'noticias',
        'field' => 'name',
        'terms' => $_GET['noticias']
    ));
}

$args = array(
    'post_type' => 'news',
    'tax_query' => !empty($_GET['noticias']) ? $paisSelecionado : ''
);
$query = new WP_Query($args);
if ($query->have_posts()):
    echo '<main class="page-noticias">';
        echo '<ul class="lista-noticias container-ppd">';
        while ($query->have_posts()): $query->the_post();
            echo '<div class="col-sm-3 noticias" >';
                echo '<div class="noticias-container">';
                    echo '<div class="noticias-thumbnail">';
                        the_post_thumbnail(array(340,250));
                    echo '</div>';
                    echo '<div class="noticias-title">';
                        the_title('<p class="titulo-noticias">', '</p>');
                    echo '</div>';
                    echo '<div class="noticias-text">';
                        the_content('Read Only', TRUE);
                    echo '</div>';
                echo '</div>';  
            echo '</div>';
        endwhile;
        echo '</ul>';
    echo '</main>';
endif;
require_once get_template_directory() . '/pages/template/footer.php';