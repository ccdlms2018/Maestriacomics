<?php
/*
Template Name: Services
Template Post Type: post,page
*/
/**
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*
*/

if(is_single()) { get_header('post'); } else { get_header(); }?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="enter-services">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="text-image-services">
					<div id="typed-strings">
						<p><?php the_title(); ?> <i> <?php the_excerpt();?></i></p>
					</div>
					<span id="typed"></span>
				</div>
				<div class="header-image-services">
					<?php the_post_thumbnail('avik_single', array( 'class' => 'img-fluid mb-4', 'alt' => get_the_title() ))?>
				</div>
				<?php avik_the_breadcrumb(); ?>
				<div class="container">
					<article <?php post_class(); ?>>
						<div class="content-post text-right pt-5">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
							<?php wp_link_pages('pagelink=Page %'); ?>
						</div>
					</article>
				<?php endwhile; else: ?>
					<p><?php esc_html_e('Sorry, no post matched your criteria.', 'avik'); ?></p>
				<?php endif; ?>
				<div class="tab cf is-visible">
				</div>
				<div class="tabs__list cf">
					<?php
					$services_cat = esc_attr( get_theme_mod('avik_services_category'));
					$services_count =4;
					$new_query = new WP_Query( array( 'cat' => $services_cat  , 'showposts' => $services_count ));
					while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
					<?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_services');?>
					<li class="tab__development tabs__list-item tabs__list-item--fourth animated wow fadeInUp tab-fadeup">
						<div class="tab__development-img" data-aos="fade-left" data-aos-duration="2000">
							<img class="img-avic-services-default" src="<?php if ( $avik_image_attributes[0] ) :
								echo  esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>">
							</div>
							<h2 class="tab__development-title one"><?php the_title();?></h2>
							<a href="<?php the_permalink();?>" class="btn btn-avik" role="button" aria-pressed="true" data-aos="zoom-in" data-aos-duration="2000"><?php esc_html_e('Read more...','avik'); ?></a>
						</li>
					<?php endwhile;
					wp_reset_query();?>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<!-- Partenrs -->
		<?php if ( false == esc_html( get_theme_mod( 'avik_enable_partners_services', false) )) :?>
			<div class="partners">
				<div class="title-partenrs text-center">
					<h2><?php echo esc_html( get_theme_mod( 'avik_title_partners_services')); ?></h2>
					<h3><?php echo esc_html( get_theme_mod( 'avik_subtitle_partners_services')); ?></h3>
				</div>
				<div class="container">
					<div class="row gray-effect-partenrs">
						<?php
						$partners_cat = esc_url( get_theme_mod('avik_partners_category'));
						$partners_count =12;
						$new_query = new WP_Query( array( 'cat' => $partners_cat  , 'showposts' => $partners_count ));
						while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
						<div class="col-md-3 col-xs-12 partenrs-services">
							<a href="<?php the_permalink();?>">
								<?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
								<img src="<?php if ( $avik_image_attributes[0] ) :
									echo  esc_url($avik_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/avik-default.jpg'; endif; ?>">
								</a>
							</div>
						<?php endwhile;
						wp_reset_query();?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<!-- Price quotation -->
		<?php if ( false == esc_html( get_theme_mod( 'avik_enable_quotation_services', false) )) :?>
			<div class="content-price">
				<div class="row">
					<div class="col-lg-6 col-md-12 col-xs-12">
						<div class="price-quotation">
							<div class="title-price text-center">
								<div class="separator-price">
									<h2><?php echo esc_html( get_theme_mod( 'avik_title_1_quotation_services')); ?></h2>
									<h3><?php echo esc_html( get_theme_mod( 'avik_subtitle_1_quotation_services')); ?></h3>
								</div>
							</div>
							<div class="subtitle-price text-center">
								<h3><?php echo esc_html( get_theme_mod( 'avik_title_2_quotation_services')); ?></h3>
								<h4><?php echo esc_html( get_theme_mod( 'avik_subtitle_2_quotation_services')); ?></h4>
								<?php if ( false == esc_html( get_theme_mod( 'avik_enable_arrow_quotation_services', false) )) :?>
									<i class="fas fa-arrow-right arrow-price-animation"></i>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<!-- Widget Contact Form -->
					<div class="col-lg-6 col-md-12 col-xs-12 widget-contact">
						<?php dynamic_sidebar('widget_contact_form_services'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
