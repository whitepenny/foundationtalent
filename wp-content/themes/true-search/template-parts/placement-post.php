<?php
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
$term_classes = ts_get_placement_classes( $post->ID );

$investors = get_field( 'placement_investors' );
$investors_label = get_field( 'placement_investors_label' );

if ( empty( $investors_label ) ) {
  $investors_label = 'Investors(s)';
}
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
      <?php if ( ! empty( $investors ) ) : ?>
      <h4 class="placement-investors_label"><?php echo $investors_label; ?></h4>
      <ul class="placement-investors_list">
        <?php foreach ( $investors as $investor ) : ?>
        <li><?php echo $investor['name']; ?></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</div>
