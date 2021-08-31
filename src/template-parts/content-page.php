<?php
/**
 * Content Page template
 *
 * @package aquila
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( ! is_home() ) {
		?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<?php
	}
	?>

	<div class="entry-content">
		<?php
		the_content();

		if ( ! is_home() ) {
			wp_link_pages(
				[
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aquila' ),
					'after'  => '</div>',
				]
			);
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
<<<<<<< HEAD
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'screenr' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
=======
		<?php edit_post_link( esc_html__( 'Edit', 'aquila' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
>>>>>>> 6f898f4847b4f749deca656e31a90118e40c849b
