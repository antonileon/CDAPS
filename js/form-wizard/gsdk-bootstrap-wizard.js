/*!
 =========================================================
 * Bootstrap Wizard - v1.1.1
 =========================================================
 
 * Product Page: https://www.creative-tim.com/product/bootstrap-wizard
 * Copyright 2017 Creative Tim (http://www.creative-tim.com)
 * Licensed under MIT (https://github.com/creativetimofficial/bootstrap-wizard/blob/master/LICENSE.md)
 =========================================================
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 */
// Get Shit Done Kit Bootstrap Wizard Functions

searchVisible = 0;
transparent = true;
$(document).ready(function(){
    jQuery.validator.addMethod('lettersonly', function(value, element) {
    return this.optional(element) || /^[a-z ñÑáãâäàéêëèíîïìóõôöòúûüùç]+$/i.test(value);
}, "Solo Letras");
    /*  Activate the tooltips      */
    $('[rel="tooltip"]').tooltip();
    // Code for the Validator
    var $validator = $('.wizard-card form').validate({
		    rules: {
            //**Datos Personales**//
		    nombre: {
		      required: true,
		      minlength: 3,
              lettersonly: "Solo caracteres"
		    },
		    apellido: {
		      required: true,
		      minlength: 3,
              lettersonly: "Solo caracteres"
		    },
		    telefono: {
		      required: true,
		      minlength: 11,
              min : [1]
		    },
            cedula: {
              required: true,
              minlength: 8,
              maxlength: 9
            },
            personas_cargo: {
              required: true
            },
            fecha_nacimiento: {
                required: true
            },
            edad : {
                required : true
            },
            lugar_nacimiento: {
                required: true,
                lettersonly: "Solo caracteres"
            },
            num_hijos: {
                required: true
            },
            sexo: {
                required: true
            },
            //**Datos de Domicilio**//
            estado: {
                required: true,
                lettersonly: "Solo caracteres"
            },
            ciudad: {
                required: true,
                lettersonly: "Solo caracteres"
            },
            municipio: {
                required: true,
                lettersonly: "Solo caracteres"
            },
            parroquia: {
                required: true,
                lettersonly: "Solo caracteres"
            },
            direccion: {
                required: true
            },
            tipo_vivienda: {
                required: true
            },
            condicion_vivienda: {
                required: true
            },
            //**Datos Financiero**//
            ingreso_fijo : {
                required: true
            },
            otros_ingresos : {

            },
            gasto_total : {

            },
            nombre_empresa : {
                required: true
            },
            cargo_trabajo : {
                required: true,
                lettersonly: "Solo caracteres"
            },
            actividad_economica : {
                required: true,
                lettersonly: "Solo caracteres"
            }
        },
          messages : {
            //**Datos Personales**//
            nombre : {
            required : "Por favor, ingrese nombre",
            minlength:"3 caracteres mínimo"
            },
            apellido : {
                required : "Por favor, ingrese apellido",
                minlength:"3 caracteres mínimo"
            },
            cedula : {
                required : "Por favor, ingrese cédula",
                remote : "Cédula ya existe",
                minlength:"8 dígitos mínimo",
                maxlength:"8 dígitos maximo",
                number:"Solo números"
            },
            telefono : {
                required : "Por favor, ingrese telefono",
                number:"Solo números",
                minlength:"11 dígitos mínimo",
                maxlength:"11 dígitos Maximo",
                min : "Caracter no Valido"
            },
            fecha_nacimiento : {
                required : "Por favor, ingrese fecha de nacimiento",
                email : "Fecha de Nacimiento no es correcta"
            },
            edad : {
                required : "Ingrese Fecha de Nacimiento"
            },
            lugar_nacimiento : {
                required : "Por favor, ingrese lugar de nacimiento"
            },
            num_hijos : {
                required : "Por favor, ingrese número de hijos",
                number:"Solo números",
                max :"máximo 15 numero de hijo"
            },
            personas_cargo : {
                required : "Por favor, ingrese personas cargo",
                number:"Solo números",
                max :"máximo 10 numero de hijo"
            },
            sexo : {
                required : "Por favor, ingrese sexo",
            },
            //**Datos de Domicilio**//
            estado : {
                required : "Por favor, ingrese Estado"
            },
            ciudad : {
                required : "Por favor, ingrese Ciudad"
            },
            municipio : {
                required : "Por favor, ingrese municipio"
            },
            parroquia : {
                required : "Por favor, ingrese parroquia"
            },
            direccion : {
                required : "Por favor, ingrese direccion"
            },
            //**Datos Financiero**// 
            ingreso_fijo : {
                required: "Por Favor, rellene este campo",
                number:"Solo números"
            },
            otros_ingresos : {
                number: "Solo número"
            },
            gasto_total : {
                number: "Solo número"
            },
            nombre_empresa : {
                required: "Por favor, rellene este campo"
            },
            cargo_trabajo : {
                required: "Por favor, rellene este campo"
            },
            actividad_economica : {
                required: "Por favor, rellene este campo"
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

    // Wizard Initialization
  	$('.wizard-card').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'nextSelector': '.btn-next',
        'previousSelector': '.btn-previous',

        onNext: function(tab, navigation, index) {
        	var $valid = $('.wizard-card form').valid();
        	if(!$valid) {
        		$validator.focusInvalid();
        		return false;
        	}
        },

        onInit : function(tab, navigation, index){

          //check number of tabs and fill the entire row
          var $total = navigation.find('li').length;
          $width = 100/$total;
          var $wizard = navigation.closest('.wizard-card');

          $display_width = $(document).width();

          if($display_width < 600 && $total > 3){
              $width = 50;
          }

           navigation.find('li').css('width',$width + '%');
           $first_li = navigation.find('li:first-child a').html();
           $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
           $('.wizard-card .wizard-navigation').append($moving_div);
           refreshAnimation($wizard, index);
           $('.moving-tab').css('transition','transform 0s');
       },

        onTabClick : function(tab, navigation, index){

            var $valid = $('.wizard-card form').valid();

            if(!$valid){
                return false;
            } else {
                return true;
            }
        },

        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;

            var $wizard = navigation.closest('.wizard-card');

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $($wizard).find('.btn-next').hide();
                $($wizard).find('.btn-finish').show();
            } else {
                $($wizard).find('.btn-next').show();
                $($wizard).find('.btn-finish').hide();
            }

            button_text = navigation.find('li:nth-child(' + $current + ') a').html();

            setTimeout(function(){
                $('.moving-tab').text(button_text);
            }, 150);

            var checkbox = $('.footer-checkbox');

            if( !index == 0 ){
                $(checkbox).css({
                    'opacity':'0',
                    'visibility':'hidden',
                    'position':'absolute'
                });
            } else {
                $(checkbox).css({
                    'opacity':'1',
                    'visibility':'visible'
                });
            }

            refreshAnimation($wizard, index);
        }
  	});


    // Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });

    $('[data-toggle="wizard-radio"]').click(function(){
        wizard = $(this).closest('.wizard-card');
        wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
        $(this).addClass('active');
        $(wizard).find('[type="radio"]').removeAttr('checked');
        $(this).find('[type="radio"]').attr('checked','true');
    });

    $('[data-toggle="wizard-checkbox"]').click(function(){
        if( $(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).find('[type="checkbox"]').removeAttr('checked');
        } else {
            $(this).addClass('active');
            $(this).find('[type="checkbox"]').attr('checked','true');
        }
    });

    $('.set-full-height').css('height', 'auto');

});



 //Function to show image before upload

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(window).resize(function(){
    $('.wizard-card').each(function(){
        $wizard = $(this);
        index = $wizard.bootstrapWizard('currentIndex');
        refreshAnimation($wizard, index);

        $('.moving-tab').css({
            'transition': 'transform 0s'
        });
    });
});

function refreshAnimation($wizard, index){
    total_steps = $wizard.find('li').length;
    move_distance = $wizard.width() / total_steps;
    step_width = move_distance;
    move_distance *= index;

    $wizard.find('.moving-tab').css('width', step_width);
    $('.moving-tab').css({
        'transform':'translate3d(' + move_distance + 'px, 0, 0)',
        'transition': 'all 0.3s ease-out'

    });
}

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
};
