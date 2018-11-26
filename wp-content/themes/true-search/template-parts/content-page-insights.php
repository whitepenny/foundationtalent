<div class="insights-card">
	<div class="insights-card-thumbnail">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-size'); ?></a>
	</div>
	<div class="insights-card-text-block">
		<h2 class="headline-style-9"><?php the_title(); ?></h2>
		<div class="insights-card-excerpt"><?php the_excerpt(); ?></div>
	</div>

	<div class="insights-card-footer">
		<span class="insights-card-readmore"><a href="<?php the_permalink(); ?>">Read More</a></span>
		<span class="insights-card-date"><?php echo get_the_date('F j, Y'); ?></span>
	</div>
</div>