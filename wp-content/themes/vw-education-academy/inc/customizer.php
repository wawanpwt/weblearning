<?php
/**
 * VW Education Academy Theme Customizer
 *
 * @package VW Education Academy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_education_academy_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_education_academy_custom_controls' );

function vw_education_academy_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_education_academy_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_education_academy_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWEducationAcademyParentPanel = new VW_Education_Academy_WP_Customize_Panel( $wp_customize, 'vw_education_academy_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title'      => esc_html__( 'VW Settings', 'vw-education-academy' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vw_education_academy_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-education-academy' ),
		'panel' => 'vw_education_academy_panel_id'
	) );

	$wp_customize->add_setting('vw_education_academy_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_education_academy_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Education_Academy_Image_Radio_Control($wp_customize, 'vw_education_academy_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-education-academy'),
        'description' => __('Here you can change the width layout of Website.','vw-education-academy'),
        'section' => 'vw_education_academy_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_education_academy_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_education_academy_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_education_academy_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-education-academy'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-education-academy'),
        'section' => 'vw_education_academy_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-education-academy'),
            'Right Sidebar' => __('Right Sidebar','vw-education-academy'),
            'One Column' => __('One Column','vw-education-academy'),
            'Three Columns' => __('Three Columns','vw-education-academy'),
            'Four Columns' => __('Four Columns','vw-education-academy'),
            'Grid Layout' => __('Grid Layout','vw-education-academy')
        ),
	));

	$wp_customize->add_setting('vw_education_academy_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_education_academy_sanitize_choices'
	));
	$wp_customize->add_control('vw_education_academy_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-education-academy'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-education-academy'),
        'section' => 'vw_education_academy_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-education-academy'),
            'Right Sidebar' => __('Right Sidebar','vw-education-academy'),
            'One Column' => __('One Column','vw-education-academy')
        ),
	) );

	//Pre-Loader
	$wp_customize->add_setting( 'vw_education_academy_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-education-academy' ),
        'section' => 'vw_education_academy_left_right'
    )));

	$wp_customize->add_setting('vw_education_academy_loader_icon',array(
        'default' => 'Two Way',
        'sanitize_callback' => 'vw_education_academy_sanitize_choices'
	));
	$wp_customize->add_control('vw_education_academy_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-education-academy'),
        'section' => 'vw_education_academy_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-education-academy'),
            'Dots' => __('Dots','vw-education-academy'),
            'Rotate' => __('Rotate','vw-education-academy')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'vw_education_academy_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-education-academy' ),
		'panel' => 'vw_education_academy_panel_id'
	) );

	$wp_customize->add_setting( 'vw_education_academy_search_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_education_academy_switch_sanitization'
	)); 
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_search_hide_show',array(
          'label' => esc_html__( 'Show / Hide Search','vw-education-academy' ),
          'section' => 'vw_education_academy_topbar'
    )));

    $wp_customize->add_setting('vw_education_academy_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_search_icon',array(
		'label'	=> __('Add Search Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_topbar',
		'setting'	=> 'vw_education_academy_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_education_academy_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_topbar',
		'setting'	=> 'vw_education_academy_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_education_academy_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_search_font_size',array(
		'label'	=> __('Search Font Size','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_education_academy_search_border_radius', array(
		'default'              => "",
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_education_academy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_education_academy_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-education-academy' ),
		'section'     => 'vw_education_academy_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_education_academy_header_call', array( 
		'selector' => '#topbar span', 
		'render_callback' => 'vw_education_academy_customize_partial_vw_education_academy_header_call', 
	));

    $wp_customize->add_setting('vw_education_academy_call_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_call_icon',array(
		'label'	=> __('Add Phone Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_topbar',
		'setting'	=> 'vw_education_academy_call_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_education_academy_header_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_education_academy_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_education_academy_header_call',array(
		'label'	=> __('Add Phone Number','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '+00 123 125 4568', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_email_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_email_icon',array(
		'label'	=> __('Add Email Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_topbar',
		'setting'	=> 'vw_education_academy_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_education_academy_header_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_education_academy_sanitize_email'
	));
	$wp_customize->add_control('vw_education_academy_header_email',array(
		'label'	=> __('Add Email Address','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_education_academy_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-education-academy' ),
		'panel' => 'vw_education_academy_panel_id'
	) );

	$wp_customize->add_setting( 'vw_education_academy_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-education-academy' ),
      'section' => 'vw_education_academy_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_education_academy_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_education_academy_customize_partial_vw_education_academy_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_education_academy_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_education_academy_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_education_academy_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-education-academy' ),
			'description' => __('Slider image size (1500 x 590)','vw-education-academy'),
			'section'  => 'vw_education_academy_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_education_academy_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_slider_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_slider_button_icon',array(
		'label'	=> __('Add Slider button Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_slidersettings',
		'setting'	=> 'vw_education_academy_slider_button_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_education_academy_slider_content_option',array(
        'default' => 'Center',
        'sanitize_callback' => 'vw_education_academy_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Education_Academy_Image_Radio_Control($wp_customize, 'vw_education_academy_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-education-academy'),
        'section' => 'vw_education_academy_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_education_academy_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_education_academy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_education_academy_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-education-academy' ),
		'section'     => 'vw_education_academy_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_education_academy_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_education_academy_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_education_academy_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_education_academy_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-education-academy' ),
	'section'     => 'vw_education_academy_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_education_academy_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-education-academy'),
      '0.1' =>  esc_attr('0.1','vw-education-academy'),
      '0.2' =>  esc_attr('0.2','vw-education-academy'),
      '0.3' =>  esc_attr('0.3','vw-education-academy'),
      '0.4' =>  esc_attr('0.4','vw-education-academy'),
      '0.5' =>  esc_attr('0.5','vw-education-academy'),
      '0.6' =>  esc_attr('0.6','vw-education-academy'),
      '0.7' =>  esc_attr('0.7','vw-education-academy'),
      '0.8' =>  esc_attr('0.8','vw-education-academy'),
      '0.9' =>  esc_attr('0.9','vw-education-academy')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_education_academy_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_slider_height',array(
		'label'	=> __('Slider Height','vw-education-academy'),
		'description'	=> __('Specify the slider height (px).','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_education_academy_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'vw_education_academy_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_education_academy_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-education-academy'),
		'section' => 'vw_education_academy_slidersettings',
		'type'  => 'number',
	) );

	//About us section
	$wp_customize->add_section( 'vw_education_academy_about_section' , array(
    	'title'      => __( 'About us', 'vw-education-academy' ),
		'priority'   => null,
		'panel' => 'vw_education_academy_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_education_academy_section_title', array( 
		'selector' => '#about-section h2', 
		'render_callback' => 'vw_education_academy_customize_partial_vw_education_academy_section_title',
	));

	$wp_customize->add_setting('vw_education_academy_about_title_icon',array(
		'default'	=> 'fas fa-graduation-cap',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_about_title_icon',array(
		'label'	=> __('Add About Title Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_about_section',
		'setting'	=> 'vw_education_academy_about_title_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_education_academy_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_section_title',array(
		'label'	=> __('Add Section Title','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( 'ABOUT US', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_about_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_education_academy_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'vw_education_academy_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_education_academy_about_page', array(
		'label'    => __( 'Select About Page', 'vw-education-academy' ),
		'section'  => 'vw_education_academy_about_section',
		'type'     => 'dropdown-pages'
	) );

	//About excerpt
	$wp_customize->add_setting( 'vw_education_academy_about_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_education_academy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_education_academy_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt length','vw-education-academy' ),
		'section'     => 'vw_education_academy_about_section',
		'type'        => 'range',
		'settings'    => 'vw_education_academy_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_education_academy_about_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_about_button_text',array(
		'label'	=> __('Add About Button Text','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_about_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_about_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_about_button_icon',array(
		'label'	=> __('Add About Button Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_about_section',
		'setting'	=> 'vw_education_academy_about_button_icon',
		'type'		=> 'icon'
	)));

	//Blog Post
	$wp_customize->add_panel( $VWEducationAcademyParentPanel );

	$BlogPostParentPanel = new VW_Education_Academy_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-education-academy' ),
		'panel' => 'vw_education_academy_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_education_academy_post_settings', array(
		'title' => __( 'Post Settings', 'vw-education-academy' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_education_academy_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_education_academy_customize_partial_vw_education_academy_toggle_postdate', 
	));

	$wp_customize->add_setting('vw_education_academy_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_education_academy_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-education-academy' ),
        'section' => 'vw_education_academy_post_settings'
    )));

    $wp_customize->add_setting('vw_education_academy_toggle_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_education_academy_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_toggle_author',array(
		'label' => esc_html__( 'Author','vw-education-academy' ),
		'section' => 'vw_education_academy_post_settings'
    )));

    $wp_customize->add_setting('vw_education_academy_toggle_comments_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_education_academy_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-education-academy' ),
		'section' => 'vw_education_academy_post_settings'
    )));

    $wp_customize->add_setting( 'vw_education_academy_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_education_academy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_education_academy_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-education-academy' ),
		'section'     => 'vw_education_academy_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_education_academy_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_education_academy_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_education_academy_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Education_Academy_Image_Radio_Control($wp_customize, 'vw_education_academy_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-education-academy'),
        'section' => 'vw_education_academy_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_education_academy_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_education_academy_sanitize_choices'
	));
	$wp_customize->add_control('vw_education_academy_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-education-academy'),
        'section' => 'vw_education_academy_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-education-academy'),
            'Excerpt' => __('Excerpt','vw-education-academy'),
            'No Content' => __('No Content','vw-education-academy')
        ),
	) );

	$wp_customize->add_setting('vw_education_academy_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_education_academy_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-education-academy' ),
      'section' => 'vw_education_academy_post_settings'
    )));

	$wp_customize->add_setting( 'vw_education_academy_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_education_academy_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_education_academy_blog_pagination_type', array(
        'section' => 'vw_education_academy_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-education-academy' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-education-academy' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-education-academy' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_education_academy_button_settings', array(
		'title' => __( 'Button Settings', 'vw-education-academy' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_education_academy_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_education_academy_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_education_academy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_education_academy_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-education-academy' ),
		'section'     => 'vw_education_academy_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_education_academy_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_education_academy_customize_partial_vw_education_academy_button_text', 
	));

    $wp_customize->add_setting('vw_education_academy_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_button_text',array(
		'label'	=> __('Add Button Text','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_blog_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_button_settings',
		'setting'	=> 'vw_education_academy_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_education_academy_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-education-academy' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_education_academy_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_education_academy_customize_partial_vw_education_academy_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_education_academy_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_related_post',array(
		'label' => esc_html__( 'Related Post','vw-education-academy' ),
		'section' => 'vw_education_academy_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_education_academy_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_education_academy_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_education_academy_sanitize_float'
	));
	$wp_customize->add_control('vw_education_academy_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_education_academy_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-education-academy' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_education_academy_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_education_academy_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-education-academy' ),
		'section' => 'vw_education_academy_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_education_academy_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_education_academy_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-education-academy' ),
		'section' => 'vw_education_academy_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_education_academy_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_education_academy_404_page',array(
		'title'	=> __('404 Page Settings','vw-education-academy'),
		'panel' => 'vw_education_academy_panel_id',
	));	

	$wp_customize->add_setting('vw_education_academy_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_education_academy_404_page_title',array(
		'label'	=> __('Add Title','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_education_academy_404_page_content',array(
		'label'	=> __('Add Text','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_404_page_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_404_page',
		'setting'	=> 'vw_education_academy_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//Social Icon Setting
	$wp_customize->add_section('vw_education_academy_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-education-academy'),
		'panel' => 'vw_education_academy_panel_id',
	));	

	$wp_customize->add_setting('vw_education_academy_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_social_icon_width',array(
		'label'	=> __('Icon Width','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_social_icon_height',array(
		'label'	=> __('Icon Height','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_education_academy_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_education_academy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_education_academy_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-education-academy' ),
		'section'     => 'vw_education_academy_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_education_academy_responsive_media',array(
		'title'	=> __('Responsive Media','vw-education-academy'),
		'panel' => 'vw_education_academy_panel_id',
	));

    $wp_customize->add_setting( 'vw_education_academy_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-education-academy' ),
      'section' => 'vw_education_academy_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_education_academy_metabox_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','vw-education-academy' ),
      'section' => 'vw_education_academy_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_education_academy_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-education-academy' ),
      'section' => 'vw_education_academy_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_education_academy_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-education-academy' ),
      'section' => 'vw_education_academy_responsive_media'
    )));

    $wp_customize->add_setting('vw_education_academy_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_responsive_media',
		'setting'	=> 'vw_education_academy_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_education_academy_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_responsive_media',
		'setting'	=> 'vw_education_academy_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('vw_education_academy_footer',array(
		'title'	=> __('Footer','vw-education-academy'),
		'panel' => 'vw_education_academy_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_education_academy_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_education_academy_customize_partial_vw_education_academy_footer_text', 
	));
	
	$wp_customize->add_setting('vw_education_academy_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_education_academy_footer_text',array(
		'label'	=> __('Copyright Text','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_education_academy_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_education_academy_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Education_Academy_Image_Radio_Control($wp_customize, 'vw_education_academy_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-education-academy'),
        'section' => 'vw_education_academy_footer',
        'settings' => 'vw_education_academy_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_education_academy_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_education_academy_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-education-academy' ),
      	'section' => 'vw_education_academy_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_education_academy_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_education_academy_customize_partial_vw_education_academy_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_education_academy_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Education_Academy_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_education_academy_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-education-academy'),
		'transport' => 'refresh',
		'section'	=> 'vw_education_academy_footer',
		'setting'	=> 'vw_education_academy_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_education_academy_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-education-academy'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_education_academy_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_education_academy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_education_academy_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-education-academy' ),
		'section'     => 'vw_education_academy_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_education_academy_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_education_academy_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Education_Academy_Image_Radio_Control($wp_customize, 'vw_education_academy_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-education-academy'),
        'section' => 'vw_education_academy_footer',
        'settings' => 'vw_education_academy_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_education_academy_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-education-academy'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_education_academy_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-education-academy' ),
		'section' => 'vw_education_academy_woocommerce_section'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_education_academy_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-education-academy' ),
		'section' => 'vw_education_academy_woocommerce_section'
    )));

    //Related Products
	$wp_customize->add_setting( 'vw_education_academy_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_education_academy_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Education_Academy_Toggle_Switch_Custom_Control( $wp_customize, 'vw_education_academy_related_product_show_hide',array(
        'label' => esc_html__( 'Related product','vw-education-academy' ),
        'section' => 'vw_education_academy_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_education_academy_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_education_academy_sanitize_float'
	));
	$wp_customize->add_control('vw_education_academy_products_per_page',array(
		'label'	=> __('Products Per Page','vw-education-academy'),
		'description' => __('Display on shop page','vw-education-academy'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_education_academy_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_education_academy_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_education_academy_sanitize_choices'
	));
	$wp_customize->add_control('vw_education_academy_products_per_row',array(
		'label'	=> __('Products Per Row','vw-education-academy'),
		'description' => __('Display on shop page','vw-education-academy'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_education_academy_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_education_academy_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_education_academy_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_education_academy_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-education-academy'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-education-academy'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-education-academy' ),
        ),
		'section'=> 'vw_education_academy_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_education_academy_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_education_academy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_education_academy_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-education-academy' ),
		'section'     => 'vw_education_academy_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_education_academy_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_education_academy_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_education_academy_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-education-academy' ),
		'section'     => 'vw_education_academy_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Education_Academy_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Education_Academy_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_education_academy_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Education_Academy_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_education_academy_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Education_Academy_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_education_academy_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_education_academy_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_education_academy_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Education_Academy_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Education_Academy_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Education_Academy_Customize_Section_Pro($manager,'vw_education_academy_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Education PRO', 'vw-education-academy' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-education-academy' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/academic-wordpress-theme/'),
		)));

		// Register sections.
		$manager->add_section(new VW_Education_Academy_Customize_Section_Pro($manager,'vw_education_academy_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-education-academy' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-education-academy' ),
			'pro_url'  => admin_url('themes.php?page=vw_education_academy_guide'),
		)));
	}
	

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-education-academy-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-education-academy-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Education_Academy_Customize::get_instance();