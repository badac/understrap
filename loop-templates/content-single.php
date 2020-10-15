<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */
 $get_author_id = get_the_author_meta('ID');
 $author_gravatar_url = get_avatar_url($get_author_id, array('size' => 50));
?>


<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">



	<div class="row justify-content-center">
		<header class="entry-header col-sm-12 col-md-8">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<div class="entry-meta">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author">
					<img src="<?php echo $author_gravatar_url ?>" class="profile-gravatar" alt="">
					Por <?php echo get_the_author(); ?>
				</a>
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
