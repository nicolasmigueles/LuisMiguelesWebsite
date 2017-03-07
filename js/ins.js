(function($) {
	$(document).ready(function() {
	
	});
	// Inscribirse cta
	$("#cta-ins").click(function(){
		$("main .ins-hide").fadeOut(300);
		$("#ins_form").delay(300).fadeIn(500);
	});
	$(".cta-ins-form").click(function(){
		var name = $("#form-name");
		var apellido = $("#form-apellido");
		var tel = $("#form-tel");
		var email = $("#form-email");
		var fecha = $("#form-fecha");
		var submit = $(this);
		var send  = true;
		if (name.val() == '') {
			name.focus();
			name.css('border-bottom-color', 'red');
			send = false;
		}
		if (apellido.val() == '') {
			apellido.css('border-bottom-color', 'red');
			send = false;
		}
		if (tel.val() == '') {
			tel.css('border-bottom-color', 'red');
			send = false;
		}
		if (email.val() == '') {
			email.css('border-bottom-color', 'red');
			send = false;
		}
		if (send){
			name.hide();apellido.hide();tel.hide();email.hide();fecha.hide();submit.hide();

		}
	});
	
})(jQuery);
