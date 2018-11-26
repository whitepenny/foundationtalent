<div id="post-<?php the_ID(); ?>" <?php post_class('the-search-entry'); ?>>
	<header class="search-entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<!--<div class="entry-meta">
			<?php /* true_search_posted_on();*/ ?>
		</div>--><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<div class="search-readmore"><a href="<?php the_permalink(); ?>">Read More</a></div>
	</div><!-- .entry-summary -->

</div><!-- #post-## -->
