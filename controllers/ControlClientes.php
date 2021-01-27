<?php
class ControlClientes extends Controller
{
  private $model;
  
  public function __construct()
  {   
    require_once "models/clientes/ModelClientes.php";
    $this->model=new ModelClientes();           
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
      $viewIndex=new View("views/clientes/viewClientes.php",$datos);
    }
  }

  public function registrar()
  {   
    //en minusculas porque se toman las variables de la clase libros y no mayuscula la primer letra porque no se esta tomando de la base de dat
    $cliente=new Clientes($_GET["idcliente"],$_GET["nombre"],$_GET["paterno"],$_GET["materno"],$_GET["ciudad"],$_GET["colonia"],$_GET["calle"],$_GET["numero"],$_GET["telefono"],$_GET["fechanacimiento"],$_GET["referencias"],$_GET["clavecuenta"]);
   
    $this->model->insertar($cliente);
    $this->mostrar();
  }

  public function mostrarmodificar()
  {
    //matr=clavemp
    echo $this->model->mostrarmod($_GET["idcliente"]);
  }
  public function modificar()
  {
   $cliente=new Cliente($_GET["idcliente"],$_GET["nombre"],$_GET["paterno"],$_GET["materno"],$_GET["ciudad"],
    $_GET["colonia"],$_GET["calle"],$_GET["numero"],$_GET["telefono"],$_GET["fechanacimiento"],$_GET["referencias"],$_GET["clavecuenta"]);
    
    $this->model->modificar($cliente);
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
    $empleado=new Cliente($_GET["idcliente"]);
    $this->model->eliminar($cliente);
    $this->mostrar();    
  }
}