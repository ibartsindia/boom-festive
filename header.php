<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Boom_Festive
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php global $boom_festive; ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'boom-festive' ); ?></a>
	<header id="masthead" class="site-header">
		<!-- For top header -->
			<div class="top-header">
						<div class="contact-info">
							Phone:<?php echo $boom_festive['opt-top-header-phone']?>  | Email: <?php echo $boom_festive['opt-top-header-email']?>
						</div>
						<div class="social-media">
							<a href="<?php echo $boom_festive['opt-top-header-fb']?> ">
								<i class="fab fa-facebook"></i> Facebook
							</a>
							<a href="<?php echo $boom_festive['opt-top-header-ins']?> ">
								<i class="fab fa-instagram"></i> Instagram
							</a>
							<a href="<?php echo $boom_festive['opt-top-header-tw']?> ">
								<i class="fab fa-twitter"></i> Twitter
							</a>
							<a href="<?php echo $boom_festive['opt-top-header-ln']?> ">
								<i class="fab fa-linkedin"></i> LinkedIn
							</a>
						</div>
		 	</div>
		<!-- End top header -->
		       <section class="top-bar">
				<div class="container">
					<div class="row">
						<div class="brand col-md-3 col-12 col-lg-2 text-center text-md-left">
							<a href="<?php echo esc_url( home_url('/') );?>">
								<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
								if ( has_custom_logo() ) {	
									echo '<img src="' . esc_url( $boom_festive['opt-logo-title']['url'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
								}
								else {
									echo '<h1>' . get_bloginfo('name') . '</h1>';
									echo '<span>' . get_bloginfo('description') . '</span>';  
								}
								?>
							</a>
						</div>
						<div class="second-column col-md-9 col-12 col-lg-10">
							<div class="row">
								<div class="col-12">
								<nav class="main-menu navbar navbar-expand-md navbar-light" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'boom-fest' ) ?>">
											<span class="navbar-toggler-icon"></span>
										</button>
											<?php
											wp_nav_menu( array(
												'theme_location'    => 'menu-1',
												'depth'             => 3,
												'container'         => 'div',
												'container_class'   => 'collapse navbar-collapse',
												'container_id'      => 'bs-example-navbar-collapse-1',
												'menu_class'        => 'nav navbar-nav',
												'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
												'walker'            => new WP_Bootstrap_Navwalker(),
											) );
											?>
									</nav>
								</div>
							</div>	
						</div>						
					</div>
				</div>
			</section>
		</header>		