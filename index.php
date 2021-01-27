<?php
session_start();

require_once "core/config.php";
require_once "core/ConexionBD.php";
require_once "core/Controller.php";
require_once "core/View.php";
require_once "core/Layout.php";
require "core/Session.php";
if(isset($_GET["controller"]))
{

  $controller=$_GET["controller"];
  require_once "controllers/$controller.php";
}
else
{
	//$controller=ControlLogin;
	$_GET["controller"]='ControlLogin';
  $controller=$_GET["controller"];
  require_once "controllers/$controller.php";
}

$objeto=new $controller();

//session_destroy();


?>
