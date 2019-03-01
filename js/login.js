$(document).ready(function(){
	$("#login-form").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			usuario : {
				required : true
			},
			password : {
				required : true
			}
		},
		messages : {
			usuario : {
				required : "Por favor, ingrese usuario"
			},
			password : {
				required : "Por favor, ingrese contraseña"
			}
		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		}
	});
	$("#recuperar-clave").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			usuario : {
				required : true
			}
		},
		errorPlacement : function(error, element) {
			$(element).removeClass('has-success').addClass('has-error');
		},
		highlight : function(element) {
			$(element).removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).removeClass('has-error').addClass('has-success');
		}
	});
	/**Mensajes de Error**/
	$(".mensajes").delay(500).show(10, function() {
		$(this).delay(2000).hide(10, function() {
			$(this).remove();
		});
	}); // /.alert	
});