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

    <?php wp_reset_postdata(); ?>

    <div class="entry-content">

        <?php $query_args = array(
            'post_type' => 'team-member',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );
        $custom_query = new WP_Query( $query_args ); ?>


        <div class="team-grid">
            
            <?php
             if ( $custom_query->have_posts() ) :
                 while ( $custom_query->have_posts() ) :
                    $custom_query->the_post(); 
                 
                    $thumb = get_field('bw_team_member_photo');
                    $tmtitle = get_field('team_member_title'); 
                
            ?>

                
                    
                    <a href="<?php the_permalink(); ?>" class="member">
                        <img src="<?php echo $thumb['sizes']['square-member']; ?>" alt="">

                        <div class="member-details">
                            <div>
                                <h2><?php the_title(); ?></h2>
                                <h3><?php echo $tmtitle; ?></h3>

                                <div class="btn-primary">Learn More</div>
                            </div>
                        </div>

                        <div class="member-name">
                            <h3><?php the_title(); ?></h3>
                        </div>
                    </a>

                    
                

                <?php endwhile; ?>
            <?php endif; ?>
            
            <?php wp_reset_postdata(); ?>
        </div>


    </div><!-- .entry-content -->
</article><!-- #post-## -->