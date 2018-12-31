<?php
/**
* single.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/

if(is_single()) { get_header('post'); } else { get_header(); }
avik_the_breadcrumb(); ?>
<!-- Carousel featured image -->
<?php if ( false == esc_html( get_theme_mod( 'avik_enable_carousel', false) ) ):?>
  <?php get_template_part( 'inc/carousel' ); ?>
<?php endif; ?>
<!-- // -->
<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-9">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
              <?php the_post_thumbnail('avik_single', array( 'class' => 'img-fluid mb-4', 'alt' => get_the_title() ))?>
              <div class="content-post">
                <div class="icon-post-title"></div>
                <div class="info-post">
                  <h1><?php the_title(); ?></h1>
                  <ul class="info-ul-blog">
                    <li><i class="fas fa-user"></i><?php the_author(); ?></li>
                    <li><i class="far fa-calendar"></i><?php echo get_the_date (); ?></li>
                    <li><i class="far fa-folder-open"></i><?php the_category(', ');?></li>
                    <li><i class="fas fa-tag"></i><?php the_tags(); ?></li>
                    <li><i class="fas fa-comment"></i><?php comments_number(); ?></li>
                  </ul>
                </div>
                <?php the_content(); ?>
                <?php wp_link_pages('pagelink=Page %'); ?>
                <hr>
                <div class="comments">
                  <?php comments_template() ; ?>
                </div>
              </div>
            </article>
          <?php endwhile; else: ?>
            <p><?php esc_html_e('Sorry, no post matched your criteria.', 'avik'); ?></p>
          <?php endif; ?>
        </div>
        <?php get_sidebar();?>
      </div>
    </div>
  </main><!-- #main -->

  <?php
  get_footer();
