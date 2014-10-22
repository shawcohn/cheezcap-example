<?php

/**
 * Enqueue styles and scripts.
 */
add_action( 'wp_enqueue_scripts', function() {
	
	//enqueue css in head
	Helpers::enqueue_user_css( cheezcap_get_option('text_css_head'));
	
	//enqueue js in head
	Helpers::enqueue_user_js( cheezcap_get_option( 'text_js_head' ) );

	//enqueue js in footer
	Helpers::enqueue_user_js( cheezcap_get_option( 'text_js_footer' ), true );
});
