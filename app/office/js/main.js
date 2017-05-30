$(document).ready(function () {
	$.validator.addMethod("regx", function (value, element, regexpr) {
		return regexpr.test(value);
	});

	var token = localStorage.getItem("token");

	$('form.emailForm').validate({
		debug: true,
		rules: {
			nombre: {
				required: true,
				regx: /^[a-zA-Z\s]+$/
			},
			email: {
				required: true,
				regx: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
			}
		},
		messages: {
			nombre: {
				required: "El nombre es requerido",
				regx: "Introduce un nombre valido"
			},
			email: {
				required: "El correo es requerido",
				regx: "Por favor ingresa un correo valido"
			}
		},
		invalidHandler: function (event, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
					? 'Tienes un campo que no cumple con lo requerido'
					: 'Tienes ' + errors + ' campos que no cumplen con lo requerido';
				alert(message);
			}
		},
		submitHandler: function (form) {
			let jsonObj = {};
			$(form).find(".toJson").each(function (key, value) {
				jsonObj[$(value).attr("name")] = $(value).val();
			});
			jsonObj['token'] = token;
			let json = JSON.stringify(jsonObj);
			$('.toJson').val('');
			$.ajax({
				method: "POST",
				url: "../server/php/controller/sendEmail.php",
				data:
				{
					"json": json,
					'token': localStorage.getItem("token")
				}
			}).done(function (response) {
				var info = JSON.parse(response);
				console.log(info);
			}
				);
		}
	});
});
