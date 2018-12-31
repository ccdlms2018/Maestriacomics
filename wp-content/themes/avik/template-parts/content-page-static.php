<?php
/**
 * content-page-static.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.3.2
 */
 ?>

  <section class="avik-version-static">
     <div class="avik-social-icons-video">
 		<ul class="avik-social-icons" data-aos="zoom-in">
         <?php get_template_part( 'inc/social' ); ?>
     </ul>
 </div>
 <div class="header-static img-fluid" >
   <?php the_custom_header_markup() ?>
   <?php if ( false == esc_html( get_theme_mod( 'avik_enable_filter_home', false) )) :?>
   <div class="filter-header avik-static-filter">
       <?php endif; ?>
       <div class="text-image-static">
 		    <div id="avikservices-strings">
          <?php
            $avik_static_cat = esc_url( get_theme_mod('avik_category_static'));
            $avik_static_count = 3;
 	         $new_query = new WP_Query( array( 'cat' => $avik_static_cat ,'showposts' => $avik_static_count ));
            while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
               <p><?php the_title(); ?><i> <?php the_excerpt();?></i></p>
               <?php endwhile;
               wp_reset_query(); ?>
 			  </div>
 		      <span id="avikservices" ></span>
       </div>
       <!-- Angle scroll -->
       <div class="down-video avik-animation-bounce">
           <a href="#who-we-are"><i class="fas fa-angle-down"></i></a>
       </div>
   <?php if ( false == esc_html( get_theme_mod( 'avik_enable_filter_home', false) )) :?>
   </div>
   <?php endif; ?>
 </div>
 </section>
