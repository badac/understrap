<?php
/**
 * Template Name: Coleccion list template
 *
 * Template to display page with margins both sides.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );



?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">
      <div class="col-md-2">

			</div>

			<div class="col-md-8 content-area" id="primary">

				<main class="site-main" id="main" role="main">

          <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'loop-templates/content', 'page' ); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :

              comments_template();

            endif;
            ?>

          <?php endwhile; // end of the loop. ?>

          <?php
          $colecciones_args = array(
            'post_type'=> 'coleccion',
            'orderby' => 'title'
          );
          $colecciones = new WP_Query( $colecciones_args );
           ?>

          <h2 class="mb-3">Fondos y colecciones del BADAC</h2>
					<ul class="list-unstyled">

					<?php while($colecciones->have_posts()):$colecciones->the_post(); ?>
						<li>
							<a href="<?php echo the_permalink(); ?>">
								<h5>
									<?php echo the_title(); ?>
								</h5>
							</a>
						</li>
					<?php endwhile; // end of the loop. ?>
						</ul>



				</main><!-- #main -->

			</div><!-- #primary -->

			<div class="col-md-2">

			</div>
		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
