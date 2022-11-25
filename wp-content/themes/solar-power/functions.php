<?php
/**
 * Solar Power functions and definitions
 * @package Solar Power
 */

/* Theme Setup */
if ( ! function_exists( 'solar_power_setup' ) ) :

function solar_power_setup() {

	$GLOBALS['content_width'] = apply_filters( 'solar_power_content_width', 640 );
	load_theme_textdomain( 'solar-power', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	add_image_size('solar-power-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'solar-power' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio',
		)	
	);

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');

	add_editor_style( array( 'assets/css/editor-style.css', solar_power_font_url() ) );

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'solar_power_activation_notice' );
	}
}
endif; // solar_power_setup
add_action( 'after_setup_theme', 'solar_power_setup' );

// Notice after Theme Activation
function solar_power_activation_notice() {
	echo '<div class="corporatewelcome notice notice-success is-dismissible">';
		echo '<h3>'. esc_html__( 'Warm Greetings to you!!', 'solar-power' ) .'</h3>';
		echo '<p>'. esc_html__( ' Our sincere thanks for choosing our Solar Power theme. We assure you a high performing theme for your solar power business. Please proceed towards welcome section to start an amazing journey with us..', 'solar-power' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=solar_power_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Welcome...', 'solar-power' ) .'</a></p>';
	echo '</div>';
}

/*Site URL*/
define('SOLAR_POWER_SUPPORT',__('https://wordpress.org/support/theme/solar-power/','solar-power'));
define('SOLAR_POWER_BUY_NOW',__('https://www.logicalthemes.com/themes/solar-wordpress-theme/','solar-power'));
define('SOLAR_POWER_LIVE_DEMO',__('https://logicalthemes.com/solar-power-pro/','solar-power'));
define('SOLAR_POWER_PRO_DOC',__('https://www.logicalthemes.com/docs/solar-power/','solar-power'));
define('SOLAR_POWER_CREDIT',__('https://www.logicalthemes.com/themes/free-solar-wordpress-theme/','solar-power'));
if ( ! function_exists( 'solar_power_credit' ) ) {
	function solar_power_credit(){
		echo "<a href=".esc_url(SOLAR_POWER_CREDIT)." target='_blank'>".esc_html__('Solar Power WordPress Theme','solar-power')."</a>";
	}
}

/*radio button sanitization*/
function solar_power_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function solar_power_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function solar_power_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function solar_power_sanitize_float( $input ) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'solar_power_loop_columns');
if (!function_exists('solar_power_loop_columns')) {
	function solar_power_loop_columns() {
		$columns = get_theme_mod( 'solar_power_products_per_column', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'solar_power_shop_per_page', 20 );
function solar_power_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'solar_power_products_per_page', 9 );
	return $cols;
}

function solar_power_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Excerpt Limit Begin */
function solar_power_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/* Theme Widgets Setup */
function solar_power_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'solar-power' ),
		'description'   => esc_html__( 'Appears on blog page sidebar', 'solar-power' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Posts and Pages Sidebar', 'solar-power' ),
		'description'   => esc_html__( 'Appears on posts and pages', 'solar-power' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 3', 'solar-power' ),
		'description'   => esc_html__( 'Appears on posts and pages', 'solar-power' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'solar-power' ),
		'description'   => esc_html__( 'Appears in footer', 'solar-power' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'solar-power' ),
		'description'   => esc_html__( 'Appears in footer', 'solar-power' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'solar-power' ),
		'description'   => esc_html__( 'Appears in footer', 'solar-power' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'solar-power' ),
		'description'   => esc_html__( 'Appears in footer', 'solar-power' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'solar_power_widgets_init' );

/* Theme Font URL */
function solar_power_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}	

/* Theme enqueue scripts */
function solar_power_scripts() {
	wp_enqueue_style( 'solar-power-font', solar_power_font_url(), array() );
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()) . '/assets/css/bootstrap.css');
	wp_enqueue_style( 'solar-power-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'solar-power-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css' );
	wp_enqueue_style( 'owl-carousel-css', esc_url(get_template_directory_uri()).'/assets/css/owl.carousel.css' );

	// Paragraph
    $solar_power_paragraph_color = get_theme_mod('solar_power_paragraph_color', '');
    $solar_power_paragraph_font_family = get_theme_mod('solar_power_paragraph_font_family', '');
    $solar_power_paragraph_font_size = get_theme_mod('solar_power_paragraph_font_size', '');
	// "a" tag
	$solar_power_atag_color = get_theme_mod('solar_power_atag_color', '');
    $solar_power_atag_font_family = get_theme_mod('solar_power_atag_font_family', '');
	// "li" tag
	$solar_power_li_color = get_theme_mod('solar_power_li_color', '');
    $solar_power_li_font_family = get_theme_mod('solar_power_li_font_family', '');
	// H1
	$solar_power_h1_color = get_theme_mod('solar_power_h1_color', '');
    $solar_power_h1_font_family = get_theme_mod('solar_power_h1_font_family', '');
    $solar_power_h1_font_size = get_theme_mod('solar_power_h1_font_size', '');
	// H2
	$solar_power_h2_color = get_theme_mod('solar_power_h2_color', '');
    $solar_power_h2_font_family = get_theme_mod('solar_power_h2_font_family', '');
    $solar_power_h2_font_size = get_theme_mod('solar_power_h2_font_size', '');
	// H3
	$solar_power_h3_color = get_theme_mod('solar_power_h3_color', '');
    $solar_power_h3_font_family = get_theme_mod('solar_power_h3_font_family', '');
    $solar_power_h3_font_size = get_theme_mod('solar_power_h3_font_size', '');
	// H4
	$solar_power_h4_color = get_theme_mod('solar_power_h4_color', '');
    $solar_power_h4_font_family = get_theme_mod('solar_power_h4_font_family', '');
    $solar_power_h4_font_size = get_theme_mod('solar_power_h4_font_size', '');
	// H5
	$solar_power_h5_color = get_theme_mod('solar_power_h5_color', '');
    $solar_power_h5_font_family = get_theme_mod('solar_power_h5_font_family', '');
    $solar_power_h5_font_size = get_theme_mod('solar_power_h5_font_size', '');
	// H6
	$solar_power_h6_color = get_theme_mod('solar_power_h6_color', '');
    $solar_power_h6_font_family = get_theme_mod('solar_power_h6_font_family', '');
    $solar_power_h6_font_size = get_theme_mod('solar_power_h6_font_size', '');

	$solar_power_custom_css ='
		p,span{
		    color:'.esc_html($solar_power_paragraph_color).'!important;
		    font-family: '.esc_html($solar_power_paragraph_font_family).';
		    font-size: '.esc_html($solar_power_paragraph_font_size).';
		}
		a{
		    color:'.esc_html($solar_power_atag_color).'!important;
		    font-family: '.esc_html($solar_power_atag_font_family).';
		}
		li{
		    color:'.esc_html($solar_power_li_color).'!important;
		    font-family: '.esc_html($solar_power_li_font_family).';
		}
		h1{
		    color:'.esc_html($solar_power_h1_color).'!important;
		    font-family: '.esc_html($solar_power_h1_font_family).'!important;
		    font-size: '.esc_html($solar_power_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_html($solar_power_h2_color).'!important;
		    font-family: '.esc_html($solar_power_h2_font_family).'!important;
		    font-size: '.esc_html($solar_power_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_html($solar_power_h3_color).'!important;
		    font-family: '.esc_html($solar_power_h3_font_family).'!important;
		    font-size: '.esc_html($solar_power_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_html($solar_power_h4_color).'!important;
		    font-family: '.esc_html($solar_power_h4_font_family).'!important;
		    font-size: '.esc_html($solar_power_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_html($solar_power_h5_color).'!important;
		    font-family: '.esc_html($solar_power_h5_font_family).'!important;
		    font-size: '.esc_html($solar_power_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_html($solar_power_h6_color).'!important;
		    font-family: '.esc_html($solar_power_h6_font_family).'!important;
		    font-size: '.esc_html($solar_power_h6_font_size).'!important;
		}

		';
		
	require get_parent_theme_file_path( '/inc/inline-css.php' );
	wp_add_inline_style( 'solar-power-basic-style',$solar_power_custom_css );

	
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()) . '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'solar-power-custom-jquery', esc_url(get_template_directory_uri()) . '/assets/js/custom.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', esc_url(get_template_directory_uri()) . '/assets/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script( 'jquery-owl-carousel', esc_url(get_template_directory_uri()) . '/assets/js/owl.carousel.js', array('jquery'));
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'solar_power_scripts' );

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/get-started/get-started.php';