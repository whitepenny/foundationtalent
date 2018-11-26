
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
		<?php if( have_rows('location_repeater') ): ?>
	        <?php while( have_rows('location_repeater') ): the_row(); 
	        	// vars
				$thelocationname = get_sub_field('location_name'); 
				$thelocationimage = get_sub_field('location_image'); 
				$thelocationaddress = get_sub_field('the_location_address'); 
			?>
			<div class="visual-location-container">
				<div class="visual-location" <?php if( $thelocationimage ) : ?>style="background-image: url(<?php echo $thelocationimage?>);" <?php endif; ?>>
				</div>
				<div class="visual-location-inner">
					<?php if( $thelocationname ) : ?>
					  <h2 class="headline-style-5"><?php echo $thelocationname; ?></h2>
					<?php endif; ?>
					<?php if( $thelocationaddress ) : ?>
					  <div class="the-location-address-container"><div class="the-revealed-location-address"><?php echo $thelocationaddress; ?></div></div>
					<?php endif; ?>
				</div>
			</div>
			<?php endwhile; ?>
		<?php endif; ?>
				
	</div><!-- .entry-content -->

</article><!-- #post-## -->
