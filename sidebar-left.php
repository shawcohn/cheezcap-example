<?php
/**
 * sidebar-left
 * @package cheezcap_example
 */
?>

<div id="left-sidebar-widget" class="widgets <?php echo esc_attr( Helpers::get_left_sidebar_css_class() ); ?>">
	<?php do_action( 'before_sidebar' ); ?>
	<?php dynamic_sidebar( Helpers::get_sidebar_name( 'left' ) ); ?>
</div><!-- end of #widgets -->