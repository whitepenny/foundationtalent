<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	<header class="entry-header" <?php if( $feat_image ) : ?>style="background-image: url(<?php echo $feat_image; ?>); <?php endif; ?>">
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="single-team-entry-content-inner grid1170">
			<div class="single-team-member-main">
				<div class="single-team-member-main-inner">
					<?php 
						//variables
						$clientnotes = get_field('client_notes');
					?>
					<h1 class="entry-title headline-style-6"><?php the_title(); ?></h1>
					
					<div class="single-member-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<div class="single-team-member-sidebar">
				<h2 class="headline-style-7">Client Notes</h2>
				<?php if( $clientnotes ) : ?>
					<div class="quick-facts"><?php echo $clientnotes; ?></div>
				<?php endif; ?>
			</div>
		
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
