<?php
/**
 * Posts Carousel
 *
 * @package aquila
 */


$args = [
	'posts_per_page'         => 5,
	'post_type'              => 'post',
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
];

$post_query = new \WP_Query( $args );
?>
<div class="posts-carousel px-4">
	<?php
	if ( $post_query->have_posts() ) :
		while ( $post_query->have_posts() ) :
			$post_query->the_post();
			?>
			<div class="card" onclick="window.location=('<?php echo esc_url( get_the_permalink() );?>')">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_custom_thumbnail(
						get_the_ID(),
						'featured-thumbnail',
						[
							'class' => 'card-img-top',
						]
					);
				} else {
					?>
					<img src="https://via.placeholder.com/510x340" class="card-img-top" alt="Card image cap" >
					<?php
				}
				?>
				
				<div class="card-body">
				<?php 
					printf(
						'<h5 class="page-title text-dark %1$s">%2$s</h5>',
						esc_attr( $heading_class ),
						wp_kses_post( get_the_title() )
					);
					?>
					<?php aquila_the_excerpt(100); ?>
				</div>
			</div>
		<?php
		endwhile;
	endif;
	wp_reset_postdata();
	?>
</div>
