<?php

/* 
 * Cheezcap Configuration file
 */
$cap = new CheezCap( array(
	new CheezCapGroup( 'CSS', 'css', array(
		new CheezCapTextOption(
		'css files to include in the head',
		'Include one entry per line, paths can be relative or absolute. Each path can be followed by a "handle", "version", and dependencies seperated by commas. example: "my-custom.css,my-custom-handle,1.0,some-other-css-file-handle".',
		'text_css_head',
		'unsemantic-grid-responsive.css',
		true
		),
		new CheezCapTextOption(
		'sidebar/content css classes',
		'The css classes to apply to the left sidebar, content, and right sidebar when the "sidebar/content" page template is used. ex: "left-sidebar-css-class,content-css-class,right-sidebar-css-class"',
		'sidebar-content-classes',
		'grid-20,grid-80,grid-0',
		false
		),
		new CheezCapTextOption(
		'sidebar/content/sidebar css classes',
		'The css classes to apply to the left sidebar, content, and right sidebar when the "sidebar/content/sidebar" page template is used. ex: "left-sidebar-css-class,content-css-class,right-sidebar-css-class"',
		'sidebar-content-sidebar-classes',
		'grid-20,grid-60,grid-20',
		false
		),
		new CheezCapTextOption(
		'content/sidebar css classes',
		'The css classes to apply to the left sidebar, content and right sidebar when the "content/sidebar" page template is used. ex: "left-sidebar-css-class,content-css-class,right-sidebar-css-class"',
		'content-sidebar-classes',
		'grid-0,grid-80,grid-20',
		false
		)
	)
	),
	new CheezCapGroup( 'Javascript', 'javascript', array(
		new CheezCapTextOption(
		'javascript files to include in the head',
		'Include one entry per line, paths can be relative or absolute. Each path can be followed by a "handle", "version", and dependencies seperated by commas. example: "my-custom.js,my-custom-handle,1.0,jquery".',
		'text_js_head',
		'',
		true
		),
		new CheezCapTextOption(
		'javascript files to include in the footer',
		'Include one entry per line, paths can be relative or absolute. Each path can be followed by a "handle", "version", and dependencies seperated by commas. example: "my-custom.js,my-custom-handle,1.0,jquery".',
		'text_js_footer',
		'',
		true
		),
	)
	),
	new CheezCapGroup( 'Content', 'content', array(
		new CheezCapTextOption(
		'custom sidebars',
		'List one name per line to create a sidebar with that name in the widgets area',
		'sidebar-names',
		'',
		true
		),
	)
	),
	new CheezCapGroup( 'Footer', 'footer', array(
		new CheezCapBooleanOption(
		'Show Copyright',
		'Include a copyright message in the footer',
		'show-copyright',
		false
		),
		new CheezCapTextOption(
		'copyright text',
		'The text that follows the copyright year',
		'copyright-text',
		'',
		false
		),
		new CheezCapTextOption(
		'copyright url',
		'The url that the copyright text links to.',
		'copyright-url',
		esc_url( home_url( '/' ) ),
		false
		),
	)
	)
), array(
	'themename'			 => 'CheezCap', // used on the title of the custom admin page
	'req_cap_to_edit'	 => 'manage_options', // the user capability that is required to access the CheezCap settings page
	'cap_menu_position'	 => 99, // OPTIONAL: This value represents the order in the dashboard menu that the CheezCap menu will display in. Larger numbers push it further down.
	'cap_icon_url'		 => '', // OPTIONAL: Path to a custom icon for the CheezCap menu item. ex. $cap_icon_url = WP_CONTENT_URL . '/your-theme-name/images/awesomeicon.png'; Image size should be around 20px x 20px.
)
);
