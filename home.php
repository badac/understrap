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
          El Banco de Archivos Digitales de Artes en Colombia –BADAC– es un repositorio temático multimedia perteneciente a la Facultad de Artes y Humanidades de la Universidad de los Andes, que custodia y divulga archivos físicos y digitales sobre la creación e investigación de las artes en Colombia (plástica, audiovisual, música, literatura, historia del arte, crítica del arte, humanidades, patrimonio cultural, etc.)
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

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

        <div class="row">


        <div class="col-sm-12 col-spacer">
          <div class="col-header">
            <h1 class="display-3">Colecciones</h1>
          </div>

          <div class="row-col">
          <?php if ( $colecciones->have_posts() ) : ?>

            <div id="colecciones-carousel" class="carousel slide" data-ride="carousel" data-interval="3000">
              <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <?php while ( $colecciones->have_posts() ) : $colecciones->the_post(); ?>
                  <?php if($colecciones->current_post == 0): ?>
                    <div class="carousel-item col-md-3 active">
                  <?php else: ?>
                    <div class="carousel-item col-md-3">
                  <?php endif; ?>
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
              </div>
            </div>
  					<?php /* Start the Loop */ ?>

  				<?php else : ?>

  					<?php get_template_part( 'loop-templates/content-coleccion', 'none' ); ?>

  				<?php endif; ?>
        </div>

        </div>
        <?php wp_reset_postdata(); ?>


        <div class="col-sm-12 col-spacer">
          <div class="col-header">
            <h1 class="display-3">Noticias</h1>
          </div>
          <div class="row">
            <?php if ( $noticias->have_posts() ) : ?>

    					<?php /* Start the Loop */ ?>
              <?php if ($noticias->found_posts > 1): ?>
                <div class="col-sm">
              <?php else: ?>
                <div class="col-sm-4">
              <?php endif; ?>

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

            </div>

    				<?php endif; ?>
          </div>
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
