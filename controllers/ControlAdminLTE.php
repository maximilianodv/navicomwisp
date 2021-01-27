<?php

class ControlAdminLTE extends Controller
{
  public function __construct()
  {
    
    $sesion=Session::get_SESSION();
    if(isset($sesion["usuario"]))
		{
			parent::__construct();
      //echo "<h1>".$sesion["usuario"]."</h1>";
		}
    else{
      $viewIndex=new View("views/login/index.html");
    }

  }


  public function index(){

    //$viewIndex=new View("views/PruebaAdmin1/index.php");
    $viewIndex=new View("views/Admin/index.php");
  }
   public function mostrarIndex()
  {
    echo $this->model->mostrar();
  }
}
