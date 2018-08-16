<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>
<div class="col-xs-6 col-sm-4 col-lg-3">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<a href="<?php the_permalink(); ?>">
		<?php echo get_the_post_thumbnail( $post->ID, 'cat-thumb' ); ?>
	</a>
	<?php the_title( sprintf( '<h6 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
	'</a></h6>' ); ?>


	</article><!-- #post-## -->
</div>
