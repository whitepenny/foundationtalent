<section class="no-results not-found">

    <!--<header class="search-entry-header">
        <div class="search-entry-header-inner grid1060">
            <h2 class="entry-title headline-style-7"><?php /*esc_html_e( 'Nothing found for that search. Try Another Search?', 'true-search' ); */ ?></h2>
        </div>
    </header>--><!-- .entry-header -->

    <div class="page-content theres-no-search-content">
        <div class="grid1060">

            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'true-search' ); ?></p>
            <?php get_search_form(); ?>

        </div>

    </div><!-- .page-content -->
</section><!-- .no-results -->
