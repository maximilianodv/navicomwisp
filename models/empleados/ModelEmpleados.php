<?php
class ModelEmpleados extends ConexionBD
{
  public function __construct() 
  {
    parent::__construct();
    require_once 'models/empleados/Empleado.php';
  }
    
  public function mostrar()
  { 
    $resultSet=$this->conexion->query("SELECT * FROM EMPLEADOS");
    $salida = "
       <div class='card mb-3'>
        <div class='card-header'>
          <i class='fa fa-table'></i>Empleados</div>
        <div class='card-body'>
          <div class='table-responsive'>
    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
    <thead>
      <tr>
        <th>ClaveEmpleado</th>
        <th>ClaveCuenta</th>
        <th>Nombre</th>
        <th>Paterno</th>
        <th>Materno</th>
        <th>Ciudad</th>
        <th>Colonia</th>
        <th>Calle</th>
        <th>Numero</th>
        <th>Estado</th>
        <th>Telefono</th>
        <th>Referencias</th>  
      </tr>
    </thead>
    <tbody>";
      while($row = $resultSet->fetch_array()) 
      {
        $clavemp=$row["ClaveEmpleado"];
        $clavcue=$row["ClaveCuenta"];
        $nombre=$row["Nombre"];
        $paterno=$row["Paterno"];
        $materno=$row["Materno"];
        $ciudad=$row["Ciudad"];
        $colonia=$row["Colonia"];
        $calle=$row["Calle"];
        $numero=$row["Numero"];
        $estado=$row["Estado"];
        $telefono=$row["Telefono"];
        $referencias=$row["Referencias"];
        $salida .= "
        
        <tr>
          <td>$clavemp</td>
          <td>$clavcue</td> 
          <td>$nombre</td> 
          <td>$materno</td> 
          <td>$paterno</td>
          <td>$ciudad</td>
          <td>$colonia</td> 
          <td>$calle</td> 
          <td>$numero</td> 
          <td>$estado</td>
          <td>$telefono</td> 
          <td>$referencias</td>

           <td>
            <button type='button' data-clavemp='$clavemp' id='btnEditarEmpleado'>Editar</button>
            <button type='button' data-clavemp='$clavemp' class='btnEliminarEmpleado'>Eliminar</button>
          </td>            
        </tr>";
      }  
    $salida .= "</tbody></table>

    </div>
        </div>
        
      </div>";    
    return $salida;
  }

    public function mostrarmod($clavem=null)
  { 
   
    $this->clavemp=$clavem;
    
    $resultSet=$this->conexion->query("SELECT * FROM EMPLEADOS");
  
    $salida="";
    $salida1 = "
    <table border=\"1\">
    <thead>
      <tr>
        <th>ClaveEmpleado</th>
        <th>ClaveCuenta</th>
        <th>Nombre</th>
        <th>Paterno</th>
        <th>Materno</th>
        <th>Ciudad</th>
        <th>Colonia</th>
        <th>Calle</th>
        <th>Numero</th>
        <th>Estado</th>
        <th>Telefono</th>
        <th>Referencias</th>
       </td> 
      </tr>
    </thead>
    <tbody>";
     while($row = $resultSet->fetch_array()) 
      {
        $clavemp=$row["ClaveEmpleado"];
        $clavcue=$row["ClaveCuenta"];
        $nombre=$row["Nombre"];
        $paterno=$row["Paterno"];
        $materno=$row["Materno"];
        $ciudad=$row["Ciudad"];
        $colonia=$row["Colonia"];
        $calle=$row["Calle"];
        $numero=$row["Numero"];
        $estado=$row["Estado"];
        $telefono=$row["Telefono"];
        $referencias=$row["Referencias"];
        $salida1 = "
            <table border=\"1\">
            <thead>
             <tr>
          <th>ClaveEmpleado</th>
          <th>ClaveCuenta</th>
          <th>Nombre</th>
          <th>Paterno</th>
          <th>Materno</th>
          <th>Ciudad</th>
          <th>Colonia</th>
          <th>Calle</th>
          <th>Numero</th>
          <th>Estado</th>
          <th>Telefono</th>
          <th>Referencias</th>
              </tr>
            </thead>
            <tbody>";
        if ($clavemp==$this->clavemp)
        {
          $salida .= "
        <tr>
          <td>$clavemp</td>
     
     <td><input type='text' id='tfClaveCuentaEd'    value='$clavcue' size='1px' required /></td>
     <td><input type='text' id='tfNombreEd'   value='$nombre' size='auto' required /></td>
     <td><input type='text' id='tfPaternoEd'   value='$paterno' size='auto' required /></td>
     <td><input type='text' id='tfMaternoEd'  value='$materno' size='auto' required /></td>
     <td><input type='text' id='tfCiudadEd'    value='$ciudad' size='auto' required /></td>
     <td><input type='text' id='tfColoniaEd'   value='$colonia' size='auto' required /></td>
     <td><input type='text' id='tfCalleEd'   value='$calle' size='auto' required /></td>
     <td><input type='text' id='tfNumeroEd'   value='$numero' size='auto' required /></td>
     <td><input type='text' id='tfEstadoEd'   value='$estado' size='auto' required /></td>
     <td><input type='text' id='tfTelefonoEd'   value='$telefono' size='auto' required /></td>
     <td><input type='text' id='tfReferenciasEd'   value='$referencias' size='auto' required /></td>
     <td>

      <button type='button' data-clavemp='$clavemp' id='btnActualizarempleado' >Actualizar</button>
      <button type='button' data-clavemp='$clavemp' id='btnCancelarempleado'>Cancelar<button>
          </td>            
        </tr>";
        }
        else
        {
        $salida .= "
        <tr>
          <td>$clavemp</td>
          <td>$clavcue</td> 
          <td>$nombre</td> 
          <td>$materno</td> 
          <td>$paterno</td>
          <td>$ciudad</td>
          <td>$colonia</td> 
          <td>$calle</td> 
          <td>$numero</td> 
          <td>$estado</td>
          <td>$telefono</td> 
          <td>$referencias</td>
            <button type='button' data-clavemp='$clavemp' id='btnEditarempleado'>Editar</button>
            <button type='button' data-clavemp='$clavemp' class='btnEliminarempleado'>Eliminar</button>
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

  public function insertar($empleado)
  {

    $insertar="INSERT INTO EMPLEADOS VALUES('".$empleado->getClaveEmpleado()."','"
                                              .$empleado->getNombre()."','"
                                              .$empleado->getPaterno()."','"
                                            .$empleado->getMaterno()."','"
                                            .$empleado->getCiudad()."','"
                                            .$empleado->getColonia()."','"
                                            .$empleado->getCalle()."','"
                                            .$empleado->getNumero()."','"
                                            .$empleado->getEstado()."','"
                                            .$empleado->getTelefono()."','"
                                            .$empleado->getReferencias()."','"
                                            .$empleado->getClaveCuenta()."')";
    $this->conexion->query($insertar);        
  }        
   public function eliminar($empleado)
  {
    $delete="DELETE FROM EMPLEADOS WHERE ClaveEmpleado='".$empleado->getClaveEmpleado()."'";
    $this->conexion->query($delete);        
  }  
  
   public function modificar($empleado)
  {
    $update="UPDATE EMPLEADOS SET ClaveCuenta='".$empleado->getClaveCuenta()."',Nombre='"
                                            .$empleado->getNombre()."',Paterno'"
                                            .$empleado->getPaterno()."',Materno'"
                                            .$empleado->getMaterno()."',Ciudad='"
                                            .$empleado->getCiudad()."',Colonia='"
                                            .$empleado->getColonia()."',Calle='"
                                            .$empleado->getCalle()."',Numero='"
                                            .$empleado->getNumero()."',Estado='"
                                            .$empleado->getEstado()."',Telefono='"
                                            .$empleado->getTelefono()."',Referencias='"
                                            .$empleado->getReferencias()."'
                                          
                        WHERE ClaveEmpleado='".$empleado->getClaveEmpleado()."'";


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
