<?php
/**
* avik-support.php
* @link https://www.denisfranchi.com
*
* @package Avik
*
*  @version   1.3.2
*/
?>

<div class="avik-image-background-support container" style="background: url('<?php echo esc_url(get_template_directory_uri()).'/img/static.jpg';  ?>'); background-repeat: no-repeat;
background-position: center center;background-size: cover;" >

<div class="text-support">
	<h1><?php esc_html_e( 'Welcome to Avik!', 'avik' ); ?></h1>
	<h5><?php esc_html_e( 'You can customize with one click', 'avik' ); ?></h5>
</div>
</div>
<!-- Tab links -->
<div class="avik-tab-support">
	<div class="tab">
		<button class="tablinks" onclick="avikopenGuide(event, 'WELCOME')"id="defaultOpen"><?php esc_html_e( 'WELCOME', 'avik' ); ?></button>
		<button class="tablinks" onclick="avikopenGuide(event, 'GUIDES')"><?php esc_html_e( 'GUIDES', 'avik' ); ?></button>
		<button class="tablinks" onclick="avikopenGuide(event, 'PRO')"><?php esc_html_e( 'PRO VERSION', 'avik' ); ?></button>
		<button class="tablinks" onclick="avikopenGuide(event, 'SUPPORT')"><?php esc_html_e( 'SUPPORT PRO', 'avik' ); ?></button>
	</div>
	<!-- Tab content -->

	<!-- Welcome -->
	<div id="WELCOME" class="tabcontent">
		<h3 class="avik-welkome-support-title"><?php esc_html_e( 'Welcome!', 'avik' ); ?></h3>
		<p class="avik-welkome-support"><?php esc_html_e( 'Thank you for choosing Avik.','avik');?><br>
			<?php esc_html_e('The theme is ready to be used. You can customize everything you want in a few simple clicks directly from the front end.', 'avik' ); ?>
			<br>
			<?php esc_html_e('For a complete experience, go to the','avik');?>
		<button class="avik-button-admin-support"><a target="_blank" class="avik-button" href="<?php echo esc_url('https://www.denisfranchi.com/avik-pro-10-0-0/' ); ?>"><?php esc_html_e('Pro Version', 'avik'); ?></a></button></p>
			<div class="avik-update"><p><b><?php esc_html_e('Avik Version: 1.3.2','avik');?></b> <button class="avik-button-admin-support"><a target="_blank" class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/avik-1-2-7/' ); ?>"><?php esc_html_e('Update details', 'avik'); ?></a></button></div></p>
	</div>
	<!-- Guides -->
	<div id="GUIDES" class="tabcontent">

		<h3 class="avik-welkome-support-title"><?php esc_html_e( 'Guides', 'avik' ); ?></h3>
		<p class="avik-welkome-support">
			<?php esc_html_e( 'Here you will find some very useful guides for using Avik.', 'avik' ); ?>
				<button class="avik-button-admin-support"><a target="_blank" class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?forums/guides.11/' ); ?>"><?php esc_html_e('Documentation', 'avik'); ?></a></button>
		</p>
		<div class="avik-guide-support-admin">
			<div class="avik-guide">
				<h2><?php esc_html_e( 'Guide to add id sections in the menu', 'avik' ); ?></h2>
				<p><?php esc_html_e('Insert id section for ancor the scroll', 'avik'); ?></p>
				<button class="avik-button-guide-admin-support"><a target="_blank" class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?threads/guide-to-add-id-sections-in-the-menu.6/' ); ?>"><?php esc_html_e( 'Open Guide', 'avik' ); ?></a></button>
			</div>
			<div class="avik-guide">
				<h2><?php esc_html_e( 'Guide for the section Who we are', 'avik' ); ?></h2>
				<p><?php esc_html_e( 'Create a dedicated page', 'avik' ); ?></p>
				<button class="avik-button-guide-admin-support"><a target="_blank" class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?threads/guide-for-the-section-who-we-are.7/' ); ?>"><?php esc_html_e( 'Open Guide', 'avik' ); ?></a></button>
			</div>
			<div class="avik-guide">
				<h2><?php esc_html_e('Guide for the section Services', 'avik'); ?></h2>
				<p><?php esc_html_e('Create a dedicated page', 'avik'); ?></p>
				<button class="avik-button-guide-admin-support"><a target="_blank" class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?threads/guide-for-the-section-services.8/' ); ?>"><?php esc_html_e( 'Open Guide', 'avik' ); ?></a></button>
			</div>
			<div class="avik-guide">
				<h2><?php esc_html_e('Guide for the section Portfolio', 'avik'); ?></h2>
				<p><?php esc_html_e('Create a dedicated page', 'avik'); ?></p>
				<button class="avik-button-guide-admin-support"><a target="_blank" class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/community/index.php?threads/guide-for-the-section-portfolio.9/' ); ?>"><?php esc_html_e( 'Open Guide', 'avik' ); ?></a></button>
			</div>
		</div>
		<div class="avik-clear-guide-support-admin"></div>
	</div>
	<!-- PRO VERSION -->
	<div id="PRO" class="tabcontent">
		<h3 class="avik-welkome-support-title"><?php esc_html_e( 'PRO VERSION', 'avik' ); ?></h3>
		<p class="avik-welkome-support">
			<?php esc_html_e( 'Specifications Avik theme','avik');?>
		</p>
		<div class="avik-guide-support-admin-comparison">
			<div class="comparison">
				<table>
					<thead>
						<tr>
							<th class="tl tl2"></th>
							<th class="product" style="background:#000;border-top-left-radius: 5px; border-left:0px;"><?php esc_html_e('FREE','avik');?></th>
							<th class="product" style="background:#000;"><?php esc_html_e('PRO','avik');?></th>
							</tr>
							<tr>
								<th></th>
								<th class="price-info">
									<div class="price-now"><span><?php esc_html_e('AVIK - THEME','avik');?></span><br>
										<p></p>
									</div>
								</th>
								<th class="price-info">
									<div class="price-now"><span><?php esc_html_e('AVIK - THEME','avik');?></span>
									</div>
								</th>
							</tr>
						</thead>
						<tbody>
							<!-- Logo -->
							<tr>
								<td></td>
									<td colspan="3"><?php esc_html_e('Logo Upload','avik');?></td>
							</tr>
							<tr class="compare-row">
								<td><?php esc_html_e('Logo Upload','avik');?></td>
								<td><span><i class="fa fa-check"></i></span>
								</td>
								<td><span><i class="fa fa-check"></i></span></td>
							</td>
						</tr>
						<!-- Font Awesome -->
						<tr>
							<td></td>
							<td colspan="3"><?php esc_html_e('Font Awesome Icons v5','avik');?></td>
						</tr>
						<tr>
							<td><?php esc_html_e('Font Awesome Icons v5','avik');?></td>
							<td><span><i class="fa fa-check"></i></span>
							</td>
							<td><span><i class="fa fa-check"></i></span></td>
						</td>
					</tr>
					<!-- Ready Retina -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Retina Ready','avik');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Retina Ready','avik');?></td>
						<td><span><i class="fa fa-check"></i></span>
						</td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Responsive -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Responsive Design','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Responsive Design','avik');?></td>
						<td><span><i class="fa fa-check"></i></span>
						</td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Color Change -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Color Change','avik');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Color Change','avik');?></td>
						<td><span><i class="fa fa-check"></i></span>
						</td>
						<td><span><?php esc_html_e('Live','avik');?></span></td>
					</tr>
					<!-- Color Title -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Color Titles and Paragraphs','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Color Titles and Paragraphs','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span>
						</td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Font Family -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Font Family','avik');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Font Family','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span>
						</td>
						<td><span><?php esc_html_e('15','avik');?></span></td>
					</tr>
					<!-- Layou setting -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Layout Settings','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Layout Settings','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span>
						</td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Header Spider -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Header Spider Effect','avik');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Header Spider Effect','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- More Slides -->
					<tr>
						<td></td>
						<td colspan="4"><?php esc_html_e('More Slider','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('More Slides','avik');?></td>
						<td><span><?php esc_html_e('1','avik');?></span></td>
						<td><span><?php esc_html_e('3','avik');?></span></td>
					</tr>
					<!-- More Widgets -->
					<tr>
						<td></td>
						<td colspan="4"><?php esc_html_e('More Areas Widgets','avik');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('More Areas Widgets','avik');?></td>
						<td><span><?php esc_html_e('3','avik');?></span></td>
						<td><span><?php esc_html_e('12','avik');?></span></td>
					</tr>
					<!-- Menu types -->
					<tr>
						<td></td>
						<td colspan="4"><?php esc_html_e('Menu Types','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Menu Types','avik');?></td>
						<td><span><?php esc_html_e('1','avik');?></span></td>
						<td><span><?php esc_html_e('3','avik');?></span></td>
					</tr>
					<!-- Page Template -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Page Templates','avik');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Page Templates','avik');?></td>
						<td><span><?php esc_html_e('2','avik');?></span></td>
						<td><span><?php esc_html_e('14','avik');?></span></td>
					</tr>
						<!-- Post Template -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Post Templates','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Post Templates','avik');?></td>
						<td><span><?php esc_html_e('2','avik');?></span></td>
						<td><span><?php esc_html_e('4','avik');?></span></td>
					</tr>
					<!-- Blog Layout -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Blog Layouts','avik');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Blog Layouts','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><i class="fa fa-check"></i></td>
					</tr>
					<!-- Meta Box -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Meta Box Customized','avik');?></td>
					</tr>
					<tr >
						<td><?php esc_html_e('Meta Box Customized','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><i class="fa fa-check"></i></td>
					</tr>
					<!-- Pop-ip Light Box -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Pop-up Light Box','avik');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Pop-up Light Box','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><i class="fa fa-check"></i></td>
					</tr>
					<!-- Gutenberg -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Gutenberg Compatible','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Gutenberg Compatible','avik');?></td>
						<td><span><i class="fa fa-check"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Portfolio -->
					<tr>
						<td></td>
						<td colspan="4"><?php esc_html_e('Portfolio','avik');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Portfolio','avik');?></td>
						<td><span><?php esc_html_e('1','avik');?></span></td>
						<td><span><?php esc_html_e('2','avik');?></span></td>
					</tr>
					<!-- Portfolio Extended -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Portfolio Layout','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Portfolio Layout','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Effect Hover Portfolio -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Effect Hover Image Portfolio','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Effect Hover Image Portfolio','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><?php esc_html_e('19','avik');?></span></td>
					</tr>
					<!-- About US -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('About US','avik');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('About US','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Woocommerce compatible -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Woocommerce Complatible','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Woocommerce Complatible','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Woocommerce Template -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Woocommerce Templates','avik');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Woocommerce Templates','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Woocommerce Slider -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Woocommerce Slider','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Woocommerce Slider','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Editor -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Editor Blocks','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Editor Blocks','avik');?></td>
						<td><span><i class="fas fa-check"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Dropdown Menu -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Dropdown Menu','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Dropdown Menu','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Child-Theme Included -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Child-Theme Included','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Child-Theme Included','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Transition Ready -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Transition Ready','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Transition Ready','avik');?></td>
						<td><span><i class="fa fa-check"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Language -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Language','avik');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Language','avik');?></td>
						<td><span><?php esc_html_e('English and Italian','avik');?></span></td>
						<td><span><?php esc_html_e('English and Italian','avik');?></span></td>
					</tr>
					<!-- Full Support -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Full Support','avik');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Full Support','avik');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td><div class="avik-no-button-free"></div></td>
						<td><a href="https://www.denisfranchi.com/avik-pro-10-0-0/" class="price-buy" target="_blank"><?php esc_html_e('GO PRO','avik');?><span class="hide-mobile"></span></a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="avik-clear-guide-support-admin"></div>
</div>
<!-- Support -->
<div id="SUPPORT" class="tabcontent">
	<h3 class="avik-welkome-support-title"><?php esc_html_e('Support for Pro Version', 'avik'); ?></h3>
	<p class="avik-welkome-support"><?php esc_html_e('We offer full support for our theme, taking care of our customers and making sure we solve all the problem. Every time an update will be released you will be notified via a back-end notification, where you will be able to see the changes made and any bugs fixed.', 'avik'); ?>
	</p>
	<h3 class="avik-welkome-support-title"><?php esc_html_e('Forum Support', 'avik'); ?></h3>
	<p class="avik-welkome-support"><?php esc_html_e('We offer outstanding support through our forum.','avik');?><br>
		<?php esc_html_e('To get support first have the','avik');?>
		<a class="avik-link-pro-version" href="<?php echo esc_url( 'https://www.denisfranchi.com/avik-pro/' ); ?>" target="_blank">
			<?php esc_html_e( 'Pro Version', 'avik' ); ?></a>
			<?php esc_html_e(', and you need to register (create an account) and open a ticket in the Avik Section.', 'avik'); ?></p>
		<button class="avik-button-admin-support"><a class="avik-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/comunity/index.php' ); ?>" target="_blank"><?php esc_html_e('Open Forum', 'avik'); ?></a></button>
	</div>
</div>
<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
