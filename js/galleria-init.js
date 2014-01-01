jQuery(".galleria p").contents().unwrap();
jQuery(document).ready(function($){
	Galleria.run('.galleria');
	Galleria.configure({
    	imageCrop: true,
		transition: 'fade',
		autoplay: 1000,
		thumbPosition: 'top',
		 height: 0.5625
	});
});

