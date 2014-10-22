<?php

/**
 * Contains helper functions.
 */
class Helpers {

	//used to define distinct names for registering scripts/styles
	private static $handle_counter = 0;

	/**
	 * Enqueues user defined css from cheezcap settings.
	 *
	 * @param string $css_paths_str
	 */
	public static function enqueue_user_css( $css_paths_str ) {

		if ( !empty( $css_paths_str ) )
		{

			$css_paths_arr = array_map( 'trim', array_filter( explode( PHP_EOL, $css_paths_str ) ) );

			foreach ( $css_paths_arr as $css_entry )
			{
				$entry_arr		 = explode( ',', str_replace( ' ', '', $css_entry ) );
				$handle			 = self::get_asset_handle( $entry_arr );
				$version		 = self::get_asset_version( $entry_arr );
				$dependency_arr	 = array_slice( $entry_arr, 3 );
				$url_path		 = self::get_abs_or_rel_asset_path( $entry_arr[ 0 ], 'css' );

				wp_register_style( $handle, esc_attr( $url_path ), $dependency_arr, $version );
				wp_enqueue_style( $handle );
			}
		}

	}

	/**
	 * Enqueues user defined javascript files from cheezcap settings.
	 * 
	 * @param string $js_paths_str
	 * @param boolean $load_in_footer
	 */
	public static function enqueue_user_js( $js_paths_str, $load_in_footer = false ) {

		if ( !empty( $js_paths_str ) )
		{

			$js_paths_arr	 = array_map( 'trim', array_filter( explode( PHP_EOL, $js_paths_str ) ) );

			foreach ( $js_paths_arr as $js_entry )
			{
				$entry_arr	 = explode( ',', str_replace( ' ', '', $js_entry ) );
				$handle		 = self::get_asset_handle( $entry_arr );
				$version		 = self::get_asset_version( $entry_arr );
				$dependency_arr	 = array_slice( $entry_arr, 3 );
				$url_path	 = self::get_abs_or_rel_asset_path( $entry_arr[ 0 ], 'js' );

				wp_register_script( $handle, esc_attr( $url_path ), $dependency_arr, $version, $load_in_footer );
				wp_enqueue_script( $handle );
			}
		}

	}

	/**
	 * Returns a full url path after determining if the $input_path is relative or absolute
	 * 
	 * @param string $input_path
	 * @param string $sub_dir_name
	 * @return string
	 */
	public static function get_abs_or_rel_asset_path( $input_path, $sub_dir_name = 'specify-sub-dir-name' ) {

		$full_path = '';

		if ( filter_var( $input_path, FILTER_VALIDATE_URL ) )
		{
			$full_path = $input_path;
		}
		else
		{
			$full_path = get_template_directory_uri() . '/' . $sub_dir_name . '/' . $input_path;
		}

		return $full_path;

	}

	/**
	 * Returns a sanitized handle for a file that is either provided by the user or auto generated.
	 * 
	 * @param array $entry_arr
	 * @return string
	 */
	private static function get_asset_handle( $entry_arr ) {

		self::$handle_counter++;
		$handle = 'handle-' . self::$handle_counter;

		if ( 1 < count( $entry_arr ) && !empty( trim( $entry_arr[ 1 ] ) ) )
		{
			$handle = esc_attr( trim( $entry_arr[ 1 ] ) );
		}

		return $handle;

	}

	/**
	 * Returns a sanitized version value for enqueing a resource
	 * 
	 * @param array $entry_arr
	 * @return mixed
	 */
	private static function get_asset_version( $entry_arr ) {

		$version = false;

		if ( 2 < count( $entry_arr ) && !empty( trim( $entry_arr[ 2 ] ) ) )
		{
			$version = esc_attr( trim( $entry_arr[ 2 ] ) );
		}

		return $version;

	}

	/**
	 *
	 * Returns the selected sidebar name.
	 *
	 * @param string $left_or_right
	 * @return string
	 */
	public static function get_sidebar_name( $left_or_right ) {

		$sidebar_name	 = 'right';
		$sidebar_key	 = 'right_sidebar';

		if ( 'left' === $left_or_right ) {
			$sidebar_name	 = 'left';
			$sidebar_key = 'left_sidebar';
		}

		$sidebars = self::get_post_sidebar_names();

		if ( is_array( $sidebars ) && isset( $sidebars[ $sidebar_key ] ) ) {
			$sidebar_name = $sidebars[ $sidebar_key ];
		}

		return $sidebar_name;
	}

	/**
	 * Returns the selected sidebars from a page.
	 *
	 * @return array
	 */
	private static function get_post_sidebar_names() {
		return get_post_meta( get_the_ID(), 'Sidebars', true );
	}

	/**
	 * Returns the css class to add to the left sidebar
	 * 
	 * @return string
	 */
	public static function get_left_sidebar_css_class(){

		return self::get_sidebar_or_content_css_class( 'left-sidebar' );
	}
	
	/**
	 * Returns the css class to add to the content section
	 * 
	 * @return string
	 */
	public static function get_content_css_class(){

		return self::get_sidebar_or_content_css_class( 'content' );
	}
	
	/**
	 * Returns the css class to add to the right sidebar
	 * @return string
	 */
	public static function get_right_sidebar_css_class(){

		return self::get_sidebar_or_content_css_class( 'right-sidebar' );
	}
	
	/**
	 * Returns a css class for either the left or right sidebar or the content section
	 * 
	 * @param string $sidebar_or_content
	 * @return string
	 */
	private static function get_sidebar_or_content_css_class( $sidebar_or_content = '' ){

		$css_arr = self::get_cheezcap_sidebar_content_css_classes();
		$css_class = '';
		
		switch( $sidebar_or_content ){
			
			case 'left-sidebar':
					if( 0 < count( $css_arr )){
						$css_class = trim( $css_arr[0] );
					}
				break;
				
			case 'content':
					if( 1 < count( $css_arr )){
						$css_class = trim( $css_arr[1] );
					}
				break;
				
			case 'right-sidebar':
					if( 2 < count( $css_arr )){
						$css_class = trim( $css_arr[2] );
					}
				break;
		}
		
		return $css_class;
	}

	/**
	 * Returns an array of css options from Cheezcap based on the page template being used
	 * 
	 * @return array
	 */
	private static function get_cheezcap_sidebar_content_css_classes(){

		$css_comma_delim_str = '';

		if ( is_page_template( 'page-sidebar-content.php' ) ){
			$css_comma_delim_str = cheezcap_get_option('sidebar-content-classes');
		}
		elseif( is_page_template( 'page-content-sidebar.php' ) ){
			$css_comma_delim_str = cheezcap_get_option('content-sidebar-classes');
		}
		elseif( is_page_template( 'page-sidebar-content-sidebar.php' ) ){
			$css_comma_delim_str = cheezcap_get_option('sidebar-content-sidebar-classes');
		}

		$css_arr = explode( ',', $css_comma_delim_str );

		return $css_arr;
	}

}
