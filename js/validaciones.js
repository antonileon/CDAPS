/**Validaciones para cambiar perfil */
$(document).ready(function(){
	jQuery.validator.addMethod('lettersonly', function(value, element) {
    return this.optional(element) || /^[a-z ñÑáãâäàéêëèíîïìóõôöòúûüùç]+$/i.test(value);
}, "Solo Letras");
	$("#cambiar-perfil").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			cedula : {
				required : true,
				minlength:[8],
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
			/*email : {
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
			},*/
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
			ocupacion : {
				required : true,
				minlength : [3],
				lettersonly: "Solo caracteres"
			},
			telefono : {
				required : true,
				minlength: [11],
				maxlength: [11]
			},
			direccion : {
				required : true
			},
			respuesta : {
				required : true,
				minlength : [3]
			}
		},
		messages : {
			cedula : {
				required : "Por favor, ingrese cédula",
				remote : "Cédula ya existe",
				minlength:"8 dígitos mínimo",
				number:"Solo números"
			},
			email : {
				required : "Por favor, ingrese Email",
				remote : "Email ya existe",
				email : "Formato Incorrecto de Email"
			},
			nombre : {
				required : "Por favor, ingrese nombre",
				minlength : "Mínimos 3 letras"
			},
			apellido : {
				required : "Por favor, ingrese apellido",
				minlength : "Mínimos 3 letras"
			},
			ocupacion : {
				required : "Por favor, ingrese ocupación",
				minlength : "Mínimo 3 letras"
			},
			telefono : {
				required : "Por favor, ingrese telefono",
				number:"Solo números",
				minlength:"11 dígitos mínimo",
				maxlength:"11 dígitos Maximo"
			},
			direccion : {
				required : "Por favor, ingrese direccion"
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
/*Validaciones para cambiar contraseña*/
$(document).ready(function(){
	$("#cambiar-clave").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			old_password : {
				required : true,
				remote   : {
						url: "../check-email.php",
						type: "post",
						data: {
							password: function() {
								return $( "#old_password" ).val();
							},
							email: function() {
								return $( "#email" ).val();
							}
						}
				}
			},
			password : {
				required : true
			},
			confirm_password : {
				required : true,
				equalTo: "#password"
			}
		},
		messages : {
			old_password : {
				required : "Introduzca la contraseña actual",
				remote : "Introduzca la contraseña actual correcta"
			},
			password : {
				required : "Por favor, ingrese contraseña"
			},
			confirm_password : {
				required : "Introduzca confirmación de la contraseña",
				equalTo: "Contraseña y confirmación de contraseña no coinciden"
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
/**Validaciones para censo */
$(document).ready(function(){
	$("#censo").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			cedula : {
				required : true,
				minlength:[6],
				maxlength:[9],
				min:[1]
			},
			n_hijo : {
				required : true,
				minlength : [1],
				maxlength : [2]
			},
			cedula_repre : {
				required: true,
				minlength: [8],
				maxlength: [8]
			}
		},
		messages : {
			cedula : {
				required : "Por favor, ingrese cédula",
				remote : "Cédula ya existe",
				minlength:"6 dígitos mínimo",
				maxlength:"9 dígitos maximo",
				number:"Solo números",
				min : "Caracter no Valido"
			},
			n_hijo : {
				required : "Por favor, indique el número de hijo",
				number : " Solo número",
				minlength : "Mínimo 1 un numero",
				max : "número de hijo 10 máximo",
				min : "número de hijo 1 minimo"
			},
			cedula_repre : {
				required : "Por favor, indique la cédula del representante",
				number : "Solo números",
				maxlength : "Máximo 8 número",
				minlength : "Mínimo 8 número"
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
/**Validaciones para registrar proveedores */
$(document).ready(function(){
	$("#proveedores").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			tipo_rif : {
				required : true
			},
			rif : {
				required : true,
				minlength : [9],
				maxlength : [9],
				min : [1],
				remote: {
					url: "../check-rif.php",
					type: "post",
					data: {
						email: function() {
							return $( "#rif" ).val();
						}
					}
				}
			},
			tipo_insumos : {
				required: true
			},
			nombre_proveedor : {
				required: true
			},
			telefono : {
				required: true,
				minlength: [11],
				maxlength: [11]

			},
			direccion_proveedores: {
				required: true
			}
		},
		messages : {
			tipo_rif : {
				required : "Por favor, ingrese cédula"
			},
			rif : {
				required : "Por favor, ingrese RIF",
				number : " Solo número",
				minlength : "Mínimo 9 digito",
				maxlength : "Máximo 9 digito",
				remote : "RIF ya existe",
				min : "Caracter no Valido"
			},
			tipo_insumos : {
				required : "Por favor, ingrese código"
			},
			nombre_proveedor : {
				required: "Por favor, ingrese nombre"
			},
			telefono : {
				required: "Por favor, ingrese teléfono",
				minlength : "Mínimo 11 Digitos",
				maxlength : "Máximo 11 Digitos",
				number : "Solo Número"
			},
			direccion_proveedores: {
				required: "Por favor, ingrese Dirección"
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
/**Validaciones para registrar Insumos */
$(document).ready(function(){
	$("#insumos").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			id_proveedores : {
				required: true
			},
			marca : {
				required: true,
				lettersonly: "Solo caracteres"
			},
			nombre : {
				required: true,
				lettersonly: "Solo caracteres"
			}
		},
		messages : {
			marca : {
				required : "Por favor, ingrese marca"
			},
			nombre : {
				required: "Por favor, ingrese nombre"
			},
			id_proveedores : {
				required: "Seleccione Proveedor"
			},
			tipo : {
				required: "Seleccione el tipo de insumo"
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
/**Validaciones para registrar Inventario */
$(document).ready(function(){
	$("#inventario").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			insumo : {
				required: true
			},
			cantidad : {
				required: true
			},
			fecha_vencimiento : {
				required: true
			}
		},
		messages : {
			cantidad : {
				required : "Por favor, ingrese cantidad",
				number : "Solo Número"
			},
			fecha_vencimiento : {
				required: "Por favor, ingrese fecha",
				date:"Fecha no valida"
			},
			insumo : {
				required: "Seleccione Insumo"
			},
			tipo : {
				required: "Seleccione el tipo de insumo"
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
/**Validaciones para registrar Usar Producto */
$(document).ready(function(){
	$("#usar_producto").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			cantidad_usar : {
				required: true
			}
		},
		messages : {
			cantidad_usar : {
				required : "Por favor, ingrese cantidad a usar",
				number : "Solo Número"
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
/**Validaciones de Asistencia */
$(document).ready(function(){
	$("#asistencia").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			cedula : {
				required: true
			}
		},
		messages : {
			cedula : {
				required : "Por favor, ingrese cédula",
				number : "Solo Número"
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
/**Validaciones Menú de Comida */
$(document).ready(function(){
	$("#menu").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			plato : {
				required: true
			},
			jugo : {
				required: true
			},
			merienda : {
				required: true
			}
		},
		messages : {
			plato : {
				required : "Por favor, ingrese plato"
			},
			jugo : {
				required : "Por favor, ingrese jugo"
			},
			merienda : {
				required : "Por favor, ingrese merienda"
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