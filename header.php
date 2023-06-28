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
		<nav class="desktop_nav">
			<div class="desktop_menu_nav">
				<div class="nav_left">
					<a href="/" class="main_logo">
						<img src="<?php if(get_field('header_logo', 'option')): the_field('header_logo', 'option'); endif; ?>">
					</a>
				</div>

				<div class="nav_right">
					<div class="main_menu_wrapper">
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
		<nav id="navbar" class="desktop_nav_sticky hidden_nav">
			<div class="desktop_menu_nav">
				<div class="nav_left">
					<a href="/" class="main_logo">
					<img src="<?php if(get_field('header_logo', 'option')): the_field('header_logo', 'option'); endif; ?>">
					</a>
				</div>

				<div class="nav_right">
					<div class="main_menu_wrapper">

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
		<nav class="mobile_nav">

			<div class="mobile_top_nav">
				<div class="mobile_top_left">
					<a href="/" class="main_logo_mobile">
					<img src="<?php if(get_field('header_logo_mobile', 'option')): the_field('header_logo_mobile', 'option'); else: the_field('header_logo', 'option'); endif; ?>">
					</a>
				</div>
				<div class="mobile_top_right">
					<div class="hamburger_button">
						<div class="menu_wrapper">
							<div class="hamburger_menu"></div>	  
						</div>
					</div>
				</div>
			</div>

			<div class="mobile_bottom_nav">
				<div class="mobile_inner_container">

					<?php
						wp_nav_menu(array(
								'menu' => 2,// Change menu id.
						));
					?>
					
				</div>
			</div>
		</nav>

	</header><!-- #masthead -->
