<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>

    <link rel="icon" href="<?= get_template_directory_uri() . '/assets/logo-ppd.png' ?>">
   <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/normalize.css' ?>" />
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/header.css' ?>" />
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/' . $estiloPagina ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/footer.css' ?>" />

</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="container-ppd">
        <?php
            the_custom_logo();
        ?>
        <nav class="navbar navbar-expand-md navbar-light" role="navigation">
            <div class="container">
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'menu-navegacao',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );
                ?>
            </div>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
            </form>
        </nav>
    </div>
</header>