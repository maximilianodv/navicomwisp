<?php
class Layout
{
  public function __construct($view, $data = null)
  {
    if(file_exists($view))
    {
      $this->index($view,$data);
    }
    else
    {
      die("La vista: \"$view\" no existe");
    }
  }

  public function index($view,$data=null)
  {
    require("config.php");  //con require_once no funciona
    if(file_exists($header))
      require_once($header);
    else
      die("Encabezado no encontrado");
    require_once($view);
    if(file_exists($footer))
      require_once($footer);
    else
      die("Pie no encontrado");
  }
}
