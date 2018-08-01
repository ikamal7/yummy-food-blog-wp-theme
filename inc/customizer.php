<?php

function yummy_customizer( $wp_customize ) {
	$wp_customize->add_panel( 'yummy_options_panel',
		array(
			'capability' => 'edit_theme_options',
			'title' => __('Yummy Options', 'td'),
			'description' => __('Panel to update Yummy Options', 'td'),
			'priority'=> 10
		) );
	$wp_customize->add_section('yummy_header_area', array(
		'title' => __('Header Options', 'td'),
		'priority' => 30,
		'panel'=> 'yummy_options_panel'
	) );

	//Enable featured slider options
	$wp_customize->add_setting('header_social',array(
		'default'=> true
	) );
	$wp_customize->add_control('header_social', array(
		'label'=> esc_html('Enable Header Social widget', 'td'),
		'section'=> 'yummy_header_area',
		'type'=> 'radio',
		'choices'=> array(
			true => __('Yes', 'td'),
			false => __('No', 'td'),
		)

	));
	//Enable featured slider options
	$wp_customize->add_setting('feature_slider',array(
		'default'=> true
	) );
	$wp_customize->add_control('feature_slider', array(
		'label'=> esc_html('Enable Homepage Featured post slider', 'td'),
		'section'=> 'yummy_header_area',
		'type'=> 'radio',
		'choices'=> array(
			true => __('Yes', 'td'),
			false => __('No', 'td'),
		)

	));
	//Enable featured category options
	$wp_customize->add_setting('feature_category',array(
		'default'=> true
	) );
	$wp_customize->add_control('feature_category', array(
		'label'=> esc_html('Enable Homepage Featured Category', 'td'),
		'section'=> 'yummy_header_area',
		'type'=> 'radio',
		'choices'=> array(
			true => __('Yes', 'td'),
			false => __('No', 'td'),
		)

	));
}

add_action( 'customize_register', 'yummy_customizer' );


function yummy_customizer_preview(){

}
add_action('wp_enqueue_scripts', 'yummy_customizer_preview');
