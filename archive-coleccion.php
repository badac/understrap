<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
				echo '<h1 class="page-title text-center">'. post_type_archive_title( '', false ) . '</h1>';
						?>
					</header><!-- .page-header -->


					<?php /* Start the Loop */ ?>
					<?php $post_count = 0; ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="row my-5">
						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						 if ( $post_count % 2 == 0) {
						 	get_template_part( 'loop-templates/content-coleccion-card-left', get_post_format() );
						 }else{
							get_template_part( 'loop-templates/content-coleccion-card-right', get_post_format() );
						 }

						?>
					</div>

					<?php $post_count++; ?>
					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content-coleccion-card-left', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
