<?php
$estiloPagina = 'blog.css';  
$the_post_id   = get_the_ID();
$hide_title    = get_post_meta( $the_post_id, '_hide_page_title', true );
$heading_class = ( ! empty( $hide_title ) && 'yes' === $hide_title ) ? 'hide d-none' : '';

$url = get_post_meta( $the_post_id, '_url_2', true );

$has_post_thumbnail = get_the_post_thumbnail( $the_post_id );

?>
<header class="card" style="width: 16rem;">
	<?php
	// Featured image
	if ( $has_post_thumbnail ) {
		?>
		<div class="entry-image">
			<a href="<?php echo $url ?>" target="_blank">
				<?php
				the_post_custom_thumbnail(
					$the_post_id,
					'featured-thumbnail',
					[
						'sizes' => '(max-width: 200px) 200px, 180px',
						'class' => 'card-img-top size-featured-image'
					]
				)
				?>
			</a>
		</div>
		<?php
		}
		if (wp_kses_post(get_the_title()) != '') {
		?>
		<div class="card-body">
		<?php
	
	// Title
		if ( is_single() || is_page() ) {
			printf(
				'<h3 class="card-title text-dark %1$s">%2$s</h3>',
				esc_attr( $heading_class ),
				wp_kses_post( get_the_title() )
			);
		} else {
			printf(
				'<h5 class="entry-title mb-3"><a class="text-dark" href="%1$s">%2$s</a></h5>',
				wp_kses_post( get_the_title() )
			);
		}
	?>
		</div>
	<?php
	}
	?>
	
</header>
