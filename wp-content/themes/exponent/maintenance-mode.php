<?php

wp_head(); 
$maintenance_post_id = !empty(be_themes_get_option('maintenance_mode_page')) && be_themes_get_option('maintenance_mode_page') !== 'none' ? be_themes_get_option('maintenance_mode_page') : null;//This is page id or post id
$content_post = get_post($maintenance_post_id);
if( !empty ($maintenance_post_id ) && !empty($content_post) ){
	$content = $content_post->post_content;
	echo do_shortcode($content);
} else {
	echo '<div class="exponent-maintenance-mode-default" ><h1>Maintenance mode</h1><div>Sorry for the inconvenience. Our website is currently undergoing scheduled maintenance. Thank you for understanding.</div></div>';
}

wp_footer();