<?php
class ControlEmpleados extends Controller
{
  private $model;
  
  public function __construct()
  {   
    require_once "models/empleados/ModelEmpleados.php";
    $this->model=new ModelEmpleados();           
    parent::__construct();           
  }

  public function index()
  {    
    if($_SESSION['usuario']==null||$_SESSION['usuario']=='')
    {

      echo "<h1>No se ha logeado</h1>";

    }
    else
    {
      $datos= $this->model->mostrar();
      $viewIndex=new View("views/empleados/viewEmpleados.php",$datos);
    }
  }

  public function registrar()
  {   
    //en minusculas porque se toman las variables de la clase libros y no mayuscula la primer letra porque no se esta tomando de la base de dat
    $empleado=new Empleado($_GET["clavemp"],$_GET["clavcue"],$_GET["nombre"],$_GET["paterno"],$_GET["materno"],$_GET["ciudad"],
    $_GET["colonia"],$_GET["calle"],$_GET["numero"],$_GET["estado"],$_GET["telefono"],$_GET["referencias"]);
   
    $this->model->insertar($empleado);
    $this->mostrar();
  }

  public function mostrarmodificar()
  {
    //matr=clavemp
    echo $this->model->mostrarmod($_GET["clavem"]);
  }
  public function modificar()
  {
     $empleado=new Empleado($_GET["clavemp"],$_GET["clavecue"],$_GET["nombre"],$_GET["paterno"],$_GET["materno"],$_GET["ciudad"],
       $_GET["colonia"],$_GET["calle"],$_GET["estado"],$_GET["numero"],$_GET["telefono"],$_GET["referencias"]);
    
    $this->model->modificar($empleado);
    echo $this->model->mostrar();
  }

  public function scrips()
  {

    $this->model->cargascrip();
  }

  public function mostrar()
  {
    echo $this->model->mostrar();
  }

  public function promedios()
  {
    echo $this->model->promedios();
  }
  public function eliminar()
  {
    $empleado=new Empleado($_GET["clavemp"]);
    $this->model->eliminar($empleado);
    $this->mostrar();    
  }


}
