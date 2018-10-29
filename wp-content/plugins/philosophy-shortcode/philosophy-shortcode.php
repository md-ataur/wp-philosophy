<?php
/*
Plugin Name: Philosophy Shortcode
Plugin URI: 
Description: 
Version: 1.0
Author: Ataur
Author URI: 
License: GPL2
Text Domain: philosophy-shortcode
*/


/* google map */
function philosophy_map($attributes){
	$default = array(
		'place'		=> 'Dhaka Museum',
		'width'		=> '800',
        'height'	=> '500',
        'zoom'		=> '14'
	);

	$params = shortcode_atts($default, $attributes);

	$map = <<<EOD

<div class="map-area">
    <iframe width="{$params['width']}" height="{$params['height']}"
        src="https://maps.google.com/maps?q={$params['place']}&t=&z={$params['zoom']}&ie=UTF8&iwloc=&output=embed"
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
    </iframe>
</div>

EOD;

return $map;

}
add_shortcode( 'gmap', 'philosophy_map' );

/* Button Example*/
function philosophy_button($attributes){
	return sprintf('<a target="__blank" class="btn btn--%s full-width" href="%s">%s</a>',
		$attributes['type'],
		$attributes['url'],
		$attributes['title']
	);
}
add_shortcode( "button", "philosophy_button" );


function philosophy_button2($attributes, $content){
	return sprintf('<a target="__blank" class="btn btn--%s full-width" href="%s">%s</a>',
		$attributes['type'],
		$attributes['url'],
		$content
	);
}
add_shortcode( "button2", "philosophy_button2" );