<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7 | IE 8]>
<html class="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script src="<?php echo child_template_directory ?>/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="<?php echo child_template_directory ?>/js/helper.js" type="text/javascript"></script>

<!--Bootstrap-->
<script src="<?php echo child_template_directory ?>/js/bootstrap-transition.js" type="text/javascript"></script>
<script src="<?php echo child_template_directory ?>/js/bootstrap-carousel.js" type="text/javascript"></script>
<script src="<?php echo child_template_directory ?>/js/bootstrap-tab.js" type="text/javascript"></script>
<script src="<?php echo child_template_directory ?>/js/scripts.js" type="text/javascript"></script>
<link rel="stylesheet"  href="<?php echo child_template_directory ?>/bootstrap.css" type="text/css" media="all" />
<link rel="stylesheet"  href="<?php echo child_template_directory ?>/acaoeducativa.css" type="text/css" media="all" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo child_template_directory ?>/favicon.png" />

<!--[if IE]>
<script src="<?php echo child_template_directory ?>/js/css3.js" type="text/javascript"></script>
<![endif]-->


</head>

<body <?php body_class(); ?>>

<header id="masthead" class="site-header" role="banner">
		<table>
			<tr>
				<td id="tdheader">
<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
				</td>
				<td id="tdnav">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<div class="skip-link assistive-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a></div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
				</td>
			</tr>
		</table>
		
		



	</header><!-- #masthead -->

<div id="page" class="hfeed site">
	

	<div id="main" class="wrapper">
