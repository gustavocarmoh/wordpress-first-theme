<?php
$estiloPagina = 'blog.css';  
$the_post_id   = get_the_ID();
$hide_title    = get_post_meta( $the_post_id, '_hide_page_title', true );
$heading_class = ( ! empty( $hide_title ) && 'yes' === $hide_title ) ? 'hide d-none' : '';

$desc    = get_post_meta( $the_post_id, '_desc_1', true );
$lattes    = get_post_meta( $the_post_id, '_lattes_2', true );
$linkedin   = get_post_meta( $the_post_id, '_linkedin_3', true );

$has_post_thumbnail = get_the_post_thumbnail( $the_post_id );

?>
<header class="card" style="width: 16rem;">
	<?php
	// Featured image
	if ( $has_post_thumbnail ) {
		?>
		<div class="entry-image">
			<a>
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
		<div class="card-body">
		<?php
	}

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
		<p class="card-text"><?php echo $desc ?></p>
		<div class="div">		
			<a href="<?php echo $lattes ?>" target="_blank">
				<img src="https://lh3.googleusercontent.com/proxy/SJMqk-LrVJWXcsEO8Lnn32iRaX-KDZVIUdZ7jcKARvBxjmKoCDflWNOSRi7Y0hD3Ga7wI2gGvAzQ6aW-l-Sgj0dBibevZE4EhPcpaZ7CglGCoB8yL0g-M3sxbV05h5tgwGy7kv5KrpYXJ0Nek0vo19DOEQ" width="40px" height="40px" alt="Lattes"/>
			</a>
			<?php
				if ($linkedin !== 'http://localhost:8080/pesquisadores/') {
			?>
				<a href="<?php echo $linkedin ?>" target="_blank">
					<img src="https://image.flaticon.com/icons/png/512/174/174857.png" width="30px" height="30px" alt="Linkedin"/>
				</a>
			<?php
				}
			?>
		</div>
	</div>
</header>
