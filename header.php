<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options, $woocommerce;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'woothemes' ), max( $paged, $page ) );

	?></title>
<?php woo_meta(); ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />
<?php
wp_head();
woo_head();
?>
</head>
<body <?php body_class('body screen'); ?>>
<?php woo_top(); ?>

<div id="wrapper">
	<div id="inner-wrapper">

    <?php woo_header_before(); ?>

	<header id="header">
		<?php woo_header_inside(); ?>

		<span class="nav-toggle"><a href="#navigation"><span><?php _e( 'Navigation', 'woothemes' ); ?></span></a></span>

	    <div class="site-header">

			<?php
			 	$settings = array( 'header_avatar_enable' => 'false', 'header_avatar_custom' => '' );
				$settings = woo_get_dynamic_values( $settings );

				if ( isset( $settings['header_avatar_enable'] ) && 'true' == $settings['header_avatar_enable'] ) {
					if ( isset( $settings['header_avatar_custom'] ) && '' != $settings['header_avatar_custom'] ) {
						$avatar_email = esc_attr( $settings['header_avatar_custom'] );
						echo get_avatar( $avatar_email , '70' );
					}
				}
			?>
			    		    	
	    	<div class="title-group">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		</div>
		
		<?php
			$settings = array( 'header_about_enable' => 'false', 'header_about_text' => '' );
			$settings = woo_get_dynamic_values( $settings );
		?>
		
		<?php if ( isset( $settings['header_about_enable'] ) && 'true' == $settings['header_about_enable'] ): ?>
			<div id="about">
				<?php 
					if ( isset( $settings['header_about_text'] ) && '' != $settings['header_about_text'] ) {
						echo wpautop( $settings['header_about_text'] );
					}
				?>
			</div>
		<?php endif; ?>

        <?php woo_nav_before(); ?>

		<nav id="navigation" role="navigation">

			<?php
				if ( isset( $woo_options['woocommerce_header_search_form'] ) && 'true' == $woo_options['woocommerce_header_search_form'] ) {
					the_widget('WC_Widget_Product_Search', 'title=' );
				}
			?>

			<section class="menus">

			<a href="<?php echo home_url(); ?>" class="nav-home"><span><?php _e( 'Home', 'woothemes' ); ?></span></a>

			<?php if ( is_woocommerce_activated() && isset( $woo_options['woocommerce_header_cart_link'] ) && 'true' == $woo_options['woocommerce_header_cart_link'] ) { ?>
	        	<h3><?php _e( 'Shopping Cart', 'woothemes' ); ?></h3>
	        	<ul class="nav cart">
	        		<li <?php if ( is_cart() ) { echo 'class="current-menu-item"'; } ?>>
	        			<?php woo_wc_cart_link(); ?>
	        		</li>
	       		</ul>
	        <?php }
			if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
				echo '<h3>' . woo_get_menu_name('primary-menu') . '</h3>';
				wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav', 'theme_location' => 'primary-menu' ) );
			} else {
			?>
	        <ul id="main-nav" class="nav">
				<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
				<li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
				<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
			</ul><!-- /#nav -->
	        <?php } ?>
	        <ul class="nav rss">
	            <?php
	            	$email = '';
	            	$rss = get_bloginfo_rss( 'rss2_url' );

	            	if ( isset( $woo_options['woo_subscribe_email'] ) && ( $woo_options['woo_subscribe_email'] != '' ) ) {
	            		$email = $woo_options['woo_subscribe_email'];
	            	}

	            	if ( isset( $woo_options['woo_feed_url'] ) && ( $woo_options['woo_feed_url'] != '' ) ) {
	            		$rss = esc_url( $woo_options['woo_feed_url'] );
	            	}

	            	if ( $email != '' ) {
	            ?>
	            <li class="sub-email"><a href="<?php echo esc_url( $email ); ?>" target="_blank"><?php _e( 'Email', 'woothemes' ); ?></a></li>
	            <?php } ?>
	            <li class="sub-rss"><a href="<?php echo esc_url( $rss ); ?>"><?php _e( 'RSS', 'woothemes' ); ?></a></li>
	        </ul>

	    	</section><!--/.menus-->

	        <a href="#top" class="nav-close"><span><?php _e('Return to Content', 'woothemes' ); ?></span></a>

		</nav><!-- /#navigation -->
		
		<div id="sidebar-footer">
		
			<?php get_sidebar(); ?>

			<?php woo_nav_after(); ?>
			
			<footer id="footer">
			
				<div id="copyright">
				<?php if( isset( $woo_options['woo_footer'] ) && $woo_options['woo_footer'] == 'true' ) {
						echo stripslashes( $woo_options['woo_footer_text'] );
				} else { ?>
					<p>
						<strong><?php bloginfo(); ?></strong><br />
						&copy; <?php echo date( 'Y' ); ?>. <?php _e( 'By', 'woothemes' ); ?> WooThemes.<a href="<?php echo esc_url( 'http://www.woothemes.com/' ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/woothemes.png' ); ?>" width="32" height="19" alt="WooThemes" /></a>
					</p>
				<?php } ?>
				</div>
			
			</footer><!-- /#footer  -->
		
		</div>

	</header><!-- /#header -->

	<?php woo_content_before(); ?>