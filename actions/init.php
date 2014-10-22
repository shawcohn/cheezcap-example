<?php

/**
 * init
 */
add_action( 'init', function() {
	
	//Add sidebar widgets based on specified sidebar names in cheezcap content settings.
	Enhancements::add_sidebars_to_widgets();
	
	//Add select drop downs for sidebars while editing pages.
	Enhancements::add_page_sidebar_selections();
	
} );