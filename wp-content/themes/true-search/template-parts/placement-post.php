<?php
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
$term_classes = ts_get_placement_classes( $post->ID );
?>
<div class="placement-preview <?php echo $term_classes; ?>" style="display: none;">
  <div class="placement-preview__container">
    <div class="placement-preview__image">
      <img src="<?php echo $thumb['0']; ?>" alt="">
    </div>
    <div class="placement-preview__content">
      <h3><?php the_field('placement_position'); ?></h3>
      <ul>
        <li><?php the_field('placement_location'); ?></li>
      </ul>
    </div>
  </div>
</div>
