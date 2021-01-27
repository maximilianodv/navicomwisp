$(document).ready(function()
{

   $("#btnRegAlumno").one('click',function()
  {
    var pago=$("#tfPago").val();
    var idcliente=$("#tfCliente").val();
    //var idcliente=$(this).attr("data-idCliente");
    var fechapago=$("#tfFechaPago").val();
    var mesespagados=$("#tfMesesPagados").val();
    var claveempleado=$("#tfClaveEmpleado").val();
    var totalpagado=$("#tftotalsuma").val();


    $.ajax
    ({
      url:"index.php",
      data:"controller=ControlRentas&action=registrar&idpago="+pago+"&idcliente="+idcliente+"&fechapago="+fechapago+"&mesespagados="+mesespagados+"&claveempleado="+claveempleado+"&totalpagado="+totalpagado,
      type:"GET"
    }).done(function(resultados)
    {

    });



    for (var i =0; i<mesespagados; i++)
    {
      var id=i+1;
      var pagomes=$("#tfpagomes"+id+"").val();
      pagomes=parseFloat(pagomes);
      var fechai=$("#inicioper"+id+"").val();
//      fechai=parseFloat(fechai);
      var fechaf=$("#finper"+id+"").val();
      //fechaf=parseFloat(fechaf);
      var obs=$("#obs"+id+"").val();
       $.ajax
    ({
      url:"index.php",
      data:"controller=ControlRentas&action=registrardetalle&numpago="+id+"&idpago="+pago+"&pagomensual="+pagomes+"&fechainicio="+fechai+"&fechavencida="+fechaf+"&observaciones="+obs,
      type:"GET"
    }).done(function(resultados)
    {

      //resultados=resultados.substring(0,resultados.length-47);


       $("#resultados").html(resultados);


    });
    }

  });

   //$("#tfMesesPagados").change(function()
   //.one('click',function()
     $("#tfMesesPagados").one('change',function()
  {
      var cliente=$("#tfCliente").val();
      var meses=$("#tfMesesPagados").val();
      var meseant=0;

      $.ajax
          ({

            url:"index.php",
            data:"controller=ControlRentas&action=mostrardetalles&idcliente="+cliente+"&npagos="+meses,
            type:"GET"
          }).done(function(resultados)
          {

            resultados=resultados.substring(0,resultados.length-47);
            $("#detalles").html(resultados);


          });

         $.ajax
          ({

            url:"index.php",
            data:"controller=ControlRentas&action=mostrartotal&idcliente="+cliente+"&meses_a_pagar="+meses,
            type:"GET"
          }).done(function(resultados)
            {

              $("#divtotal").html(resultados);

            });

  });

  $(".pagomes").one('keyup',function()
  {
      var npagos=$(this).attr("data-npago");
      var total=0;
      var tem=0;

      for (var i =0; i<npagos; i++)
      {
        var idpago=i+1;
        tem=$("#tfpagomes"+idpago+"").val();
        tem=parseFloat(tem);
        total=parseFloat(total)+tem;

      }

      $.ajax
    ({

      url:"index.php",
      data:"controller=ControlRentas&action=mostrartotalsuma&total2="+total,
      type:"GET"
    }).done(function(resultados)
    {
      if(max==1)
      {

      resultados=resultados.substring(0,resultados.length-47);

      }
      $("#totalsuma").html(resultados);
      maxan=max;
      max++;

    });

  });


   $("#cbClientes").on('change',function()
  {
     var idcliente=$(this).attr("data-idCliente");
    var idcliente2=$("#cbClientes").val();
    var meses=$("#tfMesesPagados").val();
      $.ajax
    ({
      url:"index.php",
      data:"controller=ControlRentas&action=mostrarcliente&idcliente="+idcliente2+"&cuenta=1",
      type:"GET"
    }).done(function(resultados)
    {


      resultados=resultados.substring(0,resultados.length-47);

      $("#resultados").html(resultados);

    });

      $.ajax
    ({

      url:"index.php",
      data:"controller=ControlRentas&action=mostrardetalles&idcliente="+idcliente2+"&npagos="+1,
      type:"GET"
    }).done(function(resultados)
    {
      if(max>=1)
      {
         var a=resultados;

      var r=resultados.substring(resultados.length-10,resultados.length);
      resultados=resultados.substring(0,resultados.length-47);

      }

       $("#detalles").html(resultados);
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

});
$("#btnRegAlumno").one('click',function()
{
  var pago=$("#tfPago").val();
  var idcliente=$("#tfCliente").val();
  //var idcliente=$(this).attr("data-idCliente");
  var fechapago=$("#tfFechaPago").val();
  var mesespagados=$("#tfMesesPagados").val();
  var claveempleado=$("#tfClaveEmpleado").val();
  var totalpagado=$("#tftotalsuma").val();


  $.ajax
  ({
    url:"index.php",
    data:"controller=ControlRentas&action=registrar&idpago="+pago+"&idcliente="+idcliente+"&fechapago="+fechapago+"&mesespagados="+mesespagados+"&claveempleado="+claveempleado+"&totalpagado="+totalpagado,
    type:"GET"
  }).done(function(resultados)
  {

  });
  for (var i =0; i<mesespagados; i++)
  {
    var id=i+1;
    var pagomes=$("#tfpagomes"+id+"").val();
    pagomes=parseFloat(pagomes);
    var fechai=$("#inicioper"+id+"").val();
//      fechai=parseFloat(fechai);
    var fechaf=$("#finper"+id+"").val();
    //fechaf=parseFloat(fechaf);
    var obs=$("#obs"+id+"").val();
     $.ajax
  ({
    url:"index.php",
    data:"controller=ControlRentas&action=registrardetalle&numpago="+id+"&idpago="+pago+"&pagomensual="+pagomes+"&fechainicio="+fechai+"&fechavencida="+fechaf+"&observaciones="+obs,
    type:"GET"
  }).done(function(resultados)
  {

    //resultados=resultados.substring(0,resultados.length-47);


     $("#resultados").html(resultados);


  });
  }

});
