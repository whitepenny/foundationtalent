<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		//variables
		$largeheaderimage = get_field('large_header_background_image');
		$headerintrotext = get_field('header_intro_text');
	?>
	<header class="entry-header" <?php if( $largeheaderimage): ?>style="background-image: url(<?php echo $largeheaderimage; ?>);"<?php endif; ?>>
		<div class="entry-header-inner grid1120">

			<h1 class="entry-title headline-style-2"><?php the_title(); ?></h1>
			<?php if( $headerintrotext ): ?> 
				<div class="header-intro-text reverse-header-intro-text"><?php echo $headerintrotext; ?></div>
			<?php endif; ?>

		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="sector-section-two sector-header-section">
			

			<div class="sector-client-container">
				
				<?php 
				    $theslug = get_post_field( 'post_name', get_post() );
					$args = array(
						'post_type' => 'client',
						'tax_query' => array(
							array(
								'taxonomy' => 'asset_category',
								'field' => 'slug',
								'terms' => $theslug,
							),
						),
					);

					$clientq = new WP_Query( $args );

					if( $clientq->have_posts() ) : ?>
						<?php while( $clientq->have_posts() ) : ?> 
							<?php $clientq->the_post(); 		

							//variables
							$clientarchiveimage = get_field('client_overview_image');
							$clientarchivelogo = get_field('client_overview_logo');
							?>

							<div class="the-archived-client-link">
								<div class="the-archived-client" <?php if( $clientarchiveimage ) : ?>style="background-image: url(<?php echo $clientarchiveimage; ?>);"<?php endif;?>>
									<?php if( $clientarchivelogo ) : ?>
										<div class="client-overview-logo"><img src="<?php echo $clientarchivelogo; ?>" alt="logo" /></div>
									<?php endif; ?>
								</div>
							</div>		

						<?php endwhile; ?>
					<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>

		</div>

		<div class="sector-section-three sector-header-section">
			<div class="entry-content-inner-sector grid1120">
				<?php
					//variables
					$sectorthreeheadline = get_field('sector_section_three_headline');
					$sectorthreetext = get_field('sector_section_three_text');
				?>
				<?php if( $sectorthreeheadline ): ?> 
					<h2 class="sector-two-headline headline-style-6"><?php echo $sectorthreeheadline; ?></h2>
				<?php endif; ?>
				<div class="sector-two-text">
					<?php if( $sectorthreetext ): ?> 
						<?php echo $sectorthreetext; ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="team-overview-grid">
			<?php

				$teamslug = get_post_field( 'post_name', get_post() );
					$teamargs = array(
						'post_type' => 'team-member',
						'cat' => '3',
						'orderby' => 'meta_value title',
            			'meta_key' => 'last_name',
            			'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'asset_category',
								'field' => 'slug',
								'terms' => $teamslug,
							),
						),
					);
	            $founder = new WP_Query($teamargs);
	        ?>

				<?php while ($founder->have_posts()) : $founder->the_post(); ?>

	            	<?php
	            		//variables
	            		$bwphoto = get_field('bw_team_member_photo');
	            		$tmtitle = get_field('team_member_title');
	            	?>

	                <div class="grid-team-member" style="<?php if( $bwphoto ) : ?> background-image: url(<?php echo $bwphoto; endif; ?>);">
	                	
					    	<a href="<?php the_permalink();?>" class="grid-red-mask"></a>
					    	<div class="grid-team-member-mask">
					    		<div class="team-close"><i class="fa fa-remove"></i></div>
					    		<div class="information-container">
					    			<h2 class="headline-style-7"><?php the_title(); ?></h2>
					    			<?php if( $tmtitle ) : ?><span class="team-overview-team-title"><?php echo $tmtitle; ?></span><?php endif; ?>
					    			<a href="<?php the_permalink(); ?>" class="red-button">View Profile</a>
					    		</div>
					    	</div>
					    
	                </div>
	                <h2 class="headline-style-7 mobile-title"><a href="<?php the_permalink(); ?>" class="no-uline"><?php the_title(); ?></a></h2>
	            <?php endwhile; ?>

	            <?php wp_reset_postdata(); ?>

	            <?php

				$teamslugtwo = get_post_field( 'post_name', get_post() );
					$teamargstwo = array(
						'post_type' => 'team-member',
						'cat' => '32',
						'orderby' => 'meta_value title',
            			'meta_key' => 'last_name',
            			'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'asset_category',
								'field' => 'slug',
								'terms' => $teamslugtwo,
							),
						),
					);
	            $partner = new WP_Query($teamargstwo);
	        ?>

				<?php while ($partner->have_posts()) : $partner->the_post(); ?>

	            	<?php
	            		//variables
	            		$bwphoto = get_field('bw_team_member_photo');
	            		$tmtitle = get_field('team_member_title');
	            	?>

	                <div class="grid-team-member" style="<?php if( $bwphoto ) : ?> background-image: url(<?php echo $bwphoto; endif; ?>);">
	                	
					    	<a href="<?php the_permalink();?>" class="grid-red-mask"></a>
					    	<div class="grid-team-member-mask">
					    		<div class="team-close"><i class="fa fa-remove"></i></div>
					    		<div class="information-container">
					    			<h2 class="headline-style-7"><?php the_title(); ?></h2>
					    			<?php if( $tmtitle ) : ?><span class="team-overview-team-title"><?php echo $tmtitle; ?></span><?php endif; ?>
					    			<a href="<?php the_permalink(); ?>" class="red-button">View Profile</a>
					    		</div>
					    	</div>
					    
	                </div>
	                <h2 class="headline-style-7 mobile-title"><a href="<?php the_permalink(); ?>" class="no-uline"><?php the_title(); ?></a></h2>
	            <?php endwhile; ?>

	            <?php wp_reset_postdata(); ?>

	            <?php

				$teamslugthree = get_post_field( 'post_name', get_post() );
					$teamargsthree = array(
						'post_type' => 'team-member',
						'cat' => '-3, -32',
						'orderby' => 'meta_value title',
            			'meta_key' => 'last_name',
            			'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'asset_category',
								'field' => 'slug',
								'terms' => $teamslugthree,
							),
						),
					);
	            $rest = new WP_Query($teamargsthree);
	        ?>

				<?php while ($rest->have_posts()) : $rest->the_post(); ?>

	            	<?php
	            		//variables
	            		$bwphoto = get_field('bw_team_member_photo');
	            		$tmtitle = get_field('team_member_title');
	            	?>

	                <div class="grid-team-member" style="<?php if( $bwphoto ) : ?> background-image: url(<?php echo $bwphoto; endif; ?>);">
	                	
					    	<a href="<?php the_permalink();?>" class="grid-red-mask"></a>
					    	<div class="grid-team-member-mask">
					    		<div class="team-close"><i class="fa fa-remove"></i></div>
					    		<div class="information-container">
					    			<h2 class="headline-style-7"><?php the_title(); ?></h2>
					    			<?php if( $tmtitle ) : ?><span class="team-overview-team-title"><?php echo $tmtitle; ?></span><?php endif; ?>
					    			<a href="<?php the_permalink(); ?>" class="red-button">View Profile</a>
					    		</div>
					    	</div>
					    
	                </div>
	                <h2 class="headline-style-7 mobile-title"><a href="<?php the_permalink(); ?>" class="no-uline"><?php the_title(); ?></a></h2>
	            <?php endwhile; ?>

	            <?php wp_reset_postdata(); ?>

			</div>

			<div class="entry-content-inner-sector grid1120">
				<a href="/our-people/" class="red-button red-button-3">See The Full Team</a>
			</div>

		</div>

        

			

			<?php the_content(); ?>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
