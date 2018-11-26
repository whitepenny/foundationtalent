<?php
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<div class="entry-header-inner grid1060">
						
						<h1 class="entry-title headline-style-1"><?php single_cat_title(); ?></h1>
						<div class="header-intro-text">
							<?php global $cat; ?>
							<?php echo category_description( $cat ); ?>
						</div>
					</div>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<div class="insights-inner grid1180">
						<?php $cur_cat_id = get_cat_id( single_cat_title("",false) ); ?>
						<?php query_posts(array('post_type' => 'post', 'cat' => $cur_cat_id, 'paged' => get_query_var('paged') ) ); ?>

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