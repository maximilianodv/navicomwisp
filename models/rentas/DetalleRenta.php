<?php
class DetalleRenta 
{
  private $numpago;
  private $idpago;
  private $pagomensual;
  private $fechainicio;
  private $fechavencida;
  private $observaciones;
  
  public function __construct($numpago=null, $idpago=null, $pagomensual=null, $fechainicio=null,
                              $fechavencida=null,$observaciones=null)
  {
    $this->numpago = $numpago;
    $this->idpago = $idpago;
    $this->pagomensual = $pagomensual;
    $this->fechainicio = $fechainicio;
    $this->fechavencida= $fechavencida;
    $this->observaciones = $observaciones;
  }

  function getNumPago()
  {
  return $this->numpago;
  }

  function getIdPago()
  {
  return $this->idpago;
  }

  function getPagoMensual()
  {
  return $this->pagomensual;
  }

  function getFechaInicio()
  {
  return $this->fechainicio;
  }

  function getFechaVencida()
  {
  return $this->fechavencida;
  }

  function getObservaciones()
  {
  return $this->observaciones;
  }

  function setNumPago($numpago)
  {
  $this->numpago = $numpago;
  }

  function setIdPago($idpago)
  {
  $this->idpago = $idpago;
  }

  function setPagoMensual($pagomensual)
  {
  $this->pagomensual = $pagomensual;
  }

  function setFechaInicio($fechainicio)
  {
  $this->fechainicio = $fechainicio;
  }

  function setFechaVencida($fechavencida)
  {
  $this->fechavencida = $fechavencida;
  }

  function setObservaciones($observaciones)
  {
  $this->observaciones = $observaciones;
  } 
}
