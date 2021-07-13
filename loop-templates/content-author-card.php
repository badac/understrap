<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>
<div class="card">
	<?php echo the_post_thumbnail('thumbnail', array('class'=>'card-img') ); ?>
	<div class="card-body">
		<?php the_title( sprintf( '<h5 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h5>' ); ?>
	</div>

</div>
