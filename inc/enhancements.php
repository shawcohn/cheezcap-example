<?php

/**
 * Adds additional functionality.
 */
class Enhancements {
	
	/**
	 * Add user defined sidebars from Cheezcap.
	 */
	public static function add_sidebars_to_widgets() {
		
		$sidebar_names_str = cheezcap_get_option( 'sidebar-names' );

		if ( ! empty( $sidebar_names_str ) ) {

			$sidebar_arr = array_map( 'trim', explode( PHP_EOL, $sidebar_names_str ) );

			foreach ( $sidebar_arr as $sidebar_name ) {

				if ( function_exists( 'register_sidebar' ) ) {
					
					register_sidebar( array(
						'name'			 => $sidebar_name,
						'id'			 => str_replace( ' ', '-', $sidebar_name ),
						'description'	 => 'Custom sidebar',
						'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
						'after_widget'	 => '</div>',
						'before_title'	 => '<h2>',
						'after_title'	 => '</h2>',
					) );
				}
			}
		}
	}
	
	/**
	 * Add select drop downs for sidebars while editing pages.
	 */
	public static function add_page_sidebar_selections() {

		$sidebar_names_str = cheezcap_get_option( 'sidebar-names' );
		$sidebar_arr = array( '' );

		if ( ! empty( $sidebar_names_str ) ) {
			$sidebar_names_to_arr = explode( PHP_EOL, $sidebar_names_str );
			$sidebar_arr = array_map( 'trim', array_merge( $sidebar_arr, $sidebar_names_to_arr ) );
		}

		$fm = new Fieldmanager_Group( array(
			'name'		 => 'Sidebars',
			'children'	 => array(
				'left_sidebar'	 => new Fieldmanager_Select( 'Left Sidebar', array( 'options' => $sidebar_arr ) ),
				'right_sidebar'	 => new Fieldmanager_Select( 'Right Sidebar', array( 'options' => $sidebar_arr ) )
			),
		) );

		$fm->add_meta_box( 'Sidebars', array( 'page' ), 'side' );
	}
	
	/**
	 * Add the name of the template being used as a class of the body
	 */
	public static function add_body_class( $classes ) {
		global $post;

		if ( isset( $post ) ) {
			$classes[] = esc_attr( $post->post_type . '-' . $post->post_name );
		}

		/* Get the Page Slug to Use as a Body Class, this will only return a value on pages! */
		$class = '';
		
		/* is it a page */
		if ( is_page() ) {
			
			/* Get an array of Ancestors and Parents if they exist */
			$parents = get_post_ancestors( $post->ID );
			
			/* Get the top Level page->ID count base 1, array base 0 so -1 */
			$id = ( $parents ) ? $parents[ count( $parents ) - 1 ] : $post->ID;
			
			/* Get the parent and set the $class with the page slug (post_name) */
			$parent = get_page( $id );
			$class = esc_attr( $post->post_type . '-ancestor-' . $parent->post_name );

			array_push( $classes, $class );
		}

		return $classes;
	}

}