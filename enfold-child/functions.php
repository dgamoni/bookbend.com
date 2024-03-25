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


add_action('wp_footer', 'add_custom_css');
function add_custom_css() { ?>
	<script>
		jQuery(document).ready(function($) {

		});
	</script>
	<style>
		.single-post .content {

		}
		.single-post .sidebar {
		    /*padding-top: 30px;*/
		    /*padding-bottom: 30px;*/
		    padding: 0;
		}
		.single-post .container .av-content-small.units {
		    max-width: 680px;
		        background-color: white;
		        margin-left: 90px;
		            margin-bottom: 30px;
		}
		#top.single-post #main .sidebar {
		    max-width: 300px;
		}
		.single-post .template-single-blog {
			margin-top: 30px;
		}
		.single-post .inner_sidebar {
		    margin-left: 30px;
		}
		.single-post .sidebar_right .comment_container {
		        padding-left: 50px;
		}
		.single-post .av-share-box .av-share-link-description {
		    display: none;
		}
		.soc_share_bookbend_wrap {
			  width: 60px;
		  height: 220px;
		  position: fixed;
		  margin-top: 0px;
		  perspective: 1000px;
		  top: 200px;
		}
		#top .soc_share_bookbend_wrap .av-share-box ul {
			display: flex;
		    flex-direction: column;
		    flex-wrap: wrap;
		}
		.soc_share_bookbend_wrap .av-share-box {
		    margin-top: 0;
		}
		.soc_share_bookbend_wrap .av-share-box .avia-related-tooltip {
		    width: 120px;
		    padding: 13px 7px;
		    line-height: 17px;
		}
		.soc_share_bookbend_mobile {
			display: none;
		}
		.main_color div.article_read_time_wrap {
			padding: 10px;
			border-bottom: 1px solid #e1e1e1;
			font-size: 16px;
    line-height: 20px;
		}
		.article_read_time_wrap ul {
			display: flex;
			align-items: right;
    		justify-content: space-between;
		}
		.article_read_time_wrap ul li {
			list-style: none;
		}
		.article_read_time_wrap ul li span {
			font-weight: 600;
    		display: block;
		}
		.single-post .main_color.container_wrap_first.container_wrap.sidebar_right {
		    background: #ECECEC!important;
		}
		.single-post .post-meta-infos {
			display: none;
		}
		@media (max-width: 767px) {
			.responsive #top.single-post #wrap_all .container {

			}
			.responsive #top.single-post .container .av-content-small {

			}
			.single-post article {
				padding: 0 50px;
			}
			.soc_share_bookbend_wrap {
			    width: 100%;
			    height: 50px;
			    position: fixed;
			    top: inherit;
			    bottom: 0;
			    z-index: 999;
			    left: 0;
			}
			#top .soc_share_bookbend_wrap .av-share-box ul {
				display: flex;
			    flex-direction: row;
			    flex-wrap: wrap;
			    justify-content: space-around;
			    align-items: center;
			}
			.soc_share_bookbend_wrap .av-share-box ul li {
				flex: 1;
			    display: flex;
			    justify-content: center;
			}
			.soc_share_bookbend_wrap .av-social-link-facebook {
				background-color: #37589b;
			}
			.soc_share_bookbend_wrap .av-social-link-twitter {
				background-color: #46d4fe;
			}
			.soc_share_bookbend_wrap .av-social-link-linkedin {
				background-color: #419cca;
			}
			.soc_share_bookbend_wrap .av-social-link-mail {
				background-color: #9fae37;
			}
			.soc_share_bookbend_wrap .av-social-link-facebook a,
			.soc_share_bookbend_wrap .av-social-link-twitter a,
			.soc_share_bookbend_wrap .av-social-link-linkedin a,
			.soc_share_bookbend_wrap .av-social-link-mail a
			 {
				color:white;
			}
		}
	</style>
	<?php
}

add_shortcode( 'article_read_time', 'article_read_time_func' );
function article_read_time_func( $atts ){  

	ob_start();
	global $post;
	$author_name = get_the_author_meta('display_name', $post->post_author);

	?>
	<div class="article_read_time_wrap">
		<ul>
			<?php
				echo '<li><span>By: </span>'.$author_name.'</li>';
				echo '<li><span>Last updated: </span>'. date('F jS, Y ', strtotime($post->post_modified)) .'</li>';
				echo '<li><span>Read Time: </span>'. prefix_estimated_reading_time($post->post_content, 300).' min</li>';
					// $wpm = 300;
					// $clean_content = strip_shortcodes( $post->post_content );
					// var_dump($clean_content);
					// $clean_content = strip_tags( $clean_content );
					// $word_count = str_word_count( $clean_content );
					// var_dump($clean_content);
					// var_dump($word_count);
					// $time = ceil( $word_count / $wpm );
					// var_dump($time);

			?>
		</ul>
	</div>
	<?php

	$out .= ob_get_contents();
	ob_end_clean();

	return $out;
}

function prefix_estimated_reading_time( $content = '', $wpm = 300 ) {
	$clean_content = strip_shortcodes( $content );
	$clean_content = strip_tags( $clean_content );
	$word_count = str_word_count( $clean_content );
	$time = ceil( $word_count / $wpm );
	return $time;
}