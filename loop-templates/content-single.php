<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">



	<div class="row justify-content-center">
		<header class="entry-header col-sm-12 col-md-8">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<div class="entry-meta">
				<div class="author">
					Por <?php echo get_the_author(); ?>
				</div>
				<div class="date">
					<?php echo the_date('M d, Y') ?>
				</div>
			</div>

		</header><!-- .entry-header -->
		<div class="entry-content col-sm-12 col-md-8">

			<?php the_content(); ?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

	</div>

</article><!-- #post-## -->
