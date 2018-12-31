<?php
/**
* color-scheme.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/

class Avik_Color_Scheme {

	public function __construct() {
		add_action( 'customize_register', array( $this, 'customizer_register' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_js' ) );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'color_scheme_template' ) );
		add_action( 'customize_preview_init', array( $this, 'customize_preview_js' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'output_css' ) );
	}

	public function customizer_register( WP_Customize_Manager $wp_customize ) {


		$wp_customize->add_setting( 'avik_color_scheme', array(
			'default' => 'avik',
			'transport' => 'refresh',
			'sanitize_callback' => 'avik_sanitize_select',
		) );
		$color_schemes = $this->get_color_schemes();
		$choices = array();
		foreach ( $color_schemes as $avik_color_scheme => $value ) {
			$choices[$avik_color_scheme] = $value['label'];
		}

		$wp_customize->add_control( 'avik_color_scheme', array(
			'label'   => __( 'Skins', 'avik' ),
			'description'=> __('Choose the most suitable skins for your site, or change the colors as you wish','avik'),
			'section' => 'colors',
			'type'    => 'select',
			'priority'=> 2,
			'choices' => $choices,
		) );

		$options = array(
			'link_color'                      => __( 'Link color', 'avik' ),
			'button_background_color'         => __( 'Button background color', 'avik' ),
			'button_hover_background_color'   => __( 'Button hover background color', 'avik' ),
			'text_slider_color'               => __( 'Text Slider/Video/Static color', 'avik' ),
			'background_slider_color'         => __( 'Slider background color', 'avik' ),
			'background_whoweare_color'       => __( 'Who we are background color', 'avik' ),
			'subtitle_banner_color'           => __( 'Subtitle automatic writing color', 'avik' ),
			'cursor_banner_color'             => __( 'Cursor automatic writing color', 'avik' ),
			'background_services_color'       => __( 'Services background color', 'avik' ),
			'background_price_color'          => __( 'Quotation background color', 'avik' ),
			'background_footer_color'         => __( 'Footer background color', 'avik' ),
			'text_footer_color'               => __( 'Text Footer color', 'avik' ),
			'background_scroll_to_top_color'  => __( 'Back to top background color', 'avik' ),
			'scroll_to_top_color'             => __( 'Back to top color', 'avik' ),
			'hover_scroll_to_top_color'       => __( 'Hover Back to top color', 'avik' ),
			'hover_social_slider_footer_color'=> __( 'Hover Social slider and footer color', 'avik' ),
			'social_contact_color'            => __( 'Social contact color', 'avik' ),
			'hover_social_contact_color'      => __( 'Hover Social contact color', 'avik' ),
			'social_team_color'               => __( 'Social Team color', 'avik' ),
			'social_share_color'              => __( 'Social share color', 'avik' ),
			'hover_social_share_color'        => __( 'Hover Social share color', 'avik' ),
			'background_breadcrumbs_color'    => __( 'Background breadcrumbs color', 'avik' ),
			'background_preloader_color'      => __( 'Background preloader color', 'avik' ),
			'preloader_color'                 => __( 'Preloader color', 'avik' ),


		);

		foreach ( $options as $key => $label ) {
			$wp_customize->add_setting( $key, array(
				'sanitize_callback' => 'sanitize_hex_color',
				'transport' => 'refresh',
			) );


			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $key, array(
				'label' => $label,
				'section' => 'colors',
				'setting' => $key,
			) ) );
		}

	}

	public $options = array(
		'link_color',
		'button_background_color',
		'button_hover_background_color',
		'text_slider_color',
		'background_slider_color',
		'background_whoweare_color',
		'subtitle_banner_color',
		'cursor_banner_color',
		'background_services_color',
		'background_price_color',
		'background_footer_color',
		'text_footer_color',
		'background_scroll_to_top_color',
		'scroll_to_top_color',
		'hover_scroll_to_top_color',
		'hover_social_slider_footer_color',
		'social_contact_color',
		'hover_social_contact_color',
		'social_team_color',
		'social_share_color',
		'hover_social_share_color',
		'background_breadcrumbs_color',
		'background_preloader_color',
		'preloader_color',


	);

	public function get_css( $colors ) {

		$css = '

		h1.slideshow__slide-caption-title,
		.o-hsub.-link:hover,
		.btn.btn-avik:hover,
		.btn.btn-avik:hover a,
		.tabs__list,
		.separator-price::after,
		.avik-portfolio i,
		.wpcf7-submit:hover,
		#typed,
		.social-team i:hover,
		#respond .submit:hover,
		#avikservices,
		.title-price span,
		.separator-price::after,
		.avik-social-icons-footer i,
		p.color-title-static,
		.avik-social-icons-video i,
		.down-video a,
		.avik-social-icons-header i{
			color: %1$s;
		}

		.separator-price::after{
			background-color: %1$s;
		}

		.btn.btn-avik,
		.wpcf7-submit,
		.submit {
			background-color: %2$s;
		}

		.btn.btn-avik:hover,
		.wpcf7-submit:hover,
		.submit:hover {
			background-color: %3$s;
		}

		.slideshow__slide-caption-content p,
		.o-hsub::before,
		.o-hsub.-link,
		.angle-scroll a {
			color: %4$s;
		}

		.slideshow{
			background: %5$s;
		}

		.who-we-are-image-frame,
		.statistics-box,
		.brands {
			background: %6$s;
		}

		#typed i,
		#avikservices i{
			color: %7$s;
		}
		.typed-cursor{
			color: %8$s;
		}

		.tabs,
		.subtitle-price{
			background: %9$s;
		}

		.title-price,
		.wpcf7-form-control.wpcf7-select{
			background-color: %10$s;
		}

		.jumbotron{
			background-color: %11$s;

		}

		.jumbotron p{
			color: %12$s;
		}

		hr.avik-footer{
			border-color: %12$s;
		}

		#avik-scrol-to-top{
			background-color: %13$s;
		}

		#avik-scrol-to-top{
			color: %14$s;
		}

		#avik-scrol-to-top:hover,
		#avik-scrol-to-top:active{
			background-color: %15$s;
		}

		.avik-social-icons-header i:hover,
		.avik-social-icons-footer i:hover{
			color:%16$s;
		}

		.avik-social-icons-contact i{
			color:%17$s;
		}

		.avik-social-icons-contact i:hover{
			color:%18$s;
		}

		.social-team a{
			color:%19$s;
		}

		.social-share i{
			color:%20$s;
		}

		.social-share i:hover{
			color:%21$s;
		}

		.breadcrumbs{
			background-color: %22$s;
		}

		.avik-loader{
			background-color: %23$s;
		}

		.loader{
			background-color: %24$s;
		}

		body{
			background-color: %25$s;
		}


		//rest of the css
		';

		// More CSS
		return vsprintf( $css, $colors );
	}



	public function customize_js() {
		wp_enqueue_script( 'avik-color-scheme', get_template_directory_uri() . '/inc/js/avik-color-scheme.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '', true );
		wp_localize_script( 'avik-color-scheme', 'AvikColorScheme', $this->get_color_schemes() );
	}

	public function color_scheme_template() {
		$colors = array(
			'link_color'                       => '{{ data.link_color }}',
			'button_background_color'          => '{{ data.button_background_color }}',
			'button_hover_background_color'    => '{{ data.button_hover_background_color }}',
			'text_slider_color'                => '{{ data.text_slider_color }}',
			'background_slider_color'          => '{{ data.background_slider_color }}',
			'background_whoweare_color'        => '{{ data.background_whoweare_color }}',
			'subtitle_banner_color'            => '{{ data.subtitle_banner_color}}',
			'cursor_banner_color'              => '{{ data.cursor_banner_color}}',
			'background_services_color'        => '{{ data.background_services_color }}',
			'background_price_color'           => '{{ data.background_price_color }}',
			'background_footer_color'          => '{{ data.background_footer_color }}',
			'text_footer_color'                => '{{ data.text_footer_color }}',
			'background_scroll_to_top_color'   => '{{ data.background_scroll_to_top_color}}',
			'scroll_to_top_color'              => '{{ data.scroll_to_top_color}}',
			'hover_scroll_to_top_color'        => '{{ data.hover_scroll_to_top_color}}',
			'hover_social_slider_footer_color' => '{{ data.hover_social_slider_footer_color}}',
			'social_contact_color'             => '{{ data.social_contact_color}}',
			'hover_social_contact_color'       => '{{ data.hover_social_contact_color}}',
			'social_team_color'                => '{{ data.social_team_color}}',
			'social_share_color'               => '{{ data.social_share_color}}',
			'hover_social_share_color'         => '{{ data.hover_social_share_color}}',
			'background_breadcrumbs_color'     => '{{ data.background_breadcrumbs_color}}',
			'background_preloader_color'       => '{{ data.background_preloader_color}}',
			'preloader_color'                  => '{{ data.preloader_color}}',


		);
		?>
		<script type="text/html" id="tmpl-avik-color-scheme">
			<?php echo esc_attr($this->get_css( $colors )); ?>
		</script>
		<?php
	}
	public function customize_preview_js() {
		wp_enqueue_script( 'avik-color-scheme-preview', get_template_directory_uri() . '/inc/js/avik-color-scheme-preview.js', array( 'customize-preview' ), '', true );

	}

	public function output_css() {
		$colors = $this->get_color_scheme();
		if ( $this->is_custom ) {
			wp_add_inline_style( 'avik-style', $this->get_css( $colors ) );
		}
	}

	public $is_custom = false;
	public function get_color_scheme() {
		$color_schemes = $this->get_color_schemes();
		$color_scheme  = get_theme_mod( 'avik_color_scheme' );
		$color_scheme  = isset( $color_schemes[$color_scheme] ) ? $color_scheme : '';

		if ( '' != $color_scheme ) {
			$this->is_custom = true;
		}

		$colors = array_map( 'strtolower', $color_schemes['avik']['colors'] );

		foreach ( $this->options as $k => $option ) {
			$color = get_theme_mod( $option );
			if ( $color && strtolower( $color ) != $colors[$k] ) {
				$colors[$k] = $color;
			}
		}
		return $colors;
	}



	public function get_color_schemes() {
		return array(

			'avik' => array(
				'label'  => __( 'Avik', 'avik' ),
				'colors' => array(
					'#d5f83e',  // 1 Link color
					'#ffffff',  // 2 Button background color
					'#000',     // 3 Hover Button background color
					'#fff',     // 4 Text slider color
					'#000000',  // 5 Background slider color
					'#f9f9f9',  // 6 Background Who we are color
					'#fff',     // 7 Subtitle banner color
					'#fff',     // 8 Cursor banner color
					'#f9f9f9',  // 9 Background Services color
					'#000',     // 10 Background quotation color
					'#000',     // 11 Background footer color
					'#ffffff',  // 12 Text footer color
					'#000',     // 13 Background scroll to top color
					'#ffffff',  // 14 Scroll to top color
					'#777777',  // 15 Hover scroll to top color
					'#829822',  // 16 Hover social slider and footer color
					'#363636',  // 17 Social contact color
					'#838383',  // 18 Hover social contact color
					'#fff',     // 19 Social team color
					'#6b6868',  // 20 Social share color
					'#000',     // 21 Hover social share color
					'#f6f6f6',  // 22 Background breadcrumbs color
					'#000',     // 23 Background preloader color
					'#fff',     // 24 Preloader color
					'#fff',     // 25 Background body color
				),
			),

			'purple' => array(
				'label'  => __( 'Avik Purple', 'avik' ),
				'colors' => array(
					'#eaeaea',  // 1 Link color
					'#ffffff',  // 2 Button background color
					'#8500b2',  // 3 Hover Button background color
					'#000',     // 4 Text slider color
					'#8500b2',  // 5 Background slider color
					'#f7f4ff',  // 6 Background Who we are color
					'#8500b2',  // 7 Subtitle banner color
					'#8500b2',  // 8 Cursor banner color
					'#f7f4ff',  // 9 Background Services color
					'#8500b2',  // 10 Background quotation color
					'#8500b2',  // 11 Background footer color
					'#000',     // 12 Text footer color
					'#000',     // 13 Background scroll to top color
					'#8500b2',  // 14 Scroll to top color
					'#f7f4ff',  // 15 Hover scroll to top color
					'#000',     // 16 Hover social slider and footer color
					'#8500b2',  // 17 Social contact color
					'#000',     // 18 Hover social contact color
					'#8500b2',  // 19 Social team color
					'#8500b2',  // 20 Social share color
					'#000',     // 21 Hover social share color
					'#f7f4ff',  // 22 Background breadcrumbs color
					'#fff',     // 23 Background preloader color
					'#8500b2',  // 24 Preloader color
					'#fff',     // 25 Background body color
				),
			),

			'green' => array(
				'label'  => __( 'Avik Green', 'avik' ),
				'colors' => array(
					'#00a31d',  // 1 Link color
					'#ffffff',  // 2 Button background color
					'#000',     // 3 Hover Button background color
					'#fff',     // 4 Text slider color
					'#000',     // 5 Background slider color
					'#f3fff2',  // 6 Background Who we are color
					'#000',     // 7 Subtitle banner color
					'#000',     // 8 Cursor banner color
					'#f3fff2',  // 9 Background Services color
					'#000',     // 10 Background quotation color
					'#000',     // 11 Background footer color
					'#00a31d',  // 12 Text footer color
					'#000',     // 13 Background scroll to top color
					'#00a31d',  // 14 Scroll to top color
					'#f3fff2',  // 15 Hover scroll to top color
					'#f3fff2',  // 16 Hover social slider and footer color
					'#00a31d',  // 17 Social contact color
					'#000',     // 18 Hover social contact color
					'#00a31d',  // 19 Social team color
					'#00a31d',  // 20 Social share color
					'#000',     // 21 Hover social share color
					'#f3fff2',  // 22 Background breadcrumbs color
					'#000',     // 23 Background preloader color
					'#00a31d',  // 24 Preloader color
					'#fff',     // 25 Background body color
				),
			),

			'red' => array(
				'label'  => __( 'Avik Red', 'avik' ),
				'colors' => array(
					'#dd0000',  // 1 Link color
					'#ffffff',  // 2 Button background color
					'#000',     // 3 Hover Button background color
					'#fff',     // 4 Text slider color
					'#000',     // 5 Background slider color
					'#f7f7f7',  // 6 Background Who we are color
					'#000',     // 7 Subtitle banner color
					'#000',     // 8 Cursor banner color
					'#f7f7f7',  // 9 Background Services color
					'#000',     // 10 Background quotation color
					'#000',     // 11 Background footer color
					'#fff',     // 12 Text footer color
					'#000',     // 13 Background scroll to top color
					'#dd0000',  // 14 Scroll to top color
					'#cecece',  // 15 Hover scroll to top color
					'#fff',     // 16 Hover social slider and footer color
					'#dd0000',  // 17 Social contact color
					'#000',     // 18 Hover social contact color
					'#dd0000',  // 19 Social team color
					'#dd0000',  // 20 Social share color
					'#000',     // 21 Hover social share color
					'#f7f7f7',  // 22 Background breadcrumbs color
					'#000',     // 23 Background preloader color
					'#dd0000',  // 24 Preloader color
					'#fff',     // 25 Background body color
				),
			),

			'pastel' => array(
				'label'  => __( 'Avik Pastel', 'avik' ),
				'colors' => array(
					'#7a8b8e',  // 1 Link color
					'#8feae4',  // 2 Button background color
					'#000',     // 3 Hover Button background color
					'#000',     // 4 Text slider color
					'#efdcf7',  // 5 Background slider color
					'#efdcf7',  // 6 Background Who we are color
					'#f1cdf7',  // 7 Subtitle banner color
					'#f1cdf7',  // 8 Cursor banner color
					'#efdcf7',  // 9 Background Services color
					'#000',     // 10 Background quotation color
					'#efdcf7',  // 11 Background footer color
					'#000',     // 12 Text footer color
					'#000',     // 13 Background scroll to top color
					'#f1cdf7',  // 14 Scroll to top color
					'#8feae4',  // 15 Hover scroll to top color
					'#000',     // 16 Hover social slider and footer color
					'#f1cdf7',  // 17 Social contact color
					'#000',     // 18 Hover social contact color
					'#f1cdf7',  // 19 Social team color
					'#f1cdf7',  // 20 Social share color
					'#000',     // 21 Hover social share color
					'#efdcf7',  // 22 Background breadcrumbs color
					'#b9eae8',  // 23 Background preloader color
					'#efdcf7',  // 24 Preloader color
					'#b9eae8',  // 25 Background body color

				),
			),
		);//
	}
}
