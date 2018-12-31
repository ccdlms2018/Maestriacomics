<?php
/**
* carousel-brands.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/
?>
<div class="container brands">
  <div class="title-brands text-center">
    <h3><?php echo esc_html( get_theme_mod( 'avik_title_partner_whoweare')); ?></h3>
    <h4><?php echo esc_html( get_theme_mod( 'avik_subtitle_partner_whoweare')); ?></h4>
  </div>
  <div class="avik-brands slider">
    <?php
    $brands_cat = esc_url( get_theme_mod('avik_brands_category'));
    $brands_count =8;
    $new_query = new WP_Query( array( 'cat' => $brands_cat  , 'showposts' => $brands_count ));
    while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
    <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_brand');?>
    <div class="slide">
      <a href="<?php the_permalink();?>">
        <img src="<?php if ( $avik_image_attributes[0] ) :
          echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>">
        </a>
      </div>
    <?php endwhile;
    wp_reset_query(); ?>
  </div>
</div>
