<?php
/**
 * content-page-whoweare.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.3.2
 */
 ?>

 <div class="enter-whoweare">
     <div class="header-image-whoweare" >
        <div class="text-image-whoweare">
			     <div id="typed-strings">
				       <p><?php the_title(); ?> <i> <?php the_excerpt();?></i></p>
			     </div>
			      <span id="typed"></span>
        </div>
        <?php
             $whowearecontent = esc_attr( get_theme_mod( 'avik_page_id_whoweare' ));
             $whoweare_count = 1;
             $mod = new WP_Query( array( 'page_id' => $whowearecontent ,'showposts' => $whoweare_count ) );
             while ( $mod->have_posts() ) : $mod->the_post(); { ?>
             <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <img class="img-whoweare-header" src="<?php if ( $avik_image_attributes[0] ) :
           echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/img/whoweare.jpg'; endif; ?>"/>
	   </div>
     <?php avik_the_breadcrumb(); ?>
      <div class="title-whoweare text-center pt-4">
        <h3><?php the_title();?></h3>
      </div>
        <div class="container">
          <div class="row">
              <!-- Title who-we-are -->
              <div class="image-thumbnail-portfolio">
                <div class="row">
                  <div class="col-sm-6">
                    <div><?php the_content();?></div>
                  </div>
                   <div class="col-sm-6 ">
                     <!-- Image 2 who we are -->
                     <div class="second-image-who-we-are image-enter-whoweare" data-aos="zoom-in">
                     <?php if ( class_exists( 'MultiPostThumbnails')) :
                         MultiPostThumbnails::the_post_thumbnail(
                         get_post_type(),
                         'thumbnail-two-page');
                         endif;?>
                     </div>
                   </div>
                </div>
              </div>
               <div class="clear"></div>
                 <?php } endwhile;
                  wp_reset_query(); ?>
          </div>
        </div>
         <!-- Statistics -->
         <?php if ( false == esc_html( get_theme_mod( 'avik_enable_statistics_whoweare', false) )) :?>
         <div class="statistics row">
           <div class="statistics-box col-sm-3">
             <div class="statistics-icon">
               <span><i class="<?php echo esc_html( get_theme_mod( 'avik_icon_1_statistics','far fa-flag')); ?>"></i></span>
               <div class="counter-value statistics-number">
               <?php echo esc_html( get_theme_mod( 'avik_max_numbers_1_statistics')); ?>
               </div>
                <div class="statistics-text one">
                  <h4><?php echo esc_html( get_theme_mod( 'avik_title_1_statistics_whoweare')); ?></h4>
                </div>
             </div>
           </div>
       <div class="statistics-box col-sm-3">
          <div class="statistics-icon">
            <span><i class="<?php echo esc_html( get_theme_mod( 'avik_icon_2_statistics','far fa-smile')); ?>"></i></span>
          <div class="counter-value statistics-number">
          <?php echo esc_html( get_theme_mod( 'avik_max_numbers_2_statistics')); ?>
          </div>
               <div class="statistics-text two">
                 <h4><?php echo esc_html( get_theme_mod( 'avik_title_2_statistics_whoweare')); ?></h4>
               </div>
          </div>
       </div>
       <div class="statistics-box col-sm-3">
          <div class="statistics-icon">
            <span><i class="<?php echo esc_html( get_theme_mod( 'avik_icon_3_statistics','fas fa-thumbtack')); ?>"></i></span>
            <div class="counter-value statistics-number">
            <?php echo esc_html( get_theme_mod( 'avik_max_numbers_3_statistics')); ?>
              </div>
                 <div class="statistics-text three">
                  <h4><?php echo esc_html( get_theme_mod( 'avik_title_3_statistics_whoweare')); ?></h4>
                 </div>
          </div>
       </div>
       <div class="statistics-box col-sm-3">
          <div class="statistics-icon">
             <span><i class="<?php echo esc_html( get_theme_mod( 'avik_icon_4_statistics','fas fa-globe')); ?>"></i></span>
             <div class="counter-value statistics-number">
              <?php echo esc_html( get_theme_mod( 'avik_max_numbers_4_statistics')); ?>
                </div>
                 <div class="statistics-text four">
                   <h4><?php echo esc_html( get_theme_mod( 'avik_title_4_statistics_whoweare')); ?></h4>
                </div>
          </div>
       </div>
    </div>
    <?php endif; ?>
    <!-- Team -->
    <?php if ( false == esc_html( get_theme_mod( 'avik_enable_team_whoweare', false) )) :?>
    <div class="team">
      <div class="title-team text-center">
        <h3><?php echo esc_html( get_theme_mod( 'avik_title_general_team_whoweare')); ?></h3>
      </div>
      <div class="container py-0">
         <div class="row">
          <div class="frame col-md-4" id="wth-1">
                   <?php
	                  $team_cat = esc_html( get_theme_mod('avik_team_1_category'));
	                  $team_count =1;
	                  $new_query = new WP_Query( array( 'cat' => $team_cat  , 'showposts' => $team_count ));
	                  while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
                     <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_team');?>
                    <a href="<?php the_permalink();?>" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 link-blog" data-aos="fade-up">
                         <img src="<?php if ( $avik_image_attributes[0] ) :
                           echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>">
                      <div class="name-title one">
                         <h4><?php the_title();?></h4>
                         <h5><?php the_excerpt();?></h5>
                         </div>
                     </a>
                    <?php endwhile;
                      wp_reset_query();
                      wp_reset_postdata(); ?>
		           <div class="details">
                 <div class="avik-social-icons-team">
		               <ul class="social-team">
                      <!-- Facebook -->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_facebook_icon_team_1', true) )) :?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_facebook_icon_team_1'));?>">
		                      <i class="fab fa-facebook"></i></a></li>
			                <?php endif; ?>
			                <!-- Twitter -->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_twitter_icon_team_1', true) )):?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_twitter_icon_team_1' ));?>">
		                      <i class="fab fa-twitter"></i></a></li>
                      <?php endif; ?>
                      <!-- Instagram -->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_instagram_icon_team_1', true) )):?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_instagram_icon_team_1' )); ?>">
		                      <i class="fab fa-instagram"></i></a></li>
		                  <?php endif; ?>
			                <!-- Linkedin -->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_linkedin_icon_team_1', true) )):?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_linkedin_icon_team_1' )); ?>">
		                       <i class="fab fa-linkedin"></i></a></li>
		                  <?php endif; ?>
			                <!-- Google Plus-->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_google_plus_icon_team_1', true) )):?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_google_plus_icon_team_1' )); ?>">
		                      <i class="fab fa-google-plus-g"></i></a></li>
		                  <?php endif; ?>
		               </ul>
                 </div>
               </div>
              </div>
                <div class="frame col-md-4" id="wth-2">
                 <?php
                  $team_cat = esc_html( get_theme_mod('avik_team_2_category'));
                  $team_count =1;
                  $new_query = new WP_Query( array( 'cat' => $team_cat  , 'showposts' => $team_count ));
                  while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
                   <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_team');?>
                  <a href="<?php the_permalink();?>" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 link-blog" data-aos="fade-up">
                       <img src="<?php if ( $avik_image_attributes[0] ) :
                         echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>">
                    <div class="name-title one">
                       <h4><?php the_title();?></h4>
                       <h5><?php the_excerpt();?></h5>
                       </div>
                   </a>
                  <?php endwhile;
                    wp_reset_query();
                    wp_reset_postdata(); ?>
              <div class="details">
               <div class="avik-social-icons-team">
                 <ul class="social-team">
                    <!-- Facebook -->
                    <?php if ( false == esc_html( get_theme_mod( 'avik_enable_facebook_icon_team_2', true) )) :?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_facebook_icon_team_2'));?>">
		                      <i class="fab fa-facebook"></i></a></li>
			                <?php endif; ?>
			                <!-- Twitter -->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_twitter_icon_team_2', true) )):?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_twitter_icon_team_2' ));?>">
		                      <i class="fab fa-twitter"></i></a></li>
                      <?php endif; ?>
                      <!-- Instagram -->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_instagram_icon_team_2', true) )):?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_instagram_icon_team_2' )); ?>">
		                      <i class="fab fa-instagram"></i></a></li>
		                  <?php endif; ?>
			                <!-- Linkedin -->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_linkedin_icon_team_2', true) )):?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_linkedin_icon_team_2' )); ?>">
		                       <i class="fab fa-linkedin"></i></a></li>
		                  <?php endif; ?>
			                <!-- Google Plus-->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_google_plus_icon_team_2', true) )):?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_google_plus_icon_team_2' )); ?>">
		                      <i class="fab fa-google-plus-g"></i></a></li>
		                  <?php endif; ?>
                 </ul>
               </div>
            </div>
         </div>
         <div class="frame col-md-4" id="wth-3">
                 <?php
                  $team_cat = esc_url( get_theme_mod('avik_team_3_category'));
                  $team_count =1;
                  $new_query = new WP_Query( array( 'cat' => $team_cat  , 'showposts' => $team_count ));
                  while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
                   <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_team');?>
                  <a href="<?php the_permalink();?>" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 link-blog" data-aos="fade-up">
                       <img src="<?php if ( $avik_image_attributes[0] ) :
                         echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>">
                    <div class="name-title one">
                       <h4><?php the_title();?></h4>
                       <h5><?php the_excerpt();?></h5>
                       </div>
                   </a>
                  <?php endwhile;
                    wp_reset_query();
                    wp_reset_postdata(); ?>
              <div class="details">
               <div class="avik-social-icons-team">
                 <ul class="social-team">
                    <!-- Facebook -->
                    <?php if ( false == esc_html( get_theme_mod( 'avik_enable_facebook_icon_team_3', true) )) :?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_facebook_icon_team_3'));?>">
		                      <i class="fab fa-facebook"></i></a></li>
			                <?php endif; ?>
			                <!-- Twitter -->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_twitter_icon_team_3', true) )):?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_twitter_icon_team_3' ));?>">
		                      <i class="fab fa-twitter"></i></a></li>
                      <?php endif; ?>
                      <!-- Instagram -->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_instagram_icon_team_3', true) )):?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_instagram_icon_team_3' )); ?>">
		                      <i class="fab fa-instagram"></i></a></li>
		                  <?php endif; ?>
			                <!-- Linkedin -->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_linkedin_icon_team_3', true) )):?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_linkedin_icon_team_3' )); ?>">
		                       <i class="fab fa-linkedin"></i></a></li>
		                  <?php endif; ?>
			                <!-- Google Plus-->
		                  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_google_plus_icon_team_3', true) )):?>
		                  <li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_google_plus_icon_team_3' )); ?>">
		                      <i class="fab fa-google-plus-g"></i></a></li>
		                  <?php endif; ?>
                 </ul>
               </div>
            </div>
         </div>
           <div class="clear"></div>
         </div>
      </div>
  </div>
  <?php endif; ?>
  <!-- Carousel Brands -->
  <?php if ( false == esc_html( get_theme_mod( 'avik_enable_partner_whoweare', false) )) :?>
  <?php get_template_part( 'inc/carousel-brands' ); ?>
  <?php endif; ?>
  </div>
