<?php
/**
 * Template Name: Author list template
 *
 * Template to display page with margins both sides.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );

$camilo = get_user_by( "email", "gemartin@uniandes.edu.co" );
$sergio = get_user_by( "email", "so.mendez@uniandes.edu.co" );
$mariajuliana = get_user_by( "email", "mj.vargas1459@uniandes.edu.co" );

$perfiles = [
	"camilo" => $camilo,
	"sergio" => $sergio,
	"mariajuliana" => $mariajuliana,
];
?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">
			<div class="col-md-2">

			</div>
			<div class="col-md-8 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php if (count($perfiles) > 0 ); ?>
					<div class="row">
						<div class="card-deck">
							<?php foreach ($perfiles as $perfil): ?>
								<div class="card">
									<div class="card-image">
										 <img src="<?php echo get_avatar_url( $perfil->ID ); ?>" alt="" class="card-img-top">
										<div class="card-body">
											<h3 class="card-title">
												<?php echo $perfil->display_name; ?>
											</h3>
											<p class="card-text">
												<?php echo $perfil->user_description; ?>
											</p>
											<a href="mailto:<?php echo $perfil->user_email ?>" class="btn btn-outline"><?php echo $perfil->user_email ?></a>
										</div>
									</div>
								</div>
							<?php endforeach; // end of the loop. ?>
						</div>

				</div>

				</main><!-- #main -->

			</div><!-- #primary -->

			<div class="col-md-2">

			</div>
		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
