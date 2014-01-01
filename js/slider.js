


//jQuery(window).load(function($){
	
	
//	jQuery("#main_slider p").contents().unwrap();
//	jQuery("#main_slider a").contents().unwrap();
//	$go = true;
//});
//jQuery("#main_slider img").css("visibility", "hidden");
jQuery("#main_slider img").css("display", "none");
jQuery(document).ready(function($){
			//jQuery("#main_slider img").css("visibility", "visible");
			$("#main_slider img").css("display", "block");
			$("#main_slider").smoothDivScroll({
				autoScrollingMode: "always", 
				autoScrollingDirection: "endlessLoopRight",  
				autoScrollingInterval: 50, 
			
			});
			$("#main_slider").bind("mouseover", function() {
			$(this).smoothDivScroll("stopAutoScrolling");
			}).bind("mouseout", function() {
				$(this).smoothDivScroll("startAutoScrolling");
			});
		
		
		
    

});

