<?php
/**
 * content-page-slider.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.3.2
 */
 ?>

<!-- Section Slider -->

<section class="slideshow" id="slider">
     <!-- Social Icons -->
     <div class="avik-social-icons-header">
		    <ul class="avik-social-icons" data-aos="zoom-in">
        <?php get_template_part( 'inc/social' ); ?>
		    </ul>
     </div>
    <!-- Slider 1 -->
    <div class="slideshow__slide js-slider-home-slide is-current" data-slide="1">
    <?php
     $slider_cat = esc_url( get_theme_mod('avik_category_slider_1'));
     $slider_count = 1;
	   $new_query = new WP_Query( array( 'cat' => $slider_cat ,'showposts' => $slider_count ));
     while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
       <?php $avik_image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
       <div class="slideshow__slide-background-parallax background-absolute js-parallax" data-speed="-1" data-position="top" data-target="#slider">
        <div class="slideshow__slide-background-load-wrap background-absolute">
          <div class="slideshow__slide-background-load background-absolute">
            <div class="slideshow__slide-background-wrap background-absolute">
              <div class="slideshow__slide-background background-absolute">
                <div class="slideshow__slide-image-wrap background-absolute">
                  <!-- Image slider 1 -->
                  <div class="slideshow__slide-image background-absolute" style="background-image:url(<?php echo esc_url($avik_image_attributes[0]); ?>); background-size: cover; background-position: center center;">
                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_filter_home', false) )) :?>
                  <div class="filter-header"></div>
                  <?php endif; ?>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slideshow__slide-caption">
        <div class="slideshow__slide-caption-text">
          <div class="container js-parallax" data-speed="2" data-position="top" data-target="#slider">
            <!-- Title slider 1 -->
            <h1 class="slideshow__slide-caption-title"><?php the_title(); ?></h1>
            <!-- Subtitle slider 1 -->
            <div class="slideshow__slide-caption-content"><?php the_excerpt(); ?></div>
              <a class="slideshow__slide-caption-subtitle -load o-hsub -link" href="<?php the_permalink();?>">
               <span class="slideshow__slide-caption-subtitle-label"><?php esc_html_e('Read more...','avik'); ?></span>
              </a>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile;
        wp_reset_query(); ?>
    <!-- Slider 2 -->
    <div class="slideshow__slide js-slider-home-slide is-next" data-slide="2">
    <?php
      $slider_cat = esc_url( get_theme_mod('avik_category_slider_2'));
      $slider_count = 1;
	    $new_query = new WP_Query( array( 'cat' => $slider_cat ,'showposts' => $slider_count ));
	    while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
      <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
      <div class="slideshow__slide-background-parallax background-absolute js-parallax" data-speed="-1" data-position="top" data-target="#slider">
        <div class="slideshow__slide-background-load-wrap background-absolute">
          <div class="slideshow__slide-background-load background-absolute">
            <div class="slideshow__slide-background-wrap background-absolute">
              <div class="slideshow__slide-background background-absolute">
                <div class="slideshow__slide-image-wrap background-absolute">
                  <!-- Image slider 2 -->
                  <div class="slideshow__slide-image background-absolute" style="background-image: url(<?php echo esc_url($avik_image_attributes[0]); ?>); background-size: cover; background-position: center center;">
                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_filter_home', false) )) :?>
                  <div class="filter-header"></div>
                  <?php endif; ?>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slideshow__slide-caption">
        <div class="slideshow__slide-caption-text">
          <div class="container js-parallax" data-speed="2" data-position="top" data-target="#slider">
            <!-- Title slider 2 -->
            <h1 class="slideshow__slide-caption-title"><?php the_title(); ?></h1>
            <!-- Subtitle slider 2 -->
            <div class="slideshow__slide-caption-content"><?php the_excerpt(); ?></div>
              <a class="slideshow__slide-caption-subtitle -load o-hsub -link" href="<?php the_permalink();?>">
                <span class="slideshow__slide-caption-subtitle-label"><?php esc_html__('Read more...','avik'); ?></span>
              </a>
          </div>
          <?php endwhile;
            wp_reset_query();?>
        </div>
      </div>
    </div>
    <!-- Slider 3 -->
    <div class="slideshow__slide js-slider-home-slide is-prev" data-slide="3">
    <?php
      $slider_cat = esc_html( get_theme_mod('avik_category_slider_3'));
      $slider_count = 1;
	    $new_query = new WP_Query( array( 'cat' => $slider_cat ,'showposts' => $slider_count ));
	    while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
      <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
      <div class="slideshow__slide-background-parallax background-absolute js-parallax" data-speed="-1" data-position="top" data-target="#slider">
        <div class="slideshow__slide-background-load-wrap background-absolute">
          <div class="slideshow__slide-background-load background-absolute">
            <div class="slideshow__slide-background-wrap background-absolute">
              <div class="slideshow__slide-background background-absolute">
                <div class="slideshow__slide-image-wrap background-absolute">
                  <!-- Image slider 3 -->
                  <div class="slideshow__slide-image background-absolute" style="background-image: url(<?php echo esc_url($avik_image_attributes[0]); ?>); background-size: cover; background-position: center center;">
                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_filter_home', false) )) :?>
                  <div class="filter-header"></div>
                  <?php endif; ?>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slideshow__slide-caption">
        <div class="slideshow__slide-caption-text">
          <div class="container js-parallax" data-speed="2" data-position="top" data-target="#slider">
            <!-- Title slider 3 -->
            <h1 class="slideshow__slide-caption-title"><?php the_title(); ?></h1>
            <!-- Subtitle slider 3 -->
            <div class="slideshow__slide-caption-content"><?php the_excerpt(); ?></div>
              <a class="slideshow__slide-caption-subtitle -load o-hsub -link" href="<?php the_permalink();?>">
                <span class="slideshow__slide-caption-subtitle-label"><?php esc_html_e('Read more...','avik'); ?></span>
              </a>
          </div>
        </div>
      </div>
      <?php endwhile;
        wp_reset_query();?>
    </div>
      <!-- Angle scroll -->
      <div class="c-header-home_footer">
         <div class="angle-scroll avik-animation-bounce">
          <a href="#who-we-are"><i class="fas fa-angle-down"></i></a>
         </div>
     </div>
  </section>
