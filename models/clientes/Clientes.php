<?php

class Clientes
{
  private $idcliente;
  private $nombre;
  private $paterno;
  private $materno;
  private $ciudad;
  private $colonia;
  private $calle;
  private $numero;
  private $telefono;
  private $fechanacimiento;
  private $referencias;
  private $clavecuenta;

    
  public function __construct($idcliente=null,$nombre=null,$paterno=null,$materno=null,$ciudad=null,$colonia=null,$calle=null,$numero=null,$telefono=null,$fechanacimiento=null,$referencias=null,$clavecuenta=null) 
  {
    $this->idcliente=$idcliente;
    $this->nombre=$nombre;
    $this->paterno=$paterno;
    $this->materno=$materno;
    $this->ciudad=$ciudad;
    $this->colonia=$colonia;
    $this->calle=$calle;
    $this->numero=$numero;
    $this->telefono=$telefono;
    $this->fechanacimiento=$fechanacimiento;
    $this->referencias=$referencias;
    $this->clavecuenta=$clavecuenta;
  }
function getIdCliente()
{
return $this->idcliente;
}

function getNombre()
{
return $this->nombre;
}

function getPaterno()
{
return $this->paterno;
}

function getMaterno()
{
return $this->materno;
}

function getCiudad()
{
return $this->ciudad;
}

function getColonia()
{
return $this->colonia;
}

function getCalle()
{
return $this->calle;
}

function getNumero()
{
return $this->numero;
}

function getTelefono()
{
return $this->telefono;
}

function getFechaNacimiento()
{
return $this->fechanacimiento;
}

function getReferencias()
{
return $this->referencias;
}

function getClaveCuenta()
{
return $this->clavecuenta;
}

function setIdCliente($idcliente)
{
$this->idcliente = $idcliente;
}

function setNombre($nombre)
{
$this->nombre = $nombre;
}

function setPaterno($paterno)
{
$this->paterno = $paterno;
}

function setMaterno($materno)
{
$this->materno = $materno;
}

function setCiudad($ciudad)
{
$this->ciudad = $ciudad;
}

function setColonia($colonia)
{
$this->colonia = $colonia;
}

function setCalle($calle)
{
$this->calle = $calle;
}

function setNumero($numero)
{
$this->numero = $numero;
}

function setTelefono($telefono)
{
$this->telefono = $telefono;
}

function setFechaNacimiento($fechanacimiento)
{
$this->fechadenac = $fechanacimiento;
}

function setReferencias($referencias)
{
$this->referencias = $referencias;
}

function setClaveCuenta($clavecuenta)
{
$this->clavecuenta = $clavecuenta;
}
 
}