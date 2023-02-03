<?php
    //KIRKI CONFIGURATION
    
    // Kirki::add_config( 'vile_kirki_customizer', [ //Make sure to change the theme_config_id
    //     'capability'    => 'edit_theme_options',
    //     'option_type'   => 'theme_mod',
    // ] );
    
    // add_filter( 'kirki_telemetry', '__return_false' );

    // Kirki::add_field( 'theme_config_id', [
    //     'type'        => 'color',
    //     'settings'    => 'color_setting',
    //     'label'       => __( 'Border', 'text-domain' ),
    //     'description' => esc_html__( 'Some cool description', 'text-domain' ),
    //     'section'     => 'section_id',
    //     'default'     => '#0088CC',
    //     'output'      => [
    //         [
    //             'element' => '.kirki-demo',
    //             'property' => 'border-color',
    //             'suffix' => '!important',
    //         ],
    //     ],
    // ] );



    













    
    //creating front page panel
    function frontpage_panel( \WP_Customize_Manager $wp_customize ){

        $wp_customize->add_panel( 
            'panel_frontpage', [
                'title' => __('Frontpage Settings', 'vile'),
            ]
        );
    }
    add_action('customize_register','frontpage_panel' );



    /**
     * NAV COLOR SECTION
     */

    //navigation color picker
    function vilecustomizable_customizer_navColor(\WP_Customize_Manager $wp_customize){

      
        $wp_customize->add_section( 
            'sec_nav_color', [
                'title' => __('Navigation Color', 'vile'),
                'description' => 'Set navigation color',
                'panel' => 'panel_frontpage',               
            ]
        );
     
        // Add Settings for default color
        $wp_customize->add_setting( 
            'vile_accent_color', [
                'default' => 'red',
            ]
        );

         // Add Settings for default color
        $wp_customize->add_setting( 
            'vile_nav_hover_color', [
                'default' => 'blue',
            ]
        );
     
     
     
        // Add Controls
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vile_accent_color', [
            'label' => __('Nav Color', 'vile'),
            'section' => 'sec_nav_color',
            'settings' => 'vile_accent_color'
     
            ])
        );

        // Add Controls
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vile_nav_hover_color', [
            'label' => __('Nav Hover Color', 'vile'),
            'section' => 'sec_nav_color',
            'settings' => 'vile_nav_hover_color'
     
            ])
        );
     
    }
    add_action( 'customize_register', 'vilecustomizable_customizer_navColor' );


    //add the above theme color to elements
    function vilecustomizable_theme_option_css(){
 
        $accent_color = get_theme_mod('vile_accent_color');
        $hover_color = get_theme_mod('vile_nav_hover_color');
     
        if(!empty($accent_color)):
         
        ?>
        <style type="text/css" id="vilecustomizable-theme-option-css">
             
            .navbar-collapse .navbar-nav .menu-item a{
                color: <?php echo $accent_color; ?>
            } 

            .navbar-collapse .navbar-nav .menu-item a:hover{
                color: <?php echo $hover_color; ?>
            }
         
        </style>    
     
        <?php
     
        endif;    
    }
    add_action( 'wp_head', 'vilecustomizable_theme_option_css' );



    /**
     * GRADIENT SECTION
     */

    //gradient color picker
    function vilecustomizable_customizer_gradientColor(\WP_Customize_Manager $wp_customize){
      
        $wp_customize->add_section( 
            'sec_gradient_color', [
                'title' => __('Gradient Color', 'vile'),
                'description' => 'Set gradient color',
                'panel' => 'panel_frontpage'             
            ]
        );
     
        // Add Settings 
        $wp_customize->add_setting( 
            'gradient_start_color', [
                'default' => '#2937f0',
            ]
        );

        // Add Settings 
        $wp_customize->add_setting( 
            'gradient_end_color', [
                'default' => '#9f1ae2',
            ]
        );
     
     
        // Add Controls
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gradient_start_color', [
            'label' => __('Gradient Start Color', 'vile'),
            'section' => 'sec_gradient_color',
            'settings' => 'gradient_start_color',
     
            ])
        );

        // Add Controls
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gradient_end_color', [
            'label' => __('Gradient End Color', 'vile'),
            'section' => 'sec_gradient_color',
            'settings' => 'gradient_end_color',
     
            ])
        );

        //quick lookup / change
        $wp_customize->selective_refresh->add_partial(
            'gradient_start_color',
            [
                'selector' => '.main-gradient',
            ]
        );
     
    }
    add_action( 'customize_register', 'vilecustomizable_customizer_gradientColor' );


    //add the above gradient color to elements
    function vilecustomizable_gradient_option_css(){
 
        $start_color = get_theme_mod('gradient_start_color');
        $end_color = get_theme_mod('gradient_end_color');
     
        if(!empty($start_color) && !empty($end_color) ):
         
        ?>
        <style type="text/css" id="vilecustomizable-theme-option-css">
             
            .features-device-mockup .circle .gradient-start-color {
                stop-color: <?php echo $start_color; ?>
            }

            .features-device-mockup .circle .gradient-end-color {
                stop-color: <?php echo $end_color; ?>
            }

            .masthead .masthead-device-mockup .circle .gradient-start-color {
                stop-color: <?php echo $start_color; ?>
            }

            .masthead .masthead-device-mockup .circle .gradient-end-color {
                stop-color: <?php echo $end_color; ?>
            }

            .bg-gradient-primary-to-secondary {
                background: <?php echo "linear-gradient(45deg, ".$start_color.", ".$end_color.") !important;" ?>
            }
         
        </style>    
     
        <?php
     
        endif;    
    }
    add_action( 'wp_head', 'vilecustomizable_gradient_option_css' );



    /**
     * MAIN SECTION
     */

    //main section settings
    function main_section( \WP_Customize_Manager $wp_customize ){
        
        $wp_customize->add_section(
            'sec_main', [
                'title' => __('Main Section', 'vile'),
                'description' => 'Main app heading section',
                'panel' => 'panel_frontpage'
            ]
        );

        //set section visibility
        $wp_customize->add_setting('set_main_visibility');

        $wp_customize->add_control(
            'set_main_visibility', 
            [
                'label' => __('Hide Section', 'vile'),
                'section' => 'sec_main',
                'type' => 'checkbox',
            ]
        );

        //set link to open in new tab
        $wp_customize->add_setting('set_link_target');

        $wp_customize->add_control(
            'set_link_target', 
            [
                'label' => __('Links should open in a new tab', 'vile'),
                'section' => 'sec_main',
                'type' => 'checkbox',
            ]
        );

        //set image position
        $wp_customize->add_setting('set_main_img_pos');

        $wp_customize->add_control(
            'set_main_img_pos', 
            [
                'label' => __('Set image position', 'vile'),
                'section' => 'sec_main',
                'type' => 'radio',
                'choices' => [
                    '2' => __( 'Right' ),
                    '4' => __( 'Left' ),
                ],
            ]
        );

        //main app title
        $wp_customize->add_setting(
            'set_main_title', [
                'type' => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            ]
        );

        $wp_customize->add_control(
            'set_main_title', [
                'label' => __('App title', 'vile'),
                'description' => 'Enter main app title',
                'section' => 'sec_main',
                'type' => 'text',
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'set_main_title',
            [
                'selector' => '.main-title',
            ]
        );

        //title description
        $wp_customize->add_setting(
            'set_main_desc', [
                'type' => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'wp_filter_nohtml_kses'
            ]
        );

        $wp_customize->add_control(
            'set_main_desc', [
                'label' => __('App Description', 'vile'),
                'description' => 'Enter main app description',
                'section' => 'sec_main',
                'type' => 'textarea',
            ]
        );

        $wp_customize->selective_refresh->add_partial('set_main_desc',['selector' => '.main-desc']);

        

        //download button 1
        $wp_customize->add_setting('set_dwnld_btn_1');

        $wp_customize->add_control( 
            new \WP_Customize_Image_Control(
                $wp_customize,'set_dwnld_btn_1', 
                [
                    'label' => 'Donload app Button 1',
                    'section' => 'sec_main',
                ]
            ) 
        );


        //download button 1 link
        $wp_customize->add_setting('set_dwnld_btn_1_link', 
            [
                'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
            ]
        );

        $wp_customize->add_control( 
            'set_dwnld_btn_1_link', 
            [
                'label' => __('Download app Button 1 link', 'vile'),
                'type' => 'url',
                'section' => 'sec_main',
            ]
        );

        //add pen icon that takes you to the specific field
        $wp_customize->selective_refresh->add_partial('set_dwnld_btn_1_link',['selector' => '.main-dwnld-1']);

        //download button 2
        $wp_customize->add_setting('set_dwnld_btn_2', 
            [
                'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
            ]
        );

        $wp_customize->add_control( 
            new \WP_Customize_Image_Control(
                $wp_customize,'set_dwnld_btn_2', 
                [
                    'label' => 'Donload app Button 2',
                    'section' => 'sec_main',
                ]
            ) 
        );

        //add quick lookup/change
        $wp_customize->selective_refresh->add_partial('set_dwnld_btn_2_link',['selector' => '.main-dwnld-2']);

        //download button 1 link
        $wp_customize->add_setting('set_dwnld_btn_2_link');

        $wp_customize->add_control( 
            'set_dwnld_btn_2_link', 
            [
                'label' => __('Download app Button 2 link', 'vile'),
                'type' => 'url',
                'section' => 'sec_main',
            ]
        );

        //app demo video
        $wp_customize->add_setting(
            'set_app_demo_vid',
            [
            'type' => 'theme_mod',
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Media_Control(
                $wp_customize,
                'set_app_demo_vid',
                [
                    'label' => __('App demo video', 'vile'),
                    'section' => 'sec_main',
                    'mime_type' => 'video',
                    // Required. Can be image, audio, video, application, text
                    'button_labels' => [
                        // Optional
                        'select' => __('Select File'),
                        'change' => __('Change File'),
                        'default' => __('Default'),
                        'remove' => __('Remove'),
                        'placeholder' => __('No file selected'),
                        'frame_title' => __('Select File'),
                        'frame_button' => __('Choose File'),
                    ]
                ]
            )
        );

        $wp_customize->selective_refresh->add_partial('set_app_demo_vid',['selector' => '.main-app-demo']);


        //phone border
        $wp_customize->add_setting('set_phone_border');

        $wp_customize->add_control( 
            new \WP_Customize_Image_Control(
                $wp_customize,'set_phone_border', 
                [
                    'label' => __('Phone Border', 'vile'),
                    'section' => 'sec_main',
                ]
            ) 
        );

        $wp_customize->selective_refresh->add_partial('set_phone_border',['selector' => '.main-phone-border']);

    }
    add_action('customize_register', 'main_section');



    /**
     * QUOTE / TESTIMONIAL SECTION
     */

    function testimonial_section( \WP_Customize_Manager $wp_customize ){
        
        $wp_customize->add_section(
            'sec_testimonial', [
                'title' => __('Testimonial Section', 'vile'),
                'description' => __('Testimonial Section', 'vile'),
                'panel' => 'panel_frontpage'
            ]
        );

        //set testimonial
        $wp_customize->add_setting('set_testimonial_title');

        $wp_customize->add_control(
            'set_testimonial_title', [
                'label' => __('Testimonial', 'vile'),
                'description' => __('Please type your testimonial here', 'vile'),
                'section' => 'sec_testimonial',
                'type' => 'textarea',
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'set_testimonial_title',
            [
                'selector' => '.testimonial-title',
            ]
        );


        //set testimonial by
        $wp_customize->add_setting('set_testimonial_by');

        $wp_customize->add_control( 
            new \WP_Customize_Image_Control(
                $wp_customize,'set_testimonial_by', 
                [
                    'label' => 'Choose user/company image',
                    'section' => 'sec_testimonial',
                ]
            ) 
        );

        $wp_customize->selective_refresh->add_partial(
            'set_testimonial_by',
            [
                'selector' => '.testimonial-img',
            ]
        );

        //testimonial repeater
        // $wp_customize->add_setting( 'customizer_repeater_testimonial');

        // $wp_customize->add_control( 
        //     new Customizer_Repeater( $wp_customize, 'customizer_repeater_testimonial', 
        //         [
        //             'label'   => 'Add New feature',
        //             'section' => 'sec_testimonial',
        //             'customizer_repeater_title_control' => true,
        //             'customizer_repeater_image_control' => true,
        //             'customizer_repeater_icon_control' => true,
        //         ] 
        //     ) 
        // );
       

    }
    add_action('customize_register', 'testimonial_section');



    /**
     * FEATURES SECTION
     */

    function fetures_section( \WP_Customize_Manager $wp_customize ){
        
        $wp_customize->add_section(
            'sec_features', [
                'title' => __('App Features Section', 'vile'),
                'description' => __('showcases features along with icons and description', 'vile'),
                'panel' => 'panel_frontpage'
            ]
        );

        //features repeater
        $wp_customize->add_setting( 'customizer_repeater_feature');

        $wp_customize->add_control( 
            new Customizer_Repeater( $wp_customize, 'customizer_repeater_feature', 
                [
                    'label'   => 'Add New feature',
                    'section' => 'sec_features',
                    'customizer_repeater_title_control' => true,
                    'customizer_repeater_subtitle_control' => true,
                    'customizer_repeater_image_control' => true,
                    'customizer_repeater_icon_control' => true,
                ] 
            ) 
        );

    }
    add_action('customize_register', 'fetures_section');



    /**
     * INFORMATION SECTION
     */

    function info_section( \WP_Customize_Manager $wp_customize ){
        
        $wp_customize->add_section(
            'sec_info', [
                'title' => __('Information Section', 'vile'),
                'description' => 'Displays information about app',
                'panel' => 'panel_frontpage'
            ]
        );


        //set section visibility
        $wp_customize->add_setting('set_info_visibility');

        $wp_customize->add_control(
            'set_info_visibility', 
            [
                'label' => __('Hide Section', 'vile'),
                'section' => 'sec_info',
                'type' => 'checkbox',
            ]
        );

        //set image position
        $wp_customize->add_setting('set_info_img_pos');

        $wp_customize->add_control(
            'set_info_img_pos', 
            [
                'label' => __('Set image position', 'vile'),
                'section' => 'sec_info',
                'type' => 'radio',
                'choices' => [
                    '2' => __( 'Right' ),
                    '4' => __( 'Left' ),
                ],
            ]
        );

        // app info title
        $wp_customize->add_setting(
            'set_info_title', [
                'type' => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            ]
        );

        $wp_customize->add_control(
            'set_info_title', [
                'label' => __('App title', 'vile'),
                'description' => __('Enter info title', 'vile'),
                'section' => 'sec_info',
                'type' => 'text',
            ]
        );

        //info description
        $wp_customize->add_setting(
            'set_info_desc', [
                'type' => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            ]
        );

        $wp_customize->add_control(
            'set_info_desc', [
                'label' => __('App Description', 'vile'),
                'description' => 'Enter info description',
                'section' => 'sec_info',
                'type' => 'textarea',
            ]
        );

        //section image
        $wp_customize->add_setting('set_info_sec_img');

        $wp_customize->add_control(
            new \WP_Customize_Image_Control(
                $wp_customize,'set_info_sec_img', 
                [
                    'label' => __('Section Image', 'vile'),
                    'section' => 'sec_info',
                ]
            ) 
        );
    }
    add_action('customize_register', 'info_section');


    /**
     * DESKTOP DOWNLOAD SECTION
     */

    function desktop_dwnld_section( \WP_Customize_Manager $wp_customize ){
        
        $wp_customize->add_section(
            'sec_desktop_dwnld', 
            [
                'title' => __('Desktop Download Section', 'vile'),
                'description' => __('This section will house the text and download link for desktop download', 'vile'),
                'panel' => 'panel_frontpage'
            ]
        );

        //set title
        $wp_customize->add_setting(
            'set_desktop_dwnld_title', 
            [
                'sanitize_callback' => 'wp_filter_nohtml_kses'
            ]
        );

        $wp_customize->add_control(
            'set_desktop_dwnld_title', 
            [
                'label' => __('Title', 'vile'),
                'section' => 'sec_desktop_dwnld',
                'type' => 'textarea',
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'set_desktop_dwnld_title',
            [
                'selector' => '.desktop-dwn-title',
            ]
        );

        //set title position
        $wp_customize->add_setting('set_desk_title_pos');

        $wp_customize->add_control(
            'set_desk_title_pos', 
            [
                'label' => __('Set title position', 'vile'),
                'section' => 'sec_desktop_dwnld',
                'type' => 'radio',
                'choices' => [
                    'left' => __( 'Left' ),
                    'center' => __( 'Center' ),
                    'right' => __( 'Right' ),
                ],
            ]
        );

        //set the download button text
        $wp_customize->add_setting(
            'set_desktop_dwnld_text', 
            [
                'sanitize_callback' => 'sanitize_text_field' //cleans URL from all invalid characters
            ]
        );

        $wp_customize->add_control( 
            'set_desktop_dwnld_text', 
            [
                'label' => __('Button text', 'vile'),
                'section' => 'sec_desktop_dwnld',
                'type' => 'text',
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'set_desktop_dwnld_text',
            [
                'selector' => '.desktop-dwn-btn',
            ]
        );

        //set the target download link
        $wp_customize->add_setting(
            'set_desktop_dwnld_link', 
            [
                'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
            ]
        );

        $wp_customize->add_control( 
            'set_desktop_dwnld_link', 
            [
                'label' => __('Button redirect url', 'vile'),
                'section' => 'sec_desktop_dwnld',
                'type' => 'url',
            ]
        );

    }
    add_action('customize_register', 'desktop_dwnld_section');




    /**
     * QUICK DOWNLOAD LINKS SECTION
     */

    function quick_download_links_section( \WP_Customize_Manager $wp_customize ){
        
        $wp_customize->add_section(
            'sec_quick_dwnld_links', [
                'title' => __('Quick Downloads Link Section', 'vile'),
                'description' => __('Contains all the buttons for quick download', 'vile'),
                'panel' => 'panel_frontpage'
            ]
        );

        //set links to open in new tab
        $wp_customize->add_setting('set_dwnld_link_target');

        $wp_customize->add_control(
            'set_dwnld_link_target', 
            [
                'label' => __('Links should open in a new tab', 'vile'),
                'section' => 'sec_quick_dwnld_links',
                'type' => 'checkbox',
            ]
        );

        //set title
        $wp_customize->add_setting('set_quick_dwnld_links');

        $wp_customize->add_control(
            'set_quick_dwnld_links', [
                'label' => __('Title', 'vile'),
                'section' => 'sec_quick_dwnld_links',
                'type' => 'text',
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'set_quick_dwnld_links',
            [
                'selector' => '.quick-link-title',
            ]
        );

        //adds multiple button badges using repeater
        $wp_customize->add_setting( 'customizer_repeater_download_links');

        $wp_customize->add_control( 
            new Customizer_Repeater( $wp_customize, 'customizer_repeater_download_links', 
                [
                    'label'   => 'Add New Button',
                    'section' => 'sec_quick_dwnld_links',
                    'customizer_repeater_title_control' => true,
                    'customizer_repeater_image_control' => true,
                    'customizer_repeater_icon_control' => true,
                ] 
            ) 
        );
    }
    add_action('customize_register', 'quick_download_links_section');




    /**
     * COPYRIGHT SECTION
     */

    //copyright notice settings
    function copyright_section( \WP_Customize_Manager $wp_customize ){
        
        $wp_customize->add_section(
            'sec_copyright', [
                'title' => __('Copyright Section', 'vile'),
                'description' => __('Copyright Section', 'vile'),
                'panel' => 'panel_frontpage'
            ]
        );

        $wp_customize->add_setting(
            'set_copyright', [
                'type' => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field'
            ]
        );

        $wp_customize->add_control(
            'set_copyright', [
                'label' => __('Copyright', 'vile'),
                'description' => __('Please type your copyright info here', 'vile'),
                'section' => 'sec_copyright',
                'type' => 'text',
            ]
        );

        $wp_customize->selective_refresh->add_partial(
            'set_copyright',
            [
                'selector' => '.copyright-section',
            ]
        );

    }
    add_action('customize_register', 'copyright_section');


?>