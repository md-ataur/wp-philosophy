<?php
define( 'CS_ACTIVE_FRAMEWORK',   false  ); // default true
define( 'CS_ACTIVE_METABOX',     true ); // default true
define( 'CS_ACTIVE_TAXONOMY',    true ); // default true
define( 'CS_ACTIVE_SHORTCODE',   true ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',   false ); // default true

define( 'CS_ACTIVE_LIGHT_THEME',  true  ); // default false

function philosophy_csf_metabox(){
	CSFramework_Metabox::instance( array() );
	CSFramework_Shortcode_Manager::instance( array() );
	CSFramework_Taxonomy::instance( array() );
}
add_action( "init", "philosophy_csf_metabox");

function philosophy_meta_options($options){
	$page_id = 0;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $page_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    $current_page_template = get_post_meta( $page_id, '_wp_page_template', true );
    if (!in_array($current_page_template, array('page-codestar.php'))) {
    	return $options;
    }

	$options[]	= array(
		'id'		=> 'page-metabox',
		'title'		=> __('Page Meta Options','philosophy'),
		'post_type'	=> 'page',
		'context'	=> 'normal',
		'priority'	=> 'default',
		'sections'	=> array(
			array(
				'name'		=> 'page-section1',
				'title'		=> __('Page Settings One','philosophy'),
				'icon'		=> 'fa fa-heart',
				'fields'	=> array(
					array(
						'id'	=> 'page-heading',
						'type'	=> 'text',
						'title'	=> __('Page Heading','philosophy')
					),
					array(
						'id'	=> 'page-teaser',
						'type'	=> 'textarea',
						'title'	=> __('Teaser Text','philosophy')
					),
					array(
						'id'	=> 'is-favorite',
						'type'	=> 'switcher',
						'title'	=> __('Is Favorite','philosophy'),
						'default'=>1
					),
					array(
						'id'	=> 'page-favorite-text',
						'type'	=> 'text',
						'title'	=> __('Favorite Text','philosophy'),
						'dependency' => array('is-favorite','==','1')
					),
					array(
						'id'	=> 'image-upload',
						'type'	=> 'image',
						'title'	=> __('Image ','philosophy')
						
					),
					array(
						'id'          => 'gallery',
						'type'        => 'gallery',
						'title'       => __('Gallery'),
						'add_title'   => 'Add Images',
						'edit_title'  => 'Edit Images',
						'clear_title' => 'Remove Images',
					),
					array(
						'id'              => 'group-field',
						'type'            => 'group',
						'title'           => __('Group Field','philosophy'),
						'button_title'    => __('Add New','philosophy'),
						'accordion_title' => __('Add New Field','philosophy'),
						'fields'          => array(					
							array(
								'id'            => 'featured-posts',
								'type'          => 'select',
								'title'         => 'Select Post',
								'options'       => 'posts',
								'query_args'     => array(
								    'post_type'     => 'book',
								    'posts_per_page'=> -1,
								    'orderby'       => 'post_date',
								    'order'         => 'DESC',
								),								
							),
						),
					),
				)
			),
			array(
				'name'		=> 'page-section2',
				'title'		=> __('Page Settings Two','philosophy'),
				'icon'		=> 'fa fa-book',
				'fields'	=> array(
					array(
						'id'	=> 'page-heading2',
						'type'	=> 'text',
						'title'	=> __('Page Heading Two','philosophy')
					),
					array(
						'id'	=> 'page-teaser2',
						'type'	=> 'textarea',
						'title'	=> __('Teaser Text Two','philosophy')
					),
					array(
						'id'	=> 'is-favorite2',
						'type'	=> 'switcher',
						'title'	=> __('Is Favorite','philosophy'),
						'default'=>1
					)
				)
			)
		)
	);

	return $options;
}
add_filter( "cs_metabox_options", "philosophy_meta_options");


function philosophy_google_map($options){
	$options[]     = array(
		'name'          => 'group_1',
		'title'         => __('Group #1','philosophy'),
		'shortcodes'    => array(
			array(
			  'name'      => 'gmap',
			  'title'     => __('Google Map','philosophy'),
			  'fields'    => array(
					array(
					  'id'    => 'place',
					  'type'  => 'text',
					  'title' => __('Place','philosophy'),
					  'help'  => 'Enter Place',
					  'default'=> 'Dhaka College'
					),
					array(
					  'id'    => 'width',
					  'type'  => 'text',
					  'title' => __('Width','philosophy'),
					  'default'=> '100%'
					),
					array(
					  'id'    => 'height',
					  'type'  => 'text',
					  'title' => __('Height','philosophy'),
					  'default'=> '500'
					),
					array(
					  'id'    => 'zoom',
					  'type'  => 'text',
					  'title' => __('Zoom','philosophy'),
					  'default'=> '14'
					),
				),
			),
		)
	);
	return $options;
}
add_filter( "cs_shortcode_options","philosophy_google_map");


function philosophy_custom_taxonomy($options){

	$options[]   = array(
		'id'       => 'language_featured_image',
		'taxonomy' => 'language',
		'fields'   => array(
			array(
				'id'    => 'featured_image',
				'type'  => 'image',
				'title' => 'Featured Image',
			),
		),
	);

	return $options;
}

add_filter( "cs_taxonomy_options","philosophy_custom_taxonomy");


/* Theme options start */
function philosophy_theme_option_init(){
	$settings = array(
		'menu_title'      => __('Hodor','philosophy'),
		'menu_type'       => 'menu',
		'menu_slug'       => 'philosophy_option_panel',
		'menu_icon'       => 'dashicons-dashboard',
        'menu_position'   => 20,
		'ajax_save'       => false,
		'show_reset_all'  => false,
		'framework_title' => __('Hodor','philosophy'),
	);

	$options = philosophy_theme_options();
	new CSFramework( $settings, $options );
}
add_action("init","philosophy_theme_option_init");


function philosophy_theme_options(){

	$options = array();

	$options[]    = array(
		'name'      => 'footer_options',
		'title'     => __('Section 1','philosophy'),
		'icon'      => 'fa fa-repeat',
		'fields'    => array(
	
			array(
			  'id'    => 'footer_tag',
			  'type'  => 'switcher',
			  'title' => __('Tags Area Visible?','philosophy'),
			),			
			array(
				'id'    => 'social_facebook',
				'type'  => 'text',
				'title' => __('Facebook URL','philosophy'),
			),
			array(
				'id'    => 'social_twitter',
				'type'  => 'text',
				'title' => __('Twitter URL','philosophy'),
			),
			array(
				'id'    => 'social_pinterest',
				'type'  => 'text',
				'title' => __('Pinterest URL','philosophy'),
			),
		)
	);

	$options[]    = array(
		'name'      => 'section_1',
		'title'     => 'Section 2',
		'icon'      => 'fa fa-repeat',
		'fields'    => array(

			// a text field
			array(
			  'id'    => 'section_1_text',
			  'type'  => 'text',
			  'title' => 'Text Option Field',
			),

			// a textarea field
			array(
			  'id'    => 'section_1_textarea',
			  'type'  => 'textarea',
			  'title' => 'Textarea Option Field',
			),

		)
	);
	return $options;

}
//add_filter("cs_framework_options","philosophy_theme_options");