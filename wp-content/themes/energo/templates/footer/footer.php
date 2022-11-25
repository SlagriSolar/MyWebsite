<?php
/**
 * Footer Template  File
 *
 * @package ENERGO
 * @author  Webiane
 * @version 1.0
 */

$options = energo_WSH()->option();
$back    = $options->get( 'footer_background' );
$back    = energo_set( $back, 'url', ENERGO_URI . 'assets/images/parallax.png' );
$s_type = '';
$e_tpl = '';

if( is_singular() ) {
	$s_type = get_post_meta( $page_id, 'footer_source_type', true );
	$e_tpl  = get_post_meta( $page_id, 'footer_elementor_template', true );
}
if( $s_type !== 'e' ) {
	$s_type = $options->get('footer_source_type');
	$e_tpl = $options->get('footer_elementor_template');
}

if ( class_exists( '\Elementor\Plugin' ) AND $s_type == 'e' AND $e_tpl ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $e_tpl );
} else {

	do_action( 'energo_main_footer' ); 
}


