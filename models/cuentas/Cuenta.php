<?php

class Cuenta
{
  private $clavec;
  private $nombreu;
  private $password;
  private $estado;
  private $tipou;
    
  public function __construct($clavec=null,$nombreu=null,$password=null,$estado=null,$tipou=null) 
  {
    $this->clavec=$clavec;
    $this->nombreu=$nombreu;
    $this->password=$password;
    $this->estado=$estado;
    $this->tipou=$tipou;
  }

  function getClaveCuenta() 
  {
    return $this->clavec;
  }

  function getNombreUsuario()
  {
    return $this->nombreu;
  }
  
  function getContraseña()
  {
    return $this->password;
  }

  function getEstado() 
  {
    return $this->estado;
  }
  function getTipoUsuario() 
  {
    return $this->tipou;
  }


  function setClaveCuenta($clavec) 
  {
    $this->clavec = $clavec;
  }

  function setNombreUsuario($nombreu) 
  {
    $this->nombreu = $nombreu;
  }
  
  function setContraseña($password)
  {
    $this->password = $password;
  }

  function setEstado($estado) 
  {
    $this->estado = $estado;
  }
  function setTipoUsuario($tipou) 
  {
    $this->tipou = $tipou;
  }
}
