 <?php
 //error_reporting(0);
class Controlrentas extends Controller
{
  private $model;

  public function __construct()
  {
    require_once "models/rentas/ModelRentas.php";
    $this->model=new ModelRentas();
    parent::__construct();

  }
 public function index()
  {
    $datos["form"]= $this->model->mostrar();
    $datos["cbclientes"]=$this->model->showcomboclientes();
    $datos["tabla"]=$this->model->tabladatos();
    $viewIndex=new View("views/rentas/viewRentas.php",$datos);
  }
  public function mostrartotalsuma()
  {
    echo $this->model->mostrartotalsuma($_GET["total2"]);
  }
  public function registrar()
  {
    $sesion=Session::get_SESSION();
    $renta=new Renta($_GET["idpago"],$_GET["idcliente"],$_GET["fechapago"],$_GET["mesespagados"],$sesion["ClaveEmpleado"],$_GET["totalpagado"]);
    $this->model->insertar($renta);
  }
   public function registrardetalle()
  {
    $sesion=Session::get_SESSION();
    $detallerenta=new DetalleRenta($_GET["numpago"],$_GET["idpago"],$_GET["pagomensual"],$_GET["fechainicio"],
    $_GET["fechavencida"],$_GET["observaciones"]);
    $this->model->insertardetallerenta($detallerenta);
    $this->mostrar();
    //echo $sesion["ClaveEmpleado"];
  }
  public function mostrartotal()
  {
    echo $this->model->mostrartotal($_GET["idcliente"],$_GET["meses_a_pagar"]);
  }
  public function detalleporpago()
  {
    echo $this->model->detallespagos($_GET["idpago"]);
  }
  public function volverdetalles()
  {
    echo $this->model->volverpagoscliente($_GET["idpago"]);
  }
  public function mostrarcliente()
  {
    $sesion=Session::get_SESSION();

    $resultado =$this->model->mostrarPagoCliente($_GET["idcliente"],$sesion["ClaveEmpleado"]);
    echo json_encode($resultado);
    //echo $resultado;
  }
  public function mostrardetalles()
  {
    echo $this->model->mostrardetalles($_GET["idcliente"],$_GET["npagos"]);

  }
  public function eliminar()
  {
    $alumno=new Alumno($_GET["matricula"]);
    $this->model->eliminar($alumno);
    $this->mostrareliminar();
  }
  public function mostrarmodificar()
  {
    echo $this->model->mostrarmod($_GET["matr"]);
  }
  public function modificar()
  {
    $alumno=new Alumno($_GET["matricula"],$_GET["nombre"],$_GET["paterno"],$_GET["materno"]);
    $this->model->modificar($alumno,$_GET["matriculaold"]);
  }

  public function mostrar()
  {

    echo $this->model->mostrar();
  }

  public function mostrareliminar()
  {
    echo $this->model->actualizareliminar();
  }

}
