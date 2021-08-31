<?php
$estiloPagina = 'contato.css';
require_once get_template_directory() . '/pages/template/header.php';
?>

	<div id="content" class="site-content">

		<div id="content-inside" class="container <?php echo esc_attr( screenr_get_layout() ); ?>-sidebar">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>

		</div><!--#content-inside -->
	</div><!-- #content -->

<?php
$estiloPagina = 'contato.css';
require_once get_template_directory() . '/pages/template/footer.php';
?>
