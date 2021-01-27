<?php

class Controller
{  
  public function __construct()
  {
    if(isset($_GET["action"]))
    {
      $action=$_GET["action"];
      if(method_exists($this, $action))
        $this->$action();
      else
        die("Método: $action, no implementado.<br>");
    }
    else
      if(method_exists($this, "index"))
        $this->index();
      else
        die("Método: \"index\" no implementado.<br>");
  }
}
