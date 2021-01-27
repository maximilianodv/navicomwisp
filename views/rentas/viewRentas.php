<div id="divclientes">

  <div class="row">
    <div class="col-12 col-sm-6 col-md-4">
      <?php
          if(isset($data))
          {
              echo $data["cbclientes"];
          }
      ?>
    </div>
    <div class="col-12 col-sm-12 col-md-4">
         <button button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MdlPagos">Nuevo Pago</button>
         <button  class="btn btn-primary">Historial de pagos</button>
    </div>
    <div class="col-12 col-sm-12 col-md-4">

    </div>
  </div>
</div>
<br>

      <div id="resultados">
    <?php
          if(isset($data))
          {
         echo $data["form"];

          }
      ?>
      <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Pago Mensual</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="large text-white stretched-link" id="txtcantpago"></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Fecha de contrato</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="large text-white stretched-link" id="txtfechacontr"></a>
                </div>
            </div>
        </div>
      </div>
      </div>

  <div class='card mb-4'>
      <div class='card-header'>
        <i class='fa fa-table'></i>Pagos de rentas
      </div>
      <div class='card-body'>
        <div class='table-responsive'  id="tabla">
          <!--<table>-->
          <!--</table>-->

          <?php
              if(isset($data))
              {
                echo $data["tabla"];

              }
          ?>
        </div>
      </div>
  </div>

<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MdlPagos">
  Launch demo modal
</button>
-->
<!-- Modal -->
<div class="modal fade" id="MdlPagos" tabindex="-1" role="dialog" aria-labelledby="MdlPagosLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="MdlPagosLabel">Nuevo Pago</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form>
        <div class="form-group">
          <div class="row">
              <div class="col-12 col-sm-12 col-md-4">
                <label for="idpago" class="col-form-label">Num pago</label>
                <input type="text" class="form-control" id="idpago" value="12" disabled=»disabled» >
              </div>
              <div class="col-12 col-sm-12 col-md-4">
                <label for="fechapgmd" class="col-form-label">Fecha de Pago</label>
                <input class='form-control'  type='date' name='fechapago' id='fechapgmd'  aria-describedby='nameHelp' placeholder='Fecha de Pago'>
              </div>
              <div class="col-12 col-sm-12 col-md-4">
                <label for='tfMesesPagadosmd' class="col-form-label">Meses Pagados</label>
                <input class='form-control' id='tfMesesPagadosmd' type='number' min='1' value='1' aria-describedby='Inserte los meses a pagar' placeholder='Meses a pagar' onchange='mesespag();'>
              </div>
          </div>

        </div>
        <div id='detallesmd'>

        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" id="btnsavepagmd"  onclick='addpago(this);'>Guardar</button>
    </div>
  </div>
  </div>
</div>


<!---->

<!---->
<script src="recursos/js/rentas.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="recursos/Admin/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="recursos/Admin/assets/demo/datatables-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
