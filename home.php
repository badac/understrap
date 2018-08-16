<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

$slider_args = array(
  'category_name' => 'slider'
);

$colecciones_args = array(
  'category_name'=> 'colecciones'
);

$articulos_args = array(
  'category_name'=> 'articulos'
);

$noticias_args = array(
  'category_name'=> 'noticias'
);

$slider = new WP_Query( $slider_args );
$colecciones = new WP_Query( $colecciones_args );
$articulos = new WP_Query( $articulos_args );
$noticias = new WP_Query( $noticias_args );

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>


  <?php if ( $slider->have_posts() ) : ?>
  <?php $current_post = 0; ?>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">

    <?php while ( $slider->have_posts() ) : $slider->the_post(); ?>


      <?php
      if( $current_post == 0 ) :
        get_template_part( 'loop-templates/content-slide-active', get_post_format() );
      else:
        get_template_part( 'loop-templates/content-slide', get_post_format() );
      endif;
      ?>

      <?php $current_post++; ?>
    <?php endwhile; ?>
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

  <?php endif ?>
  <?php wp_reset_postdata(); ?>


<?php endif; ?>


<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

        <div class="row">


        <div class="col-sm-12 col-md-4 col-spacer">
          <div class="col-header">
            <h1>Colecciones</h1>
          </div>

          <?php if ( $colecciones->have_posts() ) : ?>

  					<?php /* Start the Loop */ ?>

  					<?php while ( $colecciones->have_posts() ) : $colecciones->the_post(); ?>

  						<?php

  						/*
  						 * Include the Post-Format-specific template for the content.
  						 * If you want to override this in a child theme, then include a file
  						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
  						 */
  						get_template_part( 'loop-templates/content-coleccion', get_post_format() );
  						?>

  					<?php endwhile; ?>

  				<?php else : ?>

  					<?php get_template_part( 'loop-templates/content-coleccion', 'none' ); ?>

  				<?php endif; ?>
        </div>
        <?php wp_reset_postdata(); ?>

        <div class="col-sm-12 col-md-4 col-spacer">
          <div class="col-header">
            <h1>Artículos</h1>
          </div>
          <?php if ( $articulos->have_posts() ) : ?>

  					<?php /* Start the Loop */ ?>

  					<?php while ( $articulos->have_posts() ) : $articulos->the_post(); ?>

  						<?php

  						/*
  						 * Include the Post-Format-specific template for the content.
  						 * If you want to override this in a child theme, then include a file
  						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
  						 */
  						get_template_part( 'loop-templates/content-articulo', get_post_format() );
  						?>

  					<?php endwhile; ?>

  				<?php else : ?>

  					<?php get_template_part( 'loop-templates/content-articulo', 'none' ); ?>

  				<?php endif; ?>
        </div>
        <?php wp_reset_postdata(); ?>


        <div class="col-sm-12 col-md-4 col-spacer">
          <div class="col-header">
            <h1 >Noticias</h1>
          </div>
          <?php if ( $noticias->have_posts() ) : ?>

  					<?php /* Start the Loop */ ?>

  					<?php while ( $noticias->have_posts() ) : $noticias->the_post(); ?>

  						<?php

  						/*
  						 * Include the Post-Format-specific template for the content.
  						 * If you want to override this in a child theme, then include a file
  						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
  						 */
  						get_template_part( 'loop-templates/content-noticia', get_post_format() );
  						?>

  					<?php endwhile; ?>

  				<?php else : ?>

  					<?php get_template_part( 'loop-templates/content-noticia', 'none' ); ?>

  				<?php endif; ?>
        </div>
        <?php wp_reset_postdata(); ?>

    </div>

			</main><!-- #main -->


			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>



</div><!-- Container end -->

</div><!-- Wrapper end -->


<?php get_footer(); ?>
