<?php
/**
 * Noto Simple Theme Customizer
 *
 * @package Noto_Simple
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function noto_simple_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'noto_simple_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'noto_simple_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_section(
		'display_settings',
		array(
			'title' => __( 'Display Settings', 'noto-simple' ),
		)
	);

	// Author name display
	$wp_customize->add_setting(
		'display_author',
		array(
			'default' => '1',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'display_author',
		array(
			'label' => esc_html__( 'Display author name', 'noto-simple' ),
			'type' => 'checkbox',
			'section' => 'display_settings',
		)
	);

	// Publish date
	$wp_customize->add_setting(
		'display_datetime',
		array(
			'default' => 'date',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'display_datetime',
		array(
			'label' => esc_html__( 'Publish Date', 'noto-simple' ),
			'type' => 'radio',
			'section' => 'display_settings',
			'choices' => array(
				'date' => esc_html__( 'Date only', 'noto-simple' ),
				'datetime' => esc_html__( 'Date and time', 'noto-simple' ),
			),
		)
	);
	// Footer text
	$wp_customize->add_setting(
		'footer_text',
		array(
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'footer_text',
		array(
			'label' => esc_html__( 'Custom Footer Text', 'noto-simple' ),
			'type' => 'text',
			'section' => 'title_tagline',
			'description' => esc_html__( 'HTML enabled. Displays theme name by default.', 'noto-simple' )
		)
	);
}
add_action( 'customize_register', 'noto_simple_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function noto_simple_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function noto_simple_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function noto_simple_customize_preview_js() {
	wp_enqueue_script( 'noto-simple-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'noto_simple_customize_preview_js' );
