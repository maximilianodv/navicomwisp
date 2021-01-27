<?php
class ModelClientes extends ConexionBD
{
  public function __construct() 
  {
    parent::__construct();
    require_once 'models/clientes/Clientes.php';
  }
    
  public function mostrar()
  { 
    $resultSet=$this->conexion->query("SELECT * FROM CLIENTES");
    $salida = "<div class='card mb-3'>
        <div class='card-header'>
          <i class='fa fa-table'></i>Empleados</div>
        <div class='card-body'>
          <div class='table-responsive'>
    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
    <thead>
      <tr>
        <th>ClaveCliente</th>
        <th>Nombre</th>
        <th>Paterno</th>
        <th>Materno</th>
        <th>Ciudad</th>
        <th>Colonia</th>
        <th>Calle</th>
        <th>Numero</th>
        <th>Estado</th>
        <th>Telefono</th>
        <th>Fechadenacimiento</th>
        <th>Referencias</th>
        <th>ClaveCuenta</th>
      </tr>
    </thead>
    <tbody>";
      while($row = $resultSet->fetch_array()) 
      {
        $idcliente=$row["IdCliente"];
        $nombre=$row["Nombre"];
        $paterno=$row["Paterno"];
        $materno=$row["Materno"];
        $ciudad=$row["Ciudad"];
        $colonia=$row["Colonia"];
        $calle=$row["Calle"];
        $numero=$row["Numero"];
        $telefono=$row["Telefono"];
        $fechanacimiento=$row["FechaNacimiento"];
        $referencias=$row["Referencias"];
        $clavecuenta=$row["ClaveCuenta"];
        $salida .= "
        <tr>
        <th>$idcliente</th>
        <th>$nombre</th>
        <th>$paterno</th>
        <th>$materno</th>
        <th>$ciudad</th>
        <th>$colonia</th>
        <th>$calle</th>
        <th>$numero</th>
        <th>$telefono</th>
        <th>$fechanacimiento</th>
        <th>$referencias</th>
        <th>$clavecuenta</th>
        <td>
            <button type='button' data-idcliente='$idcliente' id='btnEditarCliente'>Editar</button>
            <button type='button' data-idcliente='$idcliente' class='btnEliminarCliente'>Eliminar</button>
          </td>            
        </tr>";
      }
    $salida .= "</tbody></table>

    
    </div>
        </div>
        
      </div>
    ";    
    return $salida;
  }

    public function mostrarmod($matr=null)
  { 
   
    $this->idcliente=$idcl;
    
    $resultSet=$this->conexion->query("SELECT * FROM CLIENTES");
  
    $salida="";
    $salida1 = "
    <table border=\"1\">
    <thead>
      <tr>
        <th>ClaveCliente</th>
        <th>Nombre</th>
        <th>Paterno</th>
        <th>Materno</th>
        <th>Ciudad</th>
        <th>Colonia</th>
        <th>Calle</th>
        <th>Numero</th>
        <th>Telefono</th>
        <th>Fechadenacimiento</th>
        <th>Referencias</th>
        <th>ClaveCuenta</th>
      </tr>
    </thead>
    <tbody>";
     while($row = $resultSet->fetch_array()) //aqui sigo
      {
          $idcliente=$row["IdCliente"];
          $nombre=$row["Nombre"];
          $paterno=$row["Paterno"];
          $materno=$row["Materno"];
          $ciudad=$row["Ciudad"];
          $colonia=$row["Colonia"];
          $calle=$row["Calle"];
          $numero=$row["Numero"];
          $telefono=$row["Telefono"];
          $fechadenacimiento=$row["Fechadenacimiento"];
          $referencias=$row["Referencias"];
          $clavecuenta=$row["Clavecuenta"];
          $salida1 = "
            <table border=\"1\">
            <thead>
              <tr>
                <th>ClaveCliente</th>
                <th>Nombre</th>
                <th>Paterno</th>
                <th>Materno</th>
                <th>Ciudad</th>
                <th>Colonia</th>
                <th>Calle</th>
                <th>Numero</th>
                <th>Telefono</th>
                <th>Fechadenacimiento</th>
                <th>Referencias</th>
                <th>ClaveCuenta</th>
              </tr>
            </thead>
            <tbody>";
        if ($idcliente==$this->idcliente)
        {
          $salida .= "
        <tr>
        <td>$idcliente</td>

        <td><input type='text' id='tfIdCliente'  value='$idcliente' size='1px' required /></td>
        <td><input type='text' id='tfNombre'   value='$nombre' size='auto' required /></td>
        <td><input type='text' id='tfPaterno'  value='$paterno' size='auto' required /></td>
        <td><input type='text' id='tfMaterno'  value='$materno' size='auto' required /></td>
        <td><input type='text' id='tfCiudad'   value='$ciudad' size='auto' required /></td>
        <td><input type='text' id='tfColonia'  value='$colonia' size='auto' required /></td>
        <td><input type='text' id='tfCalle'    value='$calle' size='auto' required /></td>
        <td><input type='text' id='tfNumero'   value='$numero' size='auto' required /></td>
        <td><input type='text' id='tfEstado'   value='$estado' size='auto' required /></td>
        <td><input type='text' id='tfTelefono' value='$telefono' size='auto' required /></td>
        <td><input type='text' id='tfFechaNacimiento'   value='$estado' size='auto' re<td><input type='text' id='tfTelefono' value='$telefono' size='auto' required /></td>quired /></td>
        <td><input type='text' id='tfReferencias' value='$referencias' size='auto' required /></td>
        <td><input type='text' id='tfClaveCuenta' value='$referencias' size='auto' required /></td>
        <td>
            <button type='button' data-matricula='$matricula' id='btnEditarcliente' >Actualizar</button>
            <button type='button' data-matricula='$matricula' id='btnEliminarcliente'>Cancelar</button>
          </td>            
        </tr>";
        }
        else
        {
        $salida .= "
        <tr>
             <th>ClaveCliente</th>
                <th>Nombre</th>
                <th>Paterno</th>
                <th>Materno</th>
                <th>Ciudad</th>
                <th>Colonia</th>
                <th>Calle</th>
                <th>Numero</th>
                <th>Telefono</th>
                <th>Fechadenacimiento</th>
                <th>Referencias</th>
                <th>ClaveCuenta</th>
            <button type='button' data-matricula='$matricula' id='btnEditarCliente'>Editar</button>
            <button type='button' data-matricula='$matricula'class='btnEliminarEmpleado'>Eliminar</button>
          </td>            
        </tr>";
        }
      }  
    $salida .= "</tbody></table>";    
    return $salida1.$salida;
  }
 
  public function insertar($cliente)
  {

    $insertar="INSERT INTO CLIENTES VALUES('".$cliente->getIdCliente()."','"
                                            .$cliente->getNombre()."','"
                                            .$cliente->getPaterno()."','"
                                            .$cliente->getMaterno()."','"
                                            .$cliente->getCiudad()."','"
                                            .$cliente->getColonia()."','"
                                            .$cliente->getCalle()."','"
                                            .$cliente->getNumero()."','"
                                            .$cliente->getTelefono()."','"
                                            .$cliente->getFechaNacimiento()."','"
                                            .$cliente->getReferencias()."','"
                                            .$cliente->getClaveCuenta()."')";
    $this->conexion->query($insertar);        
  } 
   public function eliminar($cliente)
  {
    $delete="DELETE FROM CLIENTES WHERE ClaveCliente='".$cliente->getIdCliente()."'";
    $this->conexion->query($delete);        
  }         
   public function modificar($cliente)
  {
    $insertar="UPDATE CLIENTES SET ClaveCliente='".$cliente->getIdCliente()."',Nombre='"
                                            .$cliente->getNombre()."',Paterno'"
                                            .$cliente->getPaterno()."',Materno'"
                                            .$cliente->getMaterno()."',Ciudad='"
                                            .$cliente->getCiudad()."',Colonia='"
                                            .$cliente->getColonia()."',Calle='"
                                            .$cliente->getCalle()."',Numero='"
                                            .$cliente->getNumero()."',Estado='"
                                            .$cliente->getTelefono()."',Telefono='"
                                            .$cliente->getFechaNacimiento()."',Referencias='"
                                            .$cliente->getReferencias()."','"
                                            .$cliente->getClaveCuenta()."')";

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
