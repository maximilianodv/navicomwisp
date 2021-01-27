<?php

class Empleado
{
  private $clavemp;
  private $clavcue;
  private $nombre;
  private $paterno;
  private $materno;
  private $ciudad;
  private $colonia;
  private $calle;
  private $numero;
  private $estado;
  private $telefono;
  private $referencias;
    
  public function __construct($clavemp=null,$clavcue=null,$nombre=null,$paterno=null,$materno=null,
            $ciudad=null,$colonia=null,$calle=null,$numero=null,$estado=null,$telefono=null,$referencias=null) 
  {
    $this->clavemp=$clavemp;
    $this->clavcue=$clavcue;
    $this->nombre=$nombre;
    $this->paterno=$paterno;
    $this->materno=$materno;
    $this->ciudad=$ciudad;
    $this->colonia=$colonia;
    $this->calle=$calle;
    $this->numero=$numero;
    $this->estado=$estado;
    $this->telefono=$telefono;
    $this->referencias=$referencias;
  }

  function getClaveEmpleado() 
  {
    return $this->clavemp;
  }

  function getClaveCuenta()
  {
    return $this->clavcue;
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

  function getEstado() 
  {
    return $this->estado;
  }
  function getTelefono()
  {
    return $this->telefono;
  }

  function getReferencias() 
  {
    return $this->referencias;
  }
  function setClaveEmpleado($clavemp) 
  {
    $this->clavemp = $clavemp;
  }

  function setClaveCuenta($clavcue) 
  {
    $this->clavcue = $clavcue;
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

  function setEstado($estado) 
  {
    $this->estado = $estado;
  }
   function setTelefono($telefono) 
  {
    $this->telefono = $telefono;
  }

  function setRerencias($referencias) 
  {
    $this->referencias = $referencias;
  }
}
