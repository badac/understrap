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
  'post_type'=> 'coleccion'
);

$articulos_args = array(
  'category_name'=> 'articulos'
);

$novedades_args = array(
  'category_name'=>'novedades'
);

$noticias_args = array(
  'category_name'=> 'noticias'
);

$slider = new WP_Query( $slider_args );
$colecciones = new WP_Query( $colecciones_args );
$articulos = new WP_Query( $articulos_args );
$noticias = new WP_Query( $noticias_args );
//$novedades = new WP_Query($novedades_args);

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>


  <?php if ( $slider->have_posts() ) : ?>
  <?php $current_post = 0; ?>
  <div id="hero-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">

    <div class="carousel-inner" role="listbox">
    <div class="carousel-overlay">
      <div class="row-col d-flex align-items-center justify-content-center h-100 ">
        <div class="col-sm-12 col-md-8 intro text-center">
          <?php echo get_theme_mod( 'understrap_site_motto' ) ?>
        </div>
      </div>
    </div>
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

</div>

  <?php endif ?>
  <?php wp_reset_postdata(); ?>


<?php endif; ?>


<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">


			<main class="site-main" id="main">

        <div class="row">


        <div class="col-sm-12 col-spacer">
          <div class="col-header">
            <h2 class="display-3">Colecciones</h2>
          </div>

          <div class="row-col">
          <?php if ( $colecciones->have_posts() ) : ?>

            <div id="colecciones-slider" class="colecciones-slider">
              <?php /* Start the Loop */ ?>

              <?php while ( $colecciones->have_posts() ) : $colecciones->the_post(); ?>

                  <div class="col-md-3">
                  <?php
                  /*
                   * Include the Post-Format-specific template for the content.
                   * If you want to override this in a child theme, then include a file
                   * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                   */
                  get_template_part( 'loop-templates/content-coleccion-home', get_post_format() );
                  ?>
                </div>
                <?php endwhile; ?>
              </div>
              <ul class="controls" id="slide-controls">
                <li class="prev" aria-controls="colecciones-slider" tabindex="-1" data-controls="prev">
                  <i class="fa fa-angle-left fa-4x"></i>
                </li>
                <li class="next" aria-controls="colecciones-slider"  tabindex="-1" data-controls="next">
                  <i class="fa fa-angle-right fa-4x"></i>
                </li>
              </ul>
          </div>
        </div>

			<?php endif; ?>
    </div>
  <?php wp_reset_postdata(); ?>

  <?php if ( $noticias->have_posts() ) : ?>
<div class="row">


        <div class="col-sm-12 col-spacer">
          <div class="col-header">
            <h2 class="display-3">Noticias</h2>
          </div>
          <div class="row">
                <div class="col-sm-4">
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
            </div>
          </div>
        </div>
        </div>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>

      <!-- Instagram widget area -->

      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("instagram-feed-area") ) : ?>

        <div class="row">
            <?php dynamic_sidebar( 'instagram-feed-area' ); ?>
        </div>
      <?php endif;?>
      <!-- END Instagram widget area -->

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>



</div><!-- Container end -->

</div><!-- Wrapper end -->


<?php get_footer(); ?>
