<?php
/**
* footer.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/
?>
</div> <!--Content -->
<footer>
  <div class="jumbotron">
    <!-- Social Icons Contact -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 avik-social-icons-footer" data-aos="zoom-in">
      <?php get_template_part( 'inc/social' ); ?>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
    <hr class="my-4 avik-footer">
    <?php if ( false == esc_html( get_theme_mod( 'avik_enable_copyright_footer', false) )) :?>
      <p>
        &copy; <?php echo esc_html(date("Y")); echo " "; echo bloginfo('name'); ?>
      </p>
    <?php endif; ?>
    <p class="title-power">
      <?php
      $avik_theme_author = esc_url( 'https://www.denisfranchi.com/' );
      printf( esc_html__( 'Avik by %1$s', 'avik' ), '<a href="'.$avik_theme_author.'" rel="designer">Franchi Design</a>' );
      ?>
    </p>
  </div>
</footer>
</div><!-- #page -->
<?php if ( false == esc_html( get_theme_mod( 'avik_enable_to_top', false) )) :?>
  <div id="avik-scrol-to-top"><p><?php esc_html_e( 'BACK TO TOP', 'avik')?></p></div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
