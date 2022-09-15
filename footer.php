<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Here_Agency_Template
 */

?>
	
	<footer id="colophon" class="site-footer">
		<!-- *** To change footer scripts, edit /js/footer.js *** -->

		<!-- Custom footer markup goes here: -->

		<!-- Newsletter form  -->
		<?php echo do_shortcode( '[gravityform id="1" title="false" description="false"]' ); ?>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
