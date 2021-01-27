<?php
class View
{
	public function __construct($view, $data=null)
	{
		if(file_exists($view))
			require_once($view);
		else
			die("La vista: $view, no ha sido encontrada");
	}
}
?>