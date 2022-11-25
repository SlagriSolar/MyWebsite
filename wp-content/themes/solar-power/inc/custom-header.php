<?php
/**
 * @package Solar Power
 * Setup the WordPress core custom header feature.
 *
 * @uses solar_power_header_style()
*/
function solar_power_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'solar_power_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1055,
		'height'                 => 190,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'solar_power_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'solar_power_custom_header_setup' );

if ( ! function_exists( 'solar_power_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see solar_power_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'solar_power_header_style' );
function solar_power_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$solar_power_custom_css = "
        .mid-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'solar-power-basic-style', $solar_power_custom_css );
	endif;
}
endif; // solar_power_header_style