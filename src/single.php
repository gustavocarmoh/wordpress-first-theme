<?php
	$estiloPagina = 'single.css';
	require_once get_template_directory() . '/pages/template/header.php';
?>

	<div id="primary">
		<main id="main" class="site-main mt-5" role="main">
			
			<div class="container-title">
                <span class="text-title">Artigos</span>
            </div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12">
						<?php
						if ( have_posts() ) :
							?>
							<div class="post-wrap">
							<?php
							if ( is_home() && ! is_front_page() ) {
								?>
								<header class="mb-5">
									<h1 class="page-title screen-reader-text">
										<?php single_post_title(); ?>
									</h1>
								</header>
								<?php
							}

							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content-2' );

							endwhile;
							?>

						<?php

						else :

							get_template_part( 'template-parts/content-none' );

							?>

							</div>
						<?php
						endif;

						?>
					</div>
					<?php
					// Next and previous link for page navigation.
						get_template_part( 'template-parts/components/posts-carousel' );
					?>
				</div>
				
			</div>
		</main>
	</div>

<?php
require_once get_template_directory() . '/pages/template/footer.php';

