
       
        <div id='form'>
   <form>
          
          <div class='form-group'>
            <div class='form-row'>
              <div class='col-md-3'>
                <label for='exampleInputName'>ClaveEmpleado</label>
                
                <input type="text" class='form-control' id="tfClaveEmpleado" value="" size="30" required />

              </div>

              <div class='col-md-3'>
                <label for='exampleInputLastName'>Cuenta</label>
                <input type="text" class='form-control'  id="tfClaveCuenta"  value="" size="30" required />
              </div>

              <div class='col-md-3'>
                <label for='exampleInputLastName'>Nombre</label>
                <input type="text" class='form-control' id="tfNombre"    value="" size="30" required />
              </div>

               <div class='col-md-3'>
                <label for='exampleInputLastName'>Paterno</label>
                <input type="text" class='form-control' id="tfPaterno"   value="" size="30" required />
              </div>

            </div>

          </div>

          <div class='form-group'>
               <div class='form-row'>
              <div class='col-md-3'>
                 <label for='exampleInputName'>Materno</label>
                 <input type="text" class='form-control' id="tfMaterno"   value="" size="30" required />
              </div>

              <div class='col-md-3'>
                <label for='exampleInputLastName'>Ciudad</label>
                <input type="text" class='form-control' id="tfCiudad"     value="" size="30" required />
              </div>

              <div class='col-md-3'>
                <label for='exampleInputLastName'>Colonia</label>
                <input type="text" class='form-control' id="tfColonia"  value="" size="30" required />
              </div>

               <div class='col-md-3'>
                <label for='exampleInputLastName'>Calle</label>
                <input type="text" class='form-control' id="tfCalle"    value="" size="30" required />
              </div>

            </div>
          </div>

          <div class='form-group'>
               <div class='form-row'>
              <div class='col-md-3'>
                 <label for='exampleInputName'>Numero</label>
                 <input type="text" class='form-control' id="tfNumero"   value="" size="30" required />
              </div>

              <div class='col-md-3'>
                <label for='exampleInputLastName'>Estado</label>
                <input type="text" class='form-control' id="tfEstado"   value="" size="30" required />
                    
              </div>

              <div class='col-md-3'>
                <label for='exampleInputLastName'>Telefono</label>
                <input type="text" class='form-control' id="tfTelefono"   value="" size="30" required />
                    
              </div>

               <div class='col-md-3'>
                <label for='exampleInputLastName'>Referencias</label>
                <input type="text" class='form-control' id="tfReferencias"   value="" size="30" required />
              </div>

            </div>
          </div>
          
          
          <input  type="button" id="btnRegEmpleado" value="Insertar" class='btn btn-primary btn-block col-md-3' />
                        <button type="button" class='btn btn-primary btn-block col-md-3' size="30" id="btnMosEmpleado">Mostrar</button>
        <!--<input  type='button' id='btnRegAlumno' value='Insertar' />-->
    </form>

    
    </div>  
    


<div id="resultados">
  <!--inici
   
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Domicilio</th>
                  <th>Edad</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Pagos</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Petronila Sanchez Garcia</td>
                  <td>Lodo Grande</td>
                  <td>25</td>
                  <td>1993/04/25</td>
                  <td>$250</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Hola</div>
      </div>
    termina-->

<?php
    if(isset($data))
    {
        echo $data;
    } 
    ?>
</div>
   <script src="recursos/jquery/jquery-1.7.1.min.js"></script>
   <script src="recursos/js/sistema.js"></script>    