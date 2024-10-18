<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package niomax
 */

?>
<footer class="text-light" style="background: #062727;">
	<div class="container py-5">
		<div class="row pt-5">
			<div class="col-12 col-sm-6 col-md-4">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>

			<div class="col-12 col-sm-6 col-md-2">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>

			<div class="col-12 col-sm-6 col-md-2">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>

			<div class="col-12 col-sm-6 col-md-4">
				<?php dynamic_sidebar( 'footer-4' ); ?>
			</div>
		</div>
	</div>

	<p class="py-3 text-center m-0">© 2024 Niomax All Rights Reserved </p>
</footer>




<?php wp_footer(); ?>
</body>
</html>
