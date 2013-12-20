<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Page Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>

    <div id="content">

    	<?php woo_main_before(); ?>

		<section id="main_slider">

       <?php 
		// the query
		$args = array(
			'post_type' => 'posters',
		);
		$posters_query = new WP_Query( $args ); ?>
		
		<?php if ( $posters_query->have_posts() ) : ?>
		
		  <!-- pagination here -->
		  
		  <!-- the loop -->
		  <?php while ( $posters_query->have_posts() ) : $posters_query->the_post(); ?>
		  <?php if ( has_post_thumbnail()):  ?>
		  <?php the_post_thumbnail("medium") ?>
		  <?php endif; //end has_post_thumbnail** ?>
		  <?php endwhile; ?>
		  <!-- end of the loop -->
		
		  <!-- pagination here -->
		
		  <?php wp_reset_postdata(); ?>
		<?php endif; ?>
			
        <?php  // End IF Statement ?>

		</section><!-- /#main -->

		<?php woo_main_after(); ?>
		
		<?php get_footer(); ?>

    </div><!-- /#content -->