<?php
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
			echo '<li>';
			echo '<a href="'.$post->guid.'">'.$post->post_title.'</a>';
			echo '</li>';
			$x++;
		}

		echo '</ul>';

	}
	else echo '';
	die();

}
?>
