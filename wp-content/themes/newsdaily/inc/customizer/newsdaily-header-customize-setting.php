<?php
function newsdaily_header_customize_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Banner
	=========================================*/	
	$wp_customize->add_setting(
		'newsmash_hdr_banner'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'newsmash_sanitize_text',
			'priority' => 12,
		)
	);

	$wp_customize->add_control(
	'newsmash_hdr_banner',
		array(
			'type' => 'hidden',
			'label' => __('Advertise Banner','newsdaily'),
			'section' => 'newsmash_hdr_nav',
		)
	);
	

	$wp_customize->add_setting(
		'newsmash_hs_hdr_banner' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'newsmash_sanitize_checkbox',
			'priority' => 13,
		) 
	);
	
	$wp_customize->add_control(
	'newsmash_hs_hdr_banner', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'newsdaily' ),
			'section'     => 'newsmash_hdr_nav',
			'type'        => 'checkbox'
		) 
	);
	
	//  Image // 
    $wp_customize->add_setting( 
    	'newsmash_hdr_banner_img' , 
    	array(
			'default' 			=> esc_url(get_stylesheet_directory_uri() .'/assets/images/ad-900.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'newsmash_sanitize_url',	
			'priority' => 13,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'newsmash_hdr_banner_img' ,
		array(
			'label'          => esc_html__( 'Image', 'newsdaily'),
			'section'        => 'newsmash_hdr_nav',
		) 
	));
	
	// Button Link // 
	$wp_customize->add_setting(
    	'newsmash_hdr_banner_link',
    	array(
			'default'			=> '#',
			'sanitize_callback' => 'newsmash_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 15,
		)
	);	

	$wp_customize->add_control( 
		'newsmash_hdr_banner_link',
		array(
		    'label'   		=> __('Link','newsdaily'),
		    'section' 		=> 'newsmash_hdr_nav',
			'type'		 =>	'text'
		)  
	);
	
	
	// Open New Tab
	$wp_customize->add_setting( 
		'newsmash_hdr_banner_target' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'newsmash_sanitize_checkbox',
			'priority' => 16,
		) 
	);
	
	$wp_customize->add_control(
	'newsmash_hdr_banner_target', 
		array(
			'label'	      => esc_html__( 'Open in New Tab ?', 'newsdaily' ),
			'section'     => 'newsmash_hdr_nav',
			'type'        => 'checkbox'
		) 
	);	
	
}
add_action( 'customize_register', 'newsdaily_header_customize_settings' );

