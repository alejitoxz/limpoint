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
                          <th style="display:none"></th>
                          <th style="display:none"></th>
                          <th>#</th>
                          <th>Placa</th>
                          <th>Marca</th>
                          <th>Tipo</th>
                          <th>Alianza</th>
                          <th>Punto de servicio</th>
                          <th>Cliente</th>
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
              <input type="text" onkeyup="mayus(this)" class="form-control" id="txt_placa" placeholder="Ingrese la placa"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Marca</label>
              <select class="js-example-basic-single"  name="sel_marca" id="sel_marca" style="width:100%; heigth: 40px;">
              </select><br><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Tipo de vehiculo</label>
              <select class="js-example-basic-single"  name="sel_tipoVehiculo" id="sel_tipoVehiculo" style="width:100%; heigth: 40px;">
                <option value="0">Seleccionar</option>
                <option value="1">Camioneta</option>
                <option value="1">Auto</option>
              </select><br><br>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-4">
            <div class="form-group">
              <label for="">Alianza</label>
              <select class="js-example-basic-single"  name="sel_alianza" id="sel_alianza" style="width:100%; heigth: 40px;">
              </select><br><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Propietario</label>
              <select class="js-example-basic-single"  name="sel_pro_vehiculo" id="sel_pro_vehiculo" style="width:100%; heigth: 40px;">   
              </select><br><br>
            </div>
          </div>
          </div></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i> Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="registrar_vehiculo();"><i class="fa fa-check"> </i> Guardar</button>
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
       
        <div class="row">
        <div class="col-md-4">
        <input type="hidden" id="idVehiculo">
            <div class="form-group">
              <label for="">Placa</label>
              <input type="text" onkeyup="mayus(this)" class="form-control" id="txt_placa_editar" placeholder="Ingrese la placa"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Marca</label>
              <select class="js-example-basic-single"  name="sel_marca_editar" id="sel_marca_editar" style="width:100%; heigth: 40px;">
              </select><br><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Tipo de vehiculo</label>
              <select class="js-example-basic-single"  name="state" id="sel_tipoVehiculo_editar" style="width:100%; heigth: 40px;">
                <option value="0">Seleccionar</option>
                <option value="1">Camioneta</option>
                <option value="1">Auto</option>
              </select><br><br>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Alianza</label>
              <select class="js-example-basic-single"  name="state" id="sel_alianza_editar" style="width:100%; heigth: 40px;">
              </select><br><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Propietario</label>
              <select class="js-example-basic-single"  name="state" id="sel_pro_vehiculo_editar" style="width:100%; heigth: 40px;">   
              </select><br><br>
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
    listar_marca();
    listar_alianza();
    listar_vehiculo();  
    limpiarRegistro();
    $('.js-example-basic-single').select2();
    listar_pro();
    $("#modal_registro_vehiculo").on('shown.bs.modal',function(){
    });
  });
</script>