<?php
/**
 * sidebar-right
 * @package cheezcap_example
 */
?>

<div id="right-sidebar-widget" class="widgets <?php echo esc_attr( Helpers::get_right_sidebar_css_class() ); ?>">
	<?php do_action( 'before_sidebar' ); ?>
	<?php dynamic_sidebar( Helpers::get_sidebar_name( 'right' ) ); ?>
</div><!-- end of #widgets -->