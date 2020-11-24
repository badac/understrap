	<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

 $get_author_id = get_the_author_meta('ID');
 $author_gravatar_url = get_avatar_url($get_author_id, array('size' => 450));

?>

<article <?php post_class('col-sm-12 col-md-4'); ?> id="post-<?php the_ID(); ?>">

	<a href="<?php the_permalink(); ?>">
		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	</a>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>
		<div class="entry-meta">
			<div class="author">
				<?php echo get_the_author(); ?>
			</div>
			<div class="date">
				<?php echo the_time('M d, Y'); ?>
			</div>
		</div>

		<?php if ( 'post' == get_post_type() ) : ?>

		<?php endif; ?>

	</header><!-- .entry-header -->


	<div class="entry-content">

		<?php
		the_excerpt();
		?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
