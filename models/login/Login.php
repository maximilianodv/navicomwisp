<?php

class Login 

{
  private $usuario;
  private $contraseña;

  
  public function __construct($usuario=null, $contraseña=null)
  {
    $this->usuario = $usuario;
    $this->contraseña = $contraseña;
    
  }

function getUsuario() 
{
return $this->usuario;
}

function getContraseña() 
{
return $this->contraseña;
}

function setUsuario($usuario) 
{ 
$this->usuario = $usuario; 
} 

function setContraseña($contraseña) 
{ 
$this->contraseña = $contraseña; 
} 

}
