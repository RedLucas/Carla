jQuery("#main_slider img").css("display","none"),jQuery(document).ready(function(o){o("#main_slider img").css("display","block"),o("#main_slider").smoothDivScroll({autoScrollingMode:"always",autoScrollingDirection:"endlessLoopRight",autoScrollingInterval:50}),o("#main_slider").bind("mouseover",function(){o(this).smoothDivScroll("stopAutoScrolling")}).bind("mouseout",function(){o(this).smoothDivScroll("startAutoScrolling")})});