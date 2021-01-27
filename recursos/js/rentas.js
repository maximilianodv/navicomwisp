function clientes(){
  var idcliente=$(this).attr("data-idCliente");
  var idcliente2=$("#cbClientes").val();
  var meses=$("#tfMesesPagadosmd").val();
     $.ajax
   ({
     url:"index.php",
     data:"controller=ControlRentas&action=mostrarcliente&idcliente="+idcliente2+"&cuenta=1",
     type:"GET"
   }).done(function(resultados)
   {
     //console.log(resultados);
     var resultado = JSON.parse(resultados);
     var elmid=document.getElementById('idpago');
     //var elmpleado=document.getElementById('');
     elmid.value=resultado.idpago;
     let empleado=resultado.empleado;
     console.log(empleado);
     $("#txtcantpago").html(resultado.pagomes);
     $("#txtfechacontr").html(resultado.fecha);
     $("#tabla").html(resultado.tabla);
     //console.log(resultados);
   });

     $.ajax
   ({
     url:"index.php",
     data:"controller=ControlRentas&action=mostrardetalles&idcliente="+idcliente2+"&npagos="+1,
     type:"GET"
   }).done(function(resultados)
   {
    $("#detallesmd").html(resultados);
    });


}
function mesespag(){
  //alert("sss");
  //var cliente=$("#tfCliente").val();
  var cliente=$("#cbClientes").val();
  //var meses=$("#tfMesesPagadosmd").val();

  var meses=$("#tfMesesPagadosmd").val();
//  console.log(meses);
  $.ajax
      ({
        url:"index.php",
        data:"controller=ControlRentas&action=mostrardetalles&idcliente="+cliente+"&npagos="+meses,
        type:"GET"
      }).done(function(resultados)
      {
        $("#detallesmd").html(resultados);

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
}
function cantmes(actual){
let npagos=actual.dataset.npago;

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
    $("#totalsuma").html(resultados);
  });

}
function clickupdown(elemento){
  cantmes(elemento);
}
function addpago(elemento){
  let pago=document.getElementById("tfPago").value;
  //let idcliente=document.getElementById("tfCliente").value;
  /*let cmbclientes=document.getElementById("cbClientes");
  console.log(cmbclientes);*/
  let idcliente=$("#cbClientes").val();
  //let idcliente=document.getElementById("tfCliente").value;
  let fechapago=document.getElementById("fechapgmd").value;
  let mesespagados=document.getElementById("tfMesesPagadosmd").value;
  //let claveempleado=document.getElementById("tfClaveEmpleado").value;
  let totalpagado=document.getElementById("tftotalsuma").value;
  let claveempleado="";
  /*alert(pago+"pago");
  alert(idcliente+"idcliente");
  alert(fechapago+"fechapago");
  alert(mesespagados+"mesespagados");
  alert(claveempleado+"claveempleado");
  alert(totalpagado+"totalpagado");*/
  $.ajax
  ({
    url:"index.php",
    data:"controller=ControlRentas&action=registrar&idpago="+pago+"&idcliente="+idcliente+"&fechapago="+fechapago+"&mesespagados="+mesespagados+"&totalpagado="+totalpagado,
    type:"GET"
  }).done(function(resultados)
  {

  });
  for (var i =0; i<mesespagados; i++){
    var id=i+1;
    var pagomes=$("#tfpagomes"+id+"").val();
    pagomes=parseFloat(pagomes);
    var fechai=$("#inicioper"+id+"").val();
    var fechaf=$("#finper"+id+"").val();
    var obs=$("#obs"+id+"").val();
     $.ajax
  ({
    url:"index.php",
    data:"controller=ControlRentas&action=registrardetalle&numpago="+id+"&idpago="+pago+"&pagomensual="+pagomes+"&fechainicio="+fechai+"&fechavencida="+fechaf+"&observaciones="+obs,
    type:"GET"
  }).done(function(resultados)
  {
     $("#resultados").html(resultados);
     $("#tfMesesPagadosmd").val("1");
  });
}

}
function addpag2(elemento){
  let pago=document.getElementById("tfPago").value;
  let idcliente=document.getElementById("tfCliente").value;
  let fechapago=document.getElementById("tfFechaPago").value;
  let mesespagados=document.getElementById("tfMesesPagadosmd").value;
  let claveempleado=document.getElementById("tfClaveEmpleado").value;
  let totalpagado=document.getElementById("tftotalsuma").value;
  alert(pago+"pago");
  alert(idcliente+"idcliente");
  alert(fechapago+"fechapago");
  alert(mesespagados+"mesespagados");
  alert(claveempleado+"claveempleado");
  alert(totalpagado+"totalpagado");
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
      var fechaf=$("#finper"+id+"").val();
      var obs=$("#obs"+id+"").val();
       $.ajax
    ({
      url:"index.php",
      data:"controller=ControlRentas&action=registrardetalle&numpago="+id+"&idpago="+pago+"&pagomensual="+pagomes+"&fechainicio="+fechai+"&fechavencida="+fechaf+"&observaciones="+obs,
      type:"GET"
    }).done(function(resultados)
    {
       $("#resultados").html(resultados);
    });
  }
}
function btndetalles(elemento){

  var idpago=elemento.dataset.pago;
  console.log(idpago);
  //var idpago=$(this).attr("data-pago");
  $.ajax
({
  url:"index.php",
  data:"controller=ControlRentas&action=detalleporpago&idpago="+idpago,
  type:"GET"
}).done(function(resultados)
{
  $("#dataTable").html(resultados);
});

}
function returndetalles(elemento){
  var idpago=elemento.dataset.pago;
  console.log(idpago);
 $.ajax
({
  url:"index.php",
  data:"controller=ControlRentas&action=volverdetalles&idpago="+idpago,
  type:"GET"
}).done(function(resultados)
{
  //$("#dataTable").html(resultados);
  $("#dataTable").html(resultados);
  //$('#dataTable').clear();
  console.log($('#dataTable'));
    //$('#dataTable').DataTable();
});
}
/*jquerys*/
$('#cbClientes').select2({
selectOnClose: true
});
