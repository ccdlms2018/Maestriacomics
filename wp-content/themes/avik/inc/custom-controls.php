<?php
/**
* custom-controls.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/

/* TABLE OF CONTENT

1 - General additional classes

1.1 - Class Toggle Switchs
1.2 - Class Category Control
1.3 - Class add panel
1.4 - Class TinyMCE
1.6 - Class Alpha Color
1.7 - Class Slider custom control
1.8 - Class Simple Notice
2 - CSS Customize

2.2 - Color Filter Header Home
2.3 - Font Size Logo
2.4 - Responsive avik_Enable Style

3 - Dependently-Contextual Customizer Controls

3.1 - Section Team
3.2 - Social Team Who we are
3.3 - Blog
3.4 - Social
3.5 - Filter Header Home


4 - General Sanitization

4.1 - Image Sanitization
4.2 - Toggle switch Sanitization
4.3 - Dropwown Pages Sanitization
4.4 - Dropwown Categoryes Sanitization
4.5 - Select sanitization function
4.6 - Alpha Color Sanitization
4.7 - Slider custom control Sanitization
4.8 - Text custom control Sanitization

*/


/* ------------------------------------------------------------------------- *
##  1 General additional classes */
/* ------------------------------------------------------------------------- */

/* ------------------------------------*
##  1.1 Class Toggle Switchs */
/* ----------------------------------- */

if ( class_exists( 'WP_Customize_Control' ) ) {

  class Avik_Toggle_Switch_Custom_control extends WP_Customize_Control {
    /**
    * The type of control being rendered
    */
    public $type = 'toogle_switch';
    /**
    * Enqueue our scripts and styles
    */
    public function enqueue(){
      wp_enqueue_style( 'avik_custom_controls_css', trailingslashit( get_template_directory_uri() ) . 'inc/css/avik-customizer.css', array(), '1.0', 'all' );
    }
    /**
    * Render the control in the customizer
    */
    public function render_content(){
      ?>
      <div class="toggle-switch-control">
        <div class="toggle-switch">
          <input type="checkbox" id="<?php echo esc_url($this->id); ?>" name="<?php echo esc_url($this->id); ?>" class="toggle-switch-checkbox" value="<?php echo esc_html( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
          <label class="toggle-switch-label" for="<?php echo esc_url( $this->id ); ?>">
            <span class="toggle-switch-inner"></span>
            <span class="toggle-switch-switch"></span>

          </label>
        </div>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php if( !empty( $this->description ) ) { ?>
          <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
        <?php } ?>
      </div>
      <?php
    }
  }

}

/* ------------------------------------*
##  1.2 Class Category Control */
/* ----------------------------------- */

if (class_exists('WP_Customize_Control')) {
  class Avik_Customize_Category_Control extends WP_Customize_Control {
    public function render_content() {
      $dropdown = wp_dropdown_categories(
        array(
          'name'              => '_customize-dropdown-category-' . $this->id,
          'echo'              => 0,
          'show_option_none'  => __( '&mdash; Select &mdash;','avik' ),
          'option_none_value' => '0',
          'selected'          => $this->value(),
        )
      );
      $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
      printf(
        '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
        $this->label,
        $dropdown

      );
    }
  }
}

/* ------------------------------------*
##  1.3 Class add panel */
/* ----------------------------------- */

if ( class_exists( 'WP_Customize_Panel' ) ) {
  class Avik_WP_Customize_Panel extends WP_Customize_Panel {
    public $panel;
    public $type = 'pe_panel';
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
  class Avik_WP_Customize_Section extends WP_Customize_Section {
    public $section;
    public $type = 'pe_section';
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


/* ------------------------------------*
##  1.4 Class TinyMCE */
/* ----------------------------------- */

if (class_exists('WP_Customize_Control')) {

  class Avik_TinyMCE_Custom_control extends WP_Customize_Control {
    /**
    * The type of control being rendered
    */
    public $type = 'tinymce_editor';
    /**
    * Enqueue our scripts and styles
    */
    public function enqueue(){
      wp_enqueue_script( 'avik_custom_controls_js', trailingslashit( get_template_directory_uri() ) . 'inc/js/avik-class-customizer.js', array( 'jquery' ), '1.0', true );
      wp_enqueue_style( 'avik_custom_controls_css', trailingslashit( get_template_directory_uri() ) . 'inc/css/avik-customizer.css', array(), '1.0', 'all' );
      wp_enqueue_editor();
    }
    /**
    * Pass our TinyMCE toolbar string to JavaScript
    */
    public function to_json() {
      parent::to_json();
      $this->json['skyrockettinymcetoolbar1'] = isset( $this->input_attrs['toolbar1'] ) ? esc_js( $this->input_attrs['toolbar1'] ) : 'bold italic bullist numlist alignleft aligncenter alignright link';
      $this->json['skyrockettinymcetoolbar2'] = isset( $this->input_attrs['toolbar2'] ) ? esc_js( $this->input_attrs['toolbar2'] ) : '';
    }
    /**
    * Render the control in the customizer
    */
    public function render_content(){
      ?>
      <div class="tinymce-control">
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php if( !empty( $this->description ) ) { ?>
          <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
        <?php } ?>
        <textarea id="<?php echo esc_url( $this->id ); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_html( $this->value() ); ?></textarea>
      </div>
      <?php
    }
  }

}

/* ------------------------------------*
##  1.6 Class Alpha Color  */
/* ----------------------------------- */

/*
* @author Anthony Hortin <http://maddisondesigns.com>
* @license http://www.gnu.org/licenses/gpl-2.0.html
* @link https://github.com/maddisondesigns
*/

if (class_exists('WP_Customize_Control')) {
  class Avik_Customize_Alpha_Color_Control extends WP_Customize_Control {

    public $type = 'alpha-color';

    public $palette;

    public $show_opacity;

    public function enqueue() {
      wp_enqueue_script( 'avik_custom_controls_js', trailingslashit( get_template_directory_uri() ) . 'inc/js/avik-class-customizer.js', array( 'jquery', 'wp-color-picker' ), '1.0', true );
      wp_enqueue_style( 'avik_custom_controls_css', trailingslashit( get_template_directory_uri() ) . 'inc/css/avik-customizer.css', array( 'wp-color-picker' ), '1.0', 'all' );
    }

    public function render_content() {


      if ( is_array( $this->palette ) ) {
        $palette = implode( '|', $this->palette );
      } else {

        $palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
      }

      $show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';

      ?>
      <label>
        <?php
        if ( isset( $this->label ) && '' !== $this->label ) {
          echo '<span class="customize-control-title">' . esc_html(sanitize_text_field( $this->label )) . '</span>';
        }
        if ( isset( $this->description ) && '' !== $this->description ) {
          echo '<span class="description customize-control-description">' . esc_html(sanitize_text_field( $this->description )) . '</span>';
        } ?>
      </label>
      <input class="alpha-color-control" type="text" data-show-opacity="<?php echo esc_html($show_opacity); ?>" data-palette="<?php echo esc_html( $palette ); ?>" data-default-color="<?php echo esc_html( $this->settings['default']->default ); ?>" <?php $this->link(); ?>  />
      <?php
    }
  }
}

/* ------------------------------------*
##  1.7 Class Slider custom control  */
/* ----------------------------------- */

if (class_exists('WP_Customize_Control')) {

  class Avik_Slider_Custom_Control extends WP_Customize_Control {
    /**
    * The type of control being rendered
    */
    public $type = 'slider_control';
    /**
    * Enqueue our scripts and styles
    */
    public function enqueue() {
      wp_enqueue_script( 'avik_custom_controls_js', trailingslashit( get_template_directory_uri() ) . 'inc/js/avik-class-customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0', true );
      wp_enqueue_style( 'avik_custom_controls_css', trailingslashit( get_template_directory_uri() ) . 'inc/css/avik-customizer.css', array(), '1.0', 'all' );
    }
    /**
    * Render the control in the customizer
    */
    public function render_content() {
      ?>
      <div class="slider-custom-control">
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number" id="<?php echo esc_html( $this->id ); ?>" name="<?php echo esc_html( $this->id ); ?>" value="<?php echo esc_html( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
        <div class="slider" slider-min-value="<?php echo esc_html( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_html( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_html( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_html( $this->value() ); ?>"></span>
      </div>
      <?php
    }
  }
}

/* -----------------------------------------*
##  1.8 Class Simple Notice Custom Control  */
/* ---------------------------------------- */

if (class_exists('WP_Customize_Control')) {

class Avik_Simple_Notice_Custom_Control extends WP_Customize_Control {
  /**
   * The type of control being rendered
   */
  public $type = 'simple_notice';
  /**
   * Render the control in the customizer
   */
  public function render_content() {
    $allowed_html = array(
      'a' => array(
        'href' => array(),
        'title' => array(),
        'class' => array(),
        'target' => array(),
      ),
      'br' => array(),
      'em' => array(),
      'strong' => array(),
      'i' => array(
        'class' => array()
      ),
      'button' => array(
        'class' => array()
      ),
      'span' => array(
        'class' => array(),
      ),
      'code' => array(),
    );
  ?>
    <div class="simple-notice-custom-control">
      <?php if( !empty( $this->label ) ) { ?>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
      <?php } ?>
      <?php if( !empty( $this->description ) ) { ?>
        <span class="customize-control-description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>
      <?php } ?>
    </div>

    <!-- Style for Custom Simple Notices -->
    <style>

    .simple-notice-custom-control{
    	padding-top: 2em;
    	border: 1px solid #ccc;
      background-color: #fff;
    }

    .simple-notice-custom-control span{
      padding: 1em;
    }

    .simple-notice-custom-control{
      font-family: 'Montserrat', sans-serif;
      transition-duration: 0.7s;
      transition-timing-function: ease;
    }

    .simple-notice-custom-control:hover{
      box-shadow:
      1px 1px #000,
      2px 2px #000,
      3px 3px #0000;
      -webkit-transform: translateX(-3px);
      transform: translateX(-3px);
      -webkit-transition:  0.7s ease-in;
      -moz-transition:  0.7s ease-in;
      transition:  0.7s ease-in ;
    }

    .customize-control-description{
      font-style: normal!important;
    }

    .simple-notice-custom-control button {
    	border-color: #000;
    	background: transparent;
    	color: #000;
    	padding: 8px;
    	font-size: 14px;
    	position: relative;
    	transition: all 500ms ease;
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .simple-notice-custom-control a{
      color: #000;
      text-decoration: none;
    }

    .simple-notice-custom-control a:hover{
      color: #d5f83e;
    }

    .simple-notice-custom-control button a:hover {
      color: #d5f83e;
    }


    .simple-notice-custom-control button:hover {
    	background: #000;
    	color: #fff;
      border-color: #fff;
    }

    </style>
  <?php
  }
}
}

/* ------------------------------------------------------------------------- *
##  2 CSS Customize */
/* ------------------------------------------------------------------------- */

function avik_customizer_css() {
  ?>

  <style>

  /* ------------------------------------------------------------------------- *
  ## 2.2 Color Filter Header Home */
  /* ------------------------------------------------------------------------- */

  .filter-header{
    background-color:<?php echo esc_attr( get_theme_mod('avik_color_filter_header', 'rgba(122,122,122,0.05)')); ?>;
  }

  /* ------------------------------------------------------------------------- *
  ## 2.3 Font Size Logo */
  /* ------------------------------------------------------------------------- */

  .avik-logo img{width:<?php echo esc_attr( get_theme_mod('avik_font_size_logo', '80')); ?>px ;}

</style>

<!-- 2.4 Responsive Enable Style  -->

<!-- Scroll to top -->

<?php if ( true == esc_html( get_theme_mod( 'avik_enable_to_top_media', false) )) : ?>

  <style>

  @media (max-width: 699px) {

    #avik-scrol-to-top{
      display: none!important;
    }

  }
</style>
<?php endif; ?>

<!-- Sidebar smartphone -->

<?php if ( true == esc_html( get_theme_mod( 'avik_enable_sidebar_media', false) )) : ?>

  <style>

  @media (max-width: 699px) {

    #secondary{
      display: none!important;
    }

  }
</style>
<?php endif; ?>


<?php
}
add_action( 'wp_footer', 'avik_customizer_css' );


/* ------------------------------------------------------------------------- *
##  3 Dependently-Contextual Customizer Controls */
/* ------------------------------------------------------------------------- */

/* ---------------------------------------- *
##  3.1 Section Team */
/* --------------------------------------- */

// Enable Section Team

function avik_enable_team_whoweare($control) {

  $option = $control->manager->get_setting('avik_enable_team_whoweare');

  return $option->value() == 'avik_title_general_team_whoweare';
  return $option->value() == 'avik_color_social_icons_team';
  return $option->value() == 'avik_color_hover_social_icons_team';

}

/* --------------------------------------*
##  3.2 Social Team Who we are */
/* -------------------------------------- */

// avik_Enable Icon Facebook 1

function avik_enable_facebook_icon_team_1($control) {

  $option = $control->manager->get_setting('avik_enable_facebook_icon_team_1');

  return $option->value() == 'avik_link_facebook_icon_team_1';

}

// Enable Icon Twitter 1

function avik_enable_twitter_icon_team_1($control) {

  $option = $control->manager->get_setting('avik_enable_twitter_icon_team_1');

  return $option->value() == 'avik_link_twitter_icon_team_1';

}

// Enable Icon Instagram 1

function avik_enable_instagram_icon_team_1($control) {

  $option = $control->manager->get_setting('avik_enable_instagram_icon_team_1');

  return $option->value() == 'avik_link_instagram_icon_team_1';

}

// Enable Icon Linkedin 1

function avik_enable_linkedin_icon_team_1($control) {

  $option = $control->manager->get_setting('avik_enable_linkedin_icon_team_1');

  return $option->value() == 'avik_link_linkedin_icon_team_1';

}

// Enable Google Plus 1

function avik_enable_google_plus_icon_team_1($control) {

  $option = $control->manager->get_setting('avik_enable_google_plus_icon_team_1');

  return $option->value() == 'avik_link_google_plus_icon_team_1';

}

// avik_Enable Icon Facebook 2

function avik_enable_facebook_icon_team_2($control) {

  $option = $control->manager->get_setting('avik_enable_facebook_icon_team_2');

  return $option->value() == 'avik_link_facebook_icon_team_2';

}

// Enable Icon Twitter 2

function avik_enable_twitter_icon_team_2($control) {

  $option = $control->manager->get_setting('avik_enable_twitter_icon_team_2');

  return $option->value() == 'avik_link_twitter_icon_team_2';

}

// Enable Icon Instagram 2

function avik_enable_instagram_icon_team_2($control) {

  $option = $control->manager->get_setting('avik_enable_instagram_icon_team_2');

  return $option->value() == 'avik_link_instagram_icon_team_2';

}

// Enable Icon Linkedin 2

function avik_enable_linkedin_icon_team_2($control) {

  $option = $control->manager->get_setting('avik_enable_linkedin_icon_team_2');

  return $option->value() == 'avik_link_linkedin_icon_team_2';

}

// Enable Google Plus 2

function avik_enable_google_plus_icon_team_2($control) {

  $option = $control->manager->get_setting('avik_enable_google_plus_icon_team_2');

  return $option->value() == 'avik_link_google_plus_icon_team_2';

}

// Enable Icon Facebook 3

function avik_enable_facebook_icon_team_3($control) {

  $option = $control->manager->get_setting('avik_enable_facebook_icon_team_3');

  return $option->value() == 'avik_link_facebook_icon_team_3';

}

// Enable Icon Twitter 3

function avik_enable_twitter_icon_team_3($control) {

  $option = $control->manager->get_setting('avik_enable_twitter_icon_team_3');

  return $option->value() == 'avik_link_twitter_icon_team_3';

}

// Enable Icon Instagram 3

function avik_enable_instagram_icon_team_3($control) {

  $option = $control->manager->get_setting('avik_enable_instagram_icon_team_3');

  return $option->value() == 'avik_link_instagram_icon_team_3';

}

// Enable Icon Linkedin 3

function avik_enable_linkedin_icon_team_3($control) {

  $option = $control->manager->get_setting('avik_enable_linkedin_icon_team_3');

  return $option->value() == 'avik_link_linkedin_icon_team_3';

}

// Enable Google Plus 3

function avik_enable_google_plus_icon_team_3($control) {

  $option = $control->manager->get_setting('avik_enable_google_plus_icon_team_3');

  return $option->value() == 'avik_link_google_plus_icon_team_3';

}


/* --------------------------------------*
##  3.3 Blog */
/* -------------------------------------- */


// Enable carousel Blog

function avik_enable_carousel($control) {

  $option = $control->manager->get_setting('avik_enable_carousel');

  return $option->value() == 'avik_carousel_category';
  return $option->value() == 'avik_carousel_count';

}

/* --------------------------------------*
##  3.4 Social */
/* -------------------------------------- */

// Facebook

function avik_enable_facebook_social($control) {

  $option = $control->manager->get_setting('avik_enable_facebook_social');

  return $option->value() == 'avik_link_facebook_social';

}

// Twitter

function avik_enable_twitter_social($control) {

  $option = $control->manager->get_setting('avik_enable_twitter_social');

  return $option->value() == 'avik_link_twitter_social';

}

// Google Plus

function avik_enable_google_plus_social($control) {

  $option = $control->manager->get_setting('avik_enable_google_plus_social');

  return $option->value() == 'avik_link_google_plus_social';

}

// Dribbble

function avik_enable_dribbble_social($control) {

  $option = $control->manager->get_setting('avik_enable_dribbble_social');

  return $option->value() == 'avik_link_dribbble_social';

}

// Tumblr

function avik_enable_tumblr_social($control) {

  $option = $control->manager->get_setting('avik_enable_tumblr_social');

  return $option->value() == 'avik_link_tumblr_social';

}

// Instagram

function avik_enable_instagram_social($control) {

  $option = $control->manager->get_setting('avik_enable_instagram_social');

  return $option->value() == 'avik_link_instagram_social';

}

// Linkedin

function avik_enable_linkedin_social($control) {

  $option = $control->manager->get_setting('avik_enable_linkedin_social');

  return $option->value() == 'avik_link_linkedin_social';

}

// Youtube

function avik_enable_youtube_social($control) {

  $option = $control->manager->get_setting('avik_enable_youtube_social');

  return $option->value() == 'avik_link_youtube_social';

}

// Pinterest

function avik_enable_pinterest_social($control) {

  $option = $control->manager->get_setting('avik_enable_pinterest_social');

  return $option->value() == 'avik_link_pinterest_social';

}

// Flickr

function avik_enable_flickr_social($control) {

  $option = $control->manager->get_setting('avik_enable_flickr_social');

  return $option->value() == 'avik_link_flickr_social';

}

// Github

function avik_enable_github_social($control) {

  $option = $control->manager->get_setting('avik_enable_github_social');

  return $option->value() == 'avik_link_github_social';

}


/* --------------------------------------*
##  3.5 Filter Header Home */
/* -------------------------------------- */

// Color Filter Header Home

function avik_enable_filter_home($control) {

  $option = $control->manager->get_setting('avik_enable_filter_home');

  return $option->value() == 'avik_color_filter_header';

}

/* ------------------------------------------------------------------------- *
##  4 General Sanitization */
/* ------------------------------------------------------------------------- */

/* ----------------------------------------------- *
##  4.1 Image Sanitization */
/* ------------------------------------------------*/

if ( ! function_exists( 'avik_sanitize_file' ) ) {
  function avik_sanitize_file( $file, $setting ) {

    //allowed file types
    $mimes = array(
      'jpg|jpeg|jpe' => 'image/jpeg',
      'gif'          => 'image/gif',
      'png'          => 'image/png',
      'mp4'          => 'video/mp4',
      'bmp'          => 'image/bmp',
      'tif|tiff'     => 'image/tiff',
      'ico'          => 'image/x-icon',
    );

    //check file type from file name
    $file_ext = wp_check_filetype( $file, $mimes );

    //if file has a valid mime type return it, otherwise return default
    return ( $file_ext['ext'] ? $file : $setting->default );
  }
}

/* ----------------------------------------------- *
##  4.2 Toggle switch Sanitization */
/* ------------------------------------------------*/

if ( ! function_exists( 'avik_switch_sanitization' ) ) {
  function avik_switch_sanitization( $input ) {
    if ( true === $input ) {
      return 1;
    } else {
      return 0;
    }
  }
}

/* ----------------------------------------------- *
##  4.3 Dropwown Pages Sanitization */
/* ------------------------------------------------*/


function avik_sanitize_dropdown_pages( $page_id, $setting ) {
  $page_id = absint( $page_id );
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* ----------------------------------------------- *
##  4.4 Dropwown Categoryes Sanitization */
/* ------------------------------------------------*/

function avik_sanitize_category_select( $cat_id, $setting) {
  $cat_id = absint($cat_id);
  return is_string(get_the_category_by_ID( $cat_id )) ? $cat_id :  $setting->default;
}


/* ----------------------------------------------- *
##  4.5 Select sanitization function */
/* ------------------------------------------------*/

function avik_sanitize_select( $input, $setting ){

  //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
  $input = sanitize_key($input);

  //get the list of possible select options
  $choices = $setting->manager->get_control( $setting->id )->choices;

  //return input if valid or return default option
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}


/* ----------------------------------------------- *
##  4.6 Alpha Color Sanitization  */
/* ------------------------------------------------*/
/**
*@param  string	Input to be sanitized
*@return string	Sanitized input
*/

if ( ! function_exists( 'avik_hex_rgba_sanitization' ) ) {
  function avik_hex_rgba_sanitization( $input, $setting ) {
    if ( empty( $input ) || is_array( $input ) ) {
      return $setting->default;
    }

    if ( false === strpos( $input, 'rgba' ) ) {

      $input = sanitize_hex_color( $input );
    } else {

      $input = str_replace( ' ', '', $input );
      sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
      $input = 'rgba(' . avik_in_range( $red, 0, 255 ) . ',' . avik_in_range( $green, 0, 255 ) . ',' . avik_in_range( $blue, 0, 255 ) . ',' . avik_in_range( $alpha, 0, 1 ) . ')';
    }
    return $input;
  }
}

/**
* @param  number	Input to be sanitized
* @return number	Sanitized input
*/
if ( ! function_exists( 'avik_in_range' ) ) {
  function avik_in_range( $input, $min, $max ){
    if ( $input < $min ) {
      $input = $min;
    }
    if ( $input > $max ) {
      $input = $max;
    }
    return $input;
  }
}


/* ----------------------------------------------- *
##  4.7 Slider custom control Sanitization  */
/* ------------------------------------------------*/

/**
* @param  string		Input value to check
* @return integer	Returned integer value
*/
if ( ! function_exists( 'avik_sanitize_integer' ) ) {
  function avik_sanitize_integer( $input ) {
    return (int) $input;
  }
}

/* ----------------------------------------------- *
##  4.8 Text custom control Sanitization  */
/* ------------------------------------------------*/

if ( ! function_exists( 'avik_text_sanitization' ) ) {
  function avik_text_sanitization( $input ) {
    if ( strpos( $input, ',' ) !== false) {
      $input = explode( ',', $input );
    }
    if( is_array( $input ) ) {
      foreach ( $input as $key => $value ) {
        $input[$key] = sanitize_text_field( $value );
      }
      $input = implode( ',', $input );
    }
    else {
      $input = sanitize_text_field( $input );
    }
    return $input;
  }
}
