<div class="col-md-12">
    <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Bienvenido al contenido del vehículo</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
                <!-- /.card-tools -->
            </div>
              <!-- /.card-header -->
            <div class="card-body">
            <div class="form-group">
                <div class="col-lg-10">
                    <div class="col-lg-2">
                    <button type="button" class="btn btn-primary"  onclick="AbrirModalRegistroVehiculo()" ><i class="fas fa-plus"></i> Registrar</button>
                    </div> 
                </div>
            </div>
            <table id="tabla_vehiculos" class="display responsive" style="width:100%">
                    <thead>
                        <tr>
                          <th style="display:none"></th>
                          <th>#</th>
                          <th>Placa</th>
                          <th>Tipo</th>
                          <th>Alianza</th>
                          <th>Empresa</th>
                          <th>Propietario</th>
                          <th align="right" >Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="ListadoVehiculos">
                    </tbody>
            </table>
            </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
    </div>
</div>

<form autocomplete="false" onsubmit="return false">

<div class="modal fade" id="modal_registro_vehiculo" role="dialog">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Registro de vehículo</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE vehiculo, CAMPOS -->
        <form class="form">
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Placa</label>
              <input type="text" class="form-control" id="txt_placa" placeholder="Ingrese la placa"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Tipo de vehiculo</label>
              <select class="js-example-basic-single"  name="state" id="sel_tipoVehiculo" style="width:100%; heigth: 40px;">
                <option value="0">Seleccionar</option>
                <option value="1">Camioneta</option>
                <option value="1">Auto</option>
              </select><br><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Alianza</label>
              <select class="js-example-basic-single"  name="state" id="sel_alianza" style="width:100%; heigth: 40px;">
              </select><br><br>
            </div>
          </div>
          
        </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Propietario</label>
              <select class="js-example-basic-single"  name="state" id="sel_pro_vehiculo" style="width:100%; heigth: 40px;">   
              </select><br><br>
            </div>
          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i> Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="registrar_vehiculo()"><i class="fa fa-check"> </i> Guardar</button>
        </div>
      </div>
    </div>
  </div>



  <!-- MODAL PARA EDITAR REGISTRO -->
  <div class="modal fade" id="modal_editar_v" role="dialog">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Edicion de véhiculo</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE vehiculo, CAMPOS -->
        <form class="form">
        <input type="hidden" id="idVehiculo">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Numero interno</label>
              <input type="text" class="form-control" id="txt_interno_edit" placeholder="Ingrese el numero interno"><br>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Placa</label>
              <input type="text" class="form-control" id="txt_placa_edit" placeholder="Ingrese placa"><br>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Marca</label>
              <input type="text" class="form-control" id="txt_marca_edit" placeholder="Ingrese la marca"><br>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Modelo</label>
              <input type="text" class="form-control" id="txt_modelo_edit" placeholder="Ingrese el modelo"><br>
            </div>
          </div>
          
        </div>

        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Chasis</label>
              <input type="text" class="form-control" id="txt_chasis_edit" ><br>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Num pasajeros</label>
              <input type="text" class="form-control" id="txt_pasajeros_edit" ><br>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Empresa</label>
              <select class="js-example-basic-single"  name="state" id="sel_empresa_edit" style="width:100%; heigth: 40px;">
              </select><br><br>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Dueño</label>
              <select class="js-example-basic-single"  name="state" id="sel_pro_vehiculo_edit" style="width:100%; heigth: 40px;">   
              </select><br><br>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <div class="form-group">
              <label for="">Soat</label>
              <input type="text" class="form-control" id="txt_soat_edit" ><br>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Tecno mec.</label>
              <input type="text" class="form-control" id="txt_tecnomecanica_edit" ><br>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Póliza contractual</label>
              <input type="text" class="form-control" id="txt_poliza_cont_edit" ><br>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Póliza extracontractual</label>
              <input type="text" class="form-control" id="txt_poliza_ext_edit" ><br>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <div class="form-group">
              <label for="">Vencimiento SOAT</label>
              <input type="date" class="form-control" id="venc_soat_edit" ><br>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Vencimiento tecnomecánica</label>
              <input type="date" class="form-control" id="venc_tecno_edit" ><br>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Vencimiento póliza cont.</label>
              <input type="date" class="form-control" id="venc_poliza_cont_edit" ><br>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Vencimiento póliza extra.</label>
              <input type="date" class="form-control" id="venc_poliza_ext_edit" ><br>
            </div>
          </div>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b> </i> Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="modificar_vehiculo()"><i class="fa fa-check"> </i> Modificar</button>
        </div>
      </div>
    </div>
  </div>
   
  </form>
<script type="text/javascript" src="../js/vehiculo.js"></script>
<script>
  $(document).ready(function(){
    listar_alianza()
    listar_vehiculo();  
    $('.js-example-basic-single').select2();
    listar_pro();
    $("#modal_registro_vehiculo").on('shown.bs.modal',function(){
    });
  });
</script>