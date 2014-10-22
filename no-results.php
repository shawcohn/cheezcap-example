<?php
/**
 * Displays a message that posts cannot be found.
 *
 * @package cheezcap_example
 */
?>

<?php if ( !is_search() )
{ ?>
	<h1 class="title-404"><?php _e( 'Nothing Found', 'cheezcap_example' ); ?></h1>
<?php }
else
{ ?>
	<h3 class="title-404"><?php _e( 'Nothing Found', 'cheezcap_example' ); ?></h3>
<?php } ?>

<p><?php _e( 'Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'cheezcap_example' ); ?></p>

<h6><?php
	printf( __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cheezcap_example' ), sprintf( '<a href="%1$s" title="%2$s">%3$s</a>', esc_url( home_url( '/' ) ), esc_attr__( 'Home', 'cheezcap_example' ), esc_attr__( '&larr; Home', 'cheezcap_example' )
	)
	);
	?></h6>

<?php
get_search_form();
