<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	<header class="entry-header" <?php if( $feat_image ) : ?>style="background-image: url(<?php echo $feat_image; ?>); <?php endif; ?>">

		<div class="entry-header-inner grid1120">
			<h1 class="entry-title headline-style-8"><?php the_title(); ?></h1>
			<div class="single-post-meta"><?php true_search_posted_on_two(); ?></div>
		</div>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="single-post-entry-content-inner grid860">
			<?php the_content(); ?>
			<!-- <div class="single-posted-on">
				<div class="single-posted-on-border"></div>
				<div class="single-footer-credits"><?php true_search_entry_footer_two(); ?></div>
			</div> -->
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
