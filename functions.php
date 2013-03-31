<?php

//require_once(dirname(__FILE__).'/embedded-types/types.php');
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
			echo '<a href="'.$post->guid.'" data-lat="' . $lat . '" data-lng="' . $lng . '">'.$post->post_title.'</a>';
			echo '</li>';
			$x++;
		}

		echo '</ul>';

	}
	else echo '';
	die();

}

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

register_sidebar( array(
		'name' => __( 'Abaixo do Mapa', 'twentytwelve' ),
		'id' => 'frontpage-below-map',
		'description' => __( 'Abaixo do Mapa', 'twentytwelve' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
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


//redirect query var
add_filter('query_vars', 'redirect_var');
function redirect_var($public_query_vars) {
	$public_query_vars[] = 'redirect';
	return $public_query_vars;
	}


//Helper functions for checkbox

function types_render_checkboxes($checkboxes, $classes) {
	$html = '';
	foreach (unserialize($checkboxes) as $key => $value) {
		$html = $html . '<span class="' . $classes . '">' . $value . '</span>';
	}
	return $html;
}

//Cleaning up admin area

function remove_menu_items() {
	global $menu;
	global $submenu;
    unset($submenu['edit.php?post_type=municipio'][10]);
	$restricted = array(__('Posts'),__('Links'), __('Comments'), __('Media'),
	__('Plugins'), __('Tools'), __('Users'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)) {
			unset($menu[key($menu)]);
		}
	}
}


function mapadosplanos_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
}

function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}

function hide_that_stuff() {
    if('municipio' == get_post_type())
  echo '<style type="text/css">
    #favorite-actions {display:none;}
    .add-new-h2{display:none;}
    .tablenav{display:none;}
    </style>';
}

//Cleaning up Municipios Post interface
function mapadosplanos_remove_post_meta_boxes() {
	remove_meta_box('slugdiv', 'municipio', 'normal');
	remove_meta_box('wpcf-marketing', 'municipio', 'side');
	remove_meta_box('munic2011', 'municipio', 'normal');
}


if ( !is_super_admin() ) {
	add_action('admin_menu', 'remove_menu_items');
	add_action( 'wp_before_admin_bar_render', 'mapadosplanos_admin_bar_render' );
	add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
	add_action('admin_head', 'hide_that_stuff');
	add_action( 'add_meta_boxes', 'mapadosplanos_remove_post_meta_boxes' );
}

// Redirect by IBGE

function ibge_redirect() {
  if (isset($_GET['ibge'])) {
  	global $wpdb;
    $sql = "SELECT post_id FROM {$wpdb->postmeta} " . "WHERE meta_key='ibge' AND meta_value='%s'";
    $sql = $wpdb->prepare($sql,$_GET['ibge']);
    $post_id = $wpdb->get_var($sql);
    if ($post_id) {
      $permalink = get_permalink($post_id);
      if ($permalink) {
        wp_safe_redirect($permalink,301);
        exit;
      }
    }
  }
}
add_action('parse_request','ibge_redirect',0);  // 0=before (most) 'parse_request' calls

function get_markers_json() {
	global $wpdb;
	$limit=10;
	//dar um tweak nisso
    $querystr = "
		SELECT post_id 
		FROM $wpdb->postmeta
		WHERE meta_key='wpcf-qs_etapa01';
	 ";

 	$metaposts = $wpdb->get_results($querystr, OBJECT);
 	$json = '[';
 	foreach ($metaposts as $p) {
 		$post = get_post_custom($p->post_id);
 		$json = $json . '{';
 		$json = $json . 'ibge:"' . $post['ibge'][0] . '",';
 		$json = $json . 'lat:"' . $post['lat'][0] . '",';
 		$json = $json . 'lng:"' . $post['lng'][0] . '",';
 		$json = $json . 'qs_etapa01:"' . $post['wpcf-qs_etapa01'][0] . '"';
 		$json = $json . '},';
 	}
 	$json = $json . '{}]';
 	return $json;
}

?>
