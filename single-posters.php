<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Single Post Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a post ('post' post_type).
 * @link http://codex.wordpress.org/Post_Types#Post
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;

/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */

	$settings = array(
					'thumb_single' => 'false',
					'single_w' => 200,
					'single_h' => 200,
					'thumb_single_align' => 'alignright'
					);

	$settings = woo_get_dynamic_values( $settings );
?>

    <div id="content">

    	<?php woo_main_before(); ?>

		<section id="main">

        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>
			<article <?php post_class(); ?>>

                <section class="entry fix galleria">
                	<?php the_content(); ?>
				</section>
            </article><!-- .post -->
<?php
				} // End WHILE Loop
			}
?>
		</section><!-- #main -->

		<?php woo_main_after(); ?>
		
		<?php get_footer(); ?>
		
    </div><!-- #content -->
    <script type="text/javascript">
window.jQuery || document.write('\x3Cscript src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">\x3C/script>');
</script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/galleria/1.2.9/galleria.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/galleria/1.2.9/themes/classic/galleria.classic.min.js"></script>
<script type="text/javascript">
Galleria.run('.galleria', {
  height: 0.5625,
  
  dataConfig: function(image) {
    return { image: $(image).attr('src'), big: $(image).parent().attr('href') };
  }
});
</script>