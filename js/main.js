(function($) {
	$(document).ready(function() {
		//VARIABLES;
		var items = $('.shop-item'),
			search = $('#search input');	
		// el contacto empieza oculto;		
		//$("#cnt_form").fadeOut(1);
		// search algorithm	
		search.keyup(function() {
			var cq = $(this).val().toLowerCase();
			if (cq !== "") {
				items.hide();
				items.each(function() {
					var ck = $(this).attr("data-key");
					var cc = $(this).attr("data-categoria");
					if (ck.indexOf(cq) >= 0) {
						$(this).show();
					}
				});
			}else{
				items.show();
			}
		});
		//shop scroll fixed search
		$(window).scroll(function(){
			if ($('body').hasClass('js-scroll')) {
				var scrolldist = $(this).scrollTop();
				var elmnt = $('#search').offset().top;

			   if (scrolldist >= elmnt) {
			   		$('.container-header').addClass('fixed');
			   }else{
			   		$('.container-header').removeClass('fixed');
			   }
			}
		});

	});
	// Contacto transition panels
	$("footer .right .contacto").click(function(){
		$("main .cnt-hide").fadeOut(300);
		$("#cnt_form").delay(300).fadeIn(500);
	});

	$("#close").click(function(){
		$("#cnt_form").fadeOut(300);
		$("main .cnt-hide").delay(300).fadeIn(500);
		if ($('.container-header').hasClass('fixed'))
		{
			$('.container-header').removeClass('fixed');
		}		
	})
})(jQuery);

