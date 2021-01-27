<?php
class ModelLogin extends ConexionBD
{
  public function __construct()
  {
    parent::__construct();
    require_once 'models/login/Login.php';
  }

  public function mostrar(){
    $salida = "";
    return $salida;
  }

  public function validarbase($login){
    $logueado=true;

    //$sql="SELECT * FROM CUENTAS WHERE NombreUsuario='".$login->getUsuario()."' AND Contraseña='".$login->getContraseña()."'";
    $sql="SELECT * FROM CUENTAS,EMPLEADOS WHERE CUENTAS.NombreUsuario='".$login->getUsuario()."' AND CUENTAS.Contraseña='".$login->getContraseña()."' AND CUENTAS.ClaveCuenta=EMPLEADOS.ClaveCuenta";
    //$slq="SELECT * FROM CUENTAS,EMPLEADOS WHERE CUENTAS.NombreUsuario='max' AND CUENTAS.Contraseña="12345" AND CUENTAS.ClaveCuenta=EMPLEADOS.ClaveCuenta";
    $resultSet=$this->conexion->query($sql);

    $row=$resultSet->fetch_array();

    if($row["NombreUsuario"]==$login->getUsuario()){
      //$row["ClaveEmpleado"]=5;
      $logueado=true;
    }

    return $row;
  }
  public function mostrarlogin()
  {

    $salida=
    "
      <section id='portfolio'>
        <div class='container' >

            <div class='ContentForm' >

            <form class='col-md-6 col-md-offset-3'>
                <div class='input-group input-group-lg'>
                  <span class='input-group-addon' id='sizing-addon1'><i class='fa fa-user text-black'></i></span>
                  <input type='user' class='form-control' name='tfUsuario' placeholder='Usuario' id='tfUsuario' aria-describedby='sizing-addon1' required>
                </div>
                <br>
                <div class='input-group input-group-lg'>
                  <span class='input-group-addon' id='sizing-addon1'><i class='fa fa-key'></i></span>
                  <input type='password' name='tfContraseña' class='form-control' placeholder='******' id='tfContraseña' aria-describedby='sizing-addon1' required>
                </div>
                <br>
                <button type='button' class='btn btn-lg btn-primary btn-block btn-signin' id='Ingresar'>Entrar</button>

                <div class='opcioncontra'><a href='>Olvidaste tu contraseña?</a></div>

            </form>
         </div>



        </div>
    </section>
    ";

    return $salida;
  }



}
