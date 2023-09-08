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
		<div class="header-container">
		<div class="site-branding">
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
		</div><!-- .site-branding -->
		<div class="nav-items">
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'boom-festive' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
		</div>
	</header><!-- #masthead -->
