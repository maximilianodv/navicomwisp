<?php
class Renta 
{
  private $idpago;
  private $idcliente;
  private $fechapago;
  private $mesespagados;
  private $claveempleado;
  private $totalpagado;
  
  public function __construct($idpago=null, $idcliente=null, $fechapago=null, $mesespagados=null,
                              $claveempleado=null,$totalpagado=null)
  {
    $this->idpago = $idpago;
    $this->idcliente = $idcliente;
    $this->fechapago = $fechapago;
    $this->mesespagados = $mesespagados;
    $this->claveempleado= $claveempleado;
    $this->totalpagado = $totalpagado;
  }

function getIdPago()
{
return $this->idpago;
}

function getIdCliente()
{
return $this->idcliente;
}

function getFechaPago()
{
return $this->fechapago;
}

function getMesesPagados()
{
return $this->mesespagados;
}

function getClaveEmpleado()
{
return $this->claveempleado;
}

function getTotalPagado()
{
return $this->totalpagado;
}

function setIdPago($idpago)
{
$this->idpago = $idpago;
}

function setIdCliente($idcliente)
{
$this->idcliente = $idcliente;
}

function setFechaPago($fechapago)
{
$this->fechapago = $fechapago;
}

function setMesesPagados($mesespagados)
{
$this->mesespagados = $mesespagados;
}

function setClaveEmpleado($claveempleado)
{
$this->claveempleado = $claveempleado;
}

function setTotalPagado($totalpagado)
{
$this->totalpagado = $totalpagado;
} 

}
