<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<div class="entry-header-inner grid1060">
						<?php
							//variables
							$blogtitle = get_field('blog_title', 'options'); 
							$blogintro = get_field('blog_intro', 'options');
						?>
						<h1 class="entry-title headline-style-1"><?php echo $blogtitle; ?></h1>
						<?php if( $blogintro ): ?>
							<div class="header-intro-text"><p><?php echo $blogintro; ?></p></div>
						<?php endif; ?>
					</div>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<div class="insights-inner grid1180">
						

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
