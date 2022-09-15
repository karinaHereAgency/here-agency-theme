<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Here_Agency_Template
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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'here-agency-template' ); ?></a>

	<header id="masthead" class="site-header">

		<!-- DESKTOP NAV -->
		<nav class="desktop-nav">
			<div class="desktop-menu-nav">
				<div class="nav-left">
					<a href="/" class="main-logo">
						<img src="<?php if(get_field('header_logo', 'option')): the_field('header_logo', 'option'); endif; ?>">
					</a>
				</div>

				<div class="nav-right">
					<div class="main-menu-wrapper">
						<?php
							wp_nav_menu(array(
								'menu' => 2, // Change menu id.
							));
						?>
					</div>
				</div>

			</div>
		</nav>

		<!-- DESKTOP NAV - STICKY -->
		<nav id="navbar" class="desktop-nav-sticky hidden-nav">
			<div class="desktop-menu-nav">
				<div class="nav-left">
					<a href="/" class="main-logo">
					<img src="<?php if(get_field('header_logo', 'option')): the_field('header_logo', 'option'); endif; ?>">
					</a>
				</div>

				<div class="nav-right">
					<div class="main-menu-wrapper">

						<?php
							wp_nav_menu(array(
									'menu' => 2, // Change menu id.
							));
						?>
					</div>
				</div>

			</div>
		</nav>

		<!-- MOBILE NAV - HAMBURGER ICON -->
		<nav class="mobile-nav">

			<div class="mobile-top-nav">
				<div class="mobile-top-left">
					<a href="/" class="main-logo-mobile">
					<img src="<?php if(get_field('header_logo_mobile', 'option')): the_field('header_logo_mobile', 'option'); else: the_field('header_logo', 'option'); endif; ?>">
					</a>
				</div>
				<div class="mobile-top-right">
					<div class="hamburger-button">
						<div class="menu-wrapper">
							<div class="hamburger-menu"></div>	  
						</div>
					</div>
				</div>
			</div>

			<div class="mobile-bottom-nav">
				<div class="mobile-inner-container">

					<?php
						wp_nav_menu(array(
								'menu' => 2,// Change menu id.
						));
					?>
					
				</div>
			</div>
		</nav>

	</header><!-- #masthead -->
