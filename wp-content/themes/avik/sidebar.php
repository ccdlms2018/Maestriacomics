<?php
/**
* sidebar.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-sm-3">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
