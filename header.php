<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package niomax
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

	<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
		<div class="container">
			<div class="col-md-4 col-auto"><img src="<?php echo get_theme_mod( 'header_logo' ); ?>" alt=""></div>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php
				wp_nav_menu(
					array(
						'theme-location'	=> 'menu-1',
						'container'			=> 'ul',
						'menu_class'		=> 'navbar-nav me-auto mb-2 mb-lg-0',
					),
				);
				?>
				<!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
				</ul> -->
				<a href="<?php echo get_theme_mod('header_cta_link'); ?>" class="btn-cta d-lg-block d-none"><?php echo get_theme_mod('header_cta'); ?></a>
			</div>
		</div>
	</nav>
