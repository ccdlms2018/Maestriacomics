<?php
/**
* front-page.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/
?>

<?php get_header();

// Slider/Video/Static

get_template_part( 'template-parts/content',esc_html( get_theme_mod('avik_order_header_home','page-static') )); ?>

<!-- Section Who we are -->

<?php
$whowearecontent = esc_attr( get_theme_mod( 'avik_page_id_whoweare' ));
$whoweare_count = 1;
$mod = new WP_Query( array( 'page_id' => $whowearecontent ,'showposts' => $whoweare_count ) );
while ( $mod->have_posts() ) : $mod->the_post(); { ?>
  <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
  <section id="who-we-are" class="avik-who-we-are">
    <div class="container">
    <div class="row m-0">
      <div class="col-xs-12 col-sm-4">
        <!-- Title who-we-are -->
        <h3><?php the_title();?></h3>
        <div><?php the_excerpt();?></div>
        <div class="avik-btn-who-we-are">
          <a href="<?php the_permalink();?>" class="btn btn-avik" role="button" aria-pressed="true" data-aos="zoom-in" data-aos-duration="2000"><?php esc_html_e('Read more...','avik'); ?></a>
        </div>
      </div>
      <div class="col-xs-12 col-sm-8 who-we-are-image-frame">
        <div class="container">
        <div class="row">
          <!-- Image 1 who we are -->
          <div class="first-image-who-we-are col-md-6 col-xs-12" data-aos="fade-right" data-aos-duration="2000">
            <?php if ( class_exists( 'MultiPostThumbnails')) :
              MultiPostThumbnails::the_post_thumbnail(
                get_post_type(),
                'thumbnail-two-page');
              endif;?>
            </div>
            <!-- Image 2 who we are -->
            <div class="second-image-who-we-are col-md-6 col-xs-12" data-aos="zoom-in" data-aos-duration="2000">
              <img class="img-who-we-are border-who-we-are" src="<?php if ( $avik_image_attributes[0] ) :
                echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>"/>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      </section>
      <div class="clear"></div>
    <?php }
  endwhile;
  wp_reset_query();?>

  <!-- Section Services -->

  <section class="tabs" id="services">
    <div class="tab cf is-visible">
      <div class="container">
        <h1 class="tab__title animated wow fadeInUp tab-fade text-right"><?php echo esc_html( get_theme_mod( 'avik_title_services')); ?></h1>
        <div class="tab__subheading tab-fade animated text-right"><h2><?php echo esc_html( get_theme_mod( 'avik_subtitle_services')); ?></h2></div>
        <ul class="tabs__list cf">
          <?php
          $services_cat = esc_attr( get_theme_mod('avik_services_category'));
          $services_count =4;
          $new_query = new WP_Query( array( 'cat' => $services_cat  , 'showposts' => $services_count ));
          while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
          <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_services');?>
          <li class="tab__development tabs__list-item tabs__list-item--fourth animated wow fadeInUp tab-fadeup">
            <div class="tab__development-img" data-aos="fade-left" data-aos-duration="2000">
              <img class="img-avic-services-default" src="<?php if ( $avik_image_attributes[0] ) :
                echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>">
              </div>
              <h2 class="tab__development-title one"><?php the_title();?></h2>
              <a href="<?php the_permalink();?>" class="btn btn-avik" role="button" aria-pressed="true" data-aos="zoom-in" data-aos-duration="2000"><?php esc_html_e('Read more...','avik'); ?></a>
            </li>
          <?php endwhile;
          wp_reset_query(); ?>
        </ul>
      </div>
    </div>
  </section>

  <!--Section Portfolio -->

  <section class="portfolio" id="portfolio">
    <div class="container">

      <!-- Control tab Portfolio -->
      <div id="control-portfolio">
        <h3><?php echo esc_html( get_theme_mod( 'avik_title_portfolio','Portfolio')); ?></h3>
        <ul class="list-portfolio">
          <li class="portfolio-active all" onclick="avikfilterSelection('all')"><?php echo esc_html( get_theme_mod( 'avik_title_nav_all_portfolio')); ?></li>
          <li class="portfolio-active one" onclick="avikfilterSelection('1')"> <?php echo esc_html( get_theme_mod( 'avik_title_nav_1_portfolio')); ?></li>
          <li class="portfolio-active two " onclick="avikfilterSelection('2')"> <?php echo esc_html( get_theme_mod( 'avik_title_nav_2_portfolio')); ?></li>
          <li class="portfolio-active three" onclick="avikfilterSelection('3')"><?php echo esc_html( get_theme_mod( 'avik_title_nav_3_portfolio')); ?></li>
        </ul>
      </div>
      <div class="row">
        <!-- Column 1 -->
        <?php
        $portfolio_c_1_cat = esc_url( get_theme_mod('avik_portfolio_c_1_category'));
        $portfolio_c_1_count =6;
        $new_query = new WP_Query( array( 'cat' => $portfolio_c_1_cat , 'showposts' => $portfolio_c_1_count ));
        while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 1 tabcontent">
          <div class="content avik-portfolio">
            <a href="<?php the_permalink();?>">
              <img src="<?php if ( $avik_image_attributes[0] ) :
                echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>"/></a>
              </div>
            </div>
          <?php endwhile;
          wp_reset_query();?>
          <!-- Column 2 -->
          <?php
          $portfolio_c_2_cat = esc_url( get_theme_mod('avik_portfolio_c_2_category'));
          $portfolio_c_2_count =6;
          $new_query = new WP_Query( array( 'cat' => $portfolio_c_2_cat  , 'showposts' => $portfolio_c_2_count ));
          while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
          <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
          <div class="col-md-4 col-ms-6 column 2 tabcontent">
            <div class="content avik-portfolio">
              <a href="<?php the_permalink();?>">
                <img src="<?php if ( $avik_image_attributes[0] ) :
                  echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>"/></a>
                </div>
              </div>
            <?php endwhile;
            wp_reset_query();?>
            <!-- Column 3 -->
            <?php
            $portfolio_c_3_cat = esc_url( get_theme_mod('avik_portfolio_c_3_category'));
            $portfolio_c_3_count =6;
            $new_query = new WP_Query( array( 'cat' => $portfolio_c_3_cat  , 'showposts' => $portfolio_c_3_count ));
            while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
            <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
            <div class="col-md-4 col-ms-6 column 3 tabcontent">
              <div class="content avik-portfolio">
                <a href="<?php the_permalink();?>">
                  <img src="<?php if ( $avik_image_attributes[0] ) :
                    echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>"/></a>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_query();?>
              <div class="clearfix"></div>
            </div>
          </div>
        </section>

        <!-- Section Avik-Blog -->

        <section class="avik-blog" id="avik-blog">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <h2 class="text-right blog pb-5" data-aos="zoom-in"><?php echo esc_html( get_theme_mod( 'avik_title_blog')); ?></h2>
                <div class="row">
                  <?php
                  $blog_cat = esc_url( get_theme_mod('avik_blog_category'));
                  $blog_count =3;
                  $new_query = new WP_Query( array( 'cat' => $blog_cat  , 'showposts' => $blog_count ));
                  while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
                  <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_news');?>
                  <a href="<?php the_permalink();?>" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 link-blog" data-aos="fade-up">
                    <div class="blog-image">
                      <img src="<?php if ( $avik_image_attributes[0] ) :
                        echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>">
                      </div>
                      <h2 class="blog-title"><?php the_title();?></h2>
                      <div class="blog-subtitle"><?php the_excerpt();?></div>
                      <?php if ( false == esc_html( get_theme_mod( 'avik_enable_time_comment_blog_home', false) )) :?>
                        <span class="blog-info"><i class="far fa-calendar"></i><?php echo get_the_date (); ?></span>
                        <span class="blog-info"><i class="fas fa-comment"></i><?php comments_number(); ?></span>
                      <?php endif; ?>
                    </a>
                  <?php endwhile;
                  wp_reset_query(); ?>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="clear"></div>

        <!-- Section Contact -->

        <section class="contact" id="contact">
          <div class="row paddong-contact">
            <!-- Address -->
            <div class="col-lg-6 address">
              <?php
              $contact_cat = esc_url( get_theme_mod('avik_contact_category'));
              $contact_count =1;
              $new_query = new WP_Query( array( 'cat' => $contact_cat  , 'showposts' => $contact_count ));
              while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
              <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
              <h3 data-aos="fade-up"><?php the_title(); ?></h3>
              <?php the_content(); ?>
              <!-- Social Icons Contact -->
              <div class="avik-social-icons-contact" data-aos="zoom-in">
                <ul class="avik-social-icons-contact-ul">
                  <?php get_template_part( 'inc/social' ); ?>
                </ul>
              </div>
            </div>
            <!-- Widget Contact Form -->
            <div class="col-lg-6 widget-contact">
              <?php dynamic_sidebar('widget_contact_form'); ?>
            </div>
          </div>
          <!-- Map -->
          <?php if ( false ==  esc_html(get_theme_mod( 'enable_map_contact', false ) )) : ?>
            <div class="avik-map">
              <a href="<?php the_permalink();?>">
                <img src="<?php if ( $avik_image_attributes[0] ) :
                  echo  esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>"/></a>
                </div>
              <?php endif; ?>
            <?php endwhile;
            wp_reset_query();?>
          </section>

          <?php get_footer(); ?>
