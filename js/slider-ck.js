//jQuery(window).load(function($){
//	jQuery("#main_slider p").contents().unwrap();
//	jQuery("#main_slider a").contents().unwrap();
//	$go = true;
//});
//jQuery("#main_slider img").css("visibility", "hidden");
jQuery("#main_slider img").css("display","none");jQuery(document).ready(function(e){jQuery("#main_slider img").css("display","block");e("#main_slider").smoothDivScroll({autoScrollingMode:"always",autoScrollingDirection:"endlessLoopRight",autoScrollingInterval:50});e("#main_slider").bind("mouseover",function(){e(this).smoothDivScroll("stopAutoScrolling")}).bind("mouseout",function(){e(this).smoothDivScroll("startAutoScrolling")})});