
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-header-inner grid1060">
			<?php
				//variables
				$headerintrotext = get_field('header_intro_text');
			?>
			<h1 class="entry-title headline-style-2"><?php the_title(); ?></h1>
			<?php if( $headerintrotext ): ?>
				<div class="header-intro-text"><?php echo $headerintrotext; ?></div>
			<?php endif; ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="entry-content-inner-1 grid1060">
			<?php the_content(); ?>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
