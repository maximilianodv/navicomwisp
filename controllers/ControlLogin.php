<?php

class ControlLogin extends Controller
{
  public function __construct()
  {
    //Session::destroy();
    require_once "models/login/ModelLogin.php";
    $this->model=new ModelLogin();
    parent::__construct();
  }

  public function index(){
    $viewIndex=new View("views/login/index.html");
  }
  public function hola(){
  
    echo json_encode($respuesta);
  }

  public function mostrarIndex(){
    echo $this->model->mostrar();
  }

  public function validar(){
   // Session::start();
    

    $login=new Login($_POST["usuario"],$_POST["password"]);
    //print_r($login);

    /*$respuesta["1"]=$login->getUsuario();
    $respuesta["2"]=$login->getContraseña();*/
    $sql=$this->model->validarbase($login);
    $respuesta["resultado"]="0";
    /*$respuesta["4"]=gettype($sql["NombreUsuario"]);
    $respuesta["5"]=gettype($login->getUsuario());*/

    if($sql["NombreUsuario"]===$login->getUsuario()){
      Session::setSession("usuario",$sql["NombreUsuario"]);
      if($sql["TipoUsuario"]=="Admin"||$sql["TipoUsuario"]=="Empleado"){
          Session::setSession("ClaveEmpleado",$sql["ClaveEmpleado"]);
      }else{
          Session::setSession("Cliente",null);
      }
      $respuesta["resultado"]="1";
      //$respuesta["control"]="ControlAdminLTE";
    }
    /*if($iflogin){
      Session::setSession("usuario",$_POST["usuario"]);
      echo json_encode($respuesta);
    }*/
    echo json_encode($respuesta);

  }

  public function cerrar(){
    Session::destroy();

  }
}
