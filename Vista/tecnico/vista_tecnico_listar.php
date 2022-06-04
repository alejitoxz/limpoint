<div class="col-md-12">
    <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Bienvenido al contenido de los Técnicos</h3>

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
                    <button type="button" class="btn btn-primary"  onclick="AbrirModalRegistroTecnico()"><i class="fas fa-plus"> </i> Registrar</button>
                    </div> 
                </div>
            </div>
            <table id="tabla_tecnico" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                          <th style="display:none"></th>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Cedula</th>
                          <th>Teléfono</th>
                          <th>E-mail</th>
                          <th>Direccién</th>
                          <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody id="Listadotecnicos">
                    </tbody>
            </table>
            </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
    </div>
</div>

<form autocomplete="false" onsubmit="return false">

<div class="modal fade" id="modal_registro_T" role="dialog">

    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Registro de Personal Técnico</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE USUARIOS, CAMPOS -->
        <form class="form">

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Cedula</label>
              <input type="text" class="form-control" id="txt_cedp" placeholder="Ingrese la cedula" onchange="buscarPersonaP(this.value)"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Nombres</label>
              <input type="hidden" id="idPersona">
              <input type="text" class="form-control" id="txt_nomp" placeholder="Ingrese los nombres"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Apellidos</label>
              <input type="text" class="form-control" id="txt_apep" placeholder="Ingrese los apellidos"><br>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Teléfono</label>
              <input type="text" class="form-control" id="txt_telp" placeholder="Ingrese el teléfono"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">E-mail</label>
              <input type="text" class="form-control" id="txt_emap" placeholder="Ingrese el E-mail"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Dirección</label>
              <input type="text" class="form-control" id="txt_dirp" placeholder="Ingrese la dirección"><br>
            </div>
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="registrar_propietario()"><i class="fa fa-check"></i> Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL PARA EDITAR REGISTRO -->
  <div class="modal fade" id="modal_editar_T" role="dialog">

    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Editar Usuario</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE USUARIOS, CAMPOS -->
        <form class="form">

        <div class="row">
          <div class="col-md-4">
          <input type="hidden" id="id" >
            <div class="form-group">
              <label for="">Nombres</label>
              <input type="text" class="form-control" id="txt_nomp_edit" placeholder="Ingrese los Nombres"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Apellidos</label>
              <input type="text" class="form-control" id="txt_apep_edit" placeholder="Ingrese los apellidos"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Cedula</label>
              <input type="text" class="form-control" id="txt_cedp_edit" placeholder="Ingrese la cedula"><br>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Teléfono</label>
              <input type="text" class="form-control" id="txt_telp_edit" placeholder="Ingrese el teléfono"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">E-mail</label>
              <input type="text" class="form-control" id="txt_emap_edit" placeholder="Ingrese el E-mail"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Dirección</label>
              <input type="text" class="form-control" id="txt_dirp_edit" placeholder="Ingrese la dirección"><br>
            </div>
          </div>
          </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="modificar_tecnico()"><i class="fa fa-check"></i> Modificar</button>
        </div>
      </div>
    </div>
  </div>
  </form>
<script type="text/javascript" src="../js/tecnico.js"></script>

<script>
  $(document).ready(function(){
    listar_tecnico();
    $("#modal_registro_tecnico").on('shown.bs.modal',function(){

    });
  });
    

</script>
