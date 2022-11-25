<?php
/**
 * Display Header.
 * @package Solar Power
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	<header role="banner">
		<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'solar-power' ); ?></a>
		<div class="header-box">
			<?php  get_template_part( 'template-parts/header/top', 'bar' ); ?>
			<div class="<?php if( get_theme_mod( 'solar_power_sticky_header', false) != '') { ?> sticky-menubox"<?php } else { ?>close-sticky <?php } ?>">
			<div class="mid-header">
				<div class="container">
				  	<div class="row">
					  	<div class="col-lg-3 col-md-4 col-9">
					  		<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
					  	</div>
					  	<div class="<?php if(get_theme_mod('solar_power_button_text')) { ?>col-lg-9 col-md-8 col-3 align-self-center"<?php } else { ?>col-lg-9 col-md-8 col-12 <?php } ?>">
					  		<?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
					  	</div>
					  	<div class="col-lg-3 col-md-4 col-9 align-self-center">
					  		
					  	</div>
				 	</div> 
				</div>
		    </div>
		</div>
	</header>