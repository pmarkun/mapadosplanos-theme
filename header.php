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
<!-- Jquery -->
<script src="<?php echo child_template_directory ?>/vendor/jquery/jquery-1.8.3.min.js" type="text/javascript"></script>

<!--Bootstrap-->
<script src="<?php echo child_template_directory ?>/vendor/bootstrap/bootstrap-transition.js" type="text/javascript"></script>
<script src="<?php echo child_template_directory ?>/vendor/bootstrap/bootstrap-carousel.js" type="text/javascript"></script>
<script src="<?php echo child_template_directory ?>/vendor/bootstrap/bootstrap-tab.js" type="text/javascript"></script>

<!--Mapbox-->
<script src="<?php echo child_template_directory ?>/vendor/mapbox/mapbox.js" type="text/javascript"></script>
<!-- Other scripts -->
<script src="<?php echo child_template_directory ?>/js/helper.js" type="text/javascript"></script>
<script src="<?php echo child_template_directory ?>/js/scripts.js" type="text/javascript"></script>

<!-- css -->
<link rel="stylesheet"  href="<?php echo child_template_directory ?>/vendor/bootstrap/bootstrap.css" type="text/css" media="all" />
<link rel="stylesheet"  href="<?php echo child_template_directory ?>/vendor/mapbox/mapbox.css" type="text/css" media="all" />

<link rel="stylesheet"  href="<?php echo child_template_directory ?>/acaoeducativa.css" type="text/css" media="all" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo child_template_directory ?>/favicon.png" />

<!--[if IE]>
<script src="<?php echo child_template_directory ?>/js/css3.js" type="text/javascript"></script>
<![endif]-->

<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,600,700' rel='stylesheet' type='text/css'>

</head>

<body <?php body_class(); ?>>

	<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>

<div id="page" class="hfeed site">

		<header id="masthead" class="site-header" role="banner">

		<a href="<?php echo get_site_url(); ?>" id="site-logo"></a>
		
		
		<div id="tagline"><?php
			
			/*
			 * Insere o Tagline no header
			 * 
			 * Usei um custom-field no página HOME para puxar o texto.
			 * 
			 * É necessário alterar o ID pelo valor correto da instalação WP
			 * 
			 * A melhor forma para garantir boa apresentação do Blurb exatamente como
			 * na tela de mockup é PRIMEIRA LINHA<span>SEGUNDA LINHA</span>
			 * 
			 * O resultado deve sair assim:
			 * 
			 * <h1 id="tagline">Por um plano de educação que queremos 
			 * <span> e uma participação que faça a diferença</span>
			 * 
			 */
		 
			echo get_post_meta( 498, 'tagline', true); 
		?></div>
		
		<?php get_search_form(); ?>
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<div class="skip-link assistive-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a></div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->	

	<div id="main" class="wrapper">
