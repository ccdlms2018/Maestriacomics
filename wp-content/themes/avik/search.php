<?php
/**
* search.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/

if(is_search()) { get_header('post'); } else { get_header(); }
avik_the_breadcrumb_search(); ?>
<!-- Carousel featured image -->
<?php get_template_part( 'inc/carousel' ); ?>
<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-sm-9">
          <?php if ( have_posts() ) : ?>
            <header class="page-header">
            </header><!-- .page-header -->
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
              the_post();
              get_template_part( 'template-parts/content', 'search' );
            endwhile;
            the_posts_navigation();
            else :
              get_template_part( 'template-parts/content', 'none' );
            endif; ?>
          </div>
          <?php get_sidebar();?>
        </div>
      </div>
    </main><!-- #main -->
    <?php
    get_footer();
