(function ($) {
    "use strict";
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('#btnlogin').on('click',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
                //location.href="index.php";
            }
        }
        if(check){
          //var btnusuario=document.getElementById("username");
          var usuario=document.getElementById("username").value;
          var password=document.getElementById("password").value;
          const url = 'index.php?controller=ControlLogin&action=validar';
          const http = new XMLHttpRequest();
          var params = "usuario="+usuario+"&password="+password+"";
          http.open("POST", url);

          http.onreadystatechange = function()
          {
            if(this.readyState == 4 && this.status == 200)
            {
                console.log(this.responseText);
                console.log(params);
                
                var resultado = JSON.parse(this.responseText);
                
                console.log(resultado);
                if(resultado.resultado=="1")
                {
                
                  location.href="index.php?controller=ControlAdminLTE";

                }
                else
                {
                    alert("usuario/password incorrectos");
                }
              }
          }
          // Ponemos las cabeceras de la solicitud como si fuera un formulario, necesario si se utiliza POST
          http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          //Enviamos la solicitud junto con los parámetros
          http.send(params);

          return false;
        }

        return false;

    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }

    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('fa-eye');
            $(this).find('i').addClass('fa-eye-slash');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').removeClass('fa-eye-slash');
            $(this).find('i').addClass('fa-eye');
            showPass = 0;
        }

    });


})(jQuery);
