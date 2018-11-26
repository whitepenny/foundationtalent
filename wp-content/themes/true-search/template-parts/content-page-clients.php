<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-header-inner grid2400">
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
		<div class="client-overview-arrow"></div>
		<div class="client-overview-archive grid2400">
			<div class="client-card-container">

				<?php if( have_rows('client_logo_repeater') ): ?>
		        	<?php while( have_rows('client_logo_repeater') ): the_row(); 

		        	    // vars
						$logos = get_sub_field('the_client_logos'); 
					?>
	                <div class="logo-card">
	                	<div class="logo-card-inner">
	                    <?php if( !empty($logos) ):
							$logourl = $logos['url'];
		                    $logoalt = $logos['alt'];
		                    //$logosize = 'full';
		                    //$logothumb = $logos['sizes'][ $logosize ];
		                
				    	?>
	                    	<img src="<?php echo $logourl; ?>" alt="<?php echo $logoalt; ?>" />
	                    <?php endif; ?>
	                	</div>
	                </div>

	        	    <?php endwhile; ?>
	        	<?php endif; ?>
	        	<div class="logo-card logo-card-zero"></div>
                <div class="logo-card logo-card-zero"></div>
                <div class="logo-card logo-card-zero"></div>
	        </div>

		</div>
		
	</div><!-- .entry-content -->

</article><!-- #post-## -->
