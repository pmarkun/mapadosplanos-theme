<?php

define('child_template_directory', dirname(get_bloginfo('stylesheet_url')));

// AJAX SEARCH
add_action('wp_ajax_ae_search', 'quicksearch');
add_action('wp_ajax_nopriv_ae_search', 'quicksearch');

function quicksearch() {
	global $wpdb;

	if (strlen($_POST['s'])>2) {
		$limit=10;
		$s=strtolower(addslashes($_POST['s']));
		//dar um tweak nisso
        $querystr = "
			SELECT $wpdb->posts.*
			FROM $wpdb->posts
			WHERE
			$wpdb->posts.post_type='municipio'
			AND lower($wpdb->posts.post_title) like '%$s%'
			ORDER BY $wpdb->posts.post_date DESC
			LIMIT $limit;
		 ";

	 	$pageposts = $wpdb->get_results($querystr, OBJECT);
		echo '<ul>';
		$x=0;
 		while ($pageposts[$x]) {
			$post=$pageposts[$x];
			$lat = get_post_meta($post->ID, "lat", true);
			$lng = get_post_meta($post->ID, "lng", true);
			echo '<li>';
			echo '<a href="'.$post->guid.'" data-lat="' . $lat . '" data-lng=' . $lng . '">'.$post->post_title.'</a>';
			echo '</li>';
			$x++;
		}

		echo '</ul>';

	}
	else echo '';
	die();

}

// JAVASCRIPT and CSS LOADING

function acaoeducativa_scripts_basic() {
	wp_register_script( 'leaflet', child_template_directory . '/js/leaflet/leaflet.js' );  
    wp_enqueue_script( 'leaflet' );
}  

function acaoeducativa_styles_basic() {
	wp_register_style( 'leaflet', child_template_directory . '/js/leaflet/leaflet.css' );  
    wp_enqueue_style( 'leaflet' );	
}
add_action( 'wp_enqueue_scripts', 'acaoeducativa_scripts_basic' );  
add_action( 'wp_enqueue_scripts', 'acaoeducativa_styles_basic' );  


//Front Page Widget Big
register_sidebar( array(
		'name' => __( 'Front Page Big', 'twentytwelve' ),
		'id' => 'frontpage-big',
		'description' => __( 'Front Page Big', 'twentytwelve' ),
		'before_widget' => '<div id="%1$s" class="span2 widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );



//Footer widgets

register_sidebar( array(
		'name' => __( 'Footer A', 'twentytwelve' ),
		'id' => 'footer-a',
		'description' => __( 'Footer A', 'twentytwelve' ),
		'before_widget' => '<div id="%1$s" class="span2 widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

register_sidebar( array(
		'name' => __( 'Footer B', 'twentytwelve' ),
		'id' => 'footer-b',
		'description' => __( 'Footer B', 'twentytwelve' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

// admin favicon	
function admin_favicon() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/favicon-admin.png" />';
}
add_action('admin_head', 'admin_favicon');

?>
