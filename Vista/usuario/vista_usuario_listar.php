<div class="col-md-12">
    <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Bienvenido al contenido del Usuario</h3>

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
                    <button type="button" class="btn btn-primary"  onclick="AbrirModalRegistro()"><i class="fas fa-user-plus"> </i> Registrar</button>
                    </div> 
                </div>
            </div>
            <table id="tabla_usuario" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                          <th style="display:none"></th>
                          <th style="display:none"></th>
                          <th style="display:none"></th>
                          <th>#</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Teléfono</th>
                          <th>E-mail</th>
                          <th>Usuario</th>
                          <th>Rol</th>
                          <th>Punto de servicio</th>
                          <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody id="ListadoUsuarios">
                    </tbody>
            </table>
            </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
    </div>
</div>

<form autocomplete="false" onsubmit="return false">

<div class="modal fade" id="modal_registro" role="dialog">

    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Registro de Usuario</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE USUARIOS, CAMPOS -->
        <form class="form">

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Nombres</label>
              <input type="hidden" id="idPersonaR">
              <input type="text" onkeyup="mayus(this)" class="form-control" id="txt_nom" placeholder="Ingrese los nombres"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Apellidos</label>
              <input type="text" onkeyup="mayus(this)" class="form-control" id="txt_ape" placeholder="Ingrese los apellidos"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Teléfono</label>
              <input type="text" class="form-control" id="txt_tel" placeholder="Ingrese el teléfono"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">E-mail</label>
              <input type="text" class="form-control" id="txt_ema" placeholder="Ingrese el E-mail"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Usuario</label>
              <input type="text" onkeyup="mayus(this)" class="form-control" id="txt_usu" placeholder="Ingrese el usuario"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Contraseña</label>
              <input type="password" autocomplete="new-password" class="form-control" id="txt_con" placeholder="Ingrese la contraseña"><br>
            </div>
          </div>
          </div>
          <div class="row">
          
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Repetir contraseña</label>
              <input type="password" class="form-control" id="txt_con2" placeholder="Repita la contraseña"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Rol</label>
              <select class="js-example-basic-single"  name="state" id="sel_rol" style="width:100%; heigth: 40px;">
                
              </select><br><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Punto de lavado</label>
              <select class="js-example-basic-single"  name="state" id="sel_punto" style="width:100%; heigth: 40px;">
                
              </select><br><br>
            </div>
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="registrar_usuario()"><i class="fa fa-check"></i> Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL PARA EDITAR REGISTRO -->
  <div class="modal fade" id="modal_editar" role="dialog">

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
          <input type="hidden" id="idPersona" >
            <div class="form-group">
              <label for="">Nombres</label>
              <input type="text" onkeyup="mayus(this)" class="form-control" id="txt_nom_edit" placeholder="Ingrese los Nombres"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Apellidos</label>
              <input type="text" onkeyup="mayus(this)" class="form-control" id="txt_ape_edit" placeholder="Ingrese los apellidos"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Teléfono</label>
              <input type="text" class="form-control" id="txt_tel_edit" placeholder="Ingrese el teléfono"><br>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">E-mail</label>
              <input type="text" class="form-control" id="txt_ema_edit" placeholder="Ingrese el email"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Usuario</label>
              <input type="text" onkeyup="mayus(this)" class="form-control" id="txt_usu_edit" placeholder="Ingrese el usuario"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Contraseña</label>
              <input type="password" autocomplete="new-password" class="form-control" id="txt_con_edit" placeholder="Ingrese la contraseña"><br>
            </div>
          </div>
          </div>
          <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Repetir contraseña</label>
              <input type="password" class="form-control" id="txt_con2_edit" placeholder="Repita la contraseña"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Rol</label>
              <select class="js-example-basic-single"  name="state" id="sel_rol_edit" style="width:100%; heigth: 40px;">
                
              </select><br><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Punto de lavado</label>
              <select class="js-example-basic-single"  name="state" id="sel_punto_editar" style="width:100%; heigth: 40px;">
                
              </select><br><br>
            </div>
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="modificar_usuario()"><i class="fa fa-check"></i> Modificar</button>
        </div>
      </div>
    </div>
  </div>
  </form>
<script type="text/javascript" src="../js/usuario.js"></script>

<script>

  $('#txt_tel').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
  });
  $('#txt_tel_edit').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
  });

  $(document).ready(function(){
    listar_usuario();
    $('.js-example-basic-single').select2();
    listar_rol();
    listar_punto();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_usu").focus();
    });
  });
    

</script>
