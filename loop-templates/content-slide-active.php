<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

$img_url  = get_the_post_thumbnail_url( $post , 'large' );

?>
<div class="carousel-item active" style="background-image: url(' <?php echo $img_url ?> ')">

</div>
