<?php
/* 
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'avia-style'; 
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}


add_theme_support( 'deactivate_layerslider' );

if ( ! function_exists( 'ava_unregister_post_type' ) ) :
add_action('init', 'ava_unregister_post_type', 100);
function ava_unregister_post_type() {
	global $wp_post_types;
		if ( isset( $wp_post_types[ 'portfolio' ] ) ) {
		unregister_post_type('portfolio');
		return true;
		}
	return false;
}
endif;

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/wordpress-login-logo.png);
		height:65px;
		width:320px;
		background-size: 80px 80px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Book Clarity';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


# Disable XML-RPC RSD link from WordPress Header
remove_action ('wp_head', 'rsd_link');


# Remove WordPress version number
function crunchify_remove_version() {
	return '';
}
add_filter('the_generator', 'crunchify_remove_version');


# Remove wlwmanifest link
remove_action( 'wp_head', 'wlwmanifest_link');


# Remove shortlink
remove_action( 'wp_head', 'wp_shortlink_wp_head');


# Remove query strings from all static resources
function crunchify_cleanup_query_string( $src ){ 
	$parts = explode( '?', $src ); 
	return $parts[0]; 
} 
add_filter( 'script_loader_src', 'crunchify_cleanup_query_string', 15, 1 ); 
add_filter( 'style_loader_src', 'crunchify_cleanup_query_string', 15, 1 );


# Remove api.w.org relation link
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

*/

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/admin-style.css', NULL, microtime() );
}

add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );



function my_custom_script_load(){
  	wp_enqueue_script( 'my-custom-script', get_stylesheet_directory_uri() . '/custom-scripts.js', array( 'jquery' ), '1.0.0', true  );
}

add_action( 'wp_enqueue_scripts', 'my_custom_script_load' );

function add_google_fonts() {

wp_enqueue_style( ' add_google_fonts ', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800', false );}

add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

//set builder mode to debug
add_action('avia_builder_mode', "builder_set_debug");
function builder_set_debug()
{
  return "debug";
}
