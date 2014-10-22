<?php
/**
 * Content-Middle
 *
 * @package cheezcap_example
 */
?>

<div id="content" class="<?php echo esc_attr( Helpers::get_content_css_class() ); ?>">

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><?php the_title(); ?></h1>

				<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
					<div class="post-meta">
						<span class="comments-link">
							<span class="mdash">&mdash;</span>
							<?php comments_popup_link( __( 'Leave a comment', 'cheezcap_example' ), __( '1 Comment', 'cheezcap_example' ), __( '% Comments', 'cheezcap_example' ) ); ?>
						</span>
					</div><!-- end of .post-meta -->
				<?php endif; ?>

				<div class="post-entry">
					<?php the_content( __( 'Read more &#8250;', 'cheezcap_example' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'cheezcap_example' ), 'after' => '</div>' ) ); ?>
				</div><!-- end of .post-entry -->

				<div class="post-data">
					<?php the_tags( __( 'Tagged with:', 'cheezcap_example' ) . ' ', ', ', '<br />' ); ?>
					<?php the_category( __( 'Posted in %s', 'cheezcap_example' ) . ', ' ); ?>
				</div><!-- end of .post-data -->

				<?php edit_post_link( __( 'Edit', 'cheezcap_example' ), '<div class="post-edit">', '</div>' ); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->

			<?php comments_template( '', true ); ?>

	<?php endwhile; ?>

		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation">
			<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'cheezcap_example' ) ); ?></div>
			<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'cheezcap_example' ) ); ?></div>
		</div><!-- end of .navigation -->
		<?php endif; ?>

<?php else : ?>

		<?php get_template_part( 'no-results', 'page-content-sidebar' ); ?>

<?php endif; ?>

		</div><!-- end of #content -->
