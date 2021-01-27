<?php

class ModelRentas extends ConexionBD
{
  public function __construct()
  {
    parent::__construct();
    require_once 'models/rentas/Renta.php';
    require_once 'models/rentas/DetalleRenta.php';
  }
   public function detallespagos($idpago)
  {
    $resultSet=$this->conexion->query("SELECT * FROM DETALLESRENTASINTERNET WHERE IdPago=$idpago");

    $salida="<thead>
                <tr>
                  <th>Numero</th>
                  <th>Costo del mes </th>
                  <th colspan='2'>Periodo </th>
                  <th>Observaciones</th>
                  <th></th>
              </thead>
    <tbody>";

       while($row = $resultSet->fetch_array())
      {
        $np=$row["NumPago"];
        $costomes=$row["PagoMensual"];
        $fecha1=$row["FechaInicio"];
        $fecha2=$row["FechaVencida"];
        $obs=$row["Observaciones"];
        $salida .= "
        <tr>
          <td>$np</td>
          <td>$costomes</td>
          <td>$fecha1</td>
          <td>$fecha2</td>
          <td>$obs</td>
          <td>
            <button type='button' class='btnModificarPagoCliente'>Modificar</button>
          </td>

        </tr>";
      }


    $salida .= "
          <tr>
              <td colspan='5'>
                <button type='button' data-pago=$idpago class='btnVolverDetalles' onclick='returndetalles(this);'>Volver</button>
              </td>
          </tr>
          </tbody>";
    return $salida;

  }
  public function volverpagoscliente($idpago)
  {

    $resultSet=$this->conexion->query("SELECT *FROM RENTASINTERNET WHERE IdCliente=(
                                        SELECT IdCliente FROM RENTASINTERNET WHERE IdPago=$idpago) ORDER BY(IdPago)DESC");
    $salida="
                <thead>
                <tr>
                  <th>IdPago</th>
                  <th>IdCliente</th>
                  <th>Fecha Pago</th>
                  <th>Meses Pagados</th>
                  <th>Clave Empleado</th>
                  <th>Total Pagado</th>
                  <th>Total Pagado</th>
              </tr>
              </thead>

    <tbody>";

       while($row = $resultSet->fetch_array())
      {
        $idpago=$row["IdPago"];
        $idcliente=$row["IdCliente"];
        $fechapago=$row["FechaPago"];
        $mesespagados=$row["MesesPagados"];
        $claveempleado=$row["ClaveEmpleado"];
        $totalpagado=$row["TotalPagado"];

        $salida .= "
        <tr>
          <td>$idpago</td>
          <td>$idcliente</td>
          <td>$fechapago</td>
          <td>$mesespagados</td>
          <td>$claveempleado</td>
          <td>$totalpagado</td>
          <td>
            <button type='button' data-pago='$idpago'  class='btnDetalles'  onclick='btndetalles(this);'>Detalles </button>
          </td>


        </tr>";
      }

    $salida .= "</tbody>";

    $salida.=" ";
    return $salida;

  }
  public function mostrartotal($idcliente,$meses_a_pagar)
  {
    $resultSetContrato=$this->conexion->query("SELECT * FROM CONTRATOS WHERE CLIENTES_IdCliente=$idcliente");


      while($rowCtr = $resultSetContrato->fetch_array())
      {
        $pagomes=$rowCtr["PagoMensual"];
        $fecha=$rowCtr["FechaContrato"];
      }

      $total=$pagomes*$meses_a_pagar;

      $salida="<label for='exampleInputLastName'>Total</label>
                <input class='form-control' id='tfTotal' type='text' aria-describedby='nameHelp' placeholder='Total' value=$total>";
      return $salida;
  }
  public function mostrartotalsuma($total2)
  {
    $salida="<input class='form-control' type='number' id=tftotalsuma aria-describedby='nameHelp' value=$total2>";
            return $salida;
  }
  public function mostrardetalles($idcliente,$npagos)
  {
      $salida="";
      $total=0;

     $resultSetContrato=$this->conexion->query("SELECT * FROM CONTRATOS WHERE CLIENTES_IdCliente=$idcliente");
     $resultSet=$this->conexion->query("SELECT * FROM RENTASINTERNET WHERE IdCliente=$idcliente");
      $resultSetUltimopago=$this->conexion->query(
            "SELECT MAX(ULTIMPAGO.FechaVencida)AS Ultimo FROM
                  (
                    SELECT *FROM DETALLESRENTASINTERNET
                    WHERE IdPago=(
                            /*SELECT Idpago FROM rentasinternet
                            WHERE FechaPago=(SELECT MAX(FechaPago) FROM rentasinternet)
                            AND  idcliente=$idcliente*/

                    SELECT IdPago FROM RENTASINTERNET WHERE IdPago=(SELECT MAX(IdPago) FROM RENTASINTERNET WHERE IdCliente=$idcliente)
                                  )
                  )AS ULTIMPAGO
            "
          );




        while($rowCtr = $resultSetContrato->fetch_array())
          {
              $pagomes=$rowCtr["PagoMensual"];
              $fechacontrato=$rowCtr["FechaContrato"];
          }
        while($row =  $resultSetUltimopago->fetch_array())
          {

            $fecha=$row["Ultimo"];
          }

        if ($fecha==null || $fecha=="0")
        {

          $fecha=$fechacontrato;
        }
      for ($i=0; $i <$npagos ; $i++)
            {

              if($i==0)
              {
                $id=$i+1;
                $fechatem=date($fecha);
                $nuevo=strtotime('+1 month',strtotime($fechatem));
                $nuevo=date('Y-m-d',$nuevo);

                $salida.=
                "<div data-idperiodo=$id class='row'>
                    <div data-id=$id class='col-1 col-sm-1 col-md-1' data-idperiodo=$id>
                        <label class='col-form-label'>$id</label>
                    </div>
                    <div class='col-3 col-sm-3 col-md-3'>
                      <input  class='form-control' type='date' id=inicioper$id aria-describedby='nameHelp' value='$fechatem'>
                    </div>".
                    "<div class='col-3 col-sm-3 col-md-3'>
                      <input class='form-control' type='date' id=finper$id  aria-describedby='nameHelp' value='$nuevo'>".
                    "</div>
                    <div class='col-2 col-sm-2 col-md-2'>
                      <input data-npago=$npagos class='form-control pagomes' data-numeropago='$id' id=tfpagomes$id type='number' aria-describedby='Total mes' onkeyup='cantmes(this);' oninput='clickupdown(this);' value=$pagomes>
                    </div>
                    <div class='col-3 col-sm-3 col-md-3'>
                      <!--<input class='form-control' id=obs$id  type='text' aria-describedby='nameHelp' placeholder='observaciones'>-->
                      <textarea class='form-control z-depth-1' id=obs$id rows='3' placeholder='Observaciones'></textarea>
                    </div>
                </div>";
                $total=$pagomes*($i+1);
                $fechatem=$nuevo;
              }
              else
              {
                $id=$i+1;
                $nuevo=strtotime('+1 month',strtotime($fechatem));
                $nuevo=date('Y-m-d',$nuevo);

                 $salida.=
                "
                <div data-idperiodo=$id class='row' >

                    <div data-idperiodo=$id class='col-1 col-sm-1 col-md-1'>
                      <label class='col-form-label'>$id</label>
                    </div>
                    <div class='col-3 col-sm-3 col-md-3'><input class='form-control' type='date' id=inicioper$id aria-describedby='nameHelp' value=$fechatem> </div>".
                    "<div class='col-3 col-sm-3 col-md-3'><input class='form-control' type='date' id=finper$id type='text' aria-describedby='nameHelp' value=$nuevo>"."</div>
                    <div class='col-2 col-sm-2 col-md-2'><input class='form-control' data-npago=$npagos data-numeropago='$id' class=pagomes type='number' aria-describedby='nameHelp'  onkeyup='cantmes(this);' oninput='clickupdown(this);' id=tfpagomes$id value=$pagomes></div>
                    <div class='col-3 col-sm-3 col-md-3'>
                      <!--<input class='form-control' id=obs$id type='text' aria-describedby='nameHelp' placeholder='observaciones'>-->
                      <textarea class='form-control z-depth-1' id=obs$id rows='3' placeholder='Observaciones'></textarea>
                    </div>


                </div> ";
                $fechatem=$nuevo;
                $total=$pagomes*($i+1);
              }
            }

    $salida.="<div class='row'>
                  <div class='col-md-6 col-md-offset-6'>

                  </div>
                  <div class='col-md-1 col-md-offset-1'><label class='col-form-label'>Total</label></div>
                  <div class='col-2 col-sm-2 col-md-2' id='totalsuma'>
                    <input id='tftotalsuma' type='number'  class='form-control' aria-describedby='nameHelp' value='$total'>
                  </div>
                  <div class='col-3 col-sm-3 col-md-3'></div>
              </div>";

    return $salida;

  }
  public function mostrarPagoCliente($idcliente,$cuenta)
  {
      $datos = array();
      $datos["empleado"] =$cuenta;
      $resultSeIncrement=$this->conexion->query("SELECT MAX(IdPago)AS IdPago FROM RENTASINTERNET");
      while($row =    $resultSeIncrement->fetch_array())
      {
        $idpagoincr=$row["IdPago"];
        $idpagoincr=$idpagoincr+1;
        $datos["idpago"] =$idpagoincr;
      }
    $resultSetContrato=$this->conexion->query("SELECT * FROM CONTRATOS WHERE CLIENTES_IdCliente=$idcliente");

    $resultSet=$this->conexion->query("SELECT * FROM RENTASINTERNET WHERE IdCliente=$idcliente ORDER BY(IdPago)DESC");
      while($rowCtr = $resultSetContrato->fetch_array())
      {
        $pagomes=$rowCtr["PagoMensual"];
        $fecha=$rowCtr["FechaContrato"];
        $datos["pagomes"] =$pagomes;
        $datos["fecha"]=$fecha;

        $salida.="<h1 data-dato=$pagomes>Pago mensual:".$pagomes."</h1>
            <h1>Inicio de contrato:".$fecha."</h1>";
      }


      $salida.="
                <div id='form'>
                </div>";

      $tabla="";
      while($row = $resultSet->fetch_array())
      {
        $idpago=$row["IdPago"];
        $idcliente=$row["IdCliente"];
        $fechapago=$row["FechaPago"];
        $mesespagados=$row["MesesPagados"];
        $claveempleado=$row["ClaveEmpleado"];
        $totalpagado=$row["TotalPagado"];
        $tabla.= "
        <tr>
          <td>$idpago</td>
          <td>$idcliente</td>
          <td>$fechapago</td>
          <td>$mesespagados</td>
          <td>$claveempleado</td>
          <td>$totalpagado</td>
          <td>
            <button type='button' data-pago='$idpago' onclick='btndetalles(this);' class='btnDetalles'>Detalles </button>
          </td>
        </tr>";
      }

      $datos["tabla"]="
      <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
            <thead>
              <tr>
                <th  class='sorting' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1' style='width: 247px;' aria-label='Nombre: activate to sort column ascending'>IdPago</th>
                <th>IdCliente</th>
                <th>Fecha Pago</th>
                <th>Meses Pagados</th>
                <th>Clave Empleado</th>
                <th>Total Pagado</th>
                <th class='sorting_asc' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1' style='width: 246.083px;' aria-sort='ascending' aria-label='Nombre: activate to sort column descending'>Nombre</th>
                </tr>
            </thead>
            <tbody>
            ".$tabla."
            </tbody>
      </table>";
      $datos["salida"]=$salida;
    return $datos;
  }
  public function mostrar(){
    $salida="<div id='form'>
              </div>";
    return $salida;
  }
  public function showcomboclientes(){
    $resultSetCliente=$this->conexion->query("SELECT * FROM CLIENTES");
    $salida = "
              <SELECT NAME='Cliente' id='cbClientes' class='form-control' onchange='clientes();'>
                    <OPTION value='0'>Seleccionar Cliente
                      ";
     while($rowC = $resultSetCliente->fetch_array())
      {
        $idCliente=$rowC["IdCliente"];
        $nombre=$rowC["Nombre"];
        $paterno=$rowC["Paterno"];
        $materno=$rowC["Materno"];
        $salida .=
                  "<OPTION class='prueba' data-idCliente=$idCliente value=$idCliente>$nombre $paterno $materno
                  ";
      }

    $salida.="</SELECT>";

    return $salida;

  }
  public function insertar($renta)
  {


     $insertar="INSERT INTO RENTASINTERNET VALUES ('".$renta->getIdPago()."','".
                                            $renta->getIdCliente()."','".
                                            $renta->getFechaPago()."','".
                                            $renta->getMesesPagados()."','".
                                            $renta->getClaveEmpleado()."','".
                                            $renta->getTotalPagado()."')";
    $this->conexion->query($insertar);

  }


  public function insertardetallerenta($detallesrenta)
  {

      $insertar="INSERT INTO DETALLESRENTASINTERNET VALUES ('".$detallesrenta->getNumPago()."','".
                                                            $detallesrenta->getIdPago()."','".
                                                            $detallesrenta->getPagoMensual()."','".
                                                            $detallesrenta->getFechaInicio()."','".
                                                            $detallesrenta->getFechaVencida()."','".
                                                            $detallesrenta->getObservaciones()."')";
    $this->conexion->query($insertar);

  }
  public function tabladatos(){
      $resultSet=$this->conexion->query("SELECT * FROM RENTASINTERNET ORDER BY(IdPago)DESC");
      $salida="<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
            <thead>
              <tr>
                <th  class='sorting' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1' style='width: 247px;' aria-label='Nombre: activate to sort column ascending'>IdPago</th>
                <th>IdCliente</th>
                <th>Fecha Pago</th>
                <th>Meses Pagados</th>
                <th>Clave Empleado</th>
                <th>Total Pagado</th>
                <th>Total Pagado</th>
            </thead>

  <tbody>";
  while($row = $resultSet->fetch_array())
  {
    $idpago=$row["IdPago"];
    $idcliente=$row["IdCliente"];
    $fechapago=$row["FechaPago"];
    $mesespagados=$row["MesesPagados"];
    $claveempleado=$row["ClaveEmpleado"];
    $totalpagado=$row["TotalPagado"];

    $salida .= "
    <tr>
      <td>$idpago</td>
      <td>$idcliente</td>
      <td>$fechapago</td>
      <td>$mesespagados</td>
      <td>$claveempleado</td>
      <td>$totalpagado </td>
      <td>
        <button type='button' data-pago='$idpago' class='btnDetalles'  onclick='btndetalles(this);'>Detalles </button>
      </td>


    </tr>";

  }
  $salida.="</tbody></table>";
  return $salida;
  }
}
