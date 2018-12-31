<?php
/**
* social.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/
?>

<!-- Facebook -->
<?php if ( false == esc_html( get_theme_mod( 'avik_enable_facebook_social', true) )):?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_facebook_social' ));?>">
		<i class="fab fa-facebook"></i></a></li>
	<?php endif; ?>
	<!-- Twitter -->
	<?php if ( false == esc_html( get_theme_mod( 'avik_enable_twitter_social', true) )):?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_twitter_social' ));?>">
			<i class="fab fa-twitter"></i></a></li>
		<?php endif; ?>
		<!-- Google Plus-->
		<?php if ( false == esc_html( get_theme_mod( 'avik_enable_google_plus_social', true) )) : ?>
			<li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_google_plus_social' )); ?>">
				<i class="fab fa-google-plus-g"></i></a></li>
			<?php endif; ?>
			<!-- Dribbble-->
			<?php if ( false == esc_html( get_theme_mod( 'avik_enable_dribbble_social', true ) )) : ?>
				<li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_dribbble_social' )); ?>">
					<i class="fab fa-dribbble"></i></a></li>
				<?php endif; ?>
				<!-- Tumblr -->
				<?php if ( false == esc_html( get_theme_mod( 'avik_enable_tumblr_social', true ) )) : ?>
					<li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_tumblr_social' ));?>">
						<i class="fab fa-tumblr"></i></a></li>
					<?php endif; ?>
					<!-- Instagram -->
					<?php if ( false == esc_html( get_theme_mod( 'avik_enable_instagram_social', true ) )) : ?>
						<li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_instagram_social' )); ?>">
							<i class="fab fa-instagram"></i></a></li>
						<?php endif; ?>
						<!-- Linkedin -->
						<?php if ( false == esc_html( get_theme_mod( 'avik_enable_avik_linkedin_social', true ) )) : ?>
							<li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_avik_linkedin_social' )); ?>">
								<i class="fab fa-avik_linkedin"></i></a></li>
							<?php endif; ?>
							<!-- Youtube -->
							<?php if ( false == esc_html( get_theme_mod( 'avik_enable_youtube_social', true) )) : ?>
								<li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_youtube_social' )); ?>">
									<i class="fab fa-youtube-square"></i></a></li>
								<?php endif; ?>
								<!-- Pinterest -->
								<?php if ( false == esc_html( get_theme_mod( 'avik_enable_pinterest_social',true ) )) : ?>
									<li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_pinterest_social' )); ?>">
										<i class="fab fa-pinterest-p"></i></a></li>
									<?php endif; ?>
									<!-- Flickr -->
									<?php if ( false == esc_html( get_theme_mod( 'avik_enable_flickr_social', true) )) : ?>
										<li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_flickr_social' )); ?>">
											<i class="fab fa-flickr"></i></a></li>
										<?php endif; ?>
										<!-- Github -->
										<?php if ( false == esc_html( get_theme_mod( 'avik_enable_github_social', true ) )) : ?>
											<li><a href="<?php echo esc_url( get_theme_mod( 'avik_link_github_social' )); ?>">
												<i class="fab fa-github"></i></a></li>
											<?php endif; ?>
