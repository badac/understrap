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
	<?php the_post_thumbnail('widescreen-lg'); ?>
</a>
<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
'</a></h2>' ); ?>
<div class="entry-content col-sm-12 col-md-8">

	<?php the_content(); ?>

	<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
		'after'  => '</div>',
	) );
	?>

</div><!-- .entry-content -->



</article><!-- #post-## -->
