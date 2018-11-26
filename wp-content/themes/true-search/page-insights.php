<?php
/**
 * Template Name: Insights Overview
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<div class="entry-header-inner grid1060">
						<?php
							//variables
							$headerintrotext = get_field('header_intro_text');
						?>
						<h1 class="entry-title headline-style-1"><?php the_title(); ?></h1>
						<?php if( $headerintrotext ): ?>
							<div class="header-intro-text"><?php echo $headerintrotext; ?></div>
						<?php endif; ?>
					</div>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<div class="insights-inner grid1180">
						<?php query_posts(array('post_type' => 'post', 'paged' => get_query_var('paged') ) ); ?>

						<?php if ( have_posts() ) : ?>
							<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'page-insights' );

								
							endwhile; // End of the loop.
							?>
					</div>
							<div class="center pagination-container">
								<?php wp_pagenavi(); ?>
							</div>
						<?php endif;?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>