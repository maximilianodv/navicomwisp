<?php

class ControlCuentas extends Controller
{
  private $model;
  
  public function __construct()
  {
    require_once "models/cuentas/ModelCuentas.php";
    $this->model=new ModelCuentas();          
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
      $datos=$this->model->mostrar();
    $view=new View("views/cuentas/viewCuentas.php",$datos);  
    }
    
  }
  public function registrar()
  {   
    
    $cuenta=new Cuenta($_GET["clavec"],$_GET["nombreu"],$_GET["password"],$_GET["estado"],$_GET["tipou"]);

    $this->model->insertar($cuenta);

    $this->mostrar();
  }

  public function mostrar()
  {
    echo $this->model->mostrar();
  }
   public function modificarCuenta()
  {
    $cuenta=new Cuenta($_GET["clavec"],$_GET["nombreu"],$_GET["password"],$_GET["estado"],$_GET["tipou"]);
    $this->model->modificar($cuenta,$_GET["idold"]);
    echo $this->model->mostrarActualizacion($cuenta);
  }
   public function mostrarmodificar()
  {
    echo $this->model->mostrarmod($_GET["clavec"]);
  }
}
