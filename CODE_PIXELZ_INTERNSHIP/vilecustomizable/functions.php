<?php

	//adds dynamic title tag support
	add_theme_support('title-tag');
	//adds dynamic custom logo
	add_theme_support('custom-logo');
	//adds thumbnail pictures to blog items
	add_theme_support('post-thumbnails');

	//menus
	function vilecustomizable_menus(){
		$locations = array(
			'primary' => "Primary Navigation Menu",
			'secondary' => "Secondary Footer Menu"
		);

		register_nav_menus($locations);
	}
	//menu action
	add_action('init', 'vilecustomizable_menus');



	//enquing styles
	function vilecustomizable_register_styles(){
		$version = wp_get_theme()->get('Version');

		//enquing custom styles after bootstrap styles
		wp_enqueue_style('vilecustomizable-font-newreader', "https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap", array(), '1.0.0', 'all');
		wp_enqueue_style('vilecustomizable-font-mulish', "https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap", array(), '1.0.0', 'all');
		wp_enqueue_style('vilecustomizable-font-kanit', "https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap", array(), '1.0.0', 'all');
		wp_enqueue_style('vilecustomizable-style', get_template_directory_uri()."/assets/css/style.css", array(), $version, 'all');
		
	}
	//executing vile_register_styles()
	add_action('wp_enqueue_scripts', 'vilecustomizable_register_styles');


	//enquing scripts
	function vilecustomizable_register_scripts(){
		$version = wp_get_theme()->get('Version'); 

		//enqueueing scripts
		wp_enqueue_script('vilecustomizable-bootstrapjs', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js", array(), '5.1.3', true);
		wp_enqueue_script('vilecustomizable-customjs', get_template_directory_uri()."/assets/js/main.js", array(), $version, true);
		wp_enqueue_script('vilecustomizable-sbforms', "https://cdn.startbootstrap.com/sb-forms-latest.js", array(), '0.4.1', true);
	}
	//executing vilecustomizable_register_scripts()
	add_action('wp_enqueue_scripts', 'vilecustomizable_register_scripts');

	//function to send mail
	function sendMail(){
		// the message
		$msg = "First line of text\nSecond line of text";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);

		// send email
		mail("saugatapk@gmail.com","My subject",$msg);

		// wp_mail( 'saugatpak@gmail.com', 'Testing', 'test email');
	}


	require get_template_directory() . '/customizer-repeater/functions.php';
	require_once get_template_directory().'/inc/customizer.php';



	
	/* KIRKI PLUGIN */

	require_once(dirname(__FILE__).'/assets/kirki/kirki.php' );

	if (class_exists('Kirki')) {

		//testimony repeater
		new \Kirki\Field\Repeater(
			[
				'settings' => 'testimonial_repeater_setting',
				'label'    => esc_html__( 'Repeater Control', 'kirki' ),
				'section'  => 'sec_testimonial',
				'fields'   => [
					'testimonial_text'   => [
						'type'        => 'textarea',
						'label'       => esc_html__( 'Testimony', 'kirki' ),
						'description' => esc_html__( 'Enter the testimony', 'kirki' ),
						'default'     => 'An intuitive solution to a common problem that we all face, wrapped up in a single app!',
					],
					'testimonial_image'    => [
						'type'        => 'image',
						'label'       => esc_html__( 'Testimonial image', 'kirki' ),
						'description' => esc_html__( 'Image of the user/org giving the testimony', 'kirki' ),
					],
					'testimonial_bg_color' => [
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'kirki' ),
						'description' => esc_html__( 'The background color for this particular testimony', 'kirki' ),
					],
				],
			]
		);


		//information repeater
		new \Kirki\Field\Repeater(
			[
				'settings' => 'information_repeater_setting',
				'label'    => esc_html__( 'Repeater Control', 'kirki' ),
				'section'  => 'sec_info',
				'fields'   => [
					'information_title'   => [
						'type'        => 'text',
						'label'       => esc_html__( 'Information Title', 'kirki' ),
						'description' => esc_html__( 'Enter the the title of the piece of information', 'kirki' ),
						'default'     => 'Cool feature',
					],
					'information_desc' => [
						'type'        => 'textarea',
						'label'       => esc_html__( 'Information description', 'kirki' ),
						'description' => esc_html__( 'Enter the desc of the information', 'kirki' ),
						'default'     => 'This section is perfect for featuring some information about your application, why it was built, the problem it solves, or anything else! worry about writing too much.',
					],
					'information_image'    => [
						'type'        => 'image',
						'label'       => esc_html__( 'Information image', 'kirki' ),
						'description' => esc_html__( 'Image related to the information provided', 'kirki' ),
					],
					'information_image_pos'    => [
						'type'    => 'checkbox',
						'label'   => esc_html__( 'Display image on the left side', 'kirki' ),
						'default' => false,
					],
				],
			]
		);
		
	}
	