$(document).ready(function(){
	jQuery.validator.addMethod('lettersonly', function(value, element) {
    return this.optional(element) || /^[a-z ñÑáãâäàéêëèíîïìóõôöòúûüùç]+$/i.test(value);
}, "Solo Letras");
	$("#usuario-form").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			usuario : {
				required : true,
				minlength: [3],
				maxlength: [15]
			},
			email : {
				required : true,
				remote: {
					url: "../check-email.php",
					type: "post",
					data: {
						email: function() {
							return $( "#email" ).val();
						}
					}
				}
			},
			nombre : {
				required : true,
				minlength : [3],
				lettersonly: "Solo caracteres"
			},
			apellido : {
				required : true,
				minlength : [3],
				lettersonly: "Solo caracteres"
			},
			cedula : {
				required : true,
				minlength:[8],
				maxlength:[8],
				remote: {
					url: "../check-cedula.php",
					type: "post",
					data: {
						cedula: function() {
							return $( "#cedula" ).val();
						}
					}
				}
			},
			ocupacion : {
				required : true,
				minlength : [3],
				lettersonly: "Solo caracteres"

			},
			telefono : {
				required : true,
				minlength:[11],
				maxlength:[11]
			},
			direccion : {
				required : true
			},
			password : {
				required : true,
				minlength : [8],
				maxlength : [15]
			},
			confirm_password : {
				required : true,
				equalTo: "#password"
			},
			respuesta : {
				required : true
			}
		},
		messages : {
			usuario: {
				required : "Por Favor, ingrese usuario",
				remote : "Usuario ya existe",
				minlength : "Mínimos 3 letras",
				maxlength : "Máximo 15 letras"
			},
			email : {
				required : "Por favor, ingrese Email",
				remote : "Email ya existe",
				email : "Formato de Email Incorrecto"
			},
			nombre : {
				required : "Por favor, ingrese nombre",
				minlength : "Mínimos 3 letras"
			},
			apellido : {
				required : "Por favor, ingrese apellido",
				minlength : "Mínimos 3 letras"
			},
			cedula : {
				required : "Por favor, ingrese cédula",
				remote : "Cédula ya existe",
				minlength:"8 dígitos mínimo",
				maxlength:"8 dígitos máximo",
				number:"Solo números"
			},
			ocupacion : {
				required : "Por favor, ingrese ocupación",
				minlength : "Mínimo 3 letras"
			},
			telefono : {
				required : "Por favor, ingrese telefono",
				number:"Solo números",
				minlength:"11 dígitos mínimo",
				maxlength:"11 dígitos Máximo"
			},
			direccion : {
				required : "Por favor, ingrese dirección"
			},
			password : {
				required : "Por favor, ingrese contraseña",
				minlength : "8 caracteres mínimo",
				maxlength : "15 caracteres máximo"
			},
			confirm_password : {
				required : "Introduzca confirmación de la contraseña",
				equalTo: "Contraseña y confirmación de contraseña no coinciden"
			},
			respuesta : {
				required : "Por favor, ingrese respuesta"
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
	
	
});