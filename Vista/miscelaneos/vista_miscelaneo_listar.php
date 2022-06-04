<div class="col-md-12">
    <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Bienvenido a Miscelaneos</h3>

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
                    <button type="button" class="btn btn-primary"  onclick="AbrirModalRegistromiscelaneos()"><i class="fas fa-plus"> </i> Registrar</button>
                    </div> 
                </div>
            </div>
            <table id="tabla_miscelaneos" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                          <!--<th>#</th>-->
                          <th>Descripción</th>
                          <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody id="Listadomiscelaneos">
                    </tbody>
            </table>
            </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
    </div>
</div>

<form autocomplete="false" onsubmit="return false">

<div class="modal fade" id="modal_registro_miscelaneos" role="dialog">

    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Registro de Miscelaneo</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE USUARIOS, CAMPOS -->
        <form class="form">

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Descripción</label>
              <input type="text" class="form-control" id="txt_descripcion" placeholder="Ingrese la Descripcion"><br>
            </div>
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
          <button type="button" class="btn btn-primary" onclick="registrar_miscelaneos()"><i class="fa fa-check"><b>&nbsp;Guardar</b></i></button>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL PARA EDITAR REGISTRO -->
  <div class="modal fade" id="modal_editar_C" role="dialog">

    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Editar Miscelaneo</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE USUARIOS, CAMPOS -->
        <form class="form">

        <div class="row">
          <div class="col-md-12">
          <input type="hidden" id="id" >
            <div class="form-group">
              <label for="">Nueva Descripción</label>
              <input type="text" class="form-control" id="txt_miscelaneos_edit" placeholder="Ingrese la descripcion"><br>
            </div>
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i> Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="modificar_miscelaneos()"><i class="fa fa-check"> </i> Modificar</button>
        </div>
      </div>
    </div>
  </div>
  </form>
<script type="text/javascript" src="../js/miscelaneos.js"></script>

<script>
  $(document).ready(function(){
    listar_miscelaneos();
    $("#modal_registro_miscelaneos").on('shown.bs.modal',function(){

    });
  });
    

</script>
