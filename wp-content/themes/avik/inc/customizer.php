<?php
/**
* customizer.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/

/* TABLE OF CONTENT
1 - General postMessage support
2
2.1 - Logo 2
2.2 - Header Media
2.3 - Slider
2.4 - Static/Video
2.5 - Who we are
2.6 - Services
2.7 - Portfolio
2.8 - Blog
2.9 - Contact
2.10 - Footer
2.11 - Page 404
2.12 - Back to Top
2.13 - Social
2.14 - Go Pro

*/
/**
*
* @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/
function avik_customize_register( $wp_customize ) {


	/* ------------------------------------------------------------------------- *
	## 1 General postMessage support */
	/* ------------------------------------------------------------------------- */

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'avik_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'avik_customize_partial_blogdescription',
		) );
	}

	/* ------------------------------------------------------------------------- *
	## 2 General Customize */
	/* ------------------------------------------------------------------------- */

	/* ------------------------------------------------------------------------------------------------------------------------------*
	##  2.1 Logo
	/* ------------------------------------------------------------------------------------------------------------------------------*/

	// Enable Effect Rotate Logo

	$wp_customize->add_setting( 'avik_enable_rotate_logo',
	array(
		'default'           => 1,
		'transport'         => 'refresh',
		'sanitize_callback' => 'avik_switch_sanitization'
	));

	$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_rotate_logo',
	array(
		'label'    => __( 'Enable/Disable rotation logo','avik' ),
		'section'  => 'title_tagline',
		'priority' => 51,
	)) );

	$wp_customize->add_setting( 'avik_font_size_logo',
	array(
		'default' => 80,
		'transport' => 'postMessage',
		'sanitize_callback' => 'avik_sanitize_integer'
	));

	$wp_customize->add_control( new Avik_Slider_Custom_Control( $wp_customize, 'avik_font_size_logo',
	array(
		'label' => __( 'Font size Logo (px)','avik' ),
		'section' => 'title_tagline',
		'priority'    => 52,
		'input_attrs' => array(
			'min' => 30,
			'max' => 200,
			'step' => 1,
		), )) );

		/* ------------------------------------------------------------------------------------------------------------------------*
		##  2.2 Header Media
		/* ------------------------------------------------------------------------------------------------------------------------*/


		// Order section for Header

		$wp_customize->add_setting( 'avik_order_header_home' , array(
			'default'           => 'page-static',
			'transport'         => 'refresh',
			'sanitize_callback' => 'avik_sanitize_select',

		) );


		$wp_customize->add_control(
			'avik_order_header_home' ,
			array(
				'label'      => __( 'Select Static/Video or Slider for Header', 'avik' ),
				'section'    => 'header_image',
				'settings'   => 'avik_order_header_home',
				'type'       => 'select',
				'priority'   => 10,
				'choices'    => array(
					'page-slider'=> __('Slider','avik'),
					'page-static'=> __('Static/Video','avik'),
				) ) );

				// Enable Filter Header Home

				$wp_customize->add_setting( 'avik_enable_filter_home',
				array(
					'default'           => 0,
					'transport'         => 'refresh',
					'sanitize_callback' => 'avik_switch_sanitization'
				));

				$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_filter_home',
				array(
					'label'    => __( 'Enable/Disable filter color Header','avik' ),
					'section'  => 'header_image',
					'priority' => 20,
				)) );

				// Color Filter Header Home

				$wp_customize->add_setting( 'avik_color_filter_header',
				array(
					'default' => 'rgba(122,122,122,0.05)',
					'transport' => 'postMessage',
					'sanitize_callback' => 'avik_hex_rgba_sanitization',

				));

				$wp_customize->add_control( new Avik_Customize_Alpha_Color_Control( $wp_customize, 'avik_color_filter_header',
				array(
					'label' => __( 'Color filter Heder','avik' ),
					'section' => 'header_image',
					'active_callback' => 'avik_enable_filter_home',
					'priority' => 30,
					'show_opacity' => true,
				)) );


				/* ------------------------------------------------------------------------------------------------------------------------*
				##  2.3 Slider
				/* ------------------------------------------------------------------------------------------------------------------------*/

				$avikSlider = new Avik_WP_Customize_Panel( $wp_customize, 'avik_slider', array(
					'title'    => __('Slider','avik'),
					'priority' => 20,
				));

				$wp_customize->add_panel( $avikSlider );


				// Slider 1

				$wp_customize->add_section(
					'avik_section_slider_1',
					array(
						'title'      => __('Slider 1','avik'),
						'priority'   => 10,
						'capability' => 'edit_theme_options',
						'panel'      => 'avik_slider',
					)
				);

				$wp_customize->add_setting(
					'avik_category_slider_1',
					array(
						'default'           => '',
						'sanitize_callback' => 'avik_sanitize_category_select',
					)
				);

				$wp_customize->add_control(
					new Avik_Customize_category_Control(
						$wp_customize,
						'avik_category_slider_1',
						array(
							'label'       => __('Select a category for the post slider 1','avik'),
							'settings'    => 'avik_category_slider_1',
							'section'     => 'avik_section_slider_1'
						)
						)
					);

					// Slider 2

					$wp_customize->add_section(
						'avik_section_slider_2',
						array(
							'title'      => __('Slider 2','avik'),
							'priority'   => 20,
							'capability' => 'edit_theme_options',
							'panel'      => 'avik_slider',
						)
					);

					$wp_customize->add_setting(
						'avik_category_slider_2',
						array(
							'default'           => '',
							'sanitize_callback' => 'avik_sanitize_category_select',
						)
					);

					$wp_customize->add_control(
						new Avik_Customize_category_Control(
							$wp_customize,
							'avik_category_slider_2',
							array(
								'label'       => __('Select a category for the post slider 2','avik'),
								'settings'    => 'avik_category_slider_2',
								'section'     => 'avik_section_slider_2'
							)
							)
						);

						// Slider 3

						$wp_customize->add_section(
							'avik_section_slider_3',
							array(
								'title'      => __('Slider 3','avik'),
								'priority'   => 30,
								'capability' => 'edit_theme_options',
								'panel'      => 'avik_slider',
							)
						);

						$wp_customize->add_setting(
							'avik_category_slider_3',
							array(
								'default'           => '',
								'sanitize_callback' => 'avik_sanitize_category_select',
							)
						);

						$wp_customize->add_control(
							new Avik_Customize_category_Control(
								$wp_customize,
								'avik_category_slider_3',
								array(
									'label'       => __('Select a category for the post slider 3','avik'),
									'settings'    => 'avik_category_slider_3',
									'section'     => 'avik_section_slider_3'
								)
								)
							);


							/* ------------------------------------------------------------------------------------------------------------------------*
							##  2.4 B Static/Video
							/* ------------------------------------------------------------------------------------------------------------------------*/

							$wp_customize->add_setting(
								'avik_category_static',
								array(
									'default'           => '',
									'sanitize_callback' => 'avik_sanitize_category_select',
								)
							);

							$wp_customize->add_control(
								new Avik_Customize_category_Control(
									$wp_customize,
									'avik_category_static',
									array(
										'label'       => __('Select a category for the post Header Static/Video','avik'),
										'settings'    => 'avik_category_static',
										'priority' => 11,
										'section'     => 'header_image'
									)
									)
								);


								/* ------------------------------------------------------------------------------------------------------------------------*
								##  2.5 Who we are
								/* ------------------------------------------------------------------------------------------------------------------------*/

								$avikwhoweare = new Avik_WP_Customize_Panel( $wp_customize, 'avik_whoweare', array(
									'title'    => __('Who we are','avik'),
									'priority' => 220,
								));

								$wp_customize->add_panel( $avikwhoweare );

								/* Page Who we are */

								$wp_customize->add_section(
									'avik_section_whoweare',
									array(
										'title'      => __('Page Who we are','avik'),
										'priority'   => 10,
										'capability' => 'edit_theme_options',
										'panel'      => 'avik_whoweare',
									)
								);

								// Page ID Who we are

								$wp_customize->add_setting( 'avik_page_id_whoweare', array(
									'capability' => 'edit_theme_options',
									'sanitize_callback' => 'avik_sanitize_dropdown_pages',
								) );

								$wp_customize->add_control( 'avik_page_id_whoweare', array(
									'type' => 'dropdown-pages',
									'section' => 'avik_section_whoweare',
									'label' => __( 'Page id Who we are','avik' ),
									'description' => __( 'Select your page for section Who we are.','avik' ),
									'priority'   => 5,
								) );

								/* Statistics Who we are */

								$avikStatisticswhoweare = new Avik_WP_Customize_Panel( $wp_customize, 'avik_statistics_whoweare', array(
									'title'    => __('Statistics Who we are','avik'),
									'priority' => 20,
									'panel'    => 'avik_whoweare',
								));

								$wp_customize->add_panel( $avikStatisticswhoweare );

								// General Statistics

								$wp_customize->add_section(
									'avik_section_general_statistics_whoweare',
									array(
										'title'      => __('General Statistics','avik'),
										'priority'   => 5,
										'capability' => 'edit_theme_options',
										'panel'      => 'avik_statistics_whoweare',
									)
								);

								// Enable/Disable Section Statistics

								$wp_customize->add_setting( 'avik_enable_statistics_whoweare',
								array(
									'default'   => 0,
									'transport' => 'refresh',
									'sanitize_callback' => 'avik_switch_sanitization'
								));

								$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_statistics_whoweare',
								array(
									'label'   => __( 'Enable/Disable Section Statistics.','avik' ),
									'section' => 'avik_section_general_statistics_whoweare',
									'priority'=> 10,
								)) );

								// Statistics 1

								$wp_customize->add_section(
									'avik_section_statistics_1_whoweare',
									array(
										'title'      => __('Statistics 1','avik'),
										'priority'   => 10,
										'capability' => 'edit_theme_options',
										'panel'      => 'avik_statistics_whoweare',
									)
								);

								// Icon 1 statistics

								$wp_customize->add_setting( 'avik_icon_1_statistics' , array(
									'default'   => 'far fa-flag',
									'transport' => 'refresh',
									'sanitize_callback' => 'wp_strip_all_tags',

								) );

								$wp_customize->add_control(
									'avik_icon_1_statistics' ,
									array(
										'label'      => __( 'Icon 1', 'avik' ),
										'section'    => 'avik_section_statistics_1_whoweare',
										'settings'   => 'avik_icon_1_statistics',
										'type'       => 'select',
										'choices'    => array(
											'fas fa-anchor'                => __('anchor','avik'),
											'far fa-address-book'          => __('address-book','avik'),
											'far fa-address-card'          => __('address-card','avik'),
											'fas fa-adjust'                => __('adjust','avik'),
											'fas fa-ambulance'             => __('ambulance','avik'),
											'fas fa-archive'               => __('archive','avik'),
											'fas fa-balance-scale'         => __('balance-scale','avik'),
											'fas fa-battery-three-quarters'=> __('battery','avik'),
											'fas fa-bell'                  => __('bel','avik'),
											'fas fa-bicycle'               => __('bicycle','avik'),
											'fas fa-blind'                 => __('blind','avik'),
											'fas fa-bolt'                  => __('bolt','avik'),
											'fas fa-book'                  => __('book','avik'),
											'fas fa-briefcase-medical'     => __('briefcase','avik'),
											'fas fa-bullhorn'              => __('bullhorn','avik'),
											'fas fa-bus'                   => __('bus','avik'),
											'fas fa-calculator'            => __('calculator','avik'),
											'fas fa-camera-retro'          => __('camera retro','avik'),
											'fas fa-car'                   => __('car','avik'),
											'fas fa-chevron-circle-down'   => __('chevron-circle-down','avik'),
											'fas fa-child'                 => __('child','avik'),
											'fas fa-cog'                   => __('cog','avik'),
											'fas fa-cogs'                  => __('cogs','avik'),
											'fas fa-comments'              => __('comments','avik'),
											'fas fa-coffee'                => __('coffee','avik'),
											'fas fa-cut'                   => __('cut','avik'),
											'fas fa-clock'                 => __('clock','avik'),
											'fas fa-clipboard'             => __('clipboard','avik'),
											'fas fa-clone'                 => __('clone','avik'),
											'fas fa-database'              => __('database','avik'),
											'fas fa-desktop'               => __('desktop','avik'),
											'fas fa-edit'                  => __('edit','avik'),
											'fas fa-envelope'              => __('envelepo','avik'),
											'fas fa-eye'                   => __('eye','avik'),
											'fas fa-eye-slash'             => __('eye-slash','avik'),
											'fas fa-female'                => __('female','avik'),
											'fas fa-file'                  => __('file','avik'),
											'fas fa-file-alt'              => __('file-alt','avik'),
											'fas fa-file-video'            => __('file-video','avik'),
											'fas fa-file-word'             => __('file-word','avik'),
											'far fa-flag'                  => __('flag','avik'),
											'fas fa-flask'                 => __('flask','avik'),
											'fas fa-folder'                => __('folder','avik'),
											'fas fa-folder-open'           => __('folder-open','avik'),
											'fas fa-gamepad'               => __('gamepad','avik'),
											'fas fa-gavel'                 => __('gavel','avik'),
											'fas fa-glass-martini'         => __('glass-martini','avik'),
											'fas fa-globe'                 => __('globe','avik'),
											'fas fa-graduation-cap'        => __('graduation-cap','avik'),
											'fas fa-handshake'             => __('handshake','avik'),
											'fas fa-home'                  => __('home','avik'),
											'fas fa-hourglass'             => __('hourglass','avik'),
											'fas fa-image'                 => __('image','avik'),
											'fas fa-info'                  => __('info','avik'),
											'fas fa-key'                   => __('key','avik'),
											'fas fa-laptop'                => __('laptop','avik'),
											'fas fa-lightbulb'             => __('lightbulb','avik'),
											'fas fa-link'                  => __('link','avik'),
											'fas fa-lock'                  => __('lock','avik'),
											'fas fa-male'                  => __('male','avik'),
											'fas fa-map'                   => __('map','avik'),
											'fas fa-map-marker'            => __('map-marker','avik'),
											'fas fa-music'                 => __('music','avik'),
											'fas fa-paint-brush'           => __('paint-brush','avik'),
											'fas fa-paper-plane'           => __('paper-plane','avik'),
											'fas fa-paperclip'             => __('paperclip','avik'),
											'fas fa-paste'                 => __('paste','avik'),
											'fas fa-phone'                 => __('phone','avik'),
											'fas fa-phone-volume'          => __('phone-volume','avik'),
											'fas fa-plane'                 => __('plane','avik'),
											'fas fa-play'                  => __('play','avik'),
											'fas fa-plug'                  => __('plug','avik'),
											'fas fa-plus'                  => __('plus','avik'),
											'fas fa-power-off'             => __('power-off','avik'),
											'fas fa-print'                 => __('print','avik'),
											'fas fa-question'              => __('question','avik'),
											'fas fa-road'                  => __('road','avik'),
											'fas fa-rocket'                => __('rocket','avik'),
											'fas fa-rss'                   => __('rss','avik'),
											'fas fa-rss-square'            => __('rss-square','avik'),
											'fas fa-save'                  => __('save','avik'),
											'fas fa-search'                => __('search','avik'),
											'fas fa-server'                => __('server','avik'),
											'fas fa-share-alt'             => __('share-alt','avik'),
											'fas fa-shield-alt'            => __('shield-alt','avik'),
											'fas fa-shopping-bag'          => __('shopping-bag','avik'),
											'fas fa-signal'                => __('signal','avik'),
											'fas fa-shopping-basket'       => __('shopping-basket','avik'),
											'fas fa-shopping-cart'         => __('shopping-cart','avik'),
											'fas fa-sitemap'               => __('sitemap','avik'),
											'far fa-smile'                 => __('smile','avik'),
											'fas fa-snowflake'             => __('snowflake','avik'),
											'fab fa-stack-overflow'        => __('stack-overflow','avik'),
											'fas fa-space-shuttle'         => __('space-shuttle','avik'),
											'fas fa-star'                  => __('star','avik'),
											'fas fa-street-view'           => __('street-view','avik'),
											'fas fa-subway'                => __('subway','avik'),
											'fas fa-tag'                   => __('tag','avik'),
											'fas fa-tags'                  => __('tags','avik'),
											'fas fa-tachometer-alt'        => __('tachometer-alt','avik'),
											'fas fa-tasks'                 => __('tasks','avik'),
											'fas fa-taxi'                  => __('taxi','avik'),
											'fas fa-thumbtack'             => __('thumbtack','avik'),
											'fas fa-tint'                  => __('tint','avik'),
											'fas fa-toggle-off'            => __('toggle-off','avik'),
											'fas fa-toggle-on'             => __('toggle-on','avik'),
											'fas fa-trash-alt'             => __('trash-alt','avik'),
											'fas fa-tree'                  => __('tree','avik'),
											'fas fa-truck'                 => __('truck','avik'),
											'fas fa-thumbtack'             => __('thumbtack','avik'),
											'fas fa-tv'                    => __('tv','avik'),
											'fas fa-umbrella'              => __('umbrella','avik'),
											'fas fa-universal-access'      => __('universal-access','avik'),
											'fas fa-university'            => __('university','avik'),
											'fas fa-unlock'                => __('unlock','avik'),
											'fas fa-user'                  => __('user','avik'),
											'fas fa-users'                 => __('users','avik'),
											'fas fa-user-secret'           => __('user-secret','avik'),
											'fas fa-utensils'              => __('utensils','avik'),
											'fas fa-video'                 => __('video','avik'),
											'fas fa-volume-up'             => __('volume-up','avik'),
											'fas fa-wifi'                  => __('wifi','avik'),
											'fas fa-wrench'                => __('wrench','avik'),

										) ) );

										// Number statistcs 1

										$wp_customize->add_setting( 'avik_max_numbers_1_statistics', array(
											'capability'        => 'edit_theme_options',
											'sanitize_callback' => 'absint',
											'default' => 2500,
										) );

										$wp_customize->add_control( 'avik_max_numbers_1_statistics', array(
											'type'        => 'number',
											'section'     => 'avik_section_statistics_1_whoweare',
											'priority'    => 20,
											'label'       => __( 'Max numbers for statistics 1','avik' ),
											'description' => __( 'Insert a custom number.','avik' ),
										) );

										// Title 1 statistics

										$wp_customize->add_setting( 'avik_title_1_statistics_whoweare', array(
											'capability'        => 'edit_theme_options',
											'default'           => '',
											'transport'         => 'postMessage',
											'sanitize_callback' => 'wp_filter_nohtml_kses',
										) );

										$wp_customize->add_control( 'avik_title_1_statistics_whoweare', array(
											'type'    => 'text',
											'section' => 'avik_section_statistics_1_whoweare',
											'priority'=> 30,
											'label'   => __( 'Title for statistics 1','avik' ),
										) );

										// Statistics 2

										$wp_customize->add_section(
											'avik_section_statistics_2_whoweare',
											array(
												'title'      => __('Statistics 2','avik'),
												'priority'   => 20,
												'capability' => 'edit_theme_options',
												'panel'      => 'avik_statistics_whoweare',
											)
										);

										// Icon 2 statistics

										$wp_customize->add_setting( 'avik_icon_2_statistics' , array(
											'default'   => 'far fa-smile',
											'transport' => 'refresh',
											'sanitize_callback' => 'wp_strip_all_tags',

										) );

										$wp_customize->add_control(
											'avik_icon_2_statistics' ,
											array(
												'label'      => __( 'Icon 2', 'avik' ),
												'section'    => 'avik_section_statistics_2_whoweare',
												'settings'   => 'avik_icon_2_statistics',
												'type'       => 'select',
												'choices'    => array(
													'fas fa-anchor'                => __('anchor','avik'),
													'far fa-address-book'          => __('address-book','avik'),
													'far fa-address-card'          => __('address-card','avik'),
													'fas fa-adjust'                => __('adjust','avik'),
													'fas fa-ambulance'             => __('ambulance','avik'),
													'fas fa-archive'               => __('archive','avik'),
													'fas fa-balance-scale'         => __('balance-scale','avik'),
													'fas fa-battery-three-quarters'=> __('battery','avik'),
													'fas fa-bell'                  => __('bel','avik'),
													'fas fa-bicycle'               => __('bicycle','avik'),
													'fas fa-blind'                 => __('blind','avik'),
													'fas fa-bolt'                  => __('bolt','avik'),
													'fas fa-book'                  => __('book','avik'),
													'fas fa-briefcase-medical'     => __('briefcase','avik'),
													'fas fa-bullhorn'              => __('bullhorn','avik'),
													'fas fa-bus'                   => __('bus','avik'),
													'fas fa-calculator'            => __('calculator','avik'),
													'fas fa-camera-retro'          => __('camera retro','avik'),
													'fas fa-car'                   => __('car','avik'),
													'fas fa-chevron-circle-down'   => __('chevron-circle-down','avik'),
													'fas fa-child'                 => __('child','avik'),
													'fas fa-cog'                   => __('cog','avik'),
													'fas fa-cogs'                  => __('cogs','avik'),
													'fas fa-comments'              => __('comments','avik'),
													'fas fa-coffee'                => __('coffee','avik'),
													'fas fa-cut'                   => __('cut','avik'),
													'fas fa-clock'                 => __('clock','avik'),
													'fas fa-clipboard'             => __('clipboard','avik'),
													'fas fa-clone'                 => __('clone','avik'),
													'fas fa-database'              => __('database','avik'),
													'fas fa-desktop'               => __('desktop','avik'),
													'fas fa-edit'                  => __('edit','avik'),
													'fas fa-envelope'              => __('envelepo','avik'),
													'fas fa-eye'                   => __('eye','avik'),
													'fas fa-eye-slash'             => __('eye-slash','avik'),
													'fas fa-female'                => __('female','avik'),
													'fas fa-file'                  => __('file','avik'),
													'fas fa-file-alt'              => __('file-alt','avik'),
													'fas fa-file-video'            => __('file-video','avik'),
													'fas fa-file-word'             => __('file-word','avik'),
													'far fa-flag'                  => __('flag','avik'),
													'fas fa-flask'                 => __('flask','avik'),
													'fas fa-folder'                => __('folder','avik'),
													'fas fa-folder-open'           => __('folder-open','avik'),
													'fas fa-gamepad'               => __('gamepad','avik'),
													'fas fa-gavel'                 => __('gavel','avik'),
													'fas fa-glass-martini'         => __('glass-martini','avik'),
													'fas fa-globe'                 => __('globe','avik'),
													'fas fa-graduation-cap'        => __('graduation-cap','avik'),
													'fas fa-handshake'             => __('handshake','avik'),
													'fas fa-home'                  => __('home','avik'),
													'fas fa-hourglass'             => __('hourglass','avik'),
													'fas fa-image'                 => __('image','avik'),
													'fas fa-info'                  => __('info','avik'),
													'fas fa-key'                   => __('key','avik'),
													'fas fa-laptop'                => __('laptop','avik'),
													'fas fa-lightbulb'             => __('lightbulb','avik'),
													'fas fa-link'                  => __('link','avik'),
													'fas fa-lock'                  => __('lock','avik'),
													'fas fa-male'                  => __('male','avik'),
													'fas fa-map'                   => __('map','avik'),
													'fas fa-map-marker'            => __('map-marker','avik'),
													'fas fa-music'                 => __('music','avik'),
													'fas fa-paint-brush'           => __('paint-brush','avik'),
													'fas fa-paper-plane'           => __('paper-plane','avik'),
													'fas fa-paperclip'             => __('paperclip','avik'),
													'fas fa-paste'                 => __('paste','avik'),
													'fas fa-phone'                 => __('phone','avik'),
													'fas fa-phone-volume'          => __('phone-volume','avik'),
													'fas fa-plane'                 => __('plane','avik'),
													'fas fa-play'                  => __('play','avik'),
													'fas fa-plug'                  => __('plug','avik'),
													'fas fa-plus'                  => __('plus','avik'),
													'fas fa-power-off'             => __('power-off','avik'),
													'fas fa-print'                 => __('print','avik'),
													'fas fa-question'              => __('question','avik'),
													'fas fa-road'                  => __('road','avik'),
													'fas fa-rocket'                => __('rocket','avik'),
													'fas fa-rss'                   => __('rss','avik'),
													'fas fa-rss-square'            => __('rss-square','avik'),
													'fas fa-save'                  => __('save','avik'),
													'fas fa-search'                => __('search','avik'),
													'fas fa-server'                => __('server','avik'),
													'fas fa-share-alt'             => __('share-alt','avik'),
													'fas fa-shield-alt'            => __('shield-alt','avik'),
													'fas fa-shopping-bag'          => __('shopping-bag','avik'),
													'fas fa-signal'                => __('signal','avik'),
													'fas fa-shopping-basket'       => __('shopping-basket','avik'),
													'fas fa-shopping-cart'         => __('shopping-cart','avik'),
													'fas fa-sitemap'               => __('sitemap','avik'),
													'far fa-smile'                 => __('smile','avik'),
													'fas fa-snowflake'             => __('snowflake','avik'),
													'fab fa-stack-overflow'        => __('stack-overflow','avik'),
													'fas fa-space-shuttle'         => __('space-shuttle','avik'),
													'fas fa-star'                  => __('star','avik'),
													'fas fa-street-view'           => __('street-view','avik'),
													'fas fa-subway'                => __('subway','avik'),
													'fas fa-tag'                   => __('tag','avik'),
													'fas fa-tags'                  => __('tags','avik'),
													'fas fa-tachometer-alt'        => __('tachometer-alt','avik'),
													'fas fa-tasks'                 => __('tasks','avik'),
													'fas fa-taxi'                  => __('taxi','avik'),
													'fas fa-thumbtack'             => __('thumbtack','avik'),
													'fas fa-tint'                  => __('tint','avik'),
													'fas fa-toggle-off'            => __('toggle-off','avik'),
													'fas fa-toggle-on'             => __('toggle-on','avik'),
													'fas fa-trash-alt'             => __('trash-alt','avik'),
													'fas fa-tree'                  => __('tree','avik'),
													'fas fa-truck'                 => __('truck','avik'),
													'fas fa-thumbtack'             => __('thumbtack','avik'),
													'fas fa-tv'                    => __('tv','avik'),
													'fas fa-umbrella'              => __('umbrella','avik'),
													'fas fa-universal-access'      => __('universal-access','avik'),
													'fas fa-university'            => __('university','avik'),
													'fas fa-unlock'                => __('unlock','avik'),
													'fas fa-user'                  => __('user','avik'),
													'fas fa-users'                 => __('users','avik'),
													'fas fa-user-secret'           => __('user-secret','avik'),
													'fas fa-utensils'              => __('utensils','avik'),
													'fas fa-video'                 => __('video','avik'),
													'fas fa-volume-up'             => __('volume-up','avik'),
													'fas fa-wifi'                  => __('wifi','avik'),
													'fas fa-wrench'                => __('wrench','avik'),


												) ) );

												// Number statistics 2

												$wp_customize->add_setting( 'avik_max_numbers_2_statistics', array(
													'capability'        => 'edit_theme_options',
													'sanitize_callback' => 'absint',
													'default' => 700,
												) );

												$wp_customize->add_control( 'avik_max_numbers_2_statistics', array(
													'type'        => 'number',
													'section'     => 'avik_section_statistics_2_whoweare',
													'priority'    => 20,
													'label'       => __( 'Max numbers for statistics 2','avik' ),
													'description' => __( 'Insert a custom number.','avik' ),
												) );

												// Title 2 statistics

												$wp_customize->add_setting( 'avik_title_2_statistics_whoweare', array(
													'capability'        => 'edit_theme_options',
													'default'           => '',
													'transport'         => 'postMessage',
													'sanitize_callback' => 'wp_filter_nohtml_kses',
												) );

												$wp_customize->add_control( 'avik_title_2_statistics_whoweare', array(
													'type'    => 'text',
													'section' => 'avik_section_statistics_2_whoweare',
													'priority'=> 30,
													'label'   => __( 'Title for statistics 2','avik' ),
												) );

												// Statistics 3

												$wp_customize->add_section(
													'avik_section_statistics_3_whoweare',
													array(
														'title'      => __('Statistics 3','avik'),
														'priority'   => 30,
														'capability' => 'edit_theme_options',
														'panel'      => 'avik_statistics_whoweare',
													)
												);

												// Icon 3 statistics

												$wp_customize->add_setting( 'avik_icon_3_statistics' , array(
													'default'   => 'fas fa-thumbtack',
													'transport' => 'refresh',
													'sanitize_callback' => 'wp_strip_all_tags',

												) );

												$wp_customize->add_control(
													'avik_icon_3_statistics' ,
													array(
														'label'      => __( 'Icon 3', 'avik' ),
														'section'    => 'avik_section_statistics_3_whoweare',
														'settings'   => 'avik_icon_3_statistics',
														'type'       => 'select',
														'choices'    => array(
															'fas fa-anchor'                => __('anchor','avik'),
															'far fa-address-book'          => __('address-book','avik'),
															'far fa-address-card'          => __('address-card','avik'),
															'fas fa-adjust'                => __('adjust','avik'),
															'fas fa-ambulance'             => __('ambulance','avik'),
															'fas fa-archive'               => __('archive','avik'),
															'fas fa-balance-scale'         => __('balance-scale','avik'),
															'fas fa-battery-three-quarters'=> __('battery','avik'),
															'fas fa-bell'                  => __('bel','avik'),
															'fas fa-bicycle'               => __('bicycle','avik'),
															'fas fa-blind'                 => __('blind','avik'),
															'fas fa-bolt'                  => __('bolt','avik'),
															'fas fa-book'                  => __('book','avik'),
															'fas fa-briefcase-medical'     => __('briefcase','avik'),
															'fas fa-bullhorn'              => __('bullhorn','avik'),
															'fas fa-bus'                   => __('bus','avik'),
															'fas fa-calculator'            => __('calculator','avik'),
															'fas fa-camera-retro'          => __('camera retro','avik'),
															'fas fa-car'                   => __('car','avik'),
															'fas fa-chevron-circle-down'   => __('chevron-circle-down','avik'),
															'fas fa-child'                 => __('child','avik'),
															'fas fa-cog'                   => __('cog','avik'),
															'fas fa-cogs'                  => __('cogs','avik'),
															'fas fa-comments'              => __('comments','avik'),
															'fas fa-coffee'                => __('coffee','avik'),
															'fas fa-cut'                   => __('cut','avik'),
															'fas fa-clock'                 => __('clock','avik'),
															'fas fa-clipboard'             => __('clipboard','avik'),
															'fas fa-clone'                 => __('clone','avik'),
															'fas fa-database'              => __('database','avik'),
															'fas fa-desktop'               => __('desktop','avik'),
															'fas fa-edit'                  => __('edit','avik'),
															'fas fa-envelope'              => __('envelepo','avik'),
															'fas fa-eye'                   => __('eye','avik'),
															'fas fa-eye-slash'             => __('eye-slash','avik'),
															'fas fa-female'                => __('female','avik'),
															'fas fa-file'                  => __('file','avik'),
															'fas fa-file-alt'              => __('file-alt','avik'),
															'fas fa-file-video'            => __('file-video','avik'),
															'fas fa-file-word'             => __('file-word','avik'),
															'far fa-flag'                  => __('flag','avik'),
															'fas fa-flask'                 => __('flask','avik'),
															'fas fa-folder'                => __('folder','avik'),
															'fas fa-folder-open'           => __('folder-open','avik'),
															'fas fa-gamepad'               => __('gamepad','avik'),
															'fas fa-gavel'                 => __('gavel','avik'),
															'fas fa-glass-martini'         => __('glass-martini','avik'),
															'fas fa-globe'                 => __('globe','avik'),
															'fas fa-graduation-cap'        => __('graduation-cap','avik'),
															'fas fa-handshake'             => __('handshake','avik'),
															'fas fa-home'                  => __('home','avik'),
															'fas fa-hourglass'             => __('hourglass','avik'),
															'fas fa-image'                 => __('image','avik'),
															'fas fa-info'                  => __('info','avik'),
															'fas fa-key'                   => __('key','avik'),
															'fas fa-laptop'                => __('laptop','avik'),
															'fas fa-lightbulb'             => __('lightbulb','avik'),
															'fas fa-link'                  => __('link','avik'),
															'fas fa-lock'                  => __('lock','avik'),
															'fas fa-male'                  => __('male','avik'),
															'fas fa-map'                   => __('map','avik'),
															'fas fa-map-marker'            => __('map-marker','avik'),
															'fas fa-music'                 => __('music','avik'),
															'fas fa-paint-brush'           => __('paint-brush','avik'),
															'fas fa-paper-plane'           => __('paper-plane','avik'),
															'fas fa-paperclip'             => __('paperclip','avik'),
															'fas fa-paste'                 => __('paste','avik'),
															'fas fa-phone'                 => __('phone','avik'),
															'fas fa-phone-volume'          => __('phone-volume','avik'),
															'fas fa-plane'                 => __('plane','avik'),
															'fas fa-play'                  => __('play','avik'),
															'fas fa-plug'                  => __('plug','avik'),
															'fas fa-plus'                  => __('plus','avik'),
															'fas fa-power-off'             => __('power-off','avik'),
															'fas fa-print'                 => __('print','avik'),
															'fas fa-question'              => __('question','avik'),
															'fas fa-road'                  => __('road','avik'),
															'fas fa-rocket'                => __('rocket','avik'),
															'fas fa-rss'                   => __('rss','avik'),
															'fas fa-rss-square'            => __('rss-square','avik'),
															'fas fa-save'                  => __('save','avik'),
															'fas fa-search'                => __('search','avik'),
															'fas fa-server'                => __('server','avik'),
															'fas fa-share-alt'             => __('share-alt','avik'),
															'fas fa-shield-alt'            => __('shield-alt','avik'),
															'fas fa-shopping-bag'          => __('shopping-bag','avik'),
															'fas fa-signal'                => __('signal','avik'),
															'fas fa-shopping-basket'       => __('shopping-basket','avik'),
															'fas fa-shopping-cart'         => __('shopping-cart','avik'),
															'fas fa-sitemap'               => __('sitemap','avik'),
															'far fa-smile'                 => __('smile','avik'),
															'fas fa-snowflake'             => __('snowflake','avik'),
															'fab fa-stack-overflow'        => __('stack-overflow','avik'),
															'fas fa-space-shuttle'         => __('space-shuttle','avik'),
															'fas fa-star'                  => __('star','avik'),
															'fas fa-street-view'           => __('street-view','avik'),
															'fas fa-subway'                => __('subway','avik'),
															'fas fa-tag'                   => __('tag','avik'),
															'fas fa-tags'                  => __('tags','avik'),
															'fas fa-tachometer-alt'        => __('tachometer-alt','avik'),
															'fas fa-tasks'                 => __('tasks','avik'),
															'fas fa-taxi'                  => __('taxi','avik'),
															'fas fa-thumbtack'             => __('thumbtack','avik'),
															'fas fa-tint'                  => __('tint','avik'),
															'fas fa-toggle-off'            => __('toggle-off','avik'),
															'fas fa-toggle-on'             => __('toggle-on','avik'),
															'fas fa-trash-alt'             => __('trash-alt','avik'),
															'fas fa-tree'                  => __('tree','avik'),
															'fas fa-truck'                 => __('truck','avik'),
															'fas fa-thumbtack'             => __('thumbtack','avik'),
															'fas fa-tv'                    => __('tv','avik'),
															'fas fa-umbrella'              => __('umbrella','avik'),
															'fas fa-universal-access'      => __('universal-access','avik'),
															'fas fa-university'            => __('university','avik'),
															'fas fa-unlock'                => __('unlock','avik'),
															'fas fa-user'                  => __('user','avik'),
															'fas fa-users'                 => __('users','avik'),
															'fas fa-user-secret'           => __('user-secret','avik'),
															'fas fa-utensils'              => __('utensils','avik'),
															'fas fa-video'                 => __('video','avik'),
															'fas fa-volume-up'             => __('volume-up','avik'),
															'fas fa-wifi'                  => __('wifi','avik'),
															'fas fa-wrench'                => __('wrench','avik'),


														) ) );

														// Number statistics 3

														$wp_customize->add_setting( 'avik_max_numbers_3_statistics', array(
															'capability'        => 'edit_theme_options',
															'sanitize_callback' => 'absint',
															'default' => 1550,
														) );

														$wp_customize->add_control( 'avik_max_numbers_3_statistics', array(
															'type'        => 'number',
															'section'     => 'avik_section_statistics_3_whoweare',
															'priority'    => 20,
															'label'       => __( 'Max numbers for statistics 3','avik' ),
															'description' => __( 'Insert a custom number.','avik' ),
														) );

														// Title 3 statistics

														$wp_customize->add_setting( 'avik_title_3_statistics_whoweare', array(
															'capability'        => 'edit_theme_options',
															'default'           => '',
															'transport'         => 'postMessage',
															'sanitize_callback' => 'wp_filter_nohtml_kses',
														) );

														$wp_customize->add_control( 'avik_title_3_statistics_whoweare', array(
															'type'    => 'text',
															'section' => 'avik_section_statistics_3_whoweare',
															'priority'=> 30,
															'label'   => __( 'Title for statistics 3','avik' ),
														) );

														// Statistics 4

														$wp_customize->add_section(
															'avik_section_statistics_4_whoweare',
															array(
																'title'      => __('Statistics 4','avik'),
																'priority'   => 40,
																'capability' => 'edit_theme_options',
																'panel'      => 'avik_statistics_whoweare',
															)
														);

														// Icon 4 statistics

														$wp_customize->add_setting( 'avik_icon_4_statistics' , array(
															'default'   => 'fas fa-globe',
															'transport' => 'refresh',
															'sanitize_callback' => 'wp_strip_all_tags',

														) );

														$wp_customize->add_control(
															'avik_icon_4_statistics' ,
															array(
																'label'      => __( 'Icon 4', 'avik' ),
																'section'    => 'avik_section_statistics_4_whoweare',
																'settings'   => 'avik_icon_4_statistics',
																'type'       => 'select',
																'choices'    => array(
																	'fas fa-anchor'                => __('anchor','avik'),
																	'far fa-address-book'          => __('address-book','avik'),
																	'far fa-address-card'          => __('address-card','avik'),
																	'fas fa-adjust'                => __('adjust','avik'),
																	'fas fa-ambulance'             => __('ambulance','avik'),
																	'fas fa-archive'               => __('archive','avik'),
																	'fas fa-balance-scale'         => __('balance-scale','avik'),
																	'fas fa-battery-three-quarters'=> __('battery','avik'),
																	'fas fa-bell'                  => __('bel','avik'),
																	'fas fa-bicycle'               => __('bicycle','avik'),
																	'fas fa-blind'                 => __('blind','avik'),
																	'fas fa-bolt'                  => __('bolt','avik'),
																	'fas fa-book'                  => __('book','avik'),
																	'fas fa-briefcase-medical'     => __('briefcase','avik'),
																	'fas fa-bullhorn'              => __('bullhorn','avik'),
																	'fas fa-bus'                   => __('bus','avik'),
																	'fas fa-calculator'            => __('calculator','avik'),
																	'fas fa-camera-retro'          => __('camera retro','avik'),
																	'fas fa-car'                   => __('car','avik'),
																	'fas fa-chevron-circle-down'   => __('chevron-circle-down','avik'),
																	'fas fa-child'                 => __('child','avik'),
																	'fas fa-cog'                   => __('cog','avik'),
																	'fas fa-cogs'                  => __('cogs','avik'),
																	'fas fa-comments'              => __('comments','avik'),
																	'fas fa-coffee'                => __('coffee','avik'),
																	'fas fa-cut'                   => __('cut','avik'),
																	'fas fa-clock'                 => __('clock','avik'),
																	'fas fa-clipboard'             => __('clipboard','avik'),
																	'fas fa-clone'                 => __('clone','avik'),
																	'fas fa-database'              => __('database','avik'),
																	'fas fa-desktop'               => __('desktop','avik'),
																	'fas fa-edit'                  => __('edit','avik'),
																	'fas fa-envelope'              => __('envelepo','avik'),
																	'fas fa-eye'                   => __('eye','avik'),
																	'fas fa-eye-slash'             => __('eye-slash','avik'),
																	'fas fa-female'                => __('female','avik'),
																	'fas fa-file'                  => __('file','avik'),
																	'fas fa-file-alt'              => __('file-alt','avik'),
																	'fas fa-file-video'            => __('file-video','avik'),
																	'fas fa-file-word'             => __('file-word','avik'),
																	'far fa-flag'                  => __('flag','avik'),
																	'fas fa-flask'                 => __('flask','avik'),
																	'fas fa-folder'                => __('folder','avik'),
																	'fas fa-folder-open'           => __('folder-open','avik'),
																	'fas fa-gamepad'               => __('gamepad','avik'),
																	'fas fa-gavel'                 => __('gavel','avik'),
																	'fas fa-glass-martini'         => __('glass-martini','avik'),
																	'fas fa-globe'                 => __('globe','avik'),
																	'fas fa-graduation-cap'        => __('graduation-cap','avik'),
																	'fas fa-handshake'             => __('handshake','avik'),
																	'fas fa-home'                  => __('home','avik'),
																	'fas fa-hourglass'             => __('hourglass','avik'),
																	'fas fa-image'                 => __('image','avik'),
																	'fas fa-info'                  => __('info','avik'),
																	'fas fa-key'                   => __('key','avik'),
																	'fas fa-laptop'                => __('laptop','avik'),
																	'fas fa-lightbulb'             => __('lightbulb','avik'),
																	'fas fa-link'                  => __('link','avik'),
																	'fas fa-lock'                  => __('lock','avik'),
																	'fas fa-male'                  => __('male','avik'),
																	'fas fa-map'                   => __('map','avik'),
																	'fas fa-map-marker'            => __('map-marker','avik'),
																	'fas fa-music'                 => __('music','avik'),
																	'fas fa-paint-brush'           => __('paint-brush','avik'),
																	'fas fa-paper-plane'           => __('paper-plane','avik'),
																	'fas fa-paperclip'             => __('paperclip','avik'),
																	'fas fa-paste'                 => __('paste','avik'),
																	'fas fa-phone'                 => __('phone','avik'),
																	'fas fa-phone-volume'          => __('phone-volume','avik'),
																	'fas fa-plane'                 => __('plane','avik'),
																	'fas fa-play'                  => __('play','avik'),
																	'fas fa-plug'                  => __('plug','avik'),
																	'fas fa-plus'                  => __('plus','avik'),
																	'fas fa-power-off'             => __('power-off','avik'),
																	'fas fa-print'                 => __('print','avik'),
																	'fas fa-question'              => __('question','avik'),
																	'fas fa-road'                  => __('road','avik'),
																	'fas fa-rocket'                => __('rocket','avik'),
																	'fas fa-rss'                   => __('rss','avik'),
																	'fas fa-rss-square'            => __('rss-square','avik'),
																	'fas fa-save'                  => __('save','avik'),
																	'fas fa-search'                => __('search','avik'),
																	'fas fa-server'                => __('server','avik'),
																	'fas fa-share-alt'             => __('share-alt','avik'),
																	'fas fa-shield-alt'            => __('shield-alt','avik'),
																	'fas fa-shopping-bag'          => __('shopping-bag','avik'),
																	'fas fa-signal'                => __('signal','avik'),
																	'fas fa-shopping-basket'       => __('shopping-basket','avik'),
																	'fas fa-shopping-cart'         => __('shopping-cart','avik'),
																	'fas fa-sitemap'               => __('sitemap','avik'),
																	'far fa-smile'                 => __('smile','avik'),
																	'fas fa-snowflake'             => __('snowflake','avik'),
																	'fab fa-stack-overflow'        => __('stack-overflow','avik'),
																	'fas fa-space-shuttle'         => __('space-shuttle','avik'),
																	'fas fa-star'                  => __('star','avik'),
																	'fas fa-street-view'           => __('street-view','avik'),
																	'fas fa-subway'                => __('subway','avik'),
																	'fas fa-tag'                   => __('tag','avik'),
																	'fas fa-tags'                  => __('tags','avik'),
																	'fas fa-tachometer-alt'        => __('tachometer-alt','avik'),
																	'fas fa-tasks'                 => __('tasks','avik'),
																	'fas fa-taxi'                  => __('taxi','avik'),
																	'fas fa-thumbtack'             => __('thumbtack','avik'),
																	'fas fa-tint'                  => __('tint','avik'),
																	'fas fa-toggle-off'            => __('toggle-off','avik'),
																	'fas fa-toggle-on'             => __('toggle-on','avik'),
																	'fas fa-trash-alt'             => __('trash-alt','avik'),
																	'fas fa-tree'                  => __('tree','avik'),
																	'fas fa-truck'                 => __('truck','avik'),
																	'fas fa-thumbtack'             => __('thumbtack','avik'),
																	'fas fa-tv'                    => __('tv','avik'),
																	'fas fa-umbrella'              => __('umbrella','avik'),
																	'fas fa-universal-access'      => __('universal-access','avik'),
																	'fas fa-university'            => __('university','avik'),
																	'fas fa-unlock'                => __('unlock','avik'),
																	'fas fa-user'                  => __('user','avik'),
																	'fas fa-users'                 => __('users','avik'),
																	'fas fa-user-secret'           => __('user-secret','avik'),
																	'fas fa-utensils'              => __('utensils','avik'),
																	'fas fa-video'                 => __('video','avik'),
																	'fas fa-volume-up'             => __('volume-up','avik'),
																	'fas fa-wifi'                  => __('wifi','avik'),
																	'fas fa-wrench'                => __('wrench','avik'),


																) ) );

																// Number statistics 4

																$wp_customize->add_setting( 'avik_max_numbers_4_statistics', array(
																	'capability'        => 'edit_theme_options',
																	'sanitize_callback' => 'absint',
																	'default' => 480,
																) );

																$wp_customize->add_control( 'avik_max_numbers_4_statistics', array(
																	'type'        => 'number',
																	'section'     => 'avik_section_statistics_4_whoweare',
																	'priority'    => 20,
																	'label'       => __( 'Max numbers for statistics 4','avik' ),
																	'description' => __( 'Insert a custom number.','avik' ),
																) );

																// Title 4 statistics

																$wp_customize->add_setting( 'avik_title_4_statistics_whoweare', array(
																	'capability'        => 'edit_theme_options',
																	'default'           => '',
																	'transport'         => 'postMessage',
																	'sanitize_callback' => 'wp_filter_nohtml_kses',
																) );

																$wp_customize->add_control( 'avik_title_4_statistics_whoweare', array(
																	'type'    => 'text',
																	'section' => 'avik_section_statistics_4_whoweare',
																	'priority'=> 30,
																	'label'   => __( 'Title for statistics 4','avik' ),
																) );

																/* Team Who we are */

																$avikTeamwhoweare = new Avik_WP_Customize_Panel( $wp_customize, 'avik_team_whoweare', array(
																	'title'    => __('Team Who we are','avik'),
																	'priority' => 30,
																	'panel'    => 'avik_whoweare',
																));

																$wp_customize->add_panel( $avikTeamwhoweare );

																// General Team Who we are

																$wp_customize->add_section(
																	'avik_section_general_team_whoweare',
																	array(
																		'title'      => __('General Team','avik'),
																		'priority'   => 10,
																		'capability' => 'edit_theme_options',
																		'panel'      => 'avik_team_whoweare',
																	)
																);

																// Enable/Disable Section Team

																$wp_customize->add_setting( 'avik_enable_team_whoweare',
																array(
																	'default'   => 0,
																	'transport' => 'refresh',
																	'sanitize_callback' => 'avik_switch_sanitization'
																));

																$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_team_whoweare',
																array(
																	'label'   => __( 'Enable/Disable Section Team.','avik' ),
																	'section' => 'avik_section_general_team_whoweare',
																	'priority'=> 5,
																)) );

																// Title general Team Who we are

																$wp_customize->add_setting( 'avik_title_general_team_whoweare', array(
																	'capability'        => 'edit_theme_options',
																	'default'           => '',
																	'transport'         => 'postMessage',
																	'sanitize_callback' => 'wp_filter_nohtml_kses',
																) );

																$wp_customize->add_control( 'avik_title_general_team_whoweare', array(
																	'type'            => 'text',
																	'section'         => 'avik_section_general_team_whoweare',
																	'active_callback' => 'avik_enable_team_whoweare',
																	'priority'        => 10,
																	'label'           => __( 'Title general Team','avik' ),
																) );


																// Team 1 Who we are

																$wp_customize->add_section(
																	'avik_section_team_1_whoweare',
																	array(
																		'title'      => __('Team 1','avik'),
																		'priority'   => 20,
																		'capability' => 'edit_theme_options',
																		'panel'      => 'avik_team_whoweare',
																	)
																);

																// Category post Team 1

																$wp_customize->add_setting(
																	'avik_team_1_category',
																	array(
																		'default'   => '',
																		'sanitize_callback' => 'avik_sanitize_category_select',
																	)
																);

																$wp_customize->add_control(
																	new Avik_Customize_category_Control(
																		$wp_customize,
																		'avik_team_1_category',
																		array(
																			'label'    => __('Select Category Post for Team 1','avik'),
																			'description' => __( 'Select the category to show the posts for Team 1.','avik' ),
																			'settings' => 'avik_team_1_category',
																			'section'  => 'avik_section_team_1_whoweare',
																			'priority'=> 10,
																		)
																		)
																	);

																	// Social Team 1

																	// Facebook

																	$wp_customize->add_setting( 'avik_enable_facebook_icon_team_1',
																	array(
																		'default'   => 1,
																		'transport' => 'refresh',
																		'sanitize_callback' => 'avik_switch_sanitization'
																	));

																	$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_facebook_icon_team_1',
																	array(
																		'label'   => __( 'Enable/Disable Facebook.','avik' ),
																		'section' => 'avik_section_team_1_whoweare',
																		'priority'=> 30,
																	)) );

																	// Url Facebook

																	$wp_customize->add_setting( 'avik_link_facebook_icon_team_1',
																	array(
																		'default'          => '',
																		'transport'        => 'refresh',
																		'sanitize_callback'=> 'esc_url_raw'
																	)
																);

																$wp_customize->add_control( 'avik_link_facebook_icon_team_1',
																array(
																	'label'           => __( 'Link Facebook','avik' ),
																	'section'         => 'avik_section_team_1_whoweare',
																	'type'            => 'url',
																	'priority'        => 35,
																	'active_callback' => 'avik_enable_facebook_icon_team_1',
																	'input_attrs'     => array(
																		'class'        => 'my-custom-class',
																		'style'        => 'border: 1px solid #2885bb',
																		'placeholder'  => __( 'Enter link...','avik' ),
																	), ));

																	// Twitter

																	$wp_customize->add_setting( 'avik_enable_twitter_icon_team_1',
																	array(
																		'default'           => 1,
																		'transport'         => 'refresh',
																		'sanitize_callback' => 'avik_switch_sanitization'
																	));

																	$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_twitter_icon_team_1',
																	array(
																		'label'   => __( 'Enable/Disable Twitter.','avik' ),
																		'section' => 'avik_section_team_1_whoweare',
																		'priority'=> 40,
																	)) );

																	// Url Twitter

																	$wp_customize->add_setting( 'avik_link_twitter_icon_team_1',
																	array(
																		'default'           => '',
																		'transport'         => 'refresh',
																		'sanitize_callback' => 'esc_url_raw'
																	)
																);

																$wp_customize->add_control( 'avik_link_twitter_icon_team_1',
																array(
																	'label'           => __( 'Link Twitter','avik' ),
																	'section'         => 'avik_section_team_1_whoweare',
																	'type'            => 'url',
																	'priority'        => 45,
																	'active_callback' => 'avik_enable_twitter_icon_team_1',
																	'input_attrs'     => array(
																		'class'        => 'my-custom-class',
																		'style'        => 'border: 1px solid #2885bb',
																		'placeholder'  => __( 'Enter link...','avik' ),
																	), ));

																	// Instagram

																	$wp_customize->add_setting( 'avik_enable_instagram_icon_team_1',
																	array(
																		'default'           => 1,
																		'transport'         => 'refresh',
																		'sanitize_callback' => 'avik_switch_sanitization'
																	));

																	$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_instagram_icon_team_1',
																	array(
																		'label'   => __( 'Enable/Disable Instagram.','avik' ),
																		'section' => 'avik_section_team_1_whoweare',
																		'priority'=> 50,
																	)) );

																	// Url Instagram

																	$wp_customize->add_setting( 'avik_link_instagram_icon_team_1',
																	array(
																		'default'           => '',
																		'transport'         => 'refresh',
																		'sanitize_callback' => 'esc_url_raw'
																	)
																);

																$wp_customize->add_control( 'avik_link_instagram_icon_team_1',
																array(
																	'label'           => __( 'Link Instagram','avik' ),
																	'section'         => 'avik_section_team_1_whoweare',
																	'type'            => 'url',
																	'priority'        => 55,
																	'active_callback' => 'avik_enable_instagram_icon_team_1',
																	'input_attrs'     => array(
																		'class'        => 'my-custom-class',
																		'style'        => 'border: 1px solid #2885bb',
																		'placeholder'  => __( 'Enter link...','avik' ),
																	), ));

																	// Linkedin

																	$wp_customize->add_setting( 'avik_enable_linkedin_icon_team_1',
																	array(
																		'default'           => 1,
																		'transport'         => 'refresh',
																		'sanitize_callback' => 'avik_switch_sanitization'
																	));

																	$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_linkedin_icon_team_1',
																	array(
																		'label'   => __( 'Enable/Disable Linkedin.','avik' ),
																		'section' => 'avik_section_team_1_whoweare',
																		'priority'=> 60,
																	)) );

																	// Url Linkedin

																	$wp_customize->add_setting( 'avik_link_linkedin_icon_team_1',
																	array(
																		'default'           => '',
																		'transport'         => 'refresh',
																		'sanitize_callback' => 'esc_url_raw'
																	)
																);

																$wp_customize->add_control( 'avik_link_linkedin_icon_team_1',
																array(
																	'label'           => __( 'Link Linkedin','avik' ),
																	'section'         => 'avik_section_team_1_whoweare',
																	'type'            => 'url',
																	'priority'        =>  65,
																	'active_callback' => 'avik_enable_linkedin_icon_team_1',
																	'input_attrs'     => array(
																		'class'        => 'my-custom-class',
																		'style'        => 'border: 1px solid #2885bb',
																		'placeholder'  => __( 'Enter link...','avik' ),
																	), ));

																	// Google Plus

																	$wp_customize->add_setting( 'avik_enable_google_plus_icon_team_1',
																	array(
																		'default'           => 1,
																		'transport'         => 'refresh',
																		'sanitize_callback' => 'avik_switch_sanitization'
																	));

																	$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_google_plus_icon_team_1',
																	array(
																		'label'   => __( 'Enable/Disable Google Plus.','avik' ),
																		'section' => 'avik_section_team_1_whoweare',
																		'priority'=> 70,
																	)) );

																	// Url Google Plus

																	$wp_customize->add_setting( 'avik_link_google_plus_icon_team_1',
																	array(
																		'default'           => '',
																		'transport'         => 'refresh',
																		'sanitize_callback' => 'esc_url_raw'
																	)
																);

																$wp_customize->add_control( 'avik_link_google_plus_icon_team_1',
																array(
																	'label'           => __( 'Link Google Plus','avik' ),
																	'section'         => 'avik_section_team_1_whoweare',
																	'type'            => 'url',
																	'priority'        => 75,
																	'active_callback' => 'avik_enable_google_plus_icon_team_1',
																	'input_attrs'     => array(
																		'class'        => 'my-custom-class',
																		'style'        => 'border: 1px solid #2885bb',
																		'placeholder'  => __( 'Enter link...','avik' ),
																	), ));


																	// Team 2 Who we are

																	$wp_customize->add_section(
																		'avik_section_team_2_whoweare',
																		array(
																			'title'      => __('Team 2','avik'),
																			'priority'   => 30,
																			'capability' => 'edit_theme_options',
																			'panel'      => 'avik_team_whoweare',
																		)
																	);

																	// Category post Team 2

																	$wp_customize->add_setting(
																		'avik_team_2_category',
																		array(
																			'default'   => '',
																			'sanitize_callback' => 'avik_sanitize_category_select',
																		)
																	);

																	$wp_customize->add_control(
																		new Avik_Customize_category_Control(
																			$wp_customize,
																			'avik_team_2_category',
																			array(
																				'label'    => __('Select Category Post for Team 2','avik'),
																				'description' => __( 'Select the category to show the posts for Team 2.','avik' ),
																				'settings' => 'avik_team_2_category',
																				'section'  => 'avik_section_team_2_whoweare',
																				'priority'=> 10,
																			)
																			)
																		);

																		// Social Team 2

																		// Facebook

																		$wp_customize->add_setting( 'avik_enable_facebook_icon_team_2',
																		array(
																			'default'   => 1,
																			'transport' => 'refresh',
																			'sanitize_callback' => 'avik_switch_sanitization'
																		));

																		$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_facebook_icon_team_2',
																		array(
																			'label'   => __( 'Enable/Disable Facebook.','avik' ),
																			'section' => 'avik_section_team_2_whoweare',
																			'priority'=> 30,
																		)) );

																		// Url Facebook

																		$wp_customize->add_setting( 'avik_link_facebook_icon_team_2',
																		array(
																			'default'          => '',
																			'transport'        => 'refresh',
																			'sanitize_callback'=> 'esc_url_raw'
																		)
																	);

																	$wp_customize->add_control( 'avik_link_facebook_icon_team_2',
																	array(
																		'label'           => __( 'Link Facebook','avik' ),
																		'section'         => 'avik_section_team_2_whoweare',
																		'type'            => 'url',
																		'priority'        => 35,
																		'active_callback' => 'avik_enable_facebook_icon_team_2',
																		'input_attrs'     => array(
																			'class'        => 'my-custom-class',
																			'style'        => 'border: 1px solid #2885bb',
																			'placeholder'  => __( 'Enter link...','avik' ),
																		), ));

																		// Twitter

																		$wp_customize->add_setting( 'avik_enable_twitter_icon_team_2',
																		array(
																			'default'           => 1,
																			'transport'         => 'refresh',
																			'sanitize_callback' => 'avik_switch_sanitization'
																		));

																		$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_twitter_icon_team_2',
																		array(
																			'label'   => __( 'Enable/Disable Twitter.','avik' ),
																			'section' => 'avik_section_team_2_whoweare',
																			'priority'=> 40,
																		)) );

																		// Url Twitter

																		$wp_customize->add_setting( 'avik_link_twitter_icon_team_2',
																		array(
																			'default'           => '',
																			'transport'         => 'refresh',
																			'sanitize_callback' => 'esc_url_raw'
																		)
																	);

																	$wp_customize->add_control( 'avik_link_twitter_icon_team_2',
																	array(
																		'label'           => __( 'Link Twitter','avik' ),
																		'section'         => 'avik_section_team_2_whoweare',
																		'type'            => 'url',
																		'priority'        => 45,
																		'active_callback' => 'avik_enable_twitter_icon_team_2',
																		'input_attrs'     => array(
																			'class'        => 'my-custom-class',
																			'style'        => 'border: 1px solid #2885bb',
																			'placeholder'  => __( 'Enter link...','avik' ),
																		), ));

																		// Instagram

																		$wp_customize->add_setting( 'avik_enable_instagram_icon_team_2',
																		array(
																			'default'           => 1,
																			'transport'         => 'refresh',
																			'sanitize_callback' => 'avik_switch_sanitization'
																		));

																		$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_instagram_icon_team_2',
																		array(
																			'label'   => __( 'Enable/Disable Instagram.','avik' ),
																			'section' => 'avik_section_team_2_whoweare',
																			'priority'=> 50,
																		)) );

																		// Url Instagram

																		$wp_customize->add_setting( 'avik_link_instagram_icon_team_2',
																		array(
																			'default'           => '',
																			'transport'         => 'refresh',
																			'sanitize_callback' => 'esc_url_raw'
																		)
																	);

																	$wp_customize->add_control( 'avik_link_instagram_icon_team_2',
																	array(
																		'label'           => __( 'Link Instagram','avik' ),
																		'section'         => 'avik_section_team_2_whoweare',
																		'type'            => 'url',
																		'priority'        => 55,
																		'active_callback' => 'avik_enable_instagram_icon_team_2',
																		'input_attrs'     => array(
																			'class'        => 'my-custom-class',
																			'style'        => 'border: 1px solid #2885bb',
																			'placeholder'  => __( 'Enter link...','avik' ),
																		), ));

																		// Linkedin

																		$wp_customize->add_setting( 'avik_enable_linkedin_icon_team_2',
																		array(
																			'default'           => 1,
																			'transport'         => 'refresh',
																			'sanitize_callback' => 'avik_switch_sanitization'
																		));

																		$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_linkedin_icon_team_2',
																		array(
																			'label'   => __( 'Enable/Disable Linkedin.','avik' ),
																			'section' => 'avik_section_team_2_whoweare',
																			'priority'=> 60,
																		)) );

																		// Url Linkedin

																		$wp_customize->add_setting( 'avik_link_linkedin_icon_team_2',
																		array(
																			'default'           => '',
																			'transport'         => 'refresh',
																			'sanitize_callback' => 'esc_url_raw'
																		)
																	);

																	$wp_customize->add_control( 'avik_link_linkedin_icon_team_2',
																	array(
																		'label'           => __( 'Link Linkedin','avik' ),
																		'section'         => 'avik_section_team_2_whoweare',
																		'type'            => 'url',
																		'priority'        =>  65,
																		'active_callback' => 'avik_enable_linkedin_icon_team_2',
																		'input_attrs'     => array(
																			'class'        => 'my-custom-class',
																			'style'        => 'border: 1px solid #2885bb',
																			'placeholder'  => __( 'Enter link...','avik' ),
																		), ));

																		// Google Plus

																		$wp_customize->add_setting( 'avik_enable_google_plus_icon_team_2',
																		array(
																			'default'           => 1,
																			'transport'         => 'refresh',
																			'sanitize_callback' => 'avik_switch_sanitization'
																		));

																		$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_google_plus_icon_team_2',
																		array(
																			'label'   => __( 'Enable/Disable Google Plus.','avik' ),
																			'section' => 'avik_section_team_2_whoweare',
																			'priority'=> 70,
																		)) );

																		// Url Google Plus

																		$wp_customize->add_setting( 'avik_link_google_plus_icon_team_2',
																		array(
																			'default'           => '',
																			'transport'         => 'refresh',
																			'sanitize_callback' => 'esc_url_raw'
																		)
																	);

																	$wp_customize->add_control( 'avik_link_google_plus_icon_team_2',
																	array(
																		'label'           => __( 'Link Google Plus','avik' ),
																		'section'         => 'avik_section_team_2_whoweare',
																		'type'            => 'url',
																		'priority'        => 75,
																		'active_callback' => 'avik_enable_google_plus_icon_team_2',
																		'input_attrs'     => array(
																			'class'        => 'my-custom-class',
																			'style'        => 'border: 1px solid #2885bb',
																			'placeholder'  => __( 'Enter link...','avik' ),
																		), ));

																		// Team 3 Who we are

																		$wp_customize->add_section(
																			'avik_section_team_3_whoweare',
																			array(
																				'title'      => __('Team 3','avik'),
																				'priority'   => 40,
																				'capability' => 'edit_theme_options',
																				'panel'      => 'avik_team_whoweare',
																			)
																		);

																		// Category post Team 3

																		$wp_customize->add_setting(
																			'avik_team_3_category',
																			array(
																				'default'   => '',
																				'sanitize_callback' => 'avik_sanitize_category_select',
																			)
																		);

																		$wp_customize->add_control(
																			new Avik_Customize_category_Control(
																				$wp_customize,
																				'avik_team_3_category',
																				array(
																					'label'    => __('Select Category Post for Team 3','avik'),
																					'description' => __( 'Select the category to show the posts for Team 3.','avik' ),
																					'settings' => 'avik_team_3_category',
																					'section'  => 'avik_section_team_3_whoweare',
																					'priority'=> 10,
																				)
																				)
																			);

																			// Social Team 3

																			// Facebook

																			$wp_customize->add_setting( 'avik_enable_facebook_icon_team_3',
																			array(
																				'default'   => 1,
																				'transport' => 'refresh',
																				'sanitize_callback' => 'avik_switch_sanitization'
																			));

																			$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_facebook_icon_team_3',
																			array(
																				'label'   => __( 'Enable/Disable Facebook.','avik' ),
																				'section' => 'avik_section_team_3_whoweare',
																				'priority'=> 30,
																			)) );

																			// Url Facebook

																			$wp_customize->add_setting( 'avik_link_facebook_icon_team_3',
																			array(
																				'default'          => '',
																				'transport'        => 'refresh',
																				'sanitize_callback'=> 'esc_url_raw'
																			)
																		);

																		$wp_customize->add_control( 'avik_link_facebook_icon_team_3',
																		array(
																			'label'           => __( 'Link Facebook','avik' ),
																			'section'         => 'avik_section_team_3_whoweare',
																			'type'            => 'url',
																			'priority'        => 35,
																			'active_callback' => 'avik_enable_facebook_icon_team_3',
																			'input_attrs'     => array(
																				'class'        => 'my-custom-class',
																				'style'        => 'border: 1px solid #2885bb',
																				'placeholder'  => __( 'Enter link...','avik' ),
																			), ));

																			// Twitter

																			$wp_customize->add_setting( 'avik_enable_twitter_icon_team_3',
																			array(
																				'default'           => 1,
																				'transport'         => 'refresh',
																				'sanitize_callback' => 'avik_switch_sanitization'
																			));

																			$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_twitter_icon_team_3',
																			array(
																				'label'   => __( 'Enable/Disable Twitter.','avik' ),
																				'section' => 'avik_section_team_3_whoweare',
																				'priority'=> 40,
																			)) );

																			// Url Twitter

																			$wp_customize->add_setting( 'avik_link_twitter_icon_team_3',
																			array(
																				'default'           => '',
																				'transport'         => 'refresh',
																				'sanitize_callback' => 'esc_url_raw'
																			)
																		);

																		$wp_customize->add_control( 'avik_link_twitter_icon_team_3',
																		array(
																			'label'           => __( 'Link Twitter','avik' ),
																			'section'         => 'avik_section_team_3_whoweare',
																			'type'            => 'url',
																			'priority'        => 45,
																			'active_callback' => 'avik_enable_twitter_icon_team_3',
																			'input_attrs'     => array(
																				'class'        => 'my-custom-class',
																				'style'        => 'border: 1px solid #2885bb',
																				'placeholder'  => __( 'Enter link...','avik' ),
																			), ));

																			// Instagram

																			$wp_customize->add_setting( 'avik_enable_instagram_icon_team_3',
																			array(
																				'default'           => 1,
																				'transport'         => 'refresh',
																				'sanitize_callback' => 'avik_switch_sanitization'
																			));

																			$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_instagram_icon_team_3',
																			array(
																				'label'   => __( 'Enable/Disable Instagram.','avik' ),
																				'section' => 'avik_section_team_3_whoweare',
																				'priority'=> 50,
																			)) );

																			// Url Instagram

																			$wp_customize->add_setting( 'avik_link_instagram_icon_team_3',
																			array(
																				'default'           => '',
																				'transport'         => 'refresh',
																				'sanitize_callback' => 'esc_url_raw'
																			)
																		);

																		$wp_customize->add_control( 'avik_link_instagram_icon_team_3',
																		array(
																			'label'           => __( 'Link Instagram','avik' ),
																			'section'         => 'avik_section_team_3_whoweare',
																			'type'            => 'url',
																			'priority'        => 55,
																			'active_callback' => 'avik_enable_instagram_icon_team_3',
																			'input_attrs'     => array(
																				'class'        => 'my-custom-class',
																				'style'        => 'border: 1px solid #2885bb',
																				'placeholder'  => __( 'Enter link...','avik' ),
																			), ));

																			// Linkedin

																			$wp_customize->add_setting( 'avik_enable_linkedin_icon_team_3',
																			array(
																				'default'           => 1,
																				'transport'         => 'refresh',
																				'sanitize_callback' => 'avik_switch_sanitization'
																			));

																			$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_linkedin_icon_team_3',
																			array(
																				'label'   => __( 'Enable/Disable Linkedin.','avik' ),
																				'section' => 'avik_section_team_3_whoweare',
																				'priority'=> 60,
																			)) );

																			// Url Linkedin

																			$wp_customize->add_setting( 'avik_link_linkedin_icon_team_3',
																			array(
																				'default'           => '',
																				'transport'         => 'refresh',
																				'sanitize_callback' => 'esc_url_raw'
																			)
																		);

																		$wp_customize->add_control( 'avik_link_linkedin_icon_team_3',
																		array(
																			'label'           => __( 'Link Linkedin','avik' ),
																			'section'         => 'avik_section_team_3_whoweare',
																			'type'            => 'url',
																			'priority'        =>  65,
																			'active_callback' => 'avik_enable_linkedin_icon_team_3',
																			'input_attrs'     => array(
																				'class'        => 'my-custom-class',
																				'style'        => 'border: 1px solid #2885bb',
																				'placeholder'  => __( 'Enter link...','avik' ),
																			), ));

																			// Google Plus

																			$wp_customize->add_setting( 'avik_enable_google_plus_icon_team_3',
																			array(
																				'default'           => 1,
																				'transport'         => 'refresh',
																				'sanitize_callback' => 'avik_switch_sanitization'
																			));

																			$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_google_plus_icon_team_3',
																			array(
																				'label'   => __( 'Enable/Disable Google Plus.','avik' ),
																				'section' => 'avik_section_team_3_whoweare',
																				'priority'=> 70,
																			)) );

																			// Url Google Plus

																			$wp_customize->add_setting( 'avik_link_google_plus_icon_team_3',
																			array(
																				'default'           => '',
																				'transport'         => 'refresh',
																				'sanitize_callback' => 'esc_url_raw'
																			)
																		);

																		$wp_customize->add_control( 'avik_link_google_plus_icon_team_3',
																		array(
																			'label'           => __( 'Link Google Plus','avik' ),
																			'section'         => 'avik_section_team_3_whoweare',
																			'type'            => 'url',
																			'priority'        => 75,
																			'active_callback' => 'avik_enable_google_plus_icon_team_3',
																			'input_attrs'     => array(
																				'class'        => 'my-custom-class',
																				'style'        => 'border: 1px solid #2885bb',
																				'placeholder'  => __( 'Enter link...','avik' ),
																			), ));

																			// Partenr Who we are

																			$wp_customize->add_section(
																				'avik_section_partner_whoweare',
																				array(
																					'title'      => __('Partenr','avik'),
																					'priority'   => 40,
																					'capability' => 'edit_theme_options',
																					'panel'      => 'avik_whoweare',
																				)
																			);

																			// Enable Section Partner

																			$wp_customize->add_setting( 'avik_enable_partner_whoweare',
																			array(
																				'default'           => 0,
																				'transport'         => 'refresh',
																				'sanitize_callback' => 'avik_switch_sanitization'
																			));

																			$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_partner_whoweare',
																			array(
																				'label'   => __( 'Enable/Disable Section Partenr.','avik' ),
																				'section' => 'avik_section_partner_whoweare',
																				'priority'=> 10,
																			)) );

																			// Title Partner

																			$wp_customize->add_setting( 'avik_title_partner_whoweare', array(
																				'capability'        => 'edit_theme_options',
																				'default'           => '',
																				'transport'         => 'postMessage',
																				'sanitize_callback' => 'wp_filter_nohtml_kses',
																			) );

																			$wp_customize->add_control( 'avik_title_partner_whoweare', array(
																				'type'            => 'text',
																				'section'         => 'avik_section_partner_whoweare',
																				'priority'        => 20,
																				'label'           => __( 'Title Partner','avik' ),
																			) );

																			// Subtitle Partner

																			$wp_customize->add_setting( 'avik_subtitle_partner_whoweare', array(
																				'capability'        => 'edit_theme_options',
																				'default'           => '',
																				'transport'         => 'postMessage',
																				'sanitize_callback' => 'wp_filter_nohtml_kses',
																			) );

																			$wp_customize->add_control( 'avik_subtitle_partner_whoweare', array(
																				'type'            => 'text',
																				'section'         => 'avik_section_partner_whoweare',
																				'priority'        => 30,
																				'label'           => __( 'Subtitle Partner','avik' ),
																			) );

																			// Category post Partner

																			$wp_customize->add_setting(
																				'avik_brands_category',
																				array(
																					'default'   => '',
																					'sanitize_callback' => 'avik_sanitize_category_select',
																				)
																			);

																			$wp_customize->add_control(
																				new Avik_Customize_category_Control(
																					$wp_customize,
																					'avik_brands_category',
																					array(
																						'label'    => __('Select Category Post for Brands','avik'),
																						'description' => __( 'Select the category to show the posts for Brands.','avik' ),
																						'settings' => 'avik_brands_category',
																						'section'  => 'avik_section_partner_whoweare',
																						'priority'=> 40,
																					)
																					)
																				);


																				/* ------------------------------------------------------------------------------------------------------------*
																				##  2.6 Services
																				/* ------------------------------------------------------------------------------------------------------------*/

																				$avikServices = new Avik_WP_Customize_Panel( $wp_customize, 'avik_services', array(
																					'title'    => __('Services','avik'),
																					'priority' => 230,
																				));

																				$wp_customize->add_panel( $avikServices );

																				// Settings Services

																				$wp_customize->add_section(
																					'avik_section_settings_services',
																					array(
																						'title'      => __('Settings Services','avik'),
																						'priority'   => 10,
																						'capability' => 'edit_theme_options',
																						'panel'      => 'avik_services',
																					)
																				);

																				// Title Services

																				$wp_customize->add_setting( 'avik_title_services', array(
																					'capability'        => 'edit_theme_options',
																					'default'           => '',
																					'transport'         => 'postMessage',
																					'sanitize_callback' => 'wp_filter_nohtml_kses',
																				) );

																				$wp_customize->add_control( 'avik_title_services', array(
																					'type'    => 'text',
																					'section' => 'avik_section_settings_services',
																					'priority'=> 4,
																					'label'   => __( 'Title Services','avik' ),
																				) );

																				// Subtitle Services

																				$wp_customize->add_setting( 'avik_subtitle_services', array(
																					'capability'        => 'edit_theme_options',
																					'default'           => '',
																					'transport'         => 'postMessage',
																					'sanitize_callback' => 'wp_filter_nohtml_kses',
																				) );

																				$wp_customize->add_control( 'avik_subtitle_services', array(
																					'type'    => 'text',
																					'section' => 'avik_section_settings_services',
																					'priority'=> 6,
																					'label'   => __( 'Subtitle Services','avik' ),
																				) );


																				// Category Services

																				$wp_customize->add_setting(
																					'avik_services_category',
																					array(
																						'default'   => '',
																						'sanitize_callback' => 'avik_sanitize_category_select',
																					)
																				);

																				$wp_customize->add_control(
																					new Avik_Customize_category_Control(
																						$wp_customize,
																						'avik_services_category',
																						array(
																							'label'    => __('Select Category Post Services','avik'),
																							'description' => __( 'Select the category to show the posts for Services.','avik' ),
																							'settings' => 'avik_services_category',
																							'section'  => 'avik_section_settings_services',
																							'priority'=> 10,
																						)
																						)
																					);


																					/* Partners */

																					$wp_customize->add_section(
																						'avik_section_partners_services',
																						array(
																							'title'      => __('Partners Services','avik'),
																							'priority'   => 30,
																							'capability' => 'edit_theme_options',
																							'panel'      => 'avik_services',
																						)
																					);

																					// Enable/Disable Section Partenrs

																					$wp_customize->add_setting( 'avik_enable_partners_services',
																					array(
																						'default'   => 0,
																						'transport' => 'refresh',
																						'sanitize_callback' => 'avik_switch_sanitization'
																					));

																					$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_partners_services',
																					array(
																						'label'   => __( 'Enable/Disable Section Partners Services.','avik' ),
																						'section' => 'avik_section_partners_services',
																						'priority'=> 5,
																					)) );

																					// Title Patners

																					$wp_customize->add_setting( 'avik_title_partners_services', array(
																						'capability'        => 'edit_theme_options',
																						'default'           => '',
																						'transport'         => 'postMessage',
																						'sanitize_callback' => 'wp_filter_nohtml_kses',
																					) );

																					$wp_customize->add_control( 'avik_title_partners_services', array(
																						'type'    => 'text',
																						'section' => 'avik_section_partners_services',
																						'priority'=> 20,
																						'label'   => __( 'Title Partners','avik' ),
																					) );

																					// Subtitle Patners

																					$wp_customize->add_setting( 'avik_subtitle_partners_services', array(
																						'capability'        => 'edit_theme_options',
																						'default'           => '',
																						'transport'         => 'postMessage',
																						'sanitize_callback' => 'wp_filter_nohtml_kses',
																					) );

																					$wp_customize->add_control( 'avik_subtitle_partners_services', array(
																						'type'    => 'text',
																						'section' => 'avik_section_partners_services',
																						'priority'=> 30,
																						'label'   => __( 'Subtitle Partners','avik' ),
																					) );

																					// Category post Partners Services

																					$wp_customize->add_setting(
																						'avik_partners_category',
																						array(
																							'default'   => '',
																							'sanitize_callback' => 'avik_sanitize_category_select',
																						)
																					);

																					$wp_customize->add_control(
																						new Avik_Customize_category_Control(
																							$wp_customize,
																							'avik_partners_category',
																							array(
																								'label'    => __('Select Category Post for Partners','avik'),
																								'description' => __( 'Select the category to show the posts for Partners.','avik' ),
																								'settings' => 'avik_partners_category',
																								'section'  => 'avik_section_partners_services',
																								'priority'=> 40,
																							)
																							)
																						);

																						/* Price quotation*/

																						$wp_customize->add_section(
																							'avik_section_quotation_services',
																							array(
																								'title'      => __('Quotation Services','avik'),
																								'priority'   => 40,
																								'capability' => 'edit_theme_options',
																								'panel'      => 'avik_services',
																							)
																						);

																						// Enable/Disable Section Price quotation

																						$wp_customize->add_setting( 'avik_enable_quotation_services',
																						array(
																							'default'   => 0,
																							'transport' => 'refresh',
																							'sanitize_callback' => 'avik_switch_sanitization'
																						));

																						$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_quotation_services',
																						array(
																							'label'   => __( 'Enable/Disable Section Quotation.','avik' ),
																							'section' => 'avik_section_quotation_services',
																							'priority'=> 5,
																						)) );

																						// Title 1 Price quotation

																						$wp_customize->add_setting( 'avik_title_1_quotation_services', array(
																							'capability'        => 'edit_theme_options',
																							'default'           => '',
																							'transport'         => 'postMessage',
																							'sanitize_callback' => 'wp_filter_nohtml_kses',
																						) );

																						$wp_customize->add_control( 'avik_title_1_quotation_services', array(
																							'type'    => 'text',
																							'section' => 'avik_section_quotation_services',
																							'priority'=> 10,
																							'label'   => __( 'Title 1 for quotation','avik' ),
																						) );

																						// Subtitle 1 Price quotation

																						$wp_customize->add_setting( 'avik_subtitle_1_quotation_services', array(
																							'capability'        => 'edit_theme_options',
																							'default'           => '',
																							'transport'         => 'postMessage',
																							'sanitize_callback' => 'wp_filter_nohtml_kses',
																						) );

																						$wp_customize->add_control( 'avik_subtitle_1_quotation_services', array(
																							'type'    => 'text',
																							'section' => 'avik_section_quotation_services',
																							'priority'=> 20,
																							'label'   => __( 'Subtitle 1 for quotation','avik' ),
																						) );

																						// Title 2 Price quotation

																						$wp_customize->add_setting( 'avik_title_2_quotation_services', array(
																							'capability'        => 'edit_theme_options',
																							'default'           => '',
																							'transport'         => 'postMessage',
																							'sanitize_callback' => 'wp_filter_nohtml_kses',
																						) );

																						$wp_customize->add_control( 'avik_title_2_quotation_services', array(
																							'type'    => 'text',
																							'section' => 'avik_section_quotation_services',
																							'priority'=> 30,
																							'label'   => __( 'Title 2 for quotation','avik' ),
																						) );

																						// Subtitle 2 Price quotation

																						$wp_customize->add_setting( 'avik_subtitle_2_quotation_services', array(
																							'capability'        => 'edit_theme_options',
																							'default'           => '',
																							'transport'         => 'postMessage',
																							'sanitize_callback' => 'wp_filter_nohtml_kses',
																						) );

																						$wp_customize->add_control( 'avik_subtitle_2_quotation_services', array(
																							'type'    => 'text',
																							'section' => 'avik_section_quotation_services',
																							'priority'=> 40,
																							'label'   => __( 'Subtitle 2 for quotation','avik' ),
																						) );

																						// Enable/Disable Arrow Price quotation

																						$wp_customize->add_setting( 'avik_enable_arrow_quotation_services',
																						array(
																							'default'   => 0,
																							'transport' => 'refresh',
																							'sanitize_callback' => 'avik_switch_sanitization'
																						));

																						$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_arrow_quotation_services',
																						array(
																							'label'   => __( 'Enable/Disable Arrow quotation.','avik' ),
																							'section' => 'avik_section_quotation_services',
																							'priority'=> 50,
																						)) );

																						/* ------------------------------------------------------------------------------------------------------------*
																						##  2.7 Portfolio
																						/* ------------------------------------------------------------------------------------------------------------*/

																						$avikPortfolio = new Avik_WP_Customize_Panel( $wp_customize, 'avik_portfolio', array(
																							'title'    => __('Portfolio','avik'),
																							'priority' => 240,
																						));

																						$wp_customize->add_panel( $avikPortfolio );

																						// Settings Portfolio

																						$wp_customize->add_section(
																							'avik_section_settings_portfolio',
																							array(
																								'title'      => __('Settings Portfolio','avik'),
																								'priority'   => 10,
																								'capability' => 'edit_theme_options',
																								'panel'      => 'avik_portfolio',
																							)
																						);

																						// Title Portfolio

																						$wp_customize->add_setting( 'avik_title_portfolio', array(
																							'capability'        => 'edit_theme_options',
																							'default'           => '',
																							'transport'         => 'postMessage',
																							'sanitize_callback' => 'wp_filter_nohtml_kses',
																						) );

																						$wp_customize->add_control( 'avik_title_portfolio', array(
																							'type'    => 'text',
																							'section' => 'avik_section_settings_portfolio',
																							'priority'=> 10,
																							'label'   => __( 'Title Portfolio','avik' ),
																						) );

																						// Nav Portfolio

																						$wp_customize->add_section(
																							'avik_section_nav_portfolio',
																							array(
																								'title'      => __('Nav Portfolio','avik'),
																								'priority'   => 20,
																								'capability' => 'edit_theme_options',
																								'panel'      => 'avik_portfolio',
																							)
																						);

																						// Title All Portfolio

																						$wp_customize->add_setting( 'avik_title_nav_all_portfolio', array(
																							'capability'        => 'edit_theme_options',
																							'default'           => '',
																							'transport'         => 'postMessage',
																							'sanitize_callback' => 'wp_filter_nohtml_kses',
																						) );

																						$wp_customize->add_control( 'avik_title_nav_all_portfolio', array(
																							'type'    => 'text',
																							'section' => 'avik_section_nav_portfolio',
																							'priority'=> 10,
																							'label'   => __( 'Title Nav all Portfolio','avik' ),
																						) );

																						// Title Column 1 Portfolio

																						$wp_customize->add_setting( 'avik_title_nav_1_portfolio', array(
																							'capability'        => 'edit_theme_options',
																							'default'           => '',
																							'transport'         => 'postMessage',
																							'sanitize_callback' => 'wp_filter_nohtml_kses',
																						) );

																						$wp_customize->add_control( 'avik_title_nav_1_portfolio', array(
																							'type'    => 'text',
																							'section' => 'avik_section_nav_portfolio',
																							'priority'=> 20,
																							'label'   => __( 'Title Nav column 1 Portfolio','avik' ),
																						) );

																						// Title Column 2 Portfolio

																						$wp_customize->add_setting( 'avik_title_nav_2_portfolio', array(
																							'capability'        => 'edit_theme_options',
																							'default'           => '',
																							'transport'         => 'postMessage',
																							'sanitize_callback' => 'wp_filter_nohtml_kses',
																						) );

																						$wp_customize->add_control( 'avik_title_nav_2_portfolio', array(
																							'type'    => 'text',
																							'section' => 'avik_section_nav_portfolio',
																							'priority'=> 30,
																							'label'   => __( 'Title Nav column 2 Portfolio','avik' ),
																						) );

																						// Title Column 3 Portfolio

																						$wp_customize->add_setting( 'avik_title_nav_3_portfolio', array(
																							'capability'        => 'edit_theme_options',
																							'default'           => '',
																							'transport'         => 'postMessage',
																							'sanitize_callback' => 'wp_filter_nohtml_kses',
																						) );

																						$wp_customize->add_control( 'avik_title_nav_3_portfolio', array(
																							'type'    => 'text',
																							'section' => 'avik_section_nav_portfolio',
																							'priority'=> 40,
																							'label'   => __( 'Title Nav column 3 Portfolio','avik' ),
																						) );

																						// Column 1 Portfolio

																						$wp_customize->add_section(
																							'avik_section_column_1_portfolio',
																							array(
																								'title'      => __('Column 1 Portfolio','avik'),
																								'priority'   => 20,
																								'capability' => 'edit_theme_options',
																								'panel'      => 'avik_portfolio',
																							)
																						);

																						// Category for Portfolio column 1

																						$wp_customize->add_setting(
																							'avik_portfolio_c_1_category',
																							array(
																								'default'   => '',
																								'sanitize_callback' => 'avik_sanitize_category_select',
																							)
																						);

																						$wp_customize->add_control(
																							new Avik_Customize_category_Control(
																								$wp_customize,
																								'avik_portfolio_c_1_category',
																								array(
																									'label'    => __('Select Category Portfolio C 1','avik'),
																									'description' => __( 'Select the category to show the last posts in Portfolio Column 1.','avik' ),
																									'settings' => 'avik_portfolio_c_1_category',
																									'section'  => 'avik_section_column_1_portfolio',
																									'priority'=> 12,
																								)
																								)
																							);

																							// Column 2 Portfolio

																							$wp_customize->add_section(
																								'avik_section_column_2_portfolio',
																								array(
																									'title'      => __('Column 2 Portfolio','avik'),
																									'priority'   => 40,
																									'capability' => 'edit_theme_options',
																									'panel'      => 'avik_portfolio',
																								)
																							);

																							// Category for Portfolio column 2

																							$wp_customize->add_setting(
																								'avik_portfolio_c_2_category',
																								array(
																									'default'   => '',
																									'sanitize_callback' => 'avik_sanitize_category_select',
																								)
																							);

																							$wp_customize->add_control(
																								new Avik_Customize_category_Control(
																									$wp_customize,
																									'avik_portfolio_c_2_category',
																									array(
																										'label'    => __('Select Category Portfolio C 2','avik'),
																										'description' => __( 'Select the category to show the last posts in Portfolio Column 2.','avik' ),
																										'settings' => 'avik_portfolio_c_2_category',
																										'section'  => 'avik_section_column_2_portfolio',
																										'priority'=> 50,
																									)
																									)
																								);

																								// Column 3 Portfolio

																								$wp_customize->add_section(
																									'avik_section_column_3_portfolio',
																									array(
																										'title'      => __('Column 3 Portfolio','avik'),
																										'priority'   => 50,
																										'capability' => 'edit_theme_options',
																										'panel'      => 'avik_portfolio',
																									)
																								);

																								// Category for Portfolio column 3

																								$wp_customize->add_setting(
																									'avik_portfolio_c_3_category',
																									array(
																										'default'   => '',
																										'sanitize_callback' => 'avik_sanitize_category_select',
																									)
																								);

																								$wp_customize->add_control(
																									new Avik_Customize_category_Control(
																										$wp_customize,
																										'avik_portfolio_c_3_category',
																										array(
																											'label'    => __('Select Category Portfolio C 3','avik'),
																											'description' => __( 'Select the category to show the last posts in Portfolio Column 3.','avik' ),
																											'settings' => 'avik_portfolio_c_3_category',
																											'section'  => 'avik_section_column_3_portfolio',
																											'priority'=> 52,
																										)
																										)
																									);


																									/* ------------------------------------------------------------------------------------------------------------*
																									##  2.8 Blog
																									/* ------------------------------------------------------------------------------------------------------------*/

																									$avikBlog = new Avik_WP_Customize_Panel( $wp_customize, 'avik_blog', array(
																										'title'    => __('Blog','avik'),
																										'priority' => 250,
																									));

																									$wp_customize->add_panel( $avikBlog );

																									// Settings Blog

																									$wp_customize->add_section(
																										'avik_section_settings_blog',
																										array(
																											'title'      => __('Settings Blog','avik'),
																											'priority'   => 10,
																											'capability' => 'edit_theme_options',
																											'panel'      => 'avik_blog',
																										)
																									);

																									// Title Blog

																									$wp_customize->add_setting( 'avik_title_blog', array(
																										'capability'        => 'edit_theme_options',
																										'default'           => '',
																										'transport'         => 'postMessage',
																										'sanitize_callback' => 'wp_filter_nohtml_kses',
																									) );

																									$wp_customize->add_control( 'avik_title_blog', array(
																										'type'    => 'text',
																										'section' => 'avik_section_settings_blog',
																										'priority'=> 10,
																										'label'   => __( 'Title Blog','avik' ),
																									) );

																									// Post Blog for Category

																									$wp_customize->add_setting(
																										'avik_blog_category',
																										array(
																											'default'   => '',
																											'sanitize_callback' => 'avik_sanitize_category_select',
																										)
																									);

																									$wp_customize->add_control(
																										new Avik_Customize_category_Control(
																											$wp_customize,
																											'avik_blog_category',
																											array(
																												'label'    => __('Select Category Post Blog','avik'),
																												'description' => __( 'Select the category to show the last posts in Home.','avik' ),
																												'settings' => 'avik_blog_category',
																												'section'  => 'avik_section_settings_blog',
																												'priority'=> 12,
																											)
																											)
																										);

																										// Enable/Disable time end comment Blog home

																										$wp_customize->add_setting( 'avik_enable_time_comment_blog_home',
																										array(
																											'default'   => 0,
																											'transport' => 'refresh',
																											'sanitize_callback' => 'avik_switch_sanitization'
																										));

																										$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_time_comment_blog_home',
																										array(
																											'label'   => __( 'Enable/Disable time end comments Blog Home.','avik' ),
																											'section' => 'avik_section_settings_blog',
																											'priority'=> 20,
																										)) );

																										// Enable/Disable carousel  Blog

																										$wp_customize->add_setting( 'avik_enable_carousel',
																										array(
																											'default'   => 0,
																											'transport' => 'refresh',
																											'sanitize_callback' => 'avik_switch_sanitization'
																										));

																										$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_carousel',
																										array(
																											'label'   => __( 'Enable/Disable carousel Blog.','avik' ),
																											'section' => 'avik_section_settings_blog',
																											'priority'=> 30,
																										)) );

																										// Carousel Blog for Category

																										$wp_customize->add_setting(
																											'avik_carousel_setting',
																											array(
																												'default'   => '',
																												'sanitize_callback' => 'avik_sanitize_category_select',
																											)
																										);

																										$wp_customize->add_control(
																											new Avik_Customize_category_Control(
																												$wp_customize,
																												'avik_carousel_setting',
																												array(
																													'label'    => __('Select Category Post for carousel','avik'),
																													'description' => __( 'Select the category to show the last posts in the carousel.','avik' ),
																													'settings' => 'avik_carousel_setting',
																													'active_callback' => 'avik_enable_carousel',
																													'section'  => 'avik_section_settings_blog',
																													'priority'=> 40,
																												)
																												)
																											);

																											// Carousel Blog for count number Post

																											$wp_customize->add_setting(
																												'avik_count_setting',
																												array(
																													'default'   => '6',
																													'sanitize_callback' => 'absint',
																												)
																											);

																											$wp_customize->add_control(
																												new WP_Customize_Control(
																													$wp_customize,
																													'avik_carousel_count',
																													array(
																														'label'          => __( 'Number of posts', 'avik' ),
																														'description' => __( 'Select number of post to show in the carousel.','avik' ),
																														'section'        => 'avik_section_settings_blog',
																														'settings'       => 'avik_count_setting',
																														'active_callback' => 'avik_enable_carousel',
																														'priority'=> 50,
																														'type'           => 'number',
																													)
																													)
																												);

																												// Enable/Disable sidebar smartphone

																												$wp_customize->add_setting( 'avik_enable_sidebar_media',
																												array(
																													'default'   => 0,
																													'transport' => 'refresh',
																													'sanitize_callback' => 'avik_switch_sanitization'
																												));

																												$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_sidebar_media',
																												array(
																													'label'   => __( 'Enable/Disable sidebar for Smartphone.','avik' ),
																													'section' => 'avik_section_settings_blog',
																													'priority'=> 60,
																												)) );

																												/* ------------------------------------------------------------------------------------------------------------*
																												##  2.9 Contact
																												/* ------------------------------------------------------------------------------------------------------------*/

																												$avikFooter = new Avik_WP_Customize_Panel( $wp_customize, 'avik_contact', array(
																													'title'    => __('Contact','avik'),
																													'priority' => 265,
																												));

																												$wp_customize->add_panel( $avikFooter );

																												// Settings Contact

																												$wp_customize->add_section(
																													'avik_section_settings_contact',
																													array(
																														'title'      => __('Settings Contact','avik'),
																														'priority'   => 10,
																														'capability' => 'edit_theme_options',
																														'panel'      => 'avik_contact',
																													)
																												);

																												// Category for Contact

																												$wp_customize->add_setting(
																													'avik_contact_category',
																													array(
																														'default'   => '',
																														'sanitize_callback' => 'avik_sanitize_category_select',
																													)
																												);

																												$wp_customize->add_control(
																													new Avik_Customize_category_Control(
																														$wp_customize,
																														'avik_contact_category',
																														array(
																															'label'    => __('Select Category Post Contact','avik'),
																															'description' => __( 'Select the category to show the posts in Contact.','avik' ),
																															'settings' => 'avik_contact_category',
																															'section'  => 'avik_section_settings_contact',
																															'priority'=> 10,
																														)
																														)
																													);

																													/* ------------------------------------------------------------------------------------------------------------*
																													##  2.10 Footer
																													/* ------------------------------------------------------------------------------------------------------------*/

																													$avikFooter = new Avik_WP_Customize_Panel( $wp_customize, 'avik_footer', array(
																														'title'    => __('Footer','avik'),
																														'priority' => 270,
																													));

																													$wp_customize->add_panel( $avikFooter );

																													// Foter

																													$wp_customize->add_section(
																														'avik_section_settings_footer',
																														array(
																															'title'      => __('Footer','avik'),
																															'priority'   => 10,
																															'capability' => 'edit_theme_options',
																															'panel'      => 'avik_footer',
																														)
																													);

																													// Enable/Disable copyright Footer

																													$wp_customize->add_setting( 'avik_enable_copyright_footer',
																													array(
																														'default'   => 0,
																														'transport' => 'refresh',
																														'sanitize_callback' => 'avik_switch_sanitization'
																													));

																													$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_copyright_footer',
																													array(
																														'label'   => __( 'Enable/Disable copyright Site.','avik' ),
																														'section' => 'avik_section_settings_footer',
																														'priority'=> 10,
																													)) );



																													$wp_customize->add_setting( 'avik_copyright_pro_only',
																														 array(
																																'default' => '',
																																'transport' => 'postMessage',
																																'sanitize_callback' => 'avik_text_sanitization'
																														 )
																													);

																													$wp_customize->add_control( new Avik_Simple_Notice_Custom_control( $wp_customize, 'avik_copyright_pro_only',
																														 array(
																																'label' => __( 'Franchi Design Copyright','avik' ),
																																'description' => __( '<p>FRANCHI DESIGN COPYRIGHT CAN NOT BE REMOVED.<br>ONLY WITH THE <br>
																																                      <button><a href="https://www.denisfranchi.com/avik-pro-10-0-0/" target="_blank">PRO VERSION</a></button><br>
																																                       IT CAN BE REMOVED!</p>', 'avik' ),
																																'section' => 'avik_section_settings_footer'
																														 )
																													) );

																													/* ------------------------------------------------------------------------------------------------------------*
																													##  Pro Version










																													/* ------------------------------------------------------------------------------------------------------------*/

																													/* ------------------------------------------------------------------------------------------------------------*
																													##  2.11 Page 404
																													/* ------------------------------------------------------------------------------------------------------------*/

																													$avikPage404 = new Avik_WP_Customize_Panel( $wp_customize, 'avik_page_404', array(
																														'title'    => __('Page 404','avik'),
																														'priority' => 280,
																													));

																													$wp_customize->add_panel( $avikPage404 );

																													// Settings page 404

																													$wp_customize->add_section(
																														'avik_section_settings_page_404',
																														array(
																															'title'      => __('Settings Page 404','avik'),
																															'priority'   => 10,
																															'capability' => 'edit_theme_options',
																															'panel'      => 'avik_page_404',
																														)
																													);

																													// Category for page 404

																													$wp_customize->add_setting(
																														'avik_category_page_404',
																														array(
																															'default'           => 9999999999999999,
																															'sanitize_callback' => 'avik_sanitize_category_select',
																														)
																													);

																													$wp_customize->add_control(
																														new Avik_Customize_category_Control(
																															$wp_customize,
																															'avik_category_page_404',
																															array(
																																'label'       => __('Select a category for the page 404','avik'),
																																'settings'    => 'avik_category_page_404',
																																'section'     => 'avik_section_settings_page_404'
																															)
																															)
																														);

																														/* ------------------------------------------------------------------------------------------------------------*
																														##  2.12 Back to top
																														/* ------------------------------------------------------------------------------------------------------------*/

																														$avikTotop = new Avik_WP_Customize_Panel( $wp_customize, 'avik_totop', array(
																															'title'    => __('Back To Top','avik'),
																															'priority' => 290,
																														));

																														$wp_customize->add_panel( $avikTotop );

																														// Settings Back to top

																														$wp_customize->add_section(
																															'avik_section_settings_totop',
																															array(
																																'title'      => __('Settings Back To Top','avik'),
																																'priority'   => 10,
																																'capability' => 'edit_theme_options',
																																'panel'      => 'avik_totop',
																															)
																														);

																														// Enable/Disable Back To top

																														$wp_customize->add_setting( 'avik_enable_to_top',
																														array(
																															'default'   => 0,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization'
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_to_top',
																														array(
																															'label'   => __( 'Enable/Disable Back To Top.','avik' ),
																															'section' => 'avik_section_settings_totop',
																															'priority'=> 10,
																														)) );

																														// Enable/Disable Back To top Smartphone

																														$wp_customize->add_setting( 'avik_enable_to_top_media',
																														array(
																															'default'   => 0,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization'
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_to_top_media',
																														array(
																															'label'   => __( 'Enable/Disable Back To Top for Smartphone.','avik' ),
																															'section' => 'avik_section_settings_totop',
																															'priority'=> 20,
																														)) );

																														/* ------------------------------------------------------------------------------------------------------------*
																														##  2.13 Social
																														/* ------------------------------------------------------------------------------------------------------------*/

																														$avikSocial = new Avik_WP_Customize_Panel( $wp_customize, 'avik_social', array(
																															'title'    => __('Social','avik'),
																															'priority' => 300,
																														));

																														$wp_customize->add_panel( $avikSocial );

																														// Settings Social

																														$wp_customize->add_section(
																															'avik_section_settings_social',
																															array(
																																'title'      => __('Settings Social','avik'),
																																'priority'   => 10,
																																'capability' => 'edit_theme_options',
																																'panel'      => 'avik_social',
																															)
																														);

																														// Facebook

																														$wp_customize->add_setting( 'avik_enable_facebook_social',
																														array(
																															'default' => 1,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization'
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_facebook_social',
																														array(
																															'label' => __( 'Enable/Disable Facebook.','avik' ),
																															'section' => 'avik_section_settings_social',
																															'priority'=> 10,
																														)) );

																														// Url Facebook

																														$wp_customize->add_setting( 'avik_link_facebook_social',
																														array(
																															'default' => '',
																															'transport' => 'refresh',
																															'sanitize_callback' => 'esc_url_raw',
																														)
																													);

																													$wp_customize->add_control( 'avik_link_facebook_social',
																													array(
																														'label' => __( 'Link Facebook','avik' ),
																														'section' => 'avik_section_settings_social',
																														'active_callback' => 'avik_enable_facebook_social',
																														'type' => 'url',
																														'priority'=> 20,
																														'input_attrs' => array(
																															'class' => 'my-custom-class',
																															'style' => 'border: 1px solid #2885bb',
																															'placeholder' => __( 'Enter link...','avik' ),
																														), ));

																														// Twitter

																														$wp_customize->add_setting( 'avik_enable_twitter_social',
																														array(
																															'default' => 1,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization',
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_twitter_social',
																														array(
																															'label' => __( 'Enable/Disable Twitter.','avik' ),
																															'section' => 'avik_section_settings_social',
																															'priority'=> 30,
																														)) );

																														// Url Twitter

																														$wp_customize->add_setting( 'avik_link_twitter_social',
																														array(
																															'default' => '',
																															'transport' => 'refresh',
																															'sanitize_callback' => 'esc_url_raw',
																														)
																													);

																													$wp_customize->add_control( 'avik_link_twitter_social',
																													array(
																														'label' => __( 'Link Twitter','avik' ),
																														'section' => 'avik_section_settings_social',
																														'active_callback' => 'avik_enable_twitter_social',
																														'priority'=> 40,
																														'type' => 'url',
																														'input_attrs' => array(
																															'class' => 'my-custom-class',
																															'style' => 'border: 1px solid #2885bb',
																															'placeholder' => __( 'Enter link...','avik' ),
																														), ));

																														// Google Plus

																														$wp_customize->add_setting( 'avik_enable_google_plus_social',
																														array(
																															'default' => 1,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization',
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_google_plus_social',
																														array(
																															'label' => __( 'Enable/Disable Google Plus.','avik' ),
																															'section' => 'avik_section_settings_social',
																															'priority'=> 50,
																														)) );

																														// Url Google Plus

																														$wp_customize->add_setting( 'avik_link_google_plus_social',
																														array(
																															'default' => '',
																															'transport' => 'refresh',
																															'sanitize_callback' => 'esc_url_raw',
																														)
																													);

																													$wp_customize->add_control( 'avik_link_google_plus_social',
																													array(
																														'label' => __( 'Link Google Plus','avik' ),
																														'section' => 'avik_section_settings_social',
																														'active_callback' => 'avik_enable_google_plus_social',
																														'priority'=> 60,
																														'type' => 'url',
																														'input_attrs' => array(
																															'class' => 'my-custom-class',
																															'style' => 'border: 1px solid #2885bb',
																															'placeholder' => __( 'Enter link...','avik' ),
																														), ));

																														// Dribbble

																														$wp_customize->add_setting( 'avik_enable_dribbble_social',
																														array(
																															'default' => 1,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization',
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_dribbble_social',
																														array(
																															'label' => __( 'Enable/Disable Dribbble.','avik' ),
																															'section' => 'avik_section_settings_social',
																															'priority'=> 70,
																														)) );

																														// Url Dribbble

																														$wp_customize->add_setting( 'avik_link_dribbble_social',
																														array(
																															'default' => '',
																															'transport' => 'refresh',
																															'sanitize_callback' => 'esc_url_raw',
																														)
																													);

																													$wp_customize->add_control( 'avik_link_dribbble_social',
																													array(
																														'label' => __( 'Link Dribbble','avik' ),
																														'section' => 'avik_section_settings_social',
																														'active_callback' => 'avik_enable_dribbble_social',
																														'priority'=> 80,
																														'type' => 'url',
																														'input_attrs' => array(
																															'class' => 'my-custom-class',
																															'style' => 'border: 1px solid #2885bb',
																															'placeholder' => __( 'Enter link...','avik' ),
																														), ));

																														// Tumblr

																														$wp_customize->add_setting( 'avik_enable_tumblr_social',
																														array(
																															'default' => 1,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization',
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_tumblr_social',
																														array(
																															'label' => __( 'Enable/Disable Tumblr.','avik' ),
																															'section' => 'avik_section_settings_social',
																															'priority'=> 90,
																														)) );

																														// Url Tumblr

																														$wp_customize->add_setting( 'avik_link_tumblr_social',
																														array(
																															'default' => '',
																															'transport' => 'refresh',
																															'sanitize_callback' => 'esc_url_raw',
																														)
																													);

																													$wp_customize->add_control( 'avik_link_tumblr_social',
																													array(
																														'label' => __( 'Link Tumblr','avik' ),
																														'section' => 'avik_section_settings_social',
																														'active_callback' => 'avik_enable_tumblr_social',
																														'priority'=> 100,
																														'type' => 'url',
																														'input_attrs' => array(
																															'class' => 'my-custom-class',
																															'style' => 'border: 1px solid #2885bb',
																															'placeholder' => __( 'Enter link...','avik' ),
																														), ));

																														// Instagram

																														$wp_customize->add_setting( 'avik_enable_instagram_social',
																														array(
																															'default' => 1,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization',
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_instagram_social',
																														array(
																															'label' => __( 'Enable/Disable Instagram.','avik' ),
																															'section' => 'avik_section_settings_social',
																															'priority'=> 110,
																														)) );

																														// Url Instagram

																														$wp_customize->add_setting( 'avik_link_instagram_social',
																														array(
																															'default' => '',
																															'transport' => 'refresh',
																															'sanitize_callback' => 'esc_url_raw',
																														)
																													);

																													$wp_customize->add_control( 'avik_link_instagram_social',
																													array(
																														'label' => __( 'Link Instagram','avik' ),
																														'section' => 'avik_section_settings_social',
																														'active_callback' => 'avik_enable_instagram_social',
																														'priority'=> 120,
																														'type' => 'url',
																														'input_attrs' => array(
																															'class' => 'my-custom-class',
																															'style' => 'border: 1px solid #2885bb',
																															'placeholder' => __( 'Enter link...','avik' ),
																														), ));

																														// Linkedin

																														$wp_customize->add_setting( 'avik_enable_linkedin_social',
																														array(
																															'default' => 1,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization',
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_linkedin_social',
																														array(
																															'label' => __( 'Enable/Disable Linkedin.','avik' ),
																															'section' => 'avik_section_settings_social',
																															'priority'=> 130,
																														)) );

																														// Url Linkedin

																														$wp_customize->add_setting( 'avik_link_linkedin_social',
																														array(
																															'default' => '',
																															'transport' => 'refresh',
																															'sanitize_callback' => 'esc_url_raw',
																														)
																													);

																													$wp_customize->add_control( 'avik_link_linkedin_social',
																													array(
																														'label' => __( 'Link Linkedin','avik' ),
																														'section' => 'avik_section_settings_social',
																														'active_callback' => 'avik_enable_linkedin_social',
																														'priority'=> 140,
																														'type' => 'url',
																														'input_attrs' => array(
																															'class' => 'my-custom-class',
																															'style' => 'border: 1px solid #2885bb',
																															'placeholder' => __( 'Enter link...','avik' ),
																														), ));

																														// Youtube

																														$wp_customize->add_setting( 'avik_enable_youtube_social',
																														array(
																															'default' => 1,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization',
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_youtube_social',
																														array(
																															'label' => __( 'Enable/Disable Youtube.','avik' ),
																															'section' => 'avik_section_settings_social',
																															'priority'=> 150,
																														)) );

																														// Url Youtube

																														$wp_customize->add_setting( 'avik_link_youtube_social',
																														array(
																															'default' => '',
																															'transport' => 'refresh',
																															'sanitize_callback' => 'esc_url_raw',
																														)
																													);

																													$wp_customize->add_control( 'avik_link_youtube_social',
																													array(
																														'label' => __( 'Link Youtube','avik' ),
																														'section' => 'avik_section_settings_social',
																														'active_callback' => 'avik_enable_youtube_social',
																														'priority'=> 160,
																														'type' => 'url',
																														'input_attrs' => array(
																															'class' => 'my-custom-class',
																															'style' => 'border: 1px solid #2885bb',
																															'placeholder' => __( 'Enter link...','avik' ),
																														), ));

																														// Pinterest

																														$wp_customize->add_setting( 'avik_enable_pinterest_social',
																														array(
																															'default' => 1,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization',
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_pinterest_social',
																														array(
																															'label' => __( 'Enable/Disable Pinterest.','avik' ),
																															'section' => 'avik_section_settings_social',
																															'priority'=> 170,
																														)) );

																														// Url Pinterest

																														$wp_customize->add_setting( 'avik_link_pinterest_social',
																														array(
																															'default' => '',
																															'transport' => 'refresh',
																															'sanitize_callback' => 'esc_url_raw',
																														)
																													);

																													$wp_customize->add_control( 'avik_link_pinterest_social',
																													array(
																														'label' => __( 'Link Pinterest','avik' ),
																														'section' => 'avik_section_settings_social',
																														'active_callback' => 'avik_enable_pinterest_social',
																														'priority'=> 180,
																														'type' => 'url',
																														'input_attrs' => array(
																															'class' => 'my-custom-class',
																															'style' => 'border: 1px solid #2885bb',
																															'placeholder' => __( 'Enter link...','avik' ),
																														), ));

																														// Flickr

																														$wp_customize->add_setting( 'avik_enable_flickr_social',
																														array(
																															'default' => 1,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization',
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_flickr_social',
																														array(
																															'label' => __( 'Enable/Disable Flickr.','avik' ),
																															'section' => 'avik_section_settings_social',
																															'priority'=> 190,
																														)) );

																														// Url Flickr

																														$wp_customize->add_setting( 'avik_link_flickr_social',
																														array(
																															'default' => '',
																															'transport' => 'refresh',
																															'sanitize_callback' => 'esc_url_raw',
																														)
																													);

																													$wp_customize->add_control( 'avik_link_flickr_social',
																													array(
																														'label' => __( 'Link Flickr','avik' ),
																														'section' => 'avik_section_settings_social',
																														'active_callback' => 'avik_enable_flickr_social',
																														'priority'=> 200,
																														'type' => 'url',
																														'input_attrs' => array(
																															'class' => 'my-custom-class',
																															'style' => 'border: 1px solid #2885bb',
																															'placeholder' => __( 'Enter link...','avik' ),
																														), ));

																														// Github

																														$wp_customize->add_setting( 'avik_enable_github_social',
																														array(
																															'default' => 1,
																															'transport' => 'refresh',
																															'sanitize_callback' => 'avik_switch_sanitization',
																														));

																														$wp_customize->add_control( new Avik_Toggle_Switch_Custom_control( $wp_customize, 'avik_enable_github_social',
																														array(
																															'label' => __( 'Enable/Disable Github.','avik' ),
																															'section' => 'avik_section_settings_social',
																															'priority'=> 210,
																														)) );

																														// Url Github

																														$wp_customize->add_setting( 'avik_link_github_social',
																														array(
																															'default' => '',
																															'transport' => 'refresh',
																															'sanitize_callback' => 'esc_url_raw',
																														)
																													);

																													$wp_customize->add_control( 'avik_link_github_social',
																													array(
																														'label' => __( 'Link Github','avik' ),
																														'section' => 'avik_section_settings_social',
																														'active_callback' => 'avik_enable_github_social',
																														'priority'=> 210,
																														'type' => 'url',
																														'input_attrs' => array(
																															'class' => 'my-custom-class',
																															'style' => 'border: 1px solid #2885bb',
																															'placeholder' => __( 'Enter link...','avik' ),
																														), ));

																														/* ------------------------------------------------------------------------------------------------------------*
																														##  2.14 Go Pro
																														/* ------------------------------------------------------------------------------------------------------------*/

																														$avikGopro = new Avik_WP_Customize_Panel( $wp_customize, 'avik_go_pro', array(
																															'title'    => __('Go Pro','avik'),
																															'priority' => 1,
																														));

																														$wp_customize->add_panel( $avikGopro );

																														// Settings Go Pro

																														$wp_customize->add_section(
																															'avik_section_settings_go_pro',
																															array(
																																'title'      => __('Avik Pro Version','avik'),
																																'priority'   => 10,
																																'capability' => 'edit_theme_options',
																																'panel'      => 'avik_go_pro',
																															)
																														);

																														$wp_customize->add_setting( 'avik_go_pro_version',
																														   array(
																														      'default' => '',
																														      'transport' => 'postMessage',
																														      'sanitize_callback' => 'avik_text_sanitization'
																														   )
																														);

																														$wp_customize->add_control( new Avik_Simple_Notice_Custom_control( $wp_customize, 'avik_go_pro_version',
																														   array(
																														      'label' => __( 'AVIK PRO','avik' ),
																														      'description' => __( '<p>FOR COMPLETE EXPERIENCE<br>GO TO THE <button><a href="https://www.denisfranchi.com/avik-pro-10-0-0/" target="_blank">PRO VERSION</a></p></button>', 'avik' ),
																														      'section' => 'avik_section_settings_go_pro'
																														   )
																														) );

																													}
																													add_action( 'customize_register', 'avik_customize_register' );

																													/**
																													* Render the site title for the selective refresh partial.
																													*
																													* @return void
																													*/
																													function avik_customize_partial_blogname() {
																														bloginfo( 'name' );
																													}

																													/**
																													* Render the site tagline for the ive refresh partial.
																													*
																													* @return void
																													*/
																													function avik_customize_partial_blogdescription() {
																														bloginfo( 'description' );
																													}

																													/**
																													* Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
																													*/
																													function avik_customize_preview_js() {
																														wp_enqueue_script( 'avik-customizer', get_template_directory_uri() . '/js/avik-customizer.js', array( 'customize-preview' ), '20151215', true );
																													}
																													add_action( 'customize_preview_init', 'avik_customize_preview_js' );
