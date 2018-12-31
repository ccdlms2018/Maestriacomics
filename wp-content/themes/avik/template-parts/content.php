<?php
/**
 * content.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.3.2
 */
 ?>
<div class="avik-article">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	</header><!-- .entry-header -->
	<?php the_post_thumbnail('avik_single', array( 'class' => 'img-fluid mb-4', 'alt' => get_the_title() )); ?>
	 <div class="info-post">
	   <h1><?php the_title(); ?></h1>
	    <ul class="info-ul-blog">
	     <li><i class="fas fa-user"></i><?php the_author(); ?></li>
	     <li><i class="far fa-calendar"></i> <?php echo get_the_date (); ?></li>
	     <li><i class="far fa-folder-open"></i><?php the_category(', ');?></li>
	     <li><i class="fas fa-tag"></i><?php the_tags(); ?></li>
	     <li><i class="fas fa-comment"></i><?php comments_number(); ?></li>
        </ul>
     </div>
	 <div class="entry-content">
		<?php
		 the_excerpt( sprintf(
		   wp_kses(
			 /* translators: %s: Name of current post. Only visible to screen readers */
			 __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'avik' ),
			  array(
				 'span' => array(
				  'class' => array(), ), ) ),
			  get_the_title() ) );
		      wp_link_pages( array(
			  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'avik' ),
			  'after'  => '</div>', ) );
		?>
	    <div class="button-archive text-right">
		<a href="<?php the_permalink();?>" class="btn btn-avik archive" role="button" aria-pressed="true"><?php esc_html_e('Read more...','avik'); ?></a>
	     </div>
	 </div><!-- .entry-content -->
	<footer class="entry-footer text-right">
		<?php avik_entry_footer(); ?>
	</footer><!-- .entry-footer -->
  </article>
  <hr>
</div>
<!-- #post-<?php the_ID(); ?> -->
