$(document).ready(function(){
  $.validator.addMethod("regx", function(value, element, regexpr) {
    return regexpr.test(value);
  });
  $('div[class^="header"]>div.button').on("click",function(){
    $('div[class^="menu"]').toggleClass('menu menu-min');
    $('div[class^="header"]').toggleClass('header header-max');
    $('div[class^="content"]').toggleClass('content content-max');
  });
  $('div.categoria>div.offers').slick({
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true
  });
  $('div.products').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1572,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 1254,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 936,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
  $('div.receipt>i[role="button"]').on("click",function(){
    $('body>div[class^="modal"]').toggleClass('modal-hide modal-show');
  });
  $('div.modalReceipt>div.exit').on("click",function(){
    $('body>div[class^="modal"]').toggleClass('modal-hide modal-show');
  });
  $('form.loginForm').validate({
    debug: true,
    rules:{
      email:{
        required: true,
        regx: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
      },
      contrasena:{
        required: true,
        regx: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/
      }
    },
    messages:{
      email: "Por favor ingresa un correo valido",
      password: "Tu contraseña debe de tener una mayucula, una minuscula y por lo menos un número"
    },
    invalidHandler: function(event, validator) {
      var errors = validator.numberOfInvalids();
      if (errors) {
        var message = errors == 1
        ? 'Tienes un campo que no cumple con lo requerido'
        : 'Tienes ' + errors + ' campos que no cumplen con lo requerido';
        alert(message);
      }
    },
    submitHandler: function(form) {
      let jsonObj = {};
      $(form).find(".toJson").each(function(key, value){
        jsonObj[$(value).attr("name")] = $(value).val();
      });
      let json = JSON.stringify(jsonObj);
      $.ajax({
        method:   "POST",
        url:      "./../../server/php/controller/login.php",
        data:     {"json": json}
      }).done(function(msg){
        window.location = 'index.html';
      });
    }
  });
  $("form.registerForm").validate({
    debug: true,
    rules: {
      nombreUsuario: {
        required: true,
        regx: /^[a-zA-Z0-9_-\s]+$/
      },
      primerNombre: {
        required: true,
        regx: /^[a-zA-Z\s]+$/
      },
      apellidoPaterno: {
        required: true,
        regx: /^[a-zA-Z\s]+$/
      },
      email: {
        required: true,
        regx: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
      },
      contrasena: {
        required: true,
        regx: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/
      },
      rePassword: {
        required: true,
        equalTo: "#password"
      }
    },
    messages: {
      nombreUsuario: "Por favor, introduce un usuario valido.",
      primerNombre: "Por favor, escribe tu nombre, recuerda que no se aceptan números",
      apellidoPaterno: "Por favor, escribe tus apellidos, recuerda que no se aceptan números",
      email: "Por favor ingresa un correo valido",
      contrasena: "Tu contraseña debe de tener una mayucula, una minuscula y por lo menos un número",
      rePassword: "Las contraseñas no coinciden"
    },
    invalidHandler: function(event, validator){
      var errors = validator.numberOfInvalids();
      if (errors) {
        var message = errors == 1
        ? 'Tienes un campo que no cumple con lo requerido'
        : 'Tienes ' + errors + ' campos que no cumplen con lo requerido';
        alert(message);
      }
    },
    submitHandler: function(form){
      let jsonObj = {};
      $(form).find(".toJson").each(function(key, value){
        jsonObj[$(value).attr("name")] = $(value).val();
      });
      let json = JSON.stringify(jsonObj);
      $.ajax({
        method:   "POST",
        url:      "../../server/php/controller/registrarUsuario.php",
        data:     {"json": json}
      }).done(function(msg){
        if (msg == "success") {
          window.location.href = "login.html";
        }
      });
    }
  })

});
