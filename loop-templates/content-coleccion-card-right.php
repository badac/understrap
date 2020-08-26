<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<div class="col-sm-12 col-md-8 text-right">
	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
	'</a></h2>' ); ?>
	<p>
		<?php the_excerpt() ?>
	</p>
	<p></p>
</div>

<div class="col-sm-12 col-md-4 ">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<a href="<?php the_permalink(); ?>">
		<?php echo get_the_post_thumbnail( $post->ID, 'cat-thumb' ); ?>
	</a>



	</article><!-- #post-## -->
</div>
