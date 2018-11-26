<?php
get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article>

				<header class="entry-header">
					<div class="entry-header-inner grid1060">
						<h1 class="entry-title headline-style-1">Search Results</h1>
					</div>
				</header><!-- .entry-header -->

				<?php if (!have_posts()) : 
				  get_template_part( 'template-parts/content', 'none-search' );
				endif; ?>

					<div class="grid1060 searchcontent">

						<?php global $wp_query; ?>


						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						if( function_exists( 'wp_pagenavi' ) ) { ?>

							<aside class="pagination">
								<nav class="text-center">
								    <?php wp_pagenavi( array( 'query' => $wp_query ) ); ?>
								</nav>
							</aside>

						<?php } ?>

				</div>

			</article>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer(); ?>