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
		<div class="company-section-two">
			<?php
			//variables
			$companytwoimage = get_field('company_page_section_two_image');
			$companytwoheadline = get_field('company_section_two_left_headline');
			$companytwotext = get_field('company_section_two_right_text');
			?>
			<div class="company-section-two-left" <?php if( $companytwoimage ) : ?>style="background-image: url(<?php echo $companytwoimage?>);" <?php endif; ?>>
				<?php if( $companytwoheadline ): ?>
					<h2 class="company-section-two-headline headline-style-3"><?php echo $companytwoheadline; ?></h2>
				<?php endif; ?>
			</div>
			<div class="company-section-two-right">
				<?php if( $companytwotext ): ?>
					<div class="company-section-two-text"><?php echo $companytwotext; ?></div>
				<?php endif; ?>
			</div>
		</div>

		
		<?php
		//variables
		$companybottomimage = get_field('company_bottom_background_image');
		$companybottomheadline = get_field('company_bottom_left_headline');
		$companybottomtext = get_field('company_bottom_right_text');
		?>

		<?php if ($companybottomheadline): ?>
			
		<div class="company-section-near-bottom" <?php if( $companybottomimage ) : ?>style="background-image: url(<?php echo $companybottomimage?>);" <?php endif; ?>>
		</div>
		<div class="company-section-bottom" <?php if( $companybottomimage ) : ?>style="background-image: url(<?php echo $companybottomimage?>);" <?php endif; ?>>
			<div class="company-section-bottom-inner">
				<div class="company-section-bottom-left">
					<?php if( $companybottomheadline ): ?>
					<h2 class="company-bottom-headline headline-style-3"><?php echo $companybottomheadline; ?></h2>
				<?php endif; ?>
				</div>
				<div class="company-section-bottom-right">
					<?php if( $companybottomtext ): ?>
						<div class="company-bottom-text"><?php echo $companybottomtext; ?></div>
					<?php endif; ?>
				</div>
			</div>
			
		</div>

	<?php endif; ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->