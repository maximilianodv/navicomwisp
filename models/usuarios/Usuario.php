<?php
class Usuario
{
  private $id;
  private $login;
  private $password;
  private $nombre;
  
  public function __construct($id=null, $login=null, $password=null,$nombre=null)
  {
    $this->id = $id;
    $this->login = $login;
    $this->password= $password;
    $this->nombre = $nombre;
    
  }

  function getId() 
  {
    return $this->id;
  }

  function getLogin() 
  {
    return $this->login;
  }
  function getPassword() 
  {
    return $this->password;
  }
  function getNombre() 
  {
    return $this->nombre;
  }

  function setId($id) 
  {
    $this->id = $id;
  }
  function setLogin($login) 
  {
    $this->login= $login;
  }
  function setPassword($password) 
  {
    $this->password = $password;
  }
  function setNombre($nombre) 
  {
    $this->nombre = $nombre;
  }
  
}
