$(document).ready(function()
{
   var maxan=0;
   var max=0;

  /********************* INDEX ***************************/
  $('#mIndex').live('click',function()
  {
    window.location="index.php";
  });
  /*********************************************************************
   ******************* OPCIONES DE LA BARRA DE MENU ********************
   *********************************************************************/
  $(".pagina").one('click',function()
  {
    var menu=$(this).attr("data-menu");
    var titulo=$(this).attr("data-titulo");
    var cabecera='\
    \n<h1>'+titulo+'<small>UARM</small></h1>\
    \n      <ol class="breadcrumb">\
    \n        <li>\
    \n            <i class="fa fa-dashboard"></i> '+menu+'\
    \n        </li>\
    \n        <li class="active">'+titulo+'</li>\
    \n      </ol>\ ';
    $(".content-header").html(cabecera);

    $.ajax
    ({
      url:"index.php",
      data:"controller="+$(this).attr("data-control"),
      type:"GET"
    }).done(function(resultados)
    {
      if(max==2)
      {
        resultados=resultados.substring(0,resultados.length-47);
      }
      $("#contenido").html(resultados);
      maxan=max;
      max++;



    });
  });
    /*********************************************************************
   ******************* Funciones Alumnos********************
   *********************************************************************/


   //$("#tfMesesPagados").change(function()
   //.one('click',function()
  $(".btnEditar").on('click',function ()
    {
      var matricula=$(this).attr("data-matricula");
       // alert('editando'+menu);

     $.ajax
    ({
      url:"index.php",
      data:"controller=ControlAlumnos&action=mostrarmodificar&matr="+matricula,
      type:"GET"
    }).done(function(resultados)
    {
      alert(resultados);
      $("#"+matricula+"F").html(resultados);
    });

    });


   $("#btnRegUsuario").on('click',function()
  {
    var id=$("#tfId").val();
    var login=$("#tfLogin").val();
    var password=$("#tfPassword").val();
    var nombreu=$("#tfNombreU").val();
    $.ajax
    ({
      url:"index.php",
      data:"controller=ControlUsuarios&action=registrar&id="+id+"&login="+login+"&password="+password+"&nombreu="+nombreu,
      type:"GET"
    }).done(function(resultados)
    {
      $("#resultados").html(resultados);

    });
  });

   $("#CerrarSesion").one('click',function()
  {

    $.ajax
    ({
      url:"index.php",
      data:"controller=ControlLogin&action=cerrar",
      type:"GET"
    }).done(function(resultados)
    {
      if(max==1)
      {

        resultados=resultados.substring(0,resultados.length-47);
      }
      $("#resultados").html(resultados);
      maxan=max;
      max++;
    });
  });


    $("#Ingresar").one('click',function ()
    {
      //alert('carga scrip');
      //

      var id=$("#tfUsuario").val();
      var contraseña=$("#tfContraseña").val();


      $.ajax
    ({
      url:"index.php",
      data:"controller=ControlLogin&action=validar&usuario="+id+"&contraseña="+contraseña,
      type:"GET"
    }).done(function(resultados)
    {

     if(max==1)
      {
          var a=resultados;

      var r=resultados.substring(resultados.length-10,resultados.length);
      resultados=resultados.substring(0,resultados.length-47);

      }
      $("#contenido").html(resultados);
      maxan=max;
      max++;
    });

    });
    $(".btnDetalles").one('click',function ()
    {
      var idpago=$(this).attr("data-pago");
      $.ajax
    ({
      url:"index.php",
      data:"controller=ControlRentas&action=detalleporpago&idpago="+idpago,
      type:"GET"
    }).done(function(resultados)
    {

     if(max==1 || max>1)
      {
          var a=resultados;

      var r=resultados.substring(resultados.length-10,resultados.length);
      resultados=resultados.substring(0,resultados.length-47);

      }
      $("#dataTable").html(resultados);
      maxan=max;
      max++;
    });

    });
    $(".btnVolverDetalles").one('click',function ()
    {
      var idpago=$(this).attr("data-pago");
      $.ajax
    ({
      url:"index.php",
      data:"controller=ControlRentas&action=volverdetalles&idpago="+idpago,
      type:"GET"
    }).done(function(resultados)
    {

     if(max==1 || max>1)
      {
          var a=resultados;

      var r=resultados.substring(resultados.length-10,resultados.length);
      resultados=resultados.substring(0,resultados.length-47);

      }
      $("#dataTable").html(resultados);
      maxan=max;
      max++;
    });

    });

     $("#btnRegEmpleado").one('click',function()
  {

    var clavemp=$("#tfClaveEmpleado").val();
    var clavcue=$("#tfClaveCuenta").val();
    var nombre=$("#tfNombre").val();
    var paterno=$("#tfPaterno").val();
    var materno=$("#tfMaterno").val();
    var ciudad=$("#tfCiudad").val();
    var colonia=$("#tfColonia").val();
    var calle=$("#tfCalle").val();
    var numero=$("#tfNumero").val();
    var estado=$("#tfEstado").val();
    var telefono=$("#tfTelefono").val();
    var referencias=$("#tfReferencias").val();

    $.ajax
    ({
      url:"index.php",
      data:"controller=ControlEmpleados&action=registrar&clavemp="+clavemp+"&clavcue="+clavcue+"&nombre="+nombre+"&paterno="+paterno+"&materno="+materno
      +"&ciudad="+ciudad+"&colonia="+colonia+"&calle="+calle+"&numero="+numero+"&estado="+estado+"&telefono="+telefono+"&referencias="+referencias,

      type:"GET"
    }).done(function(resultados)
    {
      $("#resultados").html(resultados);
      $("#tfClaveEmpleado").focus();
      $("#tfClaveCuenta").val("");
      $("#tfNombre").val("");
      $("#tfPaterno").val("");
      $("#tfMaterno").val("");
      $("#tfEstado").val("");
      $("#tfTelefono").val("");
      $("#tfReferencias").val("");

    });
  });



$("#btnRegCuenta").on('click',function()
  {
    var clavec=$("#tfClave").val();
    var nombreu=$("#tfNombre").val();
    var password=$("#tfPassword").val();
    var estado=$("#tfEstado").val();
    var tipou=$("#tfTipo").val();

    $.ajax
    ({
      url:"index.php",
      data:"controller=ControlCuentas&action=registrar&clavec="+clavec+"&nombreu="+nombreu+"&password="+password+"&estado="+estado+"&tipou="+tipou,
      type:"GET"
    }).done(function(resultados)
    {
      $("#resultados").html(resultados);
      $("#tfClave").focus();
      $("#tfClave").val("");
      $("#tfNombre").val("");
      $("#tfPassword").val("");
      $("#tfEstado").val("");
      $("#tfTipo").val("");
    });
  });

 $("#btnRegCliente").one('click',function()
  {
    var idcliente=$("#tfIdCliente").val();
    var nombre=$("#tfNombre").val();
    var paterno=$("#tfPaterno").val();
    var materno=$("#tfMaterno").val();
    var ciudad=$("#tfCiudad").val();
    var colonia=$("#tfColonia").val();
    var calle=$("#tfCalle").val();
    var numero=$("#tfNumero").val();
    var telefono=$("#tfTelefono").val();
    var fechanacimiento=$("#tfFechaNacimiento").val();
    var referencias=$("#tfReferencias").val();
    var clavcue=$("#tfClaveCuenta").val();
    $.ajax
    ({
      url:"index.php",
      data:"controller=ControlClientes&action=registrar&idcliente="+idcliente+"&nombre="+nombre+"&paterno="+paterno+"&materno="+materno
      +"&ciudad="+ciudad+"&colonia="+colonia+"&calle="+calle+"&numero="+numero+"&telefono="+telefono+"&fechanacimiento="+fechanacimiento+"&referencias="+referencias+"&clavecuenta=8",
      type:"GET"
    }).done(function(resultados)
    {

      $("#resultados").html(resultados);
      $("#tfIdCliente").focus();
      $("#tfNombre").val("");
      $("#tfPaterno").val("");
      $("#tfMaterno").val("");
      $("#tfCiudad").val("");
      $("#tfColonia").val("");
      $("#tfCalle").val("");
      $("#tfNumero").val("");
      $("#tfTelefono").val("");
      $("#tfFechaNacimiento").val("");
      $("#tfReferencias").val("");
      $("#tfClaveCuenta").val("");

    });
  });
});
