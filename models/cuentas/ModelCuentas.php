<?php
class ModelCuentas extends ConexionBD
{
  public function __construct() 
  {
    parent::__construct();
    require_once 'models/cuentas/Cuenta.php';
  }
    
  public function mostrar()
  { 
    $resultSet=$this->conexion->query("SELECT * FROM CUENTAS");
    $salida = "
    <table border=\"1\">
    <thead>
      <tr>
        <th>ClaveCuenta</th>
        <th>NombreUsuario</th>
        <th>Contraseña</th>
        <th>Estado</th>
        <th>TipoUsuario</th>
      </tr>
    </thead>
    <tbody>";
      while($row = $resultSet->fetch_array()) 
      {
        $clavec=$row["ClaveCuenta"];
        $nombreu=$row["NombreUsuario"];
        $password=$row["Contraseña"];
        $estado=$row["Estado"];
        $tipou=$row["TipoUsuario"];
        $salida .= "
        <tr>
          <td>$clavec</td>
          <td>$nombreu</td>
          <td>$password</td>
          <td>$estado</td>
          <td>$tipou</td>
          <td>
            <button type='button' data-clavec='$clavec' id='btnEditarcuenta'>Editar</button>
            <button type='button' data-clavec='$clavec' class='btnEliminarcuenta'>Eliminar</button>
          </td>            
        </tr>";
      }  
    $salida .= "</tbody></table>";    
    return $salida;
  }

    public function mostrarmod($matr=null)
  { 
   
    $this->clavec=$matr;
    
    $resultSet=$this->conexion->query("SELECT * FROM CUENTAS");
  
    $salida="";
    $salida1 = "
    <table border=\"1\">
    <thead>
      <tr>
        <th>ClaveCuenta</th>
        <th>NombreUsuario</th>
        <th>password</th>
        <th>Estado</th>
        <th>TipoUsuario</th>
      </tr>
    </thead>
    <tbody>";
     while($row = $resultSet->fetch_array()) 
      {
        $clavec=$row["ClaveCuenta"];
        $nombreu=$row["NombreUsuario"];
        $password=$row["Contraseña"];
        $estado=$row["Estado"];
        $tipou=$row["TipoUsuario"];
        $salida1 = "
            <table border=\"1\">
            <thead>
              <tr>
        <th>ClaveCuenta</th>
        <th>NombreUsuario</th>
        <th>Contraseña</th>
        <th>Estado</th>
        <th>TipoUsuario</th>
              </tr>
            </thead>
            <tbody>";
        if ($clavec==$this->clavec)
        {
          $salida .= "
        <tr>
          <td>$clavec</td>
          <td><input type='text' id='tfNombreEd'    value='$nombreu' size='auto' required /></td>
          <td><input type='text' id='tfContraseñaEd'   value='$password' size='auto' required /></td>
          <td><input type='text' id='tfEstadoEd'   value='$estado' size='auto' required /></td>
          <td><input type='text' id='tfTipoEd'   value='$tipou' size='auto' required /></td>
        <td>
            <button type='button' data-clavec='$clavec' id='btnActualizarcuenta' >Actualizar</button>
            <button type='button' data-clavec='$clavec' id='btnCancelarcuenta'>Cancelar</button>
          </td>            
        </tr>";
        }
        else
        {
        $salida .= "
        <tr>
        <th>clavec</th>
        <th>nombreu</th>
        <th>password</th>
        <th>estado</th>
        <th>tipou</th>
          <td>
            <button type='button' data-clavec='$clavec' id='btnEditarcuenta'>Editar</button>
            <button type='button' data-clavec='$clavec' class='btnEliminarcuenta'>Eliminar</button>
          </td>            
        </tr>";
        }
      }  



    $salida .= "</tbody></table>";    
    return $salida1.$salida;




  }
  public function cargascript()
  {

    return "<script src='recursos/jquery/jquery-1.7.1.min.js'></script>
            <script src='recursos/js/sistema.js'></script> ";
  }

  public function insertar($cuenta)
  {

    $insertar="INSERT INTO CUENTAS VALUES('".$cuenta->getClaveCuenta()."','"
                                            .$cuenta->getNombreUsuario()."','"
                                            .$cuenta->getContraseña()."','"
                                            .$cuenta->getEstado()."','"
                                            .$cuenta->getTipoUsuario()."')";
    $this->conexion->query($insertar);        
  } 


  public function eliminar($cuenta)
  {
  $delete="DELETE FROM CUENTAS WHERE ClaveCuenta='".$cuenta->getClaveCuenta()."'";
   $this->conexion->query($delete);
  }       

   public function modificar($cuenta)
  {
    $update="UPDATE CUENTAS SET NombreUsuario='".$cuenta->getNombreUsuario()."',NombreUsuario='"
                                          .$cuenta->getContraseña()."',Contraseña='"
                                          .$cuenta->getEstado()."',Estado='"
                                          .$cuenta->getTipoUsuario()."'
                        WHERE ClaveCuenta='".$cuenta->getClaveCuenta()."'";


    $this->conexion->query($update);        
  }  
  public function promedios()
  {
     return "no que no";
  } 
  
  public function __destruct() 
  {
      $this->conexion->close();    
  }
}
