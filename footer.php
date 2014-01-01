<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( '' != $woo_options['woo_footer_sidebars'] ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

	if ( ( woo_active_sidebar( 'footer-1' ) ||
		   woo_active_sidebar( 'footer-2' ) ||
		   woo_active_sidebar( 'footer-3' ) ||
		   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {

?>

	<?php woo_footer_before(); ?>

	<section id="footer-widgets" class="col-full col-<?php echo esc_attr( $total ); ?> fix">

		<?php $i = 0; while ( $i < $total ) { $i++; ?>
			<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>

		<div class="block footer-widget-<?php echo $i; ?>">
        	<?php woo_sidebar( 'footer-' . $i ); ?>
		</div>

	        <?php } ?>
		<?php } // End WHILE Loop ?>

	</section><!-- /#footer-widgets  -->
<?php } // End IF Statement ?>
	
	</div><!-- /#inner-wrapper -->
</div><!-- /#wrapper -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
<script>
	
	<?php $pageContent =  show_post("resume"); 
	$pageContent=preg_replace('/\s+/', '', $pageContent);
		?>
	
	var $pageContent = <?php echo "'". $pageContent . ";'"; ?>;
	console.log("hello");
	console.log($pageContent);
	var testUrl = $pageContent.match(/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/);
	console.log(testUrl);
	onlyUrl = testUrl && testUrl[1];
	console.log(onlyUrl);
	var $linkToResume = onlyUrl;
	$linkToResume = $(".resume a").attr("href");
</script>
</body>
</html>