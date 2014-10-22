<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package cheezcap_example
 */
?>
<div class="clear"></div>
		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php if( true === cheezcap_get_option( 'show-copyright' ) ): ?>
				<div id="copyright-div">
					&copy;&nbsp; <?php echo esc_html( date( 'Y' ) ); ?>
					<a href="<?php echo esc_url( cheezcap_get_option( 'copyright-url' ) ); ?>">
						<?php echo esc_html( cheezcap_get_option( 'copyright-text' ) ); ?>
					</a>
				</div>
			<?php endif; ?>

		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>