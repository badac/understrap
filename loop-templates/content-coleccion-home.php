<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">


	</header><!-- .entry-header -->
<a href="<?php the_permalink(); ?>">
	<?php echo get_the_post_thumbnail( $post->ID, 'widescreen-md' ); ?>
</a>
<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
'</a></h2>' ); ?>




</article><!-- #post-## -->
