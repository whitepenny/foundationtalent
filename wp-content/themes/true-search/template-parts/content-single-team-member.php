<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

	<?php

		$post = $wp_query->post;

		if ( in_category('featured', $post->ID) ) { ?>
		    <header class="entry-header" <?php if( $feat_image ) : ?>style="background-image: url(<?php echo $feat_image; ?>); <?php endif; ?>">
		<?php
		} 

		else { ?>
		    <header class="entry-header">
		<?php
			}
		?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="single-team-entry-content-inner grid1170">
			<div class="single-team-member-main">
				<div class="single-team-member-main-inner">
					<?php 
						//variables
						$teammembertitle = get_field('team_member_title');
						$teammembercity = get_field('team_member_city');
						$teammemberemail = get_field('team_member_email');
						$teammemberlinkedin = get_field('team_member_linkedin');
						$quickfacts = get_field('quick_facts');
						$teammemberquote = get_field('team_member_quote_2');
						$quotecite = get_field('team_member_quote_attribution');
						$colorphoto = get_field('square_color_photo');
					?>
					<h1 class="entry-title headline-style-6"><?php the_title(); ?></h1>
					<div class="single-team-member-meta">
						<?php if( $teammembertitle ) : ?>
							<span class="team-member-title"><?php echo $teammembertitle; ?></span>
						<?php endif; ?>
						<?php if( $teammembercity ) : ?>
							<span class="team-member-city"><?php echo $teammembercity; ?></span>
						<?php endif; ?>
						<span class="single-member-meta-links">
							<?php if( $teammemberemail ) : ?>
								<span class="team-member-email"><a href="mailto:<?php echo $teammemberemail; ?>"><span class="fa fa-envelope"></span>Email</a></span>
							<?php endif; ?>
							<?php if( $teammemberlinkedin ) : ?>
								<span class="team-member-linkedin"><a href="<?php echo $teammemberlinkedin; ?>" target="_blank"><span class="fa fa-linkedin-square"></span>LinkedIn</a></span>
							<?php endif; ?>
						</span>
					</div>
					<div class="single-member-content">
						<?php the_content(); ?>

						        	<?php if( have_rows('team_member_logo_repeater') ): ?>

						        		<p class="block noteworthy"><strong>Noteworthy Clients:</strong></p>
						        		<div class="team-member-logos">
						        	    <?php while( have_rows('team_member_logo_repeater') ): the_row(); 

							        	    // vars
											$tmlogos = get_sub_field('team_member_logo'); 
										?>
						                <div class="teammember-logo">
						                    <?php if( !empty($tmlogos) ):
												$tmlogourl = $tmlogos['url'];
							                    $tmlogoalt = $tmlogos['alt'];					                
									    	?>
						                    	<img src="<?php echo $tmlogourl; ?>" alt="<?php echo $tmlogoalt; ?>" />
						                    <?php endif; ?>
						                </div>

						        	    <?php endwhile; ?>
						        	    </div>
						        	<?php endif; ?>
					</div>
				</div>
				<!--<?php if( $teammemberquote ) : ?>
					<blockquote><p><?php echo $teammemberquote; ?></p></blockquote>
				<?php endif; ?>
				-->
			</div>
			<div class="single-team-member-sidebar">

				<?php

					$post = $wp_query->post;

					if ( in_category('featured', $post->ID) ) { ?>
					    <div class="no-small-photo"></div>
					<?php
					} 

					else { ?>
					    
					    <?php if( !empty($colorphoto) ):
							$urlone = $colorphoto['url'];
			                $altone = $colorphoto['alt'];
			                $sizeone = 'full';
			                $thumbone = $colorphoto['sizes'][ $sizeone ];
			            
				    	?>
							<img src="<?php echo $urlone; ?>" alt="<?php echo $altone; ?>" class="small-color-photo" />
						<?php endif; ?>
					<?php
						}
					?>

					<?php if( $teammemberquote ) : ?>
						<blockquote><p><?php echo $teammemberquote; ?></p></blockquote>
					<?php endif; ?>
					<?php if( $quotecite ) : ?>
						<span class="quote-cite"><?php echo $quotecite; ?></span>
					<?php endif; ?>

				<h2 class="headline-style-7">Snapshot</h2>
				<?php if( $quickfacts ) : ?>
					<div class="quick-facts"><?php echo $quickfacts; ?></div>
				<?php endif; ?>
			</div>
		
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
