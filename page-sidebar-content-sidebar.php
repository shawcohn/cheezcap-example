<?php
/**
 * Sidebar/Content/Sidebar Template
 *
 * Template Name: Sidebar/Content/Sidebar
 *
 * @package cheezcap_example
 */
?>
<?php get_header(); ?>
<?php get_sidebar( 'left' ); ?>
<?php get_template_part( 'content-middle' ); ?>
<?php get_sidebar( 'right' ); ?>
<?php get_footer();