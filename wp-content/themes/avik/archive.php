<?php
/**
* archive.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/

if(is_archive()) { get_header('post'); } else { get_header(); }
avik_the_breadcrumb_archive(); ?>
<!-- Carousel featured image -->
<?php if ( false == esc_html( get_theme_mod( 'avik_enable_carousel', false) )) :?>
	<?php get_template_part( 'inc/carousel' ); ?>
<?php endif; ?>

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
							get_template_part( 'template-parts/content', get_post_type() );
						endwhile;?>
						<div class="avik-pagination-nav text-center">
							<?php global $wp_query; $big = 999999999;
							// need an unlikely integer
							echo esc_url(paginate_links( array(
								'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format'             => '?paged=%#%',
								'total'              => $wp_query->max_num_pages,
								'current'            => max( 1, get_query_var('paged') ),
								'show_all'           => false,
								'end_size'           => 1,
								'mid_size'           => 2,
								'prev_next'          => true,
								'prev_text'          => __('First','avik'),
								'next_text'          => __('Last','avik'),
								'type'               => 'plain',
								'add_args'           => false,
								'add_fragment'       => '',
								'before_page_number' => '',
								'after_page_number'  => '') ));
								?>
							</div>
						<?php else :
							get_template_part( 'template-parts/content', 'none' );
						endif; ?>
					</div>
					<?php get_sidebar();?>
				</div>
			</div>
		</main><!-- #main -->
		<?php
		get_footer();
