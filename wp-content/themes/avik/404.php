<?php
/**
* 404.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/

if(is_404()) { get_header('post'); } else { get_header(); }

$args = array(
  'cat' => esc_html(get_theme_mod('avik_category_page_404',9999999999999999 )),
  'posts_per_page' =>1,
);
$loop = new WP_Query( $args );
if( $loop->have_posts() ) :
  while( $loop->have_posts() ) : $loop->the_post();
  ?>
  <div class="image-404">
    <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
    <img src="<?php if ( $avik_image_attributes[0] ) :
      echo esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/img/page-404.png'; endif; ?>"/>
    </div>
    <main class="container mt-5 main-content">
      <div class="row">
        <div class="col-sm-8 ml-sm-auto mr-sm-auto">
          <article class="mb-5">
            <h1 class="text-center display-4 bold-number-404"><?php the_title(); ?></h1>
            <h2 class="display-6 mb-4 text-center bold-text-404"> <?php the_content(); ?></h2>
            <div class="button-404 text-center">
              <button type="button" class="btn btn-avik page-404">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go Back To Home', 'avik' ); ?></a>
              </button>
            </div>
          </article>
        </div>
      </div>
    </main>
    <?php
  endwhile;
else:
  ?>
  <main class="container mt-5 main-content">
    <div class="row">
      <div class="col-sm-8 ml-sm-auto mr-sm-auto">
        <article class="mb-5">
          <h1 class="text-center display-4 bold-number-404"><?php esc_html_e('Error 404','avik');?></h1>
          <h2 class="display-6 mb-4 text-center bold-text-404"><?php esc_html_e('Sorry, the page you requested was not found.','avik');?></h2>
          <div class="button-404 text-center">
            <button type="button" class="btn btn-avik page-404">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go Back To Home', 'avik' ); ?></a>
            </button>
          </div>
        </article>
      </div>
    </div>
  </main>
  <?php
endif;
wp_reset_query();

get_footer(); ?>
