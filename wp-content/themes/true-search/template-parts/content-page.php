<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header" style="background-image: url('<?php echo $thumb['0']; ?>');">
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
		<div class="single-post-entry-content-inner grid860">
			<?php the_content(); ?>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->