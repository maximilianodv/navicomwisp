<div id='form'>
   <form>
          
          <div class='form-group'>
            <div class='form-row'>
               <div class='col-md-1'>
                <label for='exampleInputName'>id</label>

                <input type="text" id="tfIdCliente"    value="" size="4" required />

              </div>

              <div class='col-md-3'>
                <label for='exampleInputName'>Nombre</label>

                <input type="text" id="tfNombre"    value="" size="16" required />

              </div>

              <div class='col-md-4'>
                <label for='exampleInputName'>Paterno</label>
                <input type="text" id="tfPaterno"   value="" size="25" required />
              </div>

              <div class='col-md-4'>
                  <label for='exampleInputName'>Materno</label>
                  <input type="text" id="tfMaterno"   value="" size="25" required />
              </div>

            </div>

          </div>
        

        <div class='form-group'>
            <div class='form-row'>
              <div class='col-md-4'>
                  <label for='exampleInputName'>Ciudad</label>
                  <input type="text" id="tfCiudad"    value="" size="25" required />
              </div>

               <div class='col-md-4'>
                  <label for='exampleInputName'>Colonia</label>
                  <input type="text" id="tfColonia"    value="" size="25" required />
              </div>

              <div class='col-md-4'>
                <label for='exampleInputName'>Calle</label>
                <br>
                  <input type="text" id="tfCalle"     value="" size="25" required />
              </div>

               
            </div>

          </div>

          <div class='form-group'>
            <div class='form-row'>
               
               <div class='col-md-3'>
                  <label for='exampleInputName'>Numero</label>
                  <input type="text" id="tfNumero"    value="" size="17" required />
              </div>
 

              <div class='col-md-4'>
                  <label for='exampleInputName'>Fecha de Nacimiento</label>
                  <input type="text" id="tfFechaNacimiento" value="" size="25" required />
              </div>

              <div class='col-md-8'>
                  <label for='exampleInputName'>Referencias</label>
                  <input type="text" id="tfReferencias" value="" size="60" required />
              </div>


            </div>

          </div>
           <div class='form-group'>
            <div class='form-row'>

              <div class='col-md-1'>
                <label for='exampleInputName'>Cuenta</label>
                <input type="text" id="tfClaveCuenta" value="" size="5" required />                  
              </div>

              <div class='col-md-3'>
                  <label for='exampleInputName'>Telefono</label>
                  <input type="text" id="tfTelefono"  value="" size="17" required />                  
              </div>
                <div class='col-md-4'>
                  <label for='exampleInputName'>Pago Mensual</label>
                  <input type="text" id="tfPagoMesual"    value="" size="25" required />
              </div>

            </div>

          </div>


          <input  type="button" id="btnRegCliente" value="Insertar" class='btn btn-primary btn-block col-md-3' />
                        
        <!--<input  type='button' id='btnRegAlumno' value='Insertar' />-->
    </form>

    
    </div>  
   



<div id="resultados">
<?php
    if(isset($data))
    {
        echo $data;
    } 
    ?>

</div>
   

