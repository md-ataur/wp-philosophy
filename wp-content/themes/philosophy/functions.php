<?php 

require_once(get_theme_file_path( 'inc/tgm.php' ));
require_once(get_theme_file_path( 'inc/acf-mb.php' ));
require_once(get_theme_file_path( 'widgets/social-icons-widget.php' ));
if( class_exists('Attachments') ){
	require_once(get_theme_file_path( '/inc/attachment.php' ));
}
require_once(get_theme_file_path( 'lib/codestar/cs-framework.php' ));
if (function_exists('cs_framework_init')) {
	require_once(get_theme_file_path( 'inc/csf.php' ));
}



/* CSS and JS Cache Busting */
//die(site_url());
if (site_url() == "http://127.0.0.1/wp-philosophy") {
	define("VERSION", time());
}else{
	define("VERSION", wp_get_theme()->get('Version'));
}

if ( ! isset( $content_width ) ) $content_width = 960;

/* After setup theme */
function philosophy_setup_theme(){
	load_theme_textdomain( "philosophy", get_theme_file_path("/languages") );
	add_theme_support( "title-tag" );
	add_theme_support( "custom-logo");
    add_theme_support( "custom-header" );
    add_theme_support( "custom-background" );
	add_theme_support( "post-thumbnails" );
	add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption',) ); 
    add_theme_support( 'post-formats', array( 'aside','image','video','quote','link','gallery','audio', ) );
    register_nav_menu( 'topmenu', __('Top Menu', 'philosophy'));
    register_nav_menus( array(
    	"footer-left" 	=> __("Footer Left Menu","philosophy"),
    	"footer-middle" => __("Footer Middle Menu","philosophy"),
    	"footer-right" 	=> __("Footer Right Menu","philosophy")
    ) );
	add_editor_style("/assets/css/editor-style.css");
	add_image_size( 'philosophy-square', 400, 460, true );	

}
add_action( 'after_setup_theme', 'philosophy_setup_theme');


/* Dynamically Load assests file */
function philosophy_assets(){
	wp_enqueue_style( "font-awesome", get_theme_file_uri( "assets/css/font-awesome/css/font-awesome.min.css" ), null,'0.1' );
	wp_enqueue_style( "philosophy-fonts", get_theme_file_uri( "assets/css/fonts.css" ), null,'0.1' );
	wp_enqueue_style( "philosophy-base", get_theme_file_uri( "assets/css/base.css" ), null,'0.1' );
	wp_enqueue_style( "philosophy-vendor", get_theme_file_uri( "assets/css/vendor.css" ), null,'0.1' );
	wp_enqueue_style( "philosophy-main", get_theme_file_uri( "assets/css/main.css" ), null,VERSION );	
	wp_enqueue_style( "philosophy-tiny", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.8.7/tiny-slider.css" );	
	wp_enqueue_style( "philosophy-style", get_stylesheet_uri(), null, VERSION );
	wp_enqueue_script( "philosophy-modernizr-js", get_theme_file_uri( "assets/js/modernizr.js" ), null, "0.1" );
	wp_enqueue_script( "philosophy-pace-js", get_theme_file_uri( "assets/js/pace.min.js" ), null, "0.1" );
	wp_enqueue_script( "philosophy-plugins-js", get_theme_file_uri( "assets/js/plugins.js" ), array("jquery"), "0.1", true );
	wp_enqueue_script( "philosophy-tiny-js", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.8.7/min/tiny-slider.js", null);
	if ( is_singular() ) {
		wp_enqueue_script( "comment-reply" );
	}
	wp_enqueue_script( "philosophy-main-js", get_theme_file_uri( "assets/js/main.js" ), array("jquery", "philosophy-plugins-js"), "0.1" , true);
	
	if (is_page_template( "ajax.php" )) {
		wp_enqueue_script( "ajaxtest-js", get_theme_file_uri( "assets/js/ajaxtest.js" ), array('jquery'), VERSION, true );
		$ajaxurl = admin_url( 'admin-ajax.php' );
		
		wp_localize_script( "ajaxtest-js","urls", array("ajaxurl"=>$ajaxurl));

	}

}
add_action( 'wp_enqueue_scripts', 'philosophy_assets');


function philosophy_paginate(){
	global $wp_query;
	$links = paginate_links( array(		
		'current'	=> max(1, get_query_var( "paged")),
		'total'		=> $wp_query->max_num_pages,
		'type'		=> 'list',		
	) );

	$links = str_replace('page-numbers', 'pgn__num', $links);
	$links = str_replace("<ul class='pgn__num'>", "<ul>", $links);
	$links = str_replace('prev pgn__num', 'pgn__prev', $links);
	$links = str_replace('next pgn__num', 'pgn__next', $links);
	echo wp_kses_post($links);

}

/* Remove p tag from description */
remove_action( 'term_description', 'wpautop' );


/* widgets register */
function philosophy_sidebar(){

	register_sidebar (array(
		'name'          => __( 'Header Social', 'philosophy' ),
		'id'            => 'header-social',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class=" %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	));

	register_sidebar (array(
		'name'          => __( 'About us', 'philosophy' ),
		'id'            => 'about-us',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="col-block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="quarter-top-margin">',
		'after_title'   => '</h3>',
	));

	register_sidebar (array(
		'name'          => __( 'Contact Page', 'philosophy' ),
		'id'            => 'contact',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="col-block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="quarter-top-margin">',
		'after_title'   => '</h3>',
	));

	register_sidebar (array(
		'name'          => __( 'Before Footer Section', 'philosophy' ),
		'id'            => 'before-footer',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class=" %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="quarter-top-margin">',
		'after_title'   => '</h3>',
	));

	register_sidebar (array(
		'name'          => __( 'Footer Section', 'philosophy' ),
		'id'            => 'footer-section',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class=" %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	));

	register_sidebar (array(
		'name'          => __( 'Footer bottom', 'philosophy' ),
		'id'            => 'footer-bottom',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class=" %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	));

		
	
}
add_action( 'widgets_init', 'philosophy_sidebar' );


/* Protected post */
function philosophy_protected_post($excerpt){
	if (! post_password_required()) {
		return $excerpt;
	}else{
		echo get_the_password_form();
	}
}
add_filter('the_excerpt', 'philosophy_protected_post');


/* Post title format change */
function philosophy_protected_title_change() {
	return "%s"; //variable replace
}
add_filter("protected_title_format", "philosophy_protected_title_change");


/* Search form */
function philosophy_search_form($form){
	$title = __("Search for:","philosophy");
	$button = __("Search","philosophy");
	$post_type = <<<POST
<input type="hidden" name="post_type" value="post"> 
POST;

if (is_post_type_archive( "book" )) {
	$post_type = <<<POST
<input type="hidden" name="post_type" value="book"> 	
POST;
}

	$newform = <<<FORM
<form role="search" method="get" class="header__search-form" action="#">
    <label>
        <span class="hide-content">{$title}</span>
        <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$title}" autocomplete="off">
    </label>
   	{$post_type}
    <input type="submit" class="search-submit" value="{$button}">
</form>
FORM;
return $newform;
}
add_filter("get_search_form","philosophy_search_form");


/* Taxonomy */
function philosophy_footer_tags_heading($title){
	if (is_post_type_archive( "book" ) || is_tax( "language" ) ) {
		$title = __("Language","philosophy");
	}
	return $title;
}
add_filter( "philosophy_tag_heading", "philosophy_footer_tags_heading");


function philosophy_foter_tag_terms($tags){
	if (is_post_type_archive( "book" ) || is_tax("language") ) {
		$tags = get_terms( array(
			'taxonomy'		=> 'language',
			'hide_empty'	=> false
		) );
	}
	return $tags;
}
add_filter( "philosophy_tag_terms", "philosophy_foter_tag_terms");


/* ajax test logedin */
function philosophy_ajaxtest(){
	if (check_ajax_referer( "ajaxtest", "s" )) {
		$info = $_POST['info'];
		echo strtoupper($info);
		die();
	}

}
add_action( "wp_ajax_ajaxtest", "philosophy_ajaxtest");


/* ajax test not logedin */
function philosophy_ajaxtest_nopriv(){
	$info = $_POST['info'];
	echo strtoupper("GLOBAL ".$info);
	die();
}
add_action( "wp_ajax_nopriv_ajaxtest", "philosophy_ajaxtest_nopriv");



