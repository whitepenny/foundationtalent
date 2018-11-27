<?php
  if ( have_posts() ):
    while ( have_posts() ):
      the_post();

      get_template_part( 'template-parts/placement-post' );
    endwhile;
  endif;
?>
<div class="placement-no-results" style="display: none;">
  <h2>No Results</h2>
  <p>There are no results that match the criteria.</p>
</div>
