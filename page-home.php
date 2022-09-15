<?php
/**
 * Template Name: Home Page
 * The template for displaying the faqs page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Here_Agency_Template
 */

get_header();
?>

	<main id="primary" class="site-main">
		
		<!-- Cart icon  -->
    	<?php // echo do_shortcode('[woo_cart_but]'); ?>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/home/home', 'content' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
