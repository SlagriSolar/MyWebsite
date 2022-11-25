<?php
	
	$solar_power_custom_css = '';
	
	/*-------------- Footer Text -------------------*/
	$solar_power_copyright_text_position = get_theme_mod('solar_power_copyright_text_position','center');
	if($solar_power_copyright_text_position != false){
		$solar_power_custom_css .='.copyright{';
			$solar_power_custom_css .='text-align: '.esc_attr($solar_power_copyright_text_position).';';
		$solar_power_custom_css .='}';
	}

	/*----------------Width Layout -------------------*/
    $solar_power_theme_lay = get_theme_mod( 'solar_power_width_options','Full Width');
    if($solar_power_theme_lay == 'Full Width'){
		$solar_power_custom_css .='body{';
			$solar_power_custom_css .='max-width: 100%;';
		$solar_power_custom_css .='}';
	}else if($solar_power_theme_lay == 'Contained Width'){
		$solar_power_custom_css .='body{';
			$solar_power_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$solar_power_custom_css .='}';
	}else if($solar_power_theme_lay == 'Boxed Width'){
		$solar_power_custom_css .='body{';
			$solar_power_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$solar_power_custom_css .='}';
	}
    
    /*-------- footer background css -------*/
	$solar_power_footer_background_color = get_theme_mod('solar_power_footer_background_color');
	$solar_power_custom_css .='.footersec{';
		$solar_power_custom_css .='background-color: '.esc_attr($solar_power_footer_background_color).';';
	$solar_power_custom_css .='}';

    /*-------- Copyright background css -------*/
	$solar_power_copyright_background_color = get_theme_mod('solar_power_copyright_background_color');
	$solar_power_custom_css .='.copyright{';
		$solar_power_custom_css .='background-color: '.esc_attr($solar_power_copyright_background_color).';';
	$solar_power_custom_css .='}';

	// site title and tagline font size option
	$solar_power_site_title_font_size = get_theme_mod('solar_power_site_title_font_size', 25);{
	$solar_power_custom_css .='.logo h1 a, .logo p a{';
	$solar_power_custom_css .='font-size: '.esc_attr($solar_power_site_title_font_size).'px;';
		$solar_power_custom_css .='}';
	}

	$solar_power_site_tagline_font_size = get_theme_mod('solar_power_site_tagline_font_size', 12);{
	$solar_power_custom_css .='.logo p{';
	$solar_power_custom_css .='font-size: '.esc_attr($solar_power_site_tagline_font_size).'px !important;';
		$solar_power_custom_css .='}';
	}
     