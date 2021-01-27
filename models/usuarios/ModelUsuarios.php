<?php
class ModelUsuarios extends ConexionBD
{
  public function __construct() 
  {
    parent::__construct();
    require_once 'models/usuarios/Usuario.php';
  }

  public function mostrar()
  { 
    $resultSet=$this->conexion->query("SELECT * FROM USUARIOS");
    $salida = "
    <table border=\"1\">
    <thead>
      <tr>
        <th>Id</th>
        <th>Login</th>
        <th>Password</th>
        <th>Nombre</th>
      </tr>
    <thead>
    <tbody>";
    while($row = $resultSet->fetch_array()) 
      {
        $id=$row[0];
        $login=$row[1];
        $password=$row[2];
        $Nombre=$row[3];

        $salida .= "
        <tr id=$id >
          <td>$id</td>
          <td>$login</td>
          <td>$password</td>
          <td>$Nombre</td>  
          <td>
            <button type='button' data-id='$id' class='btnEditarU'>Editar</button>
            <button type='button' data-id='$id' class='btnEliminarU'>Eliminar</button>
          </td>            
        </tr>";
      }  
    $salida .= "</tbody></table>";    

    return $salida;
  }  
  public function insertar($usuario)
  {
    $insertar="INSERT INTO USUARIOS VALUES ('".$usuario->getId()."','".
                                            $usuario->getLogin()."','".
                                            $usuario->getPassword()."','".
                                            $usuario->getNombre()."')";
    $this->conexion->query($insertar);
  }
    public function mostrarmod($id=null)
  { 
   
    $this->id=$id;
    $resultSet=$this->conexion->query("SELECT * FROM USUARIOS WHERE Id='$id'");
  
    $salida="";
     while($row = $resultSet->fetch_array()) 
      {
        $id=$row[0];
        $login=$row[1];
        $password=$row[2];
        $nombre=$row[3];

          $salida .= "
        
          <td><input type='text' id='tfIdU' value='$id' size='auto' required /></td>
          <td><input type='text' id='tfLoginU'    value='$login' size='auto' required /></td>
          <td><input type='text' id='tfPasswordU'   value='$password' size='auto' required /></td>
          <td><input type='text' id='tfNombreUEd'   value='$nombre' size='auto' required /></td>
        <td>
            <button type='button' data-id='$id' id='btnActualizarU' >Actualizar</button>
            <button type='button' data-id='$id' id='btnCancelarU'>Cancelar</button>
          </td>            
        ";    
      }  
       
    return $salida;
  }
    public function mostrarActualizacion($usuario)
  { 
   
    $salida = "";
    $id=$usuario->getId();
    $login= $usuario->getLogin();
    $password=$usuario->getPassword();
    $nombre= $usuario->getNombre();
    $salida .= "
          <td>$id</td>
          <td>$login</td>
          <td>$password</td>
          <td>$nombre</td>  
          <td>
            <button type='button' data-id='$id' class='btnEditarU'>Editar</button>
            <button type='button' data-id='$id' class='btnEliminarU'>Eliminar</button>
          </td>            
        ";           
       
    return $salida;
  }
   public function modificar($usuario,$idold)
  {


    $update="UPDATE USUARIOS SET   Id='".$usuario->getId()."',
                                  Login='".$usuario->getLogin()."',
                                    Password='".$usuario->getPassword()."',
                                    Nombre='".$usuario->getNombre()."'
                        WHERE Id='".$idold."'";
    $this->conexion->query($update);        
  } 
}
