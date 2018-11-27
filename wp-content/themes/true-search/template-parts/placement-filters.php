<?php
$term = get_queried_object();
$filters = get_field( 'filters', $term );
?>
<form action="http://truesearch.test/placement_collection/true-placements-2018/" method="post" class="searchandfilter">
  <ul>
    <?php
      if ( ! empty( $filters ) ) :
        foreach ( $filters as $filter ) :
          $category_id = $filter['placement_filter_category_select'];
          // TODO figure out how to hide filter values that dont have posts
          $category_term = get_term_by( 'id', $category_id, 'placement_category' );
          $children = get_term_children( $category_id, 'placement_category' );

          if ( ! empty( $children ) ) :
    ?>
    <li class="sf-field-taxonomy-placement_practice">
      <label>
				<select name="<?php echo $category_term->slug; ?>" class="sf-input-select" title="">
					<option class="sf-option-active" selected="selected" value="">All <?php echo $category_term->name; ?></option>
          <?php
            foreach ( $children as $child_id ) :
              $child_term = get_term_by( 'id', $child_id, 'placement_category' );
              $count = ts_placements_get_collection_category_count($term, $child_term);

              if ( $count > 0 ) :
          ?>
					<option class="" value="<?php echo $child_term->slug; ?>">
            <?php echo $child_term->name; ?>
            <?php /* (<?php echo $count; ?>) */ ?>
          </option>
          <?php
              endif;
            endforeach;
          ?>
				</select>
		  </label>
    </li>
    <?php
          endif;
        endforeach;
      endif;
    ?>
    <li class="sf-field-reset">
      <a href="#" class="search-filter-reset">Clear Filters</a>
    </li>
  </ul>
</form>
