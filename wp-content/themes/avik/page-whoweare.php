<?php
/*
Template Name: Wo we are
Template Post Type: page
*/
/**
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/

if(is_page()) { get_header('post'); } else { get_header(); }?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page-whoweare' );

		endwhile; // End of the loop.
		?>
	</main>
	<?php
	get_footer();
