<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen
add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance


function philosophy_attachment($attachments){
	$fields = array(
		array(
			'name'		=> 'title',
			'type'		=> 'text',
			'label'		=> __('title','philosophy')
		)
	);

	$args = array(
		 
	    'label'         => 'Post Gallery',		   
	    'post_type'     => array( 'post' ),
	    'button_text'   => __( 'Attach Files', 'philosophy' ),
	    'fields'        => $fields,
	);

	$attachments->register('gallery',$args);
}

add_action( 'attachments_register', 'philosophy_attachment' );
