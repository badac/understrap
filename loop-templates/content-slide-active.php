<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

$img_url  = get_the_post_thumbnail_url( $post , 'large' );

?>
<div class="carousel-item active" style="background-image: url(' <?php echo $img_url ?> ')">
  <div class="carousel-caption d-none d-md-block">
    <h3> <?php the_title(); ?> </h3>
    <p> <?php the_content(); ?> </p>
  </div>
</div>
