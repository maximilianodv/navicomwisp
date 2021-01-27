<?php

class ControlUsuarios extends Controller
{
  private $model;
  
  public function __construct()
  {
    require_once "models/usuarios/ModelUsuarios.php";
    $this->model=new ModelUsuarios();          
    parent::__construct();
  }

  public function index()
  {
    $datos=$this->model->mostrar();
    $view=new View("views/usuarios/viewUsuarios.php",$datos);
  }
  public function registrar()
  {   
    
    $usuario=new Usuario($_GET["id"],$_GET["login"],$_GET["password"],$_GET["nombreu"]);

    $this->model->insertar($usuario);

    $this->mostrar();
  }

  public function mostrar()
  {
    echo $this->model->mostrar();
  }
   public function modificarUsuario()
  {
     $usuario=new Usuario($_GET["id"],$_GET["login"],$_GET["password"],$_GET["nombreu"]);
    $this->model->modificar($usuario,$_GET["idold"]);
    echo $this->model->mostrarActualizacion($usuario);
  }
   public function mostrarmodificar()
  {
    echo $this->model->mostrarmod($_GET["id"]);
  }
}
