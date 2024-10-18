<?php
/**
 * niomax Theme Customizer
 *
 * @package niomax
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function niomax_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'niomax_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'niomax_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'niomax_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function niomax_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function niomax_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function niomax_customize_preview_js() {
	wp_enqueue_script( 'niomax-customizer', get_template_directory_uri() . '/vendor/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'niomax_customize_preview_js' );

/**
 * Start Customizer Functions
 */
function niomax_customizer_function( $wp_customize ) {
	// Add Header Section
	$wp_customize->add_section('niomax_header', array(
		'title'       => __('Header', 'niomax'),
		'description' => __('If you want to change anything header, you can do it.', 'niomax'),
		'priority'    => 60,
	));

	// Add Header Setting
	$wp_customize->add_setting('header_logo', array(
		'default'           => get_template_directory_uri() . '/assets/img/niomax-logo.png', // Default value if nothing is set
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add Header Control (you can add a control like a text field)
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo_control', array(
		'label'    => __('Header Logo', 'niomax'), // Label for the control
		'section'  => 'niomax_header', // Section ID
		'settings' => 'header_logo', // Setting ID
	)));

	// Add header CTA button
	$wp_customize->add_setting('header_cta', array(
		'default'	=> __('get started', 'niommax'),
	));
	$wp_customize->add_control('header_cta', array(
		'label'		=> __('Add Button Text'),
		'section'	=> 'niomax_header',
		'settings'	=> 'header_cta',
	));






	// Add Slider Section
	$wp_customize->add_section('niomax_slider', array(
		'title'       => __('Slider Section', 'niomax'),
		'description' => __('If you want to change anything slider, you can do it.', 'niomax'),
		'priority'    => 61,
	));

	// Add Slider Setting
	$wp_customize->add_setting('slider_heading', array(
		'default'           => 'Plan to Create a<br> <b>Business Website.</b>',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add Slider Control (you can add a control like a text field)
	$wp_customize->add_control('slider_heading', array(
		'label'    => __('Slider Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_slider', // Section ID
		'settings' => 'slider_heading', // Setting ID
	));

	// Add Slider Setting
	$wp_customize->add_setting('slider_desc', array(
		'default'           => 'We are exclusive solution agency.',
		'transport'         => 'refresh',
	));

	// Add Slider Control (you can add a control like a text field)
	$wp_customize->add_control('slider_desc', array(
		'label'    => __('Slider Description', 'niomax'),
		'type'		=> 'textarea',
		'section'  => 'niomax_slider',
		'settings' => 'slider_desc',
	));

	// Add Slider button Setting
	$wp_customize->add_setting('slider_btn_text', array(
		'default'           => 'Discover More',
		'transport'         => 'refresh',
	));

	// Add Slider Control (you can add a control like a text field)
	$wp_customize->add_control('slider_btn_text', array(
		'label'    => __('Slider Button Text', 'niomax'),
		'section'  => 'niomax_slider',
		'settings' => 'slider_btn_text',
	));

	// Add Slider button Setting
	$wp_customize->add_setting('slider_btn_link', array(
		'default'           => '#',
		'transport'         => 'refresh',
	));

	// Add Slider Control (you can add a control like a text field)
	$wp_customize->add_control('slider_btn_link', array(
		'label'    => __('Slider Button Link', 'niomax'),
		'section'  => 'niomax_slider',
		'settings' => 'slider_btn_link',
	));

	// Add setting and control for Background Image 1
    $wp_customize->add_setting('hero_bg_image_1', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_image_1', array(
        'label'    => __('Background Image 1', 'niomax'),
        'section'  => 'niomax_slider',
        'settings' => 'hero_bg_image_1',
    )));

    // Add setting and control for Background Image 2
    $wp_customize->add_setting('hero_bg_image_2', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_image_2', array(
        'label'    => __('Background Image 2', 'niomax'),
        'section'  => 'niomax_slider',
        'settings' => 'hero_bg_image_2',
    )));

    // Add setting and control for Background Image 3
    $wp_customize->add_setting('hero_bg_image_3', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_image_3', array(
        'label'    => __('Background Image 3', 'niomax'),
        'section'  => 'niomax_slider',
        'settings' => 'hero_bg_image_3',
    )));










	// Add About Section
	$wp_customize->add_section('niomax_about', array(
		'title'       => __('About Section', 'niomax'),
		'description' => __('If you want to change anything from about, you can do it.', 'niomax'),
		'priority'    => 62,
	));

	// Add about Setting
	$wp_customize->add_setting('about_sub_heading', array(
		'default'           => 'Who We Are',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add about Control (you can add a control like a text field)
	$wp_customize->add_control('about_sub_heading', array(
		'label'    => __('About Sub-Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_about', // Section ID
		'settings' => 'about_sub_heading', // Setting ID
	));

	// Add about Setting
	$wp_customize->add_setting('about_heading', array(
		'default'           => 'About our Consuting<br>Agency Team',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add about Control (you can add a control like a text field)
	$wp_customize->add_control('about_heading', array(
		'label'    => __('About Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_about', // Section ID
		'settings' => 'about_heading', // Setting ID
	));

	// Add about Setting
	$wp_customize->add_setting('about_descB', array(
		'default'           => 'We create experiences and build products that make business grow',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add about Control (you can add a control like a text field)
	$wp_customize->add_control('about_descB', array(
		'label'    => __('About Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_about', // Section ID
		'settings' => 'about_descB', // Setting ID
	));
	
	// Add about Setting
	$wp_customize->add_setting('about_desc', array(
		'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ornare non sed est cursus. Vel hac convallis ipsum, facilisi odio pellentesque bibendum viverra tempus.',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add about Control (you can add a control like a text field)
	$wp_customize->add_control('about_desc', array(
		'label'    => __('About Heading', 'niomax'), // Label for the control
		'type'		=> 'textarea',
		'section'  => 'niomax_about', // Section ID
		'settings' => 'about_desc', // Setting ID
	));

	// Add about Setting
	$wp_customize->add_setting('about_list1', array(
		'default'           => 'Business Strategy & Marketing',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add about Control (you can add a control like a text field)
	$wp_customize->add_control('about_list1', array(
		'label'    => __('About Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_about', // Section ID
		'settings' => 'about_list1', // Setting ID
	));

	// Add about Setting
	$wp_customize->add_setting('about_list2', array(
		'default'           => 'Business Strategy & Marketing',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add about Control (you can add a control like a text field)
	$wp_customize->add_control('about_list2', array(
		'label'    => __('About Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_about', // Section ID
		'settings' => 'about_list2', // Setting ID
	));

	// Add about Setting
	$wp_customize->add_setting('about_box1_h6', array(
		'default'           => 'Awards Winner',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add about Control (you can add a control like a text field)
	$wp_customize->add_control('about_box1_h6', array(
		'label'    => __('About Box Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_about', // Section ID
		'settings' => 'about_box1_h6', // Setting ID
	));

	// Add about Setting
	$wp_customize->add_setting('about_box1_p', array(
		'default'           => 'Leaders in the market with creative & successful.',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add about Control (you can add a control like a text field)
	$wp_customize->add_control('about_box1_p', array(
		'label'    => __('About Box Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_about', // Section ID
		'settings' => 'about_box1_p', // Setting ID
	));

	// Add about Setting
	$wp_customize->add_setting('about_box2_h6', array(
		'default'           => 'Awards Winner',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add about Control (you can add a control like a text field)
	$wp_customize->add_control('about_box2_h6', array(
		'label'    => __('About Box Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_about', // Section ID
		'settings' => 'about_box2_h6', // Setting ID
	));

	// Add about Setting
	$wp_customize->add_setting('about_box2_p', array(
		'default'           => 'Leaders in the market with creative & successful.',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add about Control (you can add a control like a text field)
	$wp_customize->add_control('about_box2_p', array(
		'label'    => __('About Box Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_about', // Section ID
		'settings' => 'about_box2_p', // Setting ID
	));

	// Add about image Setting
	$wp_customize->add_setting('about_image', array(
		'default'           => '',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add Header Control (you can add a control like a text field)
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
		'label'    => __('Header Logo', 'niomax'), // Label for the control
		'section'  => 'niomax_about', // Section ID
		'settings' => 'about_image', // Setting ID
	)));










	// Add CTA Section
	$wp_customize->add_section('niomax_cta', array(
		'title'       => __('CTA Section', 'niomax'),
		'description' => __('If you want to change anything from cta, you can do it.', 'niomax'),
		'priority'    => 63,
	));

	// Add CTA Setting
	$wp_customize->add_setting('cta_heading', array(
		'default'           => 'Make your business prosper with our advisory and consulting services!',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add CTA Control (you can add a control like a text field)
	$wp_customize->add_control('cta_heading', array(
		'label'    => __('CTA Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_cta', // Section ID
		'settings' => 'cta_heading', // Setting ID
	));

	// Add CTA Setting
	$wp_customize->add_setting('cta_btn_text', array(
		'default'           => 'Discover More',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add CTA Control (you can add a control like a text field)
	$wp_customize->add_control('cta_btn_text', array(
		'label'    => __('CTA Button Text', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_cta', // Section ID
		'settings' => 'cta_btn_text', // Setting ID
	));

	// Add CTA Setting
	$wp_customize->add_setting('cta_btn_link', array(
		'default'           => '#',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add CTA Control (you can add a control like a text field)
	$wp_customize->add_control('cta_btn_link', array(
		'label'    => __('CTA Button Text', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_cta', // Section ID
		'settings' => 'cta_btn_link', // Setting ID
	));









	// Add Video Section
	$wp_customize->add_section('niomax_video', array(
		'title'       => __('Video Section', 'niomax'),
		'description' => __('If you want to change anything from video, you can do it.', 'niomax'),
		'priority'    => 64,
	));

	// Add Video Setting
	$wp_customize->add_setting('vide_sub_heading', array(
		'default'           => 'Our History',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add Video Control (you can add a control like a text field)
	$wp_customize->add_control('vide_sub_heading', array(
		'label'    => __('Video Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_video', // Section ID
		'settings' => 'vide_sub_heading', // Setting ID
	));

	// Add Video Setting
	$wp_customize->add_setting('vide_heading', array(
		'default'           => 'Better Website Means A<br> User Experience',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add Video Control (you can add a control like a text field)
	$wp_customize->add_control('vide_heading', array(
		'label'    => __('Video Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_video', // Section ID
		'settings' => 'vide_heading', // Setting ID
	));

	// Add Video Setting
	$wp_customize->add_setting('vide_desc', array(
		'default'           => 'Ippsum is the result of synergy between our teams and our customers. Our company culture is <br>focused on excellent productivity, customer satisfaction',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add Video Control (you can add a control like a text field)
	$wp_customize->add_control('vide_desc', array(
		'label'    => __('Video Description', 'niomax'), // Label for the control
		'type'		=> 'textarea',
		'section'  => 'niomax_video', // Section ID
		'settings' => 'vide_desc', // Setting ID
	));

	// Add Video Setting
	$wp_customize->add_setting('vide_link', array(
		'default'           => 'https://youtu.be/zKguO4oaAGs?si=Ow4MJLhCAC85IuMi',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add Video Control (you can add a control like a text field)
	$wp_customize->add_control('vide_link', array(
		'label'    => __('Video Description', 'niomax'), // Label for the control
		'type'		=> 'url',
		'section'  => 'niomax_video', // Section ID
		'settings' => 'vide_link', // Setting ID
	));








	// Add Blog Section
	$wp_customize->add_section('niomax_blog', array(
		'title'       => __('Blog Section', 'niomax'),
		'description' => __('If you want to change anything from blog, you can do it.', 'niomax'),
		'priority'    => 65,
	));

	// Add Video Setting
	$wp_customize->add_setting('blog_sub_heading', array(
		'default'           => 'Our Blog',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add Blog Control (you can add a control like a text field)
	$wp_customize->add_control('blog_sub_heading', array(
		'label'    => __('Blog Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_blog', // Section ID
		'settings' => 'blog_sub_heading', // Setting ID
	));

	// Add Video Setting
	$wp_customize->add_setting('blog_heading', array(
		'default'           => 'Browse our latest news',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add Blog Control (you can add a control like a text field)
	$wp_customize->add_control('blog_heading', array(
		'label'    => __('Blog Heading', 'niomax'), // Label for the control
		'type'		=> 'text',
		'section'  => 'niomax_blog', // Section ID
		'settings' => 'blog_heading', // Setting ID
	));

	// Add Video Setting
	$wp_customize->add_setting('blog_desc', array(
		'default'           => 'Ippsum is the result of synergy between our teams and our customers. Our company culture is <br>focused on excellent productivity, customer satisfaction',
		'transport'         => 'refresh', // Update the preview without reloading
	));

	// Add Blog Control (you can add a control like a text field)
	$wp_customize->add_control('blog_heading', array(
		'label'    => __('Blog Description', 'niomax'), // Label for the control
		'type'		=> 'textarea',
		'section'  => 'niomax_blog', // Section ID
		'settings' => 'blog_desc', // Setting ID
	));



}
add_action( 'customize_register', 'niomax_customizer_function' );
