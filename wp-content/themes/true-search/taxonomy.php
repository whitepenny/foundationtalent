<?php

// Convert Search & Filter to new taxonomies
$sf_filters = array(
  '_sft_placement_practice' => 'practices',
  '_sft_placement_function' => 'functions',
  '_sft_placement_asset' => 'assets',
  '_sft_placement_location' => 'locations',
  '_sft_placement_quarters' => 'quarters',
);

$new_filters = array();

foreach ( $sf_filters as $sf_key => $new_key ) {
  if ( ! empty( $_GET[ $sf_key ] ) ) {
    $new_filters[] = $new_key . '=' . $_GET[ $sf_key ];
  }
}

if ( ! empty( $new_filters ) ) {
  $term_id = get_queried_object_id();
  $current_url = get_term_link( $term_id );

  wp_redirect( $current_url . '#' . implode( '&', $new_filters ) );
  die();
}

?>


<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">



            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <div class="entry-header-inner grid2400">

                        <h1 class="entry-title headline-style-2"><?php single_cat_title(); ?></h1>

                            <div class="header-intro-text"><?php echo category_description(); ?></div>

                    </div>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <div class="client-overview-arrow"></div>

                    <div style="text-align: center;">
                    <div class="placement-filter-toolbar">

                      <?php // echo do_shortcode('[searchandfilter slug="placements"]' ); ?>
                      <?php get_template_part( 'template-parts/placement-filters' ); ?>

                    </div>
                    </div>

                    <div class="grid2400">

                        <div class="placement-previews" id="filterResults">

                            <?php get_template_part( 'template-parts/placement-loop' ); ?>

                            <!-- Loading... -->

                        </div>

                        <?php
                        // echo '<div class="pagination">';
                        // echo paginate_links(array(
                        //     'type' => 'list',
                        //     'prev_text' => 'previous',
                        //     'next_text' => 'next',
                        // ));
                        // echo '</div>';
                        ?>

                    </div>


                </div><!-- .entry-content -->

            </article><!-- #post-## -->


        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
