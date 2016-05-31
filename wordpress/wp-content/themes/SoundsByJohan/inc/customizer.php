<?php
/**
 * SoundsByJohan Theme Customizer.
 *
 * @package SoundsByJohan
 */


/**
 * This function adds some styles to the WordPress Customizer
 */
function my_customizer_styles() { ?>
	<style>
		#customize-theme-controls .accordion-section-title {
			margin-top:20px;
		}
		.customize-help-toggle.dashicons.dashicons-editor-help {
			display:none;
		}
	</style>
	<?php

}
add_action( 'customize_controls_print_styles', 'my_customizer_styles', 999 );



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function SoundsByJohan_customize_register( $wp_customize ) {


	// Load custom controls
	require get_template_directory() . '/inc/customizer-controls.php';

	// Remove default sections
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');

	// Custom WP default control & settings.
/*	$wp_customize->get_section( 'title_tagline' )->title = esc_html__('Site Title, Tagline & Logo', 'SoundsByJohan');
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';*/

	/**
	 * Hook to add other customize
	 */
	do_action( 'SoundsByJohan_customize_before_register', $wp_customize );


	$pages  =  get_pages();
	$option_pages = array();
	$option_pages[0] = __( 'Select page', 'SoundsByJohan' );
	foreach( $pages as $p ){
		$option_pages[ $p->ID ] = $p->post_title;
	}

	$users = get_users( array(
		'orderby'      => 'display_name',
		'order'        => 'ASC',
		'number'       => '',
	) );

	$option_users[0] = __( 'Select member', 'SoundsByJohan' );
	foreach( $users as $user ){
		$option_users[ $user->ID ] = $user->display_name;
	}

	/*------------------------------------------------------------------------*/
    /*  Site Identity
    /*------------------------------------------------------------------------*/

    /*	$wp_customize->add_setting( 'SoundsByJohan_site_image_logo',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_file_url',
				'default'           => ''
			)
		);
    	$wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'SoundsByJohan_site_image_logo',
				array(
					'label' 		=> esc_html__('Site Image Logo', 'SoundsByJohan'),
					'section' 		=> 'title_tagline',
					'description'   => esc_html__('Your site image logo', 'SoundsByJohan'),
				)
			)
		);*/

	/*------------------------------------------------------------------------*/
    /*  Site Options
    /*------------------------------------------------------------------------*/
/*		$wp_customize->add_panel( 'SoundsByJohan_options',
			array(
				'priority'       => 22,
			    'capability'     => 'edit_theme_options',
			    'theme_supports' => '',
			    'title'          => esc_html__( 'Theme Options', 'SoundsByJohan' ),
			    'description'    => '',
			)
		);*/

		/* Global Settings
		----------------------------------------------------------------------*/
/*		$wp_customize->add_section( 'SoundsByJohan_global_settings' ,
			array(
				'priority'    => 3,
				'title'       => esc_html__( 'Global', 'SoundsByJohan' ),
				'description' => '',
				'panel'       => 'SoundsByJohan_options',
			)
		);*/


			// Disable Sticky Header
/*			$wp_customize->add_setting( 'SoundsByJohan_sticky_header_disable',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_sticky_header_disable',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Disable Sticky Header?', 'SoundsByJohan'),
					'section'     => 'SoundsByJohan_global_settings',
					'description' => esc_html__('Check this box to disable sticky header when scroll.', 'SoundsByJohan')
				)
			);*/

			/*// Disable Animation
			$wp_customize->add_setting( 'SoundsByJohan_animation_disable',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_animation_disable',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Disable animation effect?', 'SoundsByJohan'),
					'section'     => 'SoundsByJohan_global_settings',
					'description' => esc_html__('Check this box to disable all element animation when scroll.', 'SoundsByJohan')
				)
			);

			// Disable Animation
			$wp_customize->add_setting( 'SoundsByJohan_btt_disable',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_btt_disable',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide footer back to top?', 'SoundsByJohan'),
					'section'     => 'SoundsByJohan_global_settings',
					'description' => esc_html__('Check this box to hide footer back to top button.', 'SoundsByJohan')
				)
			);*/

		/* Colors
		----------------------------------------------------------------------*/
		/*$wp_customize->add_section( 'SoundsByJohan_colors_settings' ,
			array(
				'priority'    => 4,
				'title'       => esc_html__( 'Site Colors', 'SoundsByJohan' ),
				'description' => '',
				'panel'       => 'SoundsByJohan_options',
			)
		);
			// Primary Color
			$wp_customize->add_setting( 'SoundsByJohan_primary_color', array('sanitize_callback' => 'sanitize_hex_color_no_hash', 'sanitize_js_callback' => 'maybe_hash_hex_color', 'default' => '#03c4eb' ) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'SoundsByJohan_primary_color',
				array(
					'label'       => esc_html__( 'Primary Color', 'SoundsByJohan' ),
					'section'     => 'SoundsByJohan_colors_settings',
					'description' => '',
					'priority'    => 1
				)
			));*/


		/* Header
		----------------------------------------------------------------------*/
		/*$wp_customize->add_section( 'SoundsByJohan_header_settings' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'Header', 'SoundsByJohan' ),
				'description' => '',
				'panel'       => 'SoundsByJohan_options',
			)
		);

		// Header BG Color
		$wp_customize->add_setting( 'SoundsByJohan_header_bg_color',
			array(
				'sanitize_callback' => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default' => ''
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'SoundsByJohan_header_bg_color',
			array(
				'label'       => esc_html__( 'Background Color', 'SoundsByJohan' ),
				'section'     => 'SoundsByJohan_header_settings',
				'description' => '',
			)
		));


		// Site Title Color
		$wp_customize->add_setting( 'SoundsByJohan_logo_text_color',
			array(
				'sanitize_callback' => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default' => ''
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'SoundsByJohan_logo_text_color',
			array(
				'label'       => esc_html__( 'Site Title Color', 'SoundsByJohan' ),
				'section'     => 'SoundsByJohan_header_settings',
				'description' => esc_html__( 'Only set if you don\'t use an image logo.', 'SoundsByJohan' ),
			)
		));

		// Header Menu Color
		$wp_customize->add_setting( 'SoundsByJohan_menu_color',
			array(
				'sanitize_callback' => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default' => ''
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'SoundsByJohan_menu_color',
			array(
				'label'       => esc_html__( 'Menu Link Color', 'SoundsByJohan' ),
				'section'     => 'SoundsByJohan_header_settings',
				'description' => '',
			)
		));

		// Header Menu Hover Color
		$wp_customize->add_setting( 'SoundsByJohan_menu_hover_color',
			array(
				'sanitize_callback' => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default' => ''
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'SoundsByJohan_menu_hover_color',
			array(
				'label'       => esc_html__( 'Menu Link Hover/Active Color', 'SoundsByJohan' ),
				'section'     => 'SoundsByJohan_header_settings',
				'description' => '',

			)
		));

		// Header Menu Hover BG Color
		$wp_customize->add_setting( 'SoundsByJohan_menu_hover_bg_color',
			array(
				'sanitize_callback' => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default' => ''
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'SoundsByJohan_menu_hover_bg_color',
			array(
				'label'       => esc_html__( 'Menu Link Hover/Active BG Color', 'SoundsByJohan' ),
				'section'     => 'SoundsByJohan_header_settings',
				'description' => '',
			)
		));

		// Reponsive Mobie button color
		$wp_customize->add_setting( 'SoundsByJohan_menu_toggle_button_color',
			array(
				'sanitize_callback' => 'sanitize_hex_color_no_hash',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'default' => ''
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'SoundsByJohan_menu_toggle_button_color',
			array(
				'label'       => esc_html__( 'Responsive Menu Button Color', 'SoundsByJohan' ),
				'section'     => 'SoundsByJohan_header_settings',
				'description' => '',
			)
		));

		// Vertical align menu
		$wp_customize->add_setting( 'SoundsByJohan_vertical_align_menu',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_vertical_align_menu',
			array(
				'type'        => 'checkbox',
				'label'       => esc_html__('Center vertical align for menu', 'SoundsByJohan'),
				'section'     => 'SoundsByJohan_header_settings',
				'description' => esc_html__('If you use logo and your logo is too tall, check this box to auto vertical align menu.', 'SoundsByJohan')
			)
		);


		// Header Transparent
		$wp_customize->add_setting( 'SoundsByJohan_header_transparent',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
				'default'           => '',
				'active_callback'   => 'SoundsByJohan_showon_frontpage'
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_header_transparent',
			array(
				'type'        => 'checkbox',
				'label'       => esc_html__('Header Transparent', 'SoundsByJohan'),
				'section'     => 'SoundsByJohan_header_settings',
				'description' => esc_html__('Apply for front page template only.', 'SoundsByJohan')
			)
		);*/


		/* Social Settings
		----------------------------------------------------------------------*/
		/*$wp_customize->add_section( 'SoundsByJohan_social' ,
			array(
				'priority'    => 6,
				'title'       => esc_html__( 'Social Profiles', 'SoundsByJohan' ),
				'description' => '',
				'panel'       => 'SoundsByJohan_options',
			)
		);

			// Disable Social
			$wp_customize->add_setting( 'SoundsByJohan_social_disable',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
					'default'           => '1',
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_social_disable',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide Footer Social?', 'SoundsByJohan'),
					'section'     => 'SoundsByJohan_social',
					'description' => esc_html__('Check this box to hide footer social section.', 'SoundsByJohan')
				)
			);

			$wp_customize->add_setting( 'SoundsByJohan_social_footer_guide',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_text'
				)
			);
			$wp_customize->add_control( new SoundsByJohan_Misc_Control( $wp_customize, 'SoundsByJohan_social_footer_guide',
				array(
					'section'     => 'SoundsByJohan_social',
					'type'        => 'custom_message',
					'description' => esc_html__( 'These social profiles setting below will display at the footer of your site.', 'SoundsByJohan' )
				)
			));

			// Footer Social Title
			$wp_customize->add_setting( 'SoundsByJohan_social_footer_title',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => esc_html__( 'Keep Updated', 'SoundsByJohan' ),
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_social_footer_title',
				array(
					'label'       => esc_html__('Social Footer Title', 'SoundsByJohan'),
					'section'     => 'SoundsByJohan_social',
					'description' => ''
				)
			);

           // Socials
            $wp_customize->add_setting(
                'SoundsByJohan_social_profiles',
                array(
                    //'default' => '',
                    'sanitize_callback' => 'SoundsByJohan_sanitize_repeatable_data_field',
                    'transport' => 'refresh', // refresh or postMessage
            ) );

            $wp_customize->add_control(
                new SoundsByJohan_Customize_Repeatable_Control(
                    $wp_customize,
                    'SoundsByJohan_social_profiles',
                    array(
                        'label' 		=> esc_html__('Socials', 'SoundsByJohan'),
                        'description'   => '',
                        'section'       => 'SoundsByJohan_social',
                        'live_title_id' => 'network', // apply for unput text and textarea only
                        'title_format'  => esc_html__('[live_title]', 'SoundsByJohan'), // [live_title]
                        'max_item'      => 5, // Maximum item can add
                        'limited_msg' 	=> wp_kses_post( 'Upgrade to <a target="_blank" href="https://www.famethemes.com/themes/SoundsByJohan/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=SoundsByJohan_customizer#get-started">SoundsByJohan Plus</a> to be able to add more items and unlock other premium features!', 'SoundsByJohan' ),
                        'fields'    => array(
                            'network'  => array(
                                'title' => esc_html__('Social network', 'SoundsByJohan'),
                                'type'  =>'text',
                            ),
                            'icon'  => array(
                                'title' => esc_html__('Icon', 'SoundsByJohan'),
                                'desc' => __('Paste your <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">Font Awesome</a> icon class name here.', 'SoundsByJohan'),
                                'type'  =>'text',
                            ),
                            'link'  => array(
                                'title' => esc_html__('URL', 'SoundsByJohan'),
                                'type'  =>'text',
                            ),
                        ),

                    )
                )
            );*/

		/* workletter Settings
		----------------------------------------------------------------------*/
		/*$wp_customize->add_section( 'SoundsByJohan_workletter' ,
			array(
				'priority'    => 9,
				'title'       => esc_html__( 'workletter', 'SoundsByJohan' ),
				'description' => '',
				'panel'       => 'SoundsByJohan_options',
			)
		);
			// Disable workletter
			$wp_customize->add_setting( 'SoundsByJohan_workletter_disable',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
					'default'           => '1',
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_workletter_disable',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide Footer workletter?', 'SoundsByJohan'),
					'section'     => 'SoundsByJohan_workletter',
					'description' => esc_html__('Check this box to hide footer workletter form.', 'SoundsByJohan')
				)
			);

			// Mailchimp Form Title
			$wp_customize->add_setting( 'SoundsByJohan_workletter_title',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => esc_html__( 'Join our workletter', 'SoundsByJohan' ),
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_workletter_title',
				array(
					'label'       => esc_html__('workletter Form Title', 'SoundsByJohan'),
					'section'     => 'SoundsByJohan_workletter',
					'description' => ''
				)
			);

			// Mailchimp action url
			$wp_customize->add_setting( 'SoundsByJohan_workletter_mailchimp',
				array(
					'sanitize_callback' => 'esc_url',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_workletter_mailchimp',
				array(
					'label'       => esc_html__('MailChimp Action URL', 'SoundsByJohan'),
					'section'     => 'SoundsByJohan_workletter',
					'description' => 'The workletter form use MailChimp, please follow <a target="_blank" href="http://goo.gl/uRVIst">this guide</a> to know how to get MailChimp Action URL. Example <i>//famethemes.us8.list-manage.com/subscribe/post?u=521c400d049a59a4b9c0550c2&amp;id=83187e0006</i>'
				)
			);*/

	/*------------------------------------------------------------------------*/
    /*  Section: Order & Styling
    /*------------------------------------------------------------------------*/
	/*$wp_customize->add_section( 'SoundsByJohan_order_styling' ,
		array(
			'priority'        => 129,
			'title'           => esc_html__( 'Section Order & Styling', 'SoundsByJohan' ),
			'description'     => '',
			'active_callback' => 'SoundsByJohan_showon_frontpage'
		)
	);
		// Plus message
		$wp_customize->add_setting( 'SoundsByJohan_order_styling_message',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text',
			)
		);
		$wp_customize->add_control( new SoundsByJohan_Misc_Control( $wp_customize, 'SoundsByJohan_order_styling_message',
			array(
				'section'     => 'SoundsByJohan_work_settings',
				'type'        => 'custom_message',
				'section'     => 'SoundsByJohan_order_styling',
				'description' => wp_kses_post( ' Check out <a target="_blank" href="https://www.famethemes.com/themes/SoundsByJohan/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=SoundsByJohan_customizer#get-started">SoundsByJohan Plus version</a> for full control over <strong>section order</strong> and <strong>section styling</strong>! ', 'SoundsByJohan' )
			)
		));*/


	/*------------------------------------------------------------------------*/
    /*  Section: Hero
    /*------------------------------------------------------------------------*/

	/*$wp_customize->add_panel( 'SoundsByJohan_hero_panel' ,
		array(
			'priority'        => 130,
			'title'           => esc_html__( 'Section: Hero', 'SoundsByJohan' ),
			'description'     => '',
			'active_callback' => 'SoundsByJohan_showon_frontpage'
		)
	);

		// Hero settings
		$wp_customize->add_section( 'SoundsByJohan_hero_settings' ,
			array(
				'priority'    => 3,
				'title'       => esc_html__( 'Hero Settings', 'SoundsByJohan' ),
				'description' => '',
				'panel'       => 'SoundsByJohan_hero_panel',
			)
		);

			// Show section
			$wp_customize->add_setting( 'SoundsByJohan_hero_disable',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_hero_disable',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Hide this section?', 'SoundsByJohan'),
					'section'     => 'SoundsByJohan_hero_settings',
					'description' => esc_html__('Check this box to hide this section.', 'SoundsByJohan'),
				)
			);
			// Section ID
			$wp_customize->add_setting( 'SoundsByJohan_hero_id',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_text',
					'default'           => esc_html__('hero', 'SoundsByJohan'),
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_hero_id',
				array(
					'label' 		=> esc_html__('Section ID:', 'SoundsByJohan'),
					'section' 		=> 'SoundsByJohan_hero_settings',
					'description'   => 'The section id, we will use this for link anchor.'
				)
			);

			// Show hero full screen
			$wp_customize->add_setting( 'SoundsByJohan_hero_fullscreen',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
					'default'           => '',
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_hero_fullscreen',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Make hero section full screen', 'SoundsByJohan'),
					'section'     => 'SoundsByJohan_hero_settings',
					'description' => esc_html__('Check this box to make hero section full screen.', 'SoundsByJohan'),
				)
			);

			// Hero content padding top
			$wp_customize->add_setting( 'SoundsByJohan_hero_pdtop',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_text',
					'default'           => esc_html__('10', 'SoundsByJohan'),
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_hero_pdtop',
				array(
					'label'           => esc_html__('Padding Top:', 'SoundsByJohan'),
					'section'         => 'SoundsByJohan_hero_settings',
					'description'     => 'The hero content padding top in percent (%).',
					'active_callback' => 'SoundsByJohan_hero_fullscreen_callback'
				)
			);

			// Hero content padding bottom
			$wp_customize->add_setting( 'SoundsByJohan_hero_pdbotom',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_text',
					'default'           => esc_html__('10', 'SoundsByJohan'),
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_hero_pdbotom',
				array(
					'label'           => esc_html__('Padding Bottom:', 'SoundsByJohan'),
					'section'         => 'SoundsByJohan_hero_settings',
					'description'     => 'The hero content padding bottom in percent (%).',
					'active_callback' => 'SoundsByJohan_hero_fullscreen_callback'
				)
			);

		$wp_customize->add_section( 'SoundsByJohan_hero_images' ,
			array(
				'priority'    => 6,
				'title'       => esc_html__( 'Hero Background Media', 'SoundsByJohan' ),
				'description' => '',
				'panel'       => 'SoundsByJohan_hero_panel',
			)
		);


			$wp_customize->add_setting(
				'SoundsByJohan_hero_images',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_repeatable_data_field',
					'transport' => 'refresh', // refresh or postMessage
				) );

			$wp_customize->add_control(
				new SoundsByJohan_Customize_Repeatable_Control(
					$wp_customize,
					'SoundsByJohan_hero_images',
					array(
						'label'     => esc_html__('Background Images', 'SoundsByJohan'),
						'description'   => '',
						'priority'     => 40,
						'section'       => 'SoundsByJohan_hero_images',
						'title_format'  => esc_html__( 'Background', 'SoundsByJohan'), // [live_title]
						'max_item'      => 2, // Maximum item can add

						'fields'    => array(
							'image' => array(
								'title' => esc_html__('Background Image', 'SoundsByJohan'),
								'type'  =>'media',
								'default' => array(
									'url' => get_template_directory_uri().'/assets/images/hero5.jpg',
									'id' => ''
								)
							),

						),

					)
				)
			);

			// Overlay color
			$wp_customize->add_setting( 'SoundsByJohan_hero_overlay_color',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_color_alpha',
					'default'           => 'rgba(0,0,0,.3)',
					'transport' => 'refresh', // refresh or postMessage
				)
			);
			$wp_customize->add_control( new SoundsByJohan_Alpha_Color_Control(
					$wp_customize,
					'SoundsByJohan_hero_overlay_color',
					array(
						'label' 		=> esc_html__('Background Overlay Color', 'SoundsByJohan'),
						'section' 		=> 'SoundsByJohan_hero_images',
						'priority'      => 130,
					)
				)
			);


            // Parallax
            $wp_customize->add_setting( 'SoundsByJohan_hero_parallax',
                array(
                    'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
                    'default'           => 0,
                    'transport' => 'refresh', // refresh or postMessage
                )
            );
            $wp_customize->add_control(
                'SoundsByJohan_hero_parallax',
                array(
                    'label' 		=> esc_html__('Enable parallax effect (apply for first BG image only)', 'SoundsByJohan'),
                    'section' 		=> 'SoundsByJohan_hero_images',
                    'type' 		   => 'checkbox',
                    'priority'      => 50,
                    'description' => '',
                )
            );

			// Overlay Opacity
			/*
			$wp_customize->add_setting( 'SoundsByJohan_hero_overlay_opacity',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => '0.3',
					'transport' => 'refresh', // refresh or postMessage
				)
			);
			$wp_customize->add_control(
					'SoundsByJohan_hero_overlay_opacity',
					array(
						'label' 		=> esc_html__('Background Overlay Opacity', 'SoundsByJohan'),
						'section' 		=> 'SoundsByJohan_hero_images',
						'description'   => esc_html__('Enter a float number between 0.1 to 0.9', 'SoundsByJohan'),
						'priority'      => 130,
					)
			);
			*/

			/*// Background Video
			$wp_customize->add_setting( 'SoundsByJohan_hero_videobackground_upsell',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_text',
				)
			);
			$wp_customize->add_control( new SoundsByJohan_Misc_Control( $wp_customize, 'SoundsByJohan_hero_videobackground_upsell',
				array(
					'section'     => 'SoundsByJohan_hero_images',
					'type'        => 'custom_message',
					'description' => wp_kses_post( 'Want to add <strong>background video</strong> for hero section? Upgrade to <a target="_blank" href="https://www.famethemes.com/themes/SoundsByJohan/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=SoundsByJohan_customizer#get-started">SoundsByJohan Plus</a> version.', 'SoundsByJohan' ),
					'priority'    => 131,
				)
			));



		$wp_customize->add_section( 'SoundsByJohan_hero_content_layout1' ,
			array(
				'priority'    => 9,
				'title'       => esc_html__( 'Hero Content Layout', 'SoundsByJohan' ),
				'description' => '',
				'panel'       => 'SoundsByJohan_hero_panel',

			)
		);

			// Hero Layout
			$wp_customize->add_setting( 'SoundsByJohan_hero_layout',
				array(
					'sanitize_callback' => 'SoundsByJohan_sanitize_text',
					'default'           => '1',
				)
			);
			$wp_customize->add_control( 'SoundsByJohan_hero_layout',
				array(
					'label' 		=> esc_html__('Display Layout', 'SoundsByJohan'),
					'section' 		=> 'SoundsByJohan_hero_content_layout1',
					'description'   => '',
					'type'          => 'select',
					'choices'       => array(
						'1' => esc_html__('Layout 1', 'SoundsByJohan' ),
						'2' => esc_html__('Layout 2', 'SoundsByJohan' ),
					),
				)
			);
			// For Hero layout ------------------------

				// Large Text
				$wp_customize->add_setting( 'SoundsByJohan_hcl1_largetext',
					array(
						'sanitize_callback' => 'SoundsByJohan_sanitize_text',
						'mod' 				=> 'html',
						'default'           => wp_kses_post('We are <span class="js-rotating">SoundsByJohan | One Page | Responsive | Perfection</span>', 'SoundsByJohan'),
					)
				);
				$wp_customize->add_control( new SoundsByJohan_Editor_Custom_Control(
					$wp_customize,
					'SoundsByJohan_hcl1_largetext',
					array(
						'label' 		=> esc_html__('Large Text', 'SoundsByJohan'),
						'section' 		=> 'SoundsByJohan_hero_content_layout1',
						'description'   => esc_html__('Text Rotating Guide: Put your rotate texts separate by "|" into <span class="js-rotating">...</span>, go to Customizer->Site Option->Animate to control rotate animation.', 'SoundsByJohan'),
					)
				));

				// Small Text
				$wp_customize->add_setting( 'SoundsByJohan_hcl1_smalltext',
					array(
						'sanitize_callback' => 'SoundsByJohan_sanitize_text',
						'default'			=> wp_kses_post('Morbi tempus porta nunc <strong>pharetra quisque</strong> ligula imperdiet posuere<br> vitae felis proin sagittis leo ac tellus blandit sollicitudin quisque vitae placerat.', 'SoundsByJohan'),
					)
				);
				$wp_customize->add_control( new SoundsByJohan_Editor_Custom_Control(
					$wp_customize,
					'SoundsByJohan_hcl1_smalltext',
					array(
						'label' 		=> esc_html__('Small Text', 'SoundsByJohan'),
						'section' 		=> 'SoundsByJohan_hero_content_layout1',
						'mod' 				=> 'html',
						'description'   => esc_html__('You can use text rotate slider in this textarea too.', 'SoundsByJohan'),
					)
				));

				// Button #1 Text
				$wp_customize->add_setting( 'SoundsByJohan_hcl1_btn1_text',
					array(
						'sanitize_callback' => 'SoundsByJohan_sanitize_text',
						'default'           => esc_html__('About Us', 'SoundsByJohan'),
					)
				);
				$wp_customize->add_control( 'SoundsByJohan_hcl1_btn1_text',
					array(
						'label' 		=> esc_html__('Button #1 Text', 'SoundsByJohan'),
						'section' 		=> 'SoundsByJohan_hero_content_layout1'
					)
				);

				// Button #1 Link
				$wp_customize->add_setting( 'SoundsByJohan_hcl1_btn1_link',
					array(
						'sanitize_callback' => 'esc_url',
						'default'           => esc_url( home_url( '/' )).esc_html__('#about', 'SoundsByJohan'),
					)
				);
				$wp_customize->add_control( 'SoundsByJohan_hcl1_btn1_link',
					array(
						'label' 		=> esc_html__('Button #1 Link', 'SoundsByJohan'),
						'section' 		=> 'SoundsByJohan_hero_content_layout1'
					)
				);

				// Button #2 Text
				$wp_customize->add_setting( 'SoundsByJohan_hcl1_btn2_text',
					array(
						'sanitize_callback' => 'SoundsByJohan_sanitize_text',
						'default'           => esc_html__('Get Started', 'SoundsByJohan'),
					)
				);
				$wp_customize->add_control( 'SoundsByJohan_hcl1_btn2_text',
					array(
						'label' 		=> esc_html__('Button #2 Text', 'SoundsByJohan'),
						'section' 		=> 'SoundsByJohan_hero_content_layout1'
					)
				);

				// Button #2 Link
				$wp_customize->add_setting( 'SoundsByJohan_hcl1_btn2_link',
					array(
						'sanitize_callback' => 'esc_url',
						'default'           => esc_url( home_url( '/' )).esc_html__('#contact', 'SoundsByJohan'),
					)
				);
				$wp_customize->add_control( 'SoundsByJohan_hcl1_btn2_link',
					array(
						'label' 		=> esc_html__('Button #2 Link', 'SoundsByJohan'),
						'section' 		=> 'SoundsByJohan_hero_content_layout1'
					)
				);*/


				/*/* Layout 2 ---- */

/*				// Layout 22 content text
				$wp_customize->add_setting( 'SoundsByJohan_hcl2_content',
					array(
						'sanitize_callback' => 'SoundsByJohan_sanitize_text',
						'mod' 				=> 'html',
						'default'           =>  wp_kses_post( '<h1>Business Website'."\n".'Made Simple.</h1>'."\n".'We provide creative solutions to clients around the world,'."\n".'creating things that get attention and meaningful.'."\n\n".'<a class="btn btn-secondary-outline btn-lg" href="#">Get Started</a>' ),
					)
				);
				$wp_customize->add_control( new SoundsByJohan_Editor_Custom_Control(
					$wp_customize,
					'SoundsByJohan_hcl2_content',
					array(
						'label' 		=> esc_html__('Content Text', 'SoundsByJohan'),
						'section' 		=> 'SoundsByJohan_hero_content_layout1',
						'description'   => '',
					)
				));

				// Layout 2 image
				$wp_customize->add_setting( 'SoundsByJohan_hcl2_image',
					array(
						'sanitize_callback' => 'SoundsByJohan_sanitize_text',
						'mod' 				=> 'html',
						'default'           =>  get_template_directory_uri().'/assets/images/SoundsByJohan_responsive.png',
					)
				);
				$wp_customize->add_control( new WP_Customize_Image_Control(
					$wp_customize,
					'SoundsByJohan_hcl2_image',
					array(
						'label' 		=> esc_html__('Image', 'SoundsByJohan'),
						'section' 		=> 'SoundsByJohan_hero_content_layout1',
						'description'   => '',
					)
				));*/
			// END For Hero layout ------------------------*/

	/*------------------------------------------------------------------------*/
	/*  Section: Video Popup
	/*------------------------------------------------------------------------*/
	$wp_customize->add_panel( 'SoundsByJohan_intro' ,
		array(
			'priority'        => 132,
			'title'           => esc_html__( 'Section: Intro', 'SoundsByJohan' ),
			'description'     => '',
			'active_callback' => 'SoundsByJohan_showon_frontpage'
		)
	);

    $wp_customize->add_section( 'SoundsByJohan_intro_settings' ,
        array(
            'priority'    => 3,
            'title'       => esc_html__( 'Section Settings', 'SoundsByJohan' ),
            'description' => '',
            'panel'       => 'SoundsByJohan_intro',
        )
    );

    // Show Content
    $wp_customize->add_setting( 'SoundsByJohan_intro_disable',
        array(
            'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
            'default'           => '',
        )
    );
    $wp_customize->add_control( 'SoundsByJohan_intro_disable',
        array(
            'type'        => 'checkbox',
            'label'       => esc_html__('Hide this section?', 'SoundsByJohan'),
            'section'     => 'SoundsByJohan_intro_settings',
            'description' => esc_html__('Check this box to hide this section.', 'SoundsByJohan'),
        )
    );

    // Section ID
    $wp_customize->add_setting( 'SoundsByJohan_intro_id',
        array(
            'sanitize_callback' => 'SoundsByJohan_sanitize_text',
            'default'           => 'intro',
        )
    );
    $wp_customize->add_control( 'SoundsByJohan_intro_id',
        array(
            'label' 		=> esc_html__('Section ID:', 'SoundsByJohan'),
            'section' 		=> 'SoundsByJohan_intro_settings',
            'description'   => esc_html__('The section id, we will use this for link anchor.', 'SoundsByJohan' )
        )
    );

    // Title
    $wp_customize->add_setting( 'SoundsByJohan_intro_title',
        array(
            'sanitize_callback' => 'SoundsByJohan_sanitize_text',
            'default'           => '',
        )
    );

    $wp_customize->add_control( new One_Press_Textarea_Custom_Control(
        $wp_customize,
        'SoundsByJohan_intro_title',
        array(
            'label'     	=>  esc_html__('Section heading', 'SoundsByJohan'),
            'section' 		=> 'SoundsByJohan_intro_settings',
            'description'   => '',
        )
    ));

	// bodytext
	$wp_customize->add_setting( 'SoundsByJohan_intro_bodytext',
		array(
			'sanitize_callback' => 'SoundsByJohan_sanitize_text',
			'default'           => '',
		)
	);

	$wp_customize->add_control( new One_Press_Textarea_Custom_Control(
		$wp_customize,
		'SoundsByJohan_intro_bodytext',
		array(
			'label'     	=>  esc_html__('Section bodytext', 'SoundsByJohan'),
			'section' 		=> 'SoundsByJohan_intro_settings',
			'description'   => '',
		)
	));

    // Video URL
    $wp_customize->add_setting( 'SoundsByJohan_intro_url',
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
        )
    );
    $wp_customize->add_control( 'SoundsByJohan_intro_url',
        array(
            'label' 		=> esc_html__('Video url', 'SoundsByJohan'),
            'section' 		=> 'SoundsByJohan_intro_settings',
            'description'   =>  esc_html__('Paste Youtube or Vimeo url here', 'SoundsByJohan'),
        )
    );

/*    // Parallax image
    $wp_customize->add_setting( 'SoundsByJohan_intro_image',
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
        )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'SoundsByJohan_intro_image',
        array(
            'label' 		=> esc_html__('Background image', 'SoundsByJohan'),
            'section' 		=> 'SoundsByJohan_intro_settings',
        )
    ));*/



	/*------------------------------------------------------------------------*/
    /*  Section: About
    /*------------------------------------------------------------------------*/
   /* $wp_customize->add_panel( 'SoundsByJohan_about' ,
		array(
			'priority'        => 132,
			'title'           => esc_html__( 'Section: About', 'SoundsByJohan' ),
			'description'     => '',
			'active_callback' => 'SoundsByJohan_showon_frontpage'
		)
	);

	$wp_customize->add_section( 'SoundsByJohan_about_settings' ,
		array(
			'priority'    => 3,
			'title'       => esc_html__( 'Section Settings', 'SoundsByJohan' ),
			'description' => '',
			'panel'       => 'SoundsByJohan_about',
		)
	);

		// Show Content
		$wp_customize->add_setting( 'SoundsByJohan_about_disable',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_about_disable',
			array(
				'type'        => 'checkbox',
				'label'       => esc_html__('Hide this section?', 'SoundsByJohan'),
				'section'     => 'SoundsByJohan_about_settings',
				'description' => esc_html__('Check this box to hide this section.', 'SoundsByJohan'),
			)
		);

		// Section ID
		$wp_customize->add_setting( 'SoundsByJohan_about_id',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text',
				'default'           => esc_html__('about', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_about_id',
			array(
				'label' 		=> esc_html__('Section ID:', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_about_settings',
				'description'   => 'The section id, we will use this for link anchor.'
			)
		);

		// Title
		$wp_customize->add_setting( 'SoundsByJohan_about_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__('About Us', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_about_title',
			array(
				'label' 		=> esc_html__('Section Title', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_about_settings',
				'description'   => '',
			)
		);

		// Sub Title
		$wp_customize->add_setting( 'SoundsByJohan_about_subtitle',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__('Section subtitle', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_about_subtitle',
			array(
				'label' 		=> esc_html__('Section Subtitle', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_about_settings',
				'description'   => '',
			)
		);

		// Description
		$wp_customize->add_setting( 'SoundsByJohan_about_desc',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text',
				'default'           => '',
			)
		);
		$wp_customize->add_control( new One_Press_Textarea_Custom_Control(
			$wp_customize,
			'SoundsByJohan_about_desc',
			array(
				'label' 		=> esc_html__('Section Description', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_about_settings',
				'description'   => '',
			)
		));


	$wp_customize->add_section( 'SoundsByJohan_about_content' ,
		array(
			'priority'    => 6,
			'title'       => esc_html__( 'Section Content', 'SoundsByJohan' ),
			'description' => '',
			'panel'       => 'SoundsByJohan_about',
		)
	);

		// Order & Stlying
		$wp_customize->add_setting(
			'SoundsByJohan_about_boxes',
			array(
				//'default' => '',
				'sanitize_callback' => 'SoundsByJohan_sanitize_repeatable_data_field',
				'transport' => 'refresh', // refresh or postMessage
			) );


			$wp_customize->add_control(
				new SoundsByJohan_Customize_Repeatable_Control(
					$wp_customize,
					'SoundsByJohan_about_boxes',
					array(
						'label' 		=> esc_html__('About content page', 'SoundsByJohan'),
						'description'   => '',
						'section'       => 'SoundsByJohan_about_content',
						'live_title_id' => 'content_page', // apply for unput text and textarea only
						'title_format'  => esc_html__('[live_title]', 'SoundsByJohan'), // [live_title]
						'max_item'      => 3, // Maximum item can add
                        'limited_msg' 	=> wp_kses_post( 'Upgrade to <a target="_blank" href="https://www.famethemes.com/themes/SoundsByJohan/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=SoundsByJohan_customizer#get-started">SoundsByJohan Plus</a> to be able to add more items and unlock other premium features!', 'SoundsByJohan' ),
						//'allow_unlimited' => false, // Maximum item can add

						'fields'    => array(
							'content_page'  => array(
								'title' => esc_html__('Select a page', 'SoundsByJohan'),
								'type'  =>'select',
								'options' => $option_pages
							),
							'hide_title'  => array(
								'title' => esc_html__('Hide item title', 'SoundsByJohan'),
								'type'  =>'checkbox',
							),
							'enable_link'  => array(
								'title' => esc_html__('Link to single page', 'SoundsByJohan'),
								'type'  =>'checkbox',
							),
						),

					)
				)
			);

            // About content source
            $wp_customize->add_setting( 'SoundsByJohan_about_content_source',
                array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'default'           => 'content',
                )
            );

            $wp_customize->add_control( 'SoundsByJohan_about_content_source',
                array(
                    'label' 		=> esc_html__('Item content source', 'SoundsByJohan'),
                    'section' 		=> 'SoundsByJohan_about_content',
                    'description'   => '',
                    'type'          => 'select',
                    'choices'       => array(
                        'content' => esc_html__( 'Full Page Content', 'SoundsByJohan' ),
                        'excerpt' => esc_html__( 'Page Excerpt', 'SoundsByJohan' ),
                    ),
                )
            );*/


    /*------------------------------------------------------------------------*/
    /*  Section: Features
    /*------------------------------------------------------------------------*/
  /*  $wp_customize->add_panel( 'SoundsByJohan_features' ,
        array(
            'priority'        => 134,
            'title'           => esc_html__( 'Section: Features', 'SoundsByJohan' ),
            'description'     => '',
            'active_callback' => 'SoundsByJohan_showon_frontpage'
        )
    );

    $wp_customize->add_section( 'SoundsByJohan_features_settings' ,
        array(
            'priority'    => 3,
            'title'       => esc_html__( 'Section Settings', 'SoundsByJohan' ),
            'description' => '',
            'panel'       => 'SoundsByJohan_features',
        )
    );

    // Show Content
    $wp_customize->add_setting( 'SoundsByJohan_features_disable',
        array(
            'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
            'default'           => '',
        )
    );
    $wp_customize->add_control( 'SoundsByJohan_features_disable',
        array(
            'type'        => 'checkbox',
            'label'       => esc_html__('Hide this section?', 'SoundsByJohan'),
            'section'     => 'SoundsByJohan_features_settings',
            'description' => esc_html__('Check this box to hide this section.', 'SoundsByJohan'),
        )
    );

    // Section ID
    $wp_customize->add_setting( 'SoundsByJohan_features_id',
        array(
            'sanitize_callback' => 'SoundsByJohan_sanitize_text',
            'default'           => esc_html__('features', 'SoundsByJohan'),
        )
    );
    $wp_customize->add_control( 'SoundsByJohan_features_id',
        array(
            'label' 		=> esc_html__('Section ID:', 'SoundsByJohan'),
            'section' 		=> 'SoundsByJohan_features_settings',
            'description'   => 'The section id, we will use this for link anchor.'
        )
    );

    // Title
    $wp_customize->add_setting( 'SoundsByJohan_features_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('Features', 'SoundsByJohan'),
        )
    );
    $wp_customize->add_control( 'SoundsByJohan_features_title',
        array(
            'label' 		=> esc_html__('Section Title', 'SoundsByJohan'),
            'section' 		=> 'SoundsByJohan_features_settings',
            'description'   => '',
        )
    );

    // Sub Title
    $wp_customize->add_setting( 'SoundsByJohan_features_subtitle',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('Section subtitle', 'SoundsByJohan'),
        )
    );
    $wp_customize->add_control( 'SoundsByJohan_features_subtitle',
        array(
            'label' 		=> esc_html__('Section Subtitle', 'SoundsByJohan'),
            'section' 		=> 'SoundsByJohan_features_settings',
            'description'   => '',
        )
    );

    // Description
    $wp_customize->add_setting( 'SoundsByJohan_features_desc',
        array(
            'sanitize_callback' => 'SoundsByJohan_sanitize_text',
            'default'           => '',
        )
    );
    $wp_customize->add_control( new One_Press_Textarea_Custom_Control(
        $wp_customize,
        'SoundsByJohan_features_desc',
        array(
            'label' 		=> esc_html__('Section Description', 'SoundsByJohan'),
            'section' 		=> 'SoundsByJohan_features_settings',
            'description'   => '',
        )
    ));

    // Services layout
    $wp_customize->add_setting( 'SoundsByJohan_features_layout',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => '3',
        )
    );

    $wp_customize->add_control( 'SoundsByJohan_features_layout',
        array(
            'label' 		=> esc_html__('Features Layout Setting', 'SoundsByJohan'),
            'section' 		=> 'SoundsByJohan_features_settings',
            'description'   => '',
            'type'          => 'select',
            'choices'       => array(
                '3' => esc_html__( '4 Columns', 'SoundsByJohan' ),
                '4' => esc_html__( '3 Columns', 'SoundsByJohan' ),
                '6' => esc_html__( '2 Columns', 'SoundsByJohan' ),
            ),
        )
    );


    $wp_customize->add_section( 'SoundsByJohan_features_content' ,
        array(
            'priority'    => 6,
            'title'       => esc_html__( 'Section Content', 'SoundsByJohan' ),
            'description' => '',
            'panel'       => 'SoundsByJohan_features',
        )
    );

    // Order & Styling
    $wp_customize->add_setting(
        'SoundsByJohan_features_boxes',
        array(
            //'default' => '',
            'sanitize_callback' => 'SoundsByJohan_sanitize_repeatable_data_field',
            'transport' => 'refresh', // refresh or postMessage
        ) );

    $wp_customize->add_control(
        new SoundsByJohan_Customize_Repeatable_Control(
            $wp_customize,
            'SoundsByJohan_features_boxes',
            array(
                'label' 		=> esc_html__('Features content', 'SoundsByJohan'),
                'description'   => '',
                'section'       => 'SoundsByJohan_features_content',
                'live_title_id' => 'title', // apply for unput text and textarea only
                'title_format'  => esc_html__('[live_title]', 'SoundsByJohan'), // [live_title]
                'max_item'      => 4, // Maximum item can add
                'limited_msg' 	=> wp_kses_post( 'Upgrade to <a target="_blank" href="https://www.famethemes.com/themes/SoundsByJohan/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=SoundsByJohan_customizer#get-started">SoundsByJohan Plus</a> to be able to add more items and unlock other premium features!', 'SoundsByJohan' ),
                'fields'    => array(
                    'title'  => array(
                        'title' => esc_html__('Title', 'SoundsByJohan'),
                        'type'  =>'text',
                    ),
                    'icon'  => array(
                        'title' => esc_html__('Icon', 'SoundsByJohan'),
                        'desc' => __('Paste your <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">Font Awesome</a> icon class name here.', 'SoundsByJohan'),
                        'type'  =>'text',
                    ),
                    'desc'  => array(
                        'title' => esc_html__('Description', 'SoundsByJohan'),
                        'type'  =>'textarea',
                    ),
                    'link'  => array(
                        'title' => esc_html__('Custom Link', 'SoundsByJohan'),
                        'type'  =>'text',
                    ),
                ),

            )
        )
    );

    // About content source
    $wp_customize->add_setting( 'SoundsByJohan_about_content_source',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => 'content',
        )
    );

    $wp_customize->add_control( 'SoundsByJohan_about_content_source',
        array(
            'label' 		=> esc_html__('Item content source', 'SoundsByJohan'),
            'section' 		=> 'SoundsByJohan_about_content',
            'description'   => '',
            'type'          => 'select',
            'choices'       => array(
                'content' => esc_html__( 'Full Page Content', 'SoundsByJohan' ),
                'excerpt' => esc_html__( 'Page Excerpt', 'SoundsByJohan' ),
            ),
        )
    );*/



    /*------------------------------------------------------------------------*/
    /*  Section: Services
    /*------------------------------------------------------------------------*/
    /*$wp_customize->add_panel( 'SoundsByJohan_services' ,
		array(
			'priority'        => 134,
			'title'           => esc_html__( 'Section: Services', 'SoundsByJohan' ),
			'description'     => '',
			'active_callback' => 'SoundsByJohan_showon_frontpage'
		)
	);

	$wp_customize->add_section( 'SoundsByJohan_service_settings' ,
		array(
			'priority'    => 3,
			'title'       => esc_html__( 'Section Settings', 'SoundsByJohan' ),
			'description' => '',
			'panel'       => 'SoundsByJohan_services',
		)
	);

		// Show Content
		$wp_customize->add_setting( 'SoundsByJohan_services_disable',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_services_disable',
			array(
				'type'        => 'checkbox',
				'label'       => esc_html__('Hide this section?', 'SoundsByJohan'),
				'section'     => 'SoundsByJohan_service_settings',
				'description' => esc_html__('Check this box to hide this section.', 'SoundsByJohan'),
			)
		);

		// Section ID
		$wp_customize->add_setting( 'SoundsByJohan_services_id',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text',
				'default'           => esc_html__('services', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_services_id',
			array(
				'label'     => esc_html__('Section ID:', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_service_settings',
				'description'   => 'The section id, we will use this for link anchor.'
			)
		);

		// Title
		$wp_customize->add_setting( 'SoundsByJohan_services_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__('Our Services', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_services_title',
			array(
				'label'     => esc_html__('Section Title', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_service_settings',
				'description'   => '',
			)
		);

		// Sub Title
		$wp_customize->add_setting( 'SoundsByJohan_services_subtitle',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__('Section subtitle', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_services_subtitle',
			array(
				'label'     => esc_html__('Section Subtitle', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_service_settings',
				'description'   => '',
			)
		);

        // Description
        $wp_customize->add_setting( 'SoundsByJohan_services_desc',
            array(
                'sanitize_callback' => 'SoundsByJohan_sanitize_text',
                'default'           => '',
            )
        );
        $wp_customize->add_control( new One_Press_Textarea_Custom_Control(
            $wp_customize,
            'SoundsByJohan_services_desc',
            array(
                'label' 		=> esc_html__('Section Description', 'SoundsByJohan'),
                'section' 		=> 'SoundsByJohan_service_settings',
                'description'   => '',
            )
        ));


        // Services layout
        $wp_customize->add_setting( 'SoundsByJohan_service_layout',
            array(
                'sanitize_callback' => 'sanitize_text_field',
                'default'           => '6',
            )
        );

        $wp_customize->add_control( 'SoundsByJohan_service_layout',
            array(
                'label' 		=> esc_html__('Services Layout Setting', 'SoundsByJohan'),
                'section' 		=> 'SoundsByJohan_service_settings',
                'description'   => '',
                'type'          => 'select',
                'choices'       => array(
                    '3' => esc_html__( '4 Columns', 'SoundsByJohan' ),
                    '4' => esc_html__( '3 Columns', 'SoundsByJohan' ),
                    '6' => esc_html__( '2 Columns', 'SoundsByJohan' ),
                ),
            )
        );


	$wp_customize->add_section( 'SoundsByJohan_service_content' ,
		array(
			'priority'    => 6,
			'title'       => esc_html__( 'Section Content', 'SoundsByJohan' ),
			'description' => '',
			'panel'       => 'SoundsByJohan_services',
		)
	);

		// Section service content.
		$wp_customize->add_setting(
			'SoundsByJohan_services',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_repeatable_data_field',
				'transport' => 'refresh', // refresh or postMessage
			) );


		$wp_customize->add_control(
			new SoundsByJohan_Customize_Repeatable_Control(
				$wp_customize,
				'SoundsByJohan_services',
				array(
					'label'     	=> esc_html__('Service content', 'SoundsByJohan'),
					'description'   => '',
					'section'       => 'SoundsByJohan_service_content',
					'live_title_id' => 'content_page', // apply for unput text and textarea only
					'title_format'  => esc_html__('[live_title]', 'SoundsByJohan'), // [live_title]
					'max_item'      => 4, // Maximum item can add
                    'limited_msg' 	=> wp_kses_post( 'Upgrade to <a target="_blank" href="https://www.famethemes.com/themes/SoundsByJohan/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=SoundsByJohan_customizer#get-started">SoundsByJohan Plus</a> to be able to add more items and unlock other premium features!', 'SoundsByJohan' ),

					'fields'    => array(
						'icon' => array(
							'title' => esc_html__('Custom icon', 'SoundsByJohan'),
							'type'  =>'text',
							'desc'  => sprintf( wp_kses_post('Paste your <a target="_blank" href="%1$s">Font Awesome</a> icon class name here.', 'SoundsByJohan'), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
							'default' => esc_html__( 'gg', 'SoundsByJohan' ),
						),
						'content_page'  => array(
							'title' => esc_html__('Select a page', 'SoundsByJohan'),
							'type'  =>'select',
							'options' => $option_pages
						),
						'enable_link'  => array(
							'title' => esc_html__('Link to single page', 'SoundsByJohan'),
							'type'  =>'checkbox',
						),
					),

				)
			)
		);*/

	/*------------------------------------------------------------------------*/
    /*  Section: Counter
    /*------------------------------------------------------------------------*/
	/*$wp_customize->add_panel( 'SoundsByJohan_counter' ,
		array(
			'priority'        => 134,
			'title'           => esc_html__( 'Section: Counter', 'SoundsByJohan' ),
			'description'     => '',
			'active_callback' => 'SoundsByJohan_showon_frontpage'
		)
	);

	$wp_customize->add_section( 'SoundsByJohan_counter_settings' ,
		array(
			'priority'    => 3,
			'title'       => esc_html__( 'Section Settings', 'SoundsByJohan' ),
			'description' => '',
			'panel'       => 'SoundsByJohan_counter',
		)
	);
		// Show Content
		$wp_customize->add_setting( 'SoundsByJohan_counter_disable',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_counter_disable',
			array(
				'type'        => 'checkbox',
				'label'       => esc_html__('Hide this section?', 'SoundsByJohan'),
				'section'     => 'SoundsByJohan_counter_settings',
				'description' => esc_html__('Check this box to hide this section.', 'SoundsByJohan'),
			)
		);

		// Section ID
		$wp_customize->add_setting( 'SoundsByJohan_counter_id',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text',
				'default'           => esc_html__('counter', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_counter_id',
			array(
				'label'     	=> esc_html__('Section ID:', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_counter_settings',
				'description'   => 'The section id, we will use this for link anchor.'
			)
		);

		// Title
		$wp_customize->add_setting( 'SoundsByJohan_counter_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__('Our Numbers', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_counter_title',
			array(
				'label'     	=> esc_html__('Section Title', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_counter_settings',
				'description'   => '',
			)
		);

		// Sub Title
		$wp_customize->add_setting( 'SoundsByJohan_counter_subtitle',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__('Section subtitle', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_counter_subtitle',
			array(
				'label'     	=> esc_html__('Section Subtitle', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_counter_settings',
				'description'   => '',
			)
		);

        // Description
        $wp_customize->add_setting( 'SoundsByJohan_counter_desc',
            array(
                'sanitize_callback' => 'SoundsByJohan_sanitize_text',
                'default'           => '',
            )
        );
        $wp_customize->add_control( new One_Press_Textarea_Custom_Control(
            $wp_customize,
            'SoundsByJohan_counter_desc',
            array(
                'label' 		=> esc_html__('Section Description', 'SoundsByJohan'),
                'section' 		=> 'SoundsByJohan_counter_settings',
                'description'   => '',
            )
        ));

	$wp_customize->add_section( 'SoundsByJohan_counter_content' ,
		array(
			'priority'    => 6,
			'title'       => esc_html__( 'Section Content', 'SoundsByJohan' ),
			'description' => '',
			'panel'       => 'SoundsByJohan_counter',
		)
	);

	// Order & Styling
	$wp_customize->add_setting(
		'SoundsByJohan_counter_boxes',
		array(
			'sanitize_callback' => 'SoundsByJohan_sanitize_repeatable_data_field',
			'transport' => 'refresh', // refresh or postMessage
		) );


		$wp_customize->add_control(
			new SoundsByJohan_Customize_Repeatable_Control(
				$wp_customize,
				'SoundsByJohan_counter_boxes',
				array(
					'label'     	=> esc_html__('Counter content', 'SoundsByJohan'),
					'description'   => '',
					'section'       => 'SoundsByJohan_counter_content',
					'live_title_id' => 'title', // apply for unput text and textarea only
					'title_format'  => esc_html__('[live_title]', 'SoundsByJohan'), // [live_title]
					'max_item'      => 4, // Maximum item can add
                    'limited_msg' 	=> wp_kses_post( 'Upgrade to <a target="_blank" href="https://www.famethemes.com/themes/SoundsByJohan/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=SoundsByJohan_customizer#get-started">SoundsByJohan Plus</a> to be able to add more items and unlock other premium features!', 'SoundsByJohan' ),
                    'fields'    => array(
						'title' => array(
							'title' => esc_html__('Title', 'SoundsByJohan'),
							'type'  =>'text',
							'desc'  => '',
							'default' => esc_html__( 'Your counter label', 'SoundsByJohan' ),
						),
						'number' => array(
							'title' => esc_html__('Number', 'SoundsByJohan'),
							'type'  =>'text',
							'default' => 99,
						),
						'unit_before'  => array(
							'title' => esc_html__('Before number', 'SoundsByJohan'),
							'type'  =>'text',
							'default' => '',
						),
						'unit_after'  => array(
							'title' => esc_html__('After number', 'SoundsByJohan'),
							'type'  =>'text',
							'default' => '',
						),
					),

				)
			)
		);*/

	/*------------------------------------------------------------------------*/
	/*  Section: Work
    /*------------------------------------------------------------------------*/
	$wp_customize->add_panel( 'SoundsByJohan_work' ,
		array(
			'priority'        => 136,
			'title'           => esc_html__( 'Section: Work', 'SoundsByJohan' ),
			'description'     => '',
			'active_callback' => 'SoundsByJohan_showon_frontpage'
		)
	);

	$wp_customize->add_section( 'SoundsByJohan_work_settings' ,
		array(
			'priority'    => 3,
			'title'       => esc_html__( 'Section Settings', 'SoundsByJohan' ),
			'description' => '',
			'panel'       => 'SoundsByJohan_work',
		)
	);

	// Show Content
	$wp_customize->add_setting( 'SoundsByJohan_work_disable',
		array(
			'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
			'default'           => '',
		)
	);
	$wp_customize->add_control( 'SoundsByJohan_work_disable',
		array(
			'type'        => 'checkbox',
			'label'       => esc_html__('Hide this section?', 'SoundsByJohan'),
			'section'     => 'SoundsByJohan_work_settings',
			'description' => esc_html__('Check this box to hide this section.', 'SoundsByJohan'),
		)
	);

	// Section ID
	$wp_customize->add_setting( 'SoundsByJohan_work_id',
		array(
			'sanitize_callback' => 'SoundsByJohan_sanitize_text',
			'default'           => esc_html__('work', 'SoundsByJohan'),
		)
	);
	$wp_customize->add_control( 'SoundsByJohan_work_id',
		array(
			'label'     => esc_html__('Section ID:', 'SoundsByJohan'),
			'section' 		=> 'SoundsByJohan_work_settings',
			'description'   => 'The section id, we will use this for link anchor.'
		)
	);

	// Title
    $wp_customize->add_setting( 'SoundsByJohan_work_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('Latest work', 'SoundsByJohan'),
        )
    );
    $wp_customize->add_control( 'SoundsByJohan_work_title',
        array(
            'label'     => esc_html__('Section Title', 'SoundsByJohan'),
            'section' 		=> 'SoundsByJohan_work_settings',
            'description'   => '',
        )
    );

	/*// Sub Title
    $wp_customize->add_setting( 'SoundsByJohan_work_subtitle',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('Section subtitle', 'SoundsByJohan'),
        )
    );
    $wp_customize->add_control( 'SoundsByJohan_work_subtitle',
        array(
            'label'     => esc_html__('Section Subtitle', 'SoundsByJohan'),
            'section' 		=> 'SoundsByJohan_work_settings',
            'description'   => '',
        )
    );*/

	/* // Description
     $wp_customize->add_setting( 'SoundsByJohan_work_desc',
         array(
             'sanitize_callback' => 'SoundsByJohan_sanitize_text',
             'default'           => '',
         )
     );
     $wp_customize->add_control( new One_Press_Textarea_Custom_Control(
         $wp_customize,
         'SoundsByJohan_work_desc',
         array(
             'label' 		=> esc_html__('Section Description', 'SoundsByJohan'),
             'section' 		=> 'SoundsByJohan_work_settings',
             'description'   => '',
         )
     ));*/

	// hr
	$wp_customize->add_setting( 'SoundsByJohan_work_settings_hr',
		array(
			'sanitize_callback' => 'SoundsByJohan_sanitize_text',
		)
	);
	$wp_customize->add_control( new SoundsByJohan_Misc_Control( $wp_customize, 'SoundsByJohan_work_settings_hr',
		array(
			'section'     => 'SoundsByJohan_work_settings',
			'type'        => 'hr'
		)
	));

	// Number of post to show.
	$wp_customize->add_setting( 'SoundsByJohan_work_number',
		array(
			'sanitize_callback' => 'SoundsByJohan_sanitize_number',
			'default'           => '3',
		)
	);
	$wp_customize->add_control( 'SoundsByJohan_work_number',
		array(
			'label'     	=> esc_html__('Number of post to show', 'SoundsByJohan'),
			'section' 		=> 'SoundsByJohan_work_settings',
			'description'   => '',
		)
	);



	/*------------------------------------------------------------------------*/
    /*  Section: Clients
    /*------------------------------------------------------------------------*/
    $wp_customize->add_panel( 'SoundsByJohan_clients' ,
		array(
			'priority'        => 138,
			'title'           => esc_html__( 'Section: Clients', 'SoundsByJohan' ),
			'description'     => '',
			'active_callback' => 'SoundsByJohan_showon_frontpage'
		)
	);

	$wp_customize->add_section( 'SoundsByJohan_clients_settings' ,
		array(
			'priority'    => 3,
			'title'       => esc_html__( 'Section Settings', 'SoundsByJohan' ),
			'description' => '',
			'panel'       => 'SoundsByJohan_clients',
		)
	);

		// Show Content
		$wp_customize->add_setting( 'SoundsByJohan_clients_disable',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_clients_disable',
			array(
				'type'        => 'checkbox',
				'label'       => esc_html__('Hide this section?', 'SoundsByJohan'),
				'section'     => 'SoundsByJohan_clients_settings',
				'description' => esc_html__('Check this box to hide this section.', 'SoundsByJohan'),
			)
		);
		// Section ID
		$wp_customize->add_setting( 'SoundsByJohan_clients_id',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text',
				'default'           => esc_html__('clients', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_clients_id',
			array(
				'label'     	=> esc_html__('Section ID:', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_clients_settings',
				'description'   => 'The section id, we will use this for link anchor.'
			)
		);

		// Testimonial1
		$wp_customize->add_setting( 'SoundsByJohan_clients_testimonial1',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__('Testimonial 1', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_clients_testimonial1',
			array(
				'label'    		=> esc_html__('Testimonial 1', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_clients_settings',
				'description'   => '',
			)
		);

	// Testimonial2
	$wp_customize->add_setting( 'SoundsByJohan_clients_testimonial2',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__('Testimonial 2', 'SoundsByJohan'),
		)
	);
	$wp_customize->add_control( 'SoundsByJohan_clients_testimonial2',
		array(
			'label'    		=> esc_html__('Testimonial 2', 'SoundsByJohan'),
			'section' 		=> 'SoundsByJohan_clients_settings',
			'description'   => '',
		)
	);

	// Person1
	$wp_customize->add_setting( 'SoundsByJohan_clients_person1',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__('Person 1', 'SoundsByJohan'),
		)
	);
	$wp_customize->add_control( 'SoundsByJohan_clients_person1',
		array(
			'label'    		=> esc_html__('Person 1', 'SoundsByJohan'),
			'section' 		=> 'SoundsByJohan_clients_settings',
			'description'   => '',
		)
	);

	// Person2
	$wp_customize->add_setting( 'SoundsByJohan_clients_person2',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__('Person 2', 'SoundsByJohan'),
		)
	);
	$wp_customize->add_control( 'SoundsByJohan_clients_person2',
		array(
			'label'    		=> esc_html__('Person 2', 'SoundsByJohan'),
			'section' 		=> 'SoundsByJohan_clients_settings',
			'description'   => '',
		)
	);

	$wp_customize->add_setting( 'SoundsByJohan_clients_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__('Section title', 'SoundsByJohan'),
		)
	);

	$wp_customize->add_control( 'SoundsByJohan_clients_title',
		array(
			'label'     => esc_html__('Section title', 'SoundsByJohan'),
			'section' 		=> 'SoundsByJohan_clients_settings',
			'description'   => '',
		)
	);

		/*// Sub Title
		$wp_customize->add_setting( 'SoundsByJohan_clients_subtitle',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__('Section subtitle', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_clients_subtitle',
			array(
				'label'     => esc_html__('Section Subtitle', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_clients_settings',
				'description'   => '',
			)
		);*/

/*        // Description
        $wp_customize->add_setting( 'SoundsByJohan_clients_desc',
            array(
                'sanitize_callback' => 'SoundsByJohan_sanitize_text',
                'default'           => '',
            )
        );
        $wp_customize->add_control( new One_Press_Textarea_Custom_Control(
            $wp_customize,
            'SoundsByJohan_clients_desc',
            array(
                'label' 		=> esc_html__('Section Description', 'SoundsByJohan'),
                'section' 		=> 'SoundsByJohan_clients_settings',
                'description'   => '',
            )
        ));*/

        // clients layout
        $wp_customize->add_setting( 'SoundsByJohan_clients_layout',
            array(
                'sanitize_callback' => 'sanitize_text_field',
                'default'           => '3',
            )
        );

        $wp_customize->add_control( 'SoundsByJohan_clients_layout',
            array(
                'label' 		=> esc_html__('clients Layout Setting', 'SoundsByJohan'),
                'section' 		=> 'SoundsByJohan_clients_settings',
                'description'   => '',
                'type'          => 'select',
                'choices'       => array(
                    '3' => esc_html__( '4 Columns', 'SoundsByJohan' ),
                    '4' => esc_html__( '3 Columns', 'SoundsByJohan' ),
                    '6' => esc_html__( '2 Columns', 'SoundsByJohan' ),
                ),
            )
        );

	$wp_customize->add_section( 'SoundsByJohan_clients_content' ,
		array(
			'priority'    => 6,
			'title'       => esc_html__( 'Section Content', 'SoundsByJohan' ),
			'description' => '',
			'panel'       => 'SoundsByJohan_clients',
		)
	);

		// clients member settings
		$wp_customize->add_setting(
			'SoundsByJohan_clients_members',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_repeatable_data_field',
				'transport' => 'refresh', // refresh or postMessage
			) );


		$wp_customize->add_control(
			new SoundsByJohan_Customize_Repeatable_Control(
				$wp_customize,
				'SoundsByJohan_clients_members',
				array(
					'label'     => esc_html__('Clients', 'SoundsByJohan'),
					'description'   => '',
					'section'       => 'SoundsByJohan_clients_content',
					//'live_title_id' => 'user_id', // apply for unput text and textarea only
					'title_format'  => esc_html__( '[live_title]', 'SoundsByJohan'), // [live_title]
					'max_item'      => 4, // Maximum item can add
                    'fields'    => array(
						'user_id' => array(
							'title' => esc_html__('User media', 'SoundsByJohan'),
							'type'  =>'media',
							'desc'  => '',
						),
                        'link' => array(
                            'title' => esc_html__('Custom Link', 'SoundsByJohan'),
                            'type'  =>'text',
                            'desc'  => '',
                        ),
					),

				)
			)
		);


	/*------------------------------------------------------------------------*/
    /*  Section: Contact
    /*------------------------------------------------------------------------*/
    $wp_customize->add_panel( 'SoundsByJohan_contact' ,
		array(
			'priority'        => 140,
			'title'           => esc_html__( 'Section: Contact', 'SoundsByJohan' ),
			'description'     => '',
			'active_callback' => 'SoundsByJohan_showon_frontpage'
		)
	);

	$wp_customize->add_section( 'SoundsByJohan_contact_settings' ,
		array(
			'priority'    => 3,
			'title'       => esc_html__( 'Section Settings', 'SoundsByJohan' ),
			'description' => '',
			'panel'       => 'SoundsByJohan_contact',
		)
	);

		// Show Content
		$wp_customize->add_setting( 'SoundsByJohan_contact_disable',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_contact_disable',
			array(
				'type'        => 'checkbox',
				'label'       => esc_html__('Hide this section?', 'SoundsByJohan'),
				'section'     => 'SoundsByJohan_contact_settings',
				'description' => esc_html__('Check this box to hide this section.', 'SoundsByJohan'),
			)
		);

		// Section ID
		$wp_customize->add_setting( 'SoundsByJohan_contact_id',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text',
				'default'           => esc_html__('contact', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_contact_id',
			array(
				'label'     => esc_html__('Section ID:', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_contact_settings',
				'description'   => 'The section id, we will use this for link anchor.'
			)
		);

		// Title
		$wp_customize->add_setting( 'SoundsByJohan_contact_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__('Get in touch', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_contact_title',
			array(
				'label'     => esc_html__('Section Title', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_contact_settings',
				'description'   => '',
			)
		);

		// Sub Title
		$wp_customize->add_setting( 'SoundsByJohan_contact_subtitle',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__('Section subtitle', 'SoundsByJohan'),
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_contact_subtitle',
			array(
				'label'     => esc_html__('Section Subtitle', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_contact_settings',
				'description'   => '',
			)
		);

        // Description
        $wp_customize->add_setting( 'SoundsByJohan_contact_desc',
            array(
                'sanitize_callback' => 'SoundsByJohan_sanitize_text',
                'default'           => '',
            )
        );
        $wp_customize->add_control( new One_Press_Textarea_Custom_Control(
            $wp_customize,
            'SoundsByJohan_contact_desc',
            array(
                'label' 		=> esc_html__('Section Description', 'SoundsByJohan'),
                'section' 		=> 'SoundsByJohan_contact_settings',
                'description'   => '',
            )
        ));


	$wp_customize->add_section( 'SoundsByJohan_contact_content' ,
		array(
			'priority'    => 6,
			'title'       => esc_html__( 'Section Content', 'SoundsByJohan' ),
			'description' => '',
			'panel'       => 'SoundsByJohan_contact',
		)
	);
		// Contact form 7 guide.
		$wp_customize->add_setting( 'SoundsByJohan_contact_cf7_guide',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text'
			)
		);
		$wp_customize->add_control( new SoundsByJohan_Misc_Control( $wp_customize, 'SoundsByJohan_contact_cf7_guide',
			array(
				'section'     => 'SoundsByJohan_contact_content',
				'type'        => 'custom_message',
				'description' => wp_kses_post( 'In order to display contact form please install <a target="_blank" href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a> plugin and then copy the contact form shortcode and paste it here, the shortcode will be like this <code>[contact-form-7 id="xxxx" title="Example Contact Form"]</code>', 'SoundsByJohan' )
			)
		));

		// Contact Form 7 Shortcode
		$wp_customize->add_setting( 'SoundsByJohan_contact_cf7',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_contact_cf7',
			array(
				'label'     	=> esc_html__('Contact Form 7 Shortcode.', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_contact_content',
				'description'   => '',
			)
		);

		// Show CF7
		$wp_customize->add_setting( 'SoundsByJohan_contact_cf7_disable',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_checkbox',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_contact_cf7_disable',
			array(
				'type'        => 'checkbox',
				'label'       => esc_html__('Hide contact form completely.', 'SoundsByJohan'),
				'section'     => 'SoundsByJohan_contact_content',
				'description' => esc_html__('Check this box to hide contact form.', 'SoundsByJohan'),
			)
		);

		// Contact Text
		$wp_customize->add_setting( 'SoundsByJohan_contact_text',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text',
				'default'           => '',
			)
		);
		$wp_customize->add_control( new One_Press_Textarea_Custom_Control(
			$wp_customize,
			'SoundsByJohan_contact_text',
			array(
				'label'     	=> esc_html__('Contact Text', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_contact_content',
				'description'   => '',
			)
		));

	$wp_customize->add_setting( 'SoundsByJohan_contact_body',
		array(
			'sanitize_callback' => 'SoundsByJohan_sanitize_text',
			'default'           => '',
		)
	);
	$wp_customize->add_control( new One_Press_Textarea_Custom_Control(
		$wp_customize,
		'SoundsByJohan_contact_body',
		array(
			'label'     	=> esc_html__('Contact Body', 'SoundsByJohan'),
			'section' 		=> 'SoundsByJohan_contact_content',
			'description'   => '',
		)
	));

		// hr
		$wp_customize->add_setting( 'SoundsByJohan_contact_text_hr', array( 'sanitize_callback' => 'SoundsByJohan_sanitize_text' ) );
		$wp_customize->add_control( new SoundsByJohan_Misc_Control( $wp_customize, 'SoundsByJohan_contact_text_hr',
			array(
				'section'     => 'SoundsByJohan_contact_content',
				'type'        => 'hr'
			)
		));

		// Address Box
		$wp_customize->add_setting( 'SoundsByJohan_contact_address_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_contact_address_title',
			array(
				'label'     	=> esc_html__('Contact Box Title', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_contact_content',
				'description'   => '',
			)
		);

		// Contact Text
		$wp_customize->add_setting( 'SoundsByJohan_contact_address',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_contact_address',
			array(
				'label'     => esc_html__('Address', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_contact_content',
				'description'   => '',
			)
		);

		// Contact Phone
		$wp_customize->add_setting( 'SoundsByJohan_contact_phone',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_contact_phone',
			array(
				'label'     	=> esc_html__('Phone', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_contact_content',
				'description'   => '',
			)
		);

		// Contact Email
		$wp_customize->add_setting( 'SoundsByJohan_contact_email',
			array(
				'sanitize_callback' => 'sanitize_email',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_contact_email',
			array(
				'label'     	=> esc_html__('Email', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_contact_content',
				'description'   => '',
			)
		);

		// Contact Fax
		$wp_customize->add_setting( 'SoundsByJohan_contact_fax',
			array(
				'sanitize_callback' => 'SoundsByJohan_sanitize_text',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'SoundsByJohan_contact_fax',
			array(
				'label'     	=> esc_html__('Fax', 'SoundsByJohan'),
				'section' 		=> 'SoundsByJohan_contact_content',
				'description'   => '',
			)
		);

		/**
		 * Hook to add other customize
		 */
		do_action( 'SoundsByJohan_customize_after_register', $wp_customize );

}
add_action( 'customize_register', 'SoundsByJohan_customize_register' );


/*------------------------------------------------------------------------*/
/*  SoundsByJohan Sanitize Functions.
/*------------------------------------------------------------------------*/

function SoundsByJohan_sanitize_file_url( $file_url ) {
	$output = '';
	$filetype = wp_check_filetype( $file_url );
	if ( $filetype["ext"] ) {
		$output = esc_url( $file_url );
	}
	return $output;
}


/**
 * Conditional to show more hero settings
 *
 * @param $control
 * @return bool
 */
function SoundsByJohan_hero_fullscreen_callback ( $control ) {
	if ( $control->manager->get_setting('SoundsByJohan_hero_fullscreen')->value() == '' ) {
        return true;
    } else {
        return false;
    }
}


function SoundsByJohan_sanitize_number( $input ) {
    return balanceTags( $input );
}

function SoundsByJohan_sanitize_hex_color( $color ) {
	if ( $color === '' ) {
		return '';
	}
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}
	return null;
}

function SoundsByJohan_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
		return 1;
    } else {
		return 0;
    }
}

function SoundsByJohan_sanitize_text( $string ) {
	return wp_kses_post( balanceTags( $string ) );
}

function SoundsByJohan_sanitize_html_input( $string ) {
	return wp_kses_allowed_html( $string );
}

function SoundsByJohan_showon_frontpage() {
	return is_page_template( 'template-frontpage.php' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function SoundsByJohan_customize_preview_js() {
	wp_enqueue_script( 'SoundsByJohan_customizer_liveview', get_template_directory_uri() . '/assets/js/customizer-liveview.js', array( 'customize-preview' ), '20130508', true );

}
add_action( 'customize_preview_init', 'SoundsByJohan_customize_preview_js' );



add_action( 'customize_controls_enqueue_scripts', 'opneress_customize_js_settings' );
function opneress_customize_js_settings(){
    if ( ! function_exists( 'SoundsByJohan_get_actions_required' ) ) {
        return;
    }
    $actions = SoundsByJohan_get_actions_required();
    $n = array_count_values( $actions );
    $number_action =  0;
    if ( $n && isset( $n['active'] ) ) {
        $number_action = $n['active'];
    }

    wp_localize_script( 'customize-controls', 'SoundsByJohan_customizer_settings', array(
        'number_action' => $number_action,
        'is_plus_activated' => class_exists( 'SoundsByJohan_PLus' ) ? 'y' : 'n',
        'action_url' => admin_url( 'themes.php?page=ft_SoundsByJohan&tab=actions_required' )
    ) );
}
