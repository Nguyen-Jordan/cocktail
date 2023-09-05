<?php
/**
 * Displays the header content
 *
 * @package Theme Freesia
 * @subpackage Cocktail
 * @since Cocktail 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
$cocktail_settings = cocktail_get_theme_options(); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif;
wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php 
	if ( function_exists( 'wp_body_open' ) ) {

		wp_body_open();

	} ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#site-content-contain"><?php esc_html_e('Skip to content','cocktail'); ?></a>
	<!-- Masthead ============================================= -->
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrap">
			<!-- Top Header============================================= -->
			<div class="top-header">
				<?php if( is_active_sidebar( 'cocktail_header_info' )) { ?>
					<div class="top-bar">
						<div class="top-bar-wrap">
							<?php dynamic_sidebar( 'cocktail_header_info' ); ?>
						</div> <!-- end .top-bar-wrap -->
					</div> <!-- end .top-bar -->
				<?php } ?>
				<!-- Main Header============================================= -->
				<div class="main-header clearfix">
					<div class="header-wrap-inner">
						<div class="header-left">
							<?php if($cocktail_settings['cocktail_top_social_icons'] == 0 && has_nav_menu( 'social-link' )): ?>
							<div class="header-social-block">
								<?php do_action('cocktail_social_links'); ?>
							</div>
								<?php endif; ?>
						</div> <!-- end .header-left -->
					

						<?php do_action('cocktail_site_branding'); ?>

						<div class="header-right">
						<?php $cocktail_side_menu = $cocktail_settings['cocktail_side_menu'];
							$search_form = $cocktail_settings['cocktail_search_custom_header'];
							if( (1 != $cocktail_side_menu) || (1 != $search_form) ){

									if(1 != $cocktail_side_menu){
										if (has_nav_menu('side-nav-menu') || (has_nav_menu( 'social-link' ) && $cocktail_settings['cocktail_side_menu_social_icons'] == 0 ) || is_active_sidebar( 'cocktail_side_menu' ) ): ?>
											<button class="show-menu-toggle" type="button">
												<span class="sn-text"><?php esc_html_e('Menu Button','cocktail'); ?></span>
												<span class="bars"></span>
											</button>
								  		<?php endif;
								  	}

								  	if(1 != $cocktail_side_menu){ ?>
										<aside class="side-menu-wrap" role="complementary" aria-label="<?php esc_attr_e('Side Sidebar','cocktail');?>">
										<div class="side-menu">
									  		<button class="hide-menu-toggle" type="button">			
												<span class="bars"></span>
										  	</button>

											<?php

											if (has_nav_menu('side-nav-menu') || (has_nav_menu( 'social-link' ) && $cocktail_settings['cocktail_side_menu_social_icons'] == 0 ) || is_active_sidebar( 'cocktail_side_menu' ) ):
												
												if (has_nav_menu('side-nav-menu')) { 
													$args = array(
														'theme_location' => 'side-nav-menu',
														'container'      => '',
														'items_wrap'     => '<ul class="side-menu-list">%3$s</ul>',
														); ?>
												<nav class="side-nav-wrap" role="navigation" aria-label="<?php esc_attr_e('Sidebar Menu','cocktail');?>">
													<?php wp_nav_menu($args); ?>
												</nav><!-- end .side-nav-wrap -->
												<?php }
												if($cocktail_settings['cocktail_side_menu_social_icons'] == 0):
													do_action('cocktail_social_links');
												endif;

												if( is_active_sidebar( 'cocktail_side_menu' )) {
													echo '<div class="side-widget-tray">';
														dynamic_sidebar( 'cocktail_side_menu' );
													echo '</div> <!-- end .side-widget-tray -->';
												} 
											endif; ?>
										</div><!-- end .side-menu -->
									</aside><!-- end .side-menu-wrap -->
								<?php }

								  	if (1 != $search_form) { ?>
									<button id="search-toggle" class="header-search" type="button"></button>
										<div id="search-box" class="clearfix">
											<div class="search-x"></div>
												<?php get_search_form();?>
										</div>  <!-- end #search-box -->
									<?php }
							} ?>
						</div> <!-- end .header-right -->
					</div> <!-- end .wrap -->

					<?php
					if($cocktail_settings['cocktail_disable_main_menu']==0){ ?>
						<!-- Main Nav ============================================= -->
						<div id="sticky-header" class="clearfix">
							<nav id="site-navigation" class="main-navigation clearfix" role="navigation" aria-label="<?php esc_attr_e('Main Menu','cocktail');?>">

							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<span class="line-bar"></span>
						  	</button> <!-- end .menu-toggle -->
							<?php if (has_nav_menu('primary')) {
								$args = array(
								'theme_location' => 'primary',
								'container'      => '',
								'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
								); ?>

								<?php wp_nav_menu($args);//extract the content from apperance-> nav menu
								} else {// extract the content from page menu only
								wp_page_menu(array('menu_class' => 'menu', 'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>'));
								} ?>
							</nav> <!-- end #site-navigation -->
						</div> <!-- end #sticky-header -->
					<?php } ?>
				</div> <!-- end .main-header -->
			</div> <!-- end .top-header -->

			<?php
			
			$enable_header_image = $cocktail_settings['cocktail_enable_header_image'];
			if ($enable_header_image=='frontpage'|| $enable_header_image=='enitresite'){
				if(is_front_page() && ($enable_header_image=='frontpage') ) {
					do_action('cocktail_display_header_image_widget_slider');
				}
				if($enable_header_image=='enitresite'){
					do_action('cocktail_display_header_image_widget_slider');
				}
			}
			 ?>
		</div> <!-- end .header-wrap -->
	</header> <!-- end #masthead -->
	<!-- Main Page Start ============================================= -->
	<div id="site-content-contain" class="site-content-contain">
		<div id="content" class="site-content">
			<?php 
			if( is_front_page() ) {

				do_action('cocktail_display_frontpage_features');

			} ?>
		