<?php
/**
 * Template Name: Landing Page
 * The template for displaying the faqs page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Here_Agency_Template
 */

// get_header();
?>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/landing/landing', 'content' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
wp_footer(); 
// get_footer();
