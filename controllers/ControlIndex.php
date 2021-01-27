<?php

class ControlIndex extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $viewIndex=new View("views/index/viewIndex.php");
    
  }
}
