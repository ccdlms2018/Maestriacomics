<?php
/**
 * content-search.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.3.2
 */
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php if ( 'post' === get_post_type() ) : ?>
	  <?php endif; ?>
	</header><!-- .entry-header -->
	<div class="avik-img-search">
		<?php the_post_thumbnail('avik_single', array( 'class' => 'img-fluid mb-4', 'alt' => get_the_title() )); ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
      </div>
		   <div class="info-post">
		    <ul class="info-ul-blog">
		     <li><i class="fas fa-user"></i><?php the_author(); ?></li>
	         <li><i class="far fa-calendar"></i><?php echo get_the_date (); ?></li>
	         <li><i class="far fa-folder-open"></i><?php the_category(', ');?></li>
	         <li><i class="fas fa-tag"></i><?php the_tags(); ?></li>
	         <li><i class="fas fa-comment"></i><?php comments_number(); ?></li>
            </ul>
       </div>
	   <div class="entry-summary">
		  <?php the_excerpt(); ?>
		 </div><!-- .entry-summary -->
		 <div class="button-archive text-right">
		  <a href="<?php the_permalink();?>" class="btn btn-avik archive" role="button" aria-pressed="true"><?php esc_html_e('Read more...','avik'); ?></a>
	   </div>
	<footer class="entry-footer text-right">
		<?php avik_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
