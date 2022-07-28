<?php
session_start();
$Rol = $_SESSION['ROL'];
?>
<div class="col-md-12">
    <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Bienvenido al contenido de los Servicio</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            <input type="hidden" id="rol" name="rol" value="<?php echo $Rol; ?>">
            </div>
                <!-- /.card-tools -->
            </div>
              <!-- /.card-header -->
            <div class="card-body">
            <div class="form-group">
                <div class="col-lg-10">
                    
                    <div class="row">
                    <button type="button" class="btn btn-primary"  onclick="AbrirModalRegistroServicio()"><i class="fas fa-plus"> </i> Registrar</button>
                    <!-- /.card-header <button type="button" class="btn btn-primary" style="margin-left:2px;" onclick="exportarReporte()"><i class="fas fa-file-pdf"> </i> Reporte</button>-->
                    </div>
                  
                </div>
            </div>
            <table id="tabla_orden" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                      <th style="display:none"></th>
                      <th>Orden</th>
                      <th>Placa</th>
                      <th>Cliente</th>
                      <th>Estatus correo</th>
                      <th>Técnico</th>
                      <th>Fecha de recepcion</th>
                      <th>Usuario</th>
                      <th>Recaudo</th>
                      <th>Observación</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody id="ListadoOrden">
                    </tbody>
            </table>
            </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
    </div>
</div>

<form autocomplete="false" onsubmit="return false">



<div class="modal fade" id="modal_registro_Servicio" role="dialog">

    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Prestacion de servicio</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE USUARIOS, CAMPOS -->
        
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body p-0">
                <div class="bs-stepper linear">


                  <div class="bs-stepper-header" role="tablist">

                    <!-- DATOS DEL VEHICULO -->
                    <div class="step active" data-target="#datos-part" onclick="stepper.to(1)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="datos-part" id="datos-trigger" aria-selected="true">
                        <span class="bs-stepper-circle"><i class="fas fa-truck-monster"></i></span>
                        <span class="bs-stepper-label">Datos del vehículo</span>
                      </button>
                    </div>

                    <!-- DATOS DE BATERIAS -->
                    <div class="line"></div>
                    <div class="step" data-target="#bateria-part" onclick="stepper.to(2)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="bateria-part" id="bateria-trigger" aria-selected="false">
                        <span class="bs-stepper-circle"><i class="fas fa-boxes"></i></span>
                        <span class="bs-stepper-label">Inventario del vehiculo</span>
                      </button>
                    </div>

                    <!-- DATOS DE LLANTAS -->
                    <div class="line"></div>
                    <div class="step" data-target="#llanta-part" onclick="stepper.to(3)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="llanta-part" id="llanta-trigger" aria-selected="false" >
                        <span class="bs-stepper-circle"><i class="fas fa-align-justify"></i></span>
                        <span class="bs-stepper-label">Estado vehiculo</span>
                      </button>
                    </div>  
                    <!-- DATOS DE ACEITES -->
                    <div class="line"></div>
                    <div class="step" data-target="#aceite-part" onclick="stepper.to(4)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="aceite-part" id="aceite-trigger" aria-selected="false" >
                        <span class="bs-stepper-circle"><i class="fas fa-folder-open"></i></span>
                        <span class="bs-stepper-label">Servicio</span>
                      </button>
                    </div>
                  </div><!-- FIN DE LOS TITULOS-->
                  <div class="bs-stepper-content">


                    <!-- FORMULARIO DATOIS-->
                    <div id="datos-part" class="content active dstepper-block" role="tabpanel" aria-labelledby="datos-trigger">
                    <div class="callout callout-danger">
                    <div class="row"> 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Placa</label>
                          <select class="js-example-basic-single"  name="state" id="sel_placa" style="width:100%; heigth: 40px;" >    
                          </select><br><br>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Fecha de ingreso</label>
                            <input  type="date" class="form-control" id="txt_fIngreso" style="width:100%; heigth: 40px; text-align:center;" value="<?php echo date("Y-m-d");?>"><br>
                          </div>
                        </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Operario</label>
                            <select class="js-example-basic-single" id="sel_tecnico" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Seleccionar</option>
                            <option value="1">Diego Caycedo</option>  
                            </select><br><br>
                          </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tipo de lavado</label>
                            <select class="js-example-basic-single" id="sel_tipoLavado" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Seleccionar</option>
                            <option value="1">Lavado en seco</option>  
                            <option value="2">Lavado con agua</option> 
                            </select><br><br>
                          </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea class="form-control" id="txt_observaciones1" placeholder="observaciones"></textarea><br>
                          </div>
                        </div>
                        </div>
                        </div>
                      <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>



                    
                    <!-- FORMULARIO BATERIA-->
                    <div id="bateria-part" class="content" role="tabpanel" aria-labelledby="bateria-trigger">
                    <div class="callout callout-danger">
                      <h2>Inventario</h2><br>
                    <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Reloj</label><br>
                            <input type="checkbox" name="sel_reloj" style="margin:auto;" id="sel_reloj" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                          </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Radio-Caratula</label><br>
                            <input type="checkbox" style="margin:auto;" name="sel_radio" id="sel_radio" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">CDs-Casetes</label><br>
                            <input type="checkbox" name="sel_cd" style="margin:auto;" id="sel_cd" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Gato-palanca</label><br>
                            <input type="checkbox" name="sel_gato" style="margin:auto;" id="sel_gato" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      </div>
                    <div class="row">  
                    <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Encendedor</label><br>
                            <input type="checkbox" name="sel_encendedor" style="margin:auto;" id="sel_encendedor" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Cenicero</label><br>
                            <input type="checkbox" name="sel_cenicero" style="margin:auto;" id="sel_cenicero" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Forros</label><br>
                            <input type="checkbox" name="sel_forro" style="margin:auto;" id="sel_forro" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Herramienta</label><br>
                            <input type="checkbox" name="sel_herramienta" style="margin:auto;" id="sel_herramienta" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Rueda repuesto</label><br>
                            <input type="checkbox" name="sel_rueda" style="margin:auto;" id="sel_rueda" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      </div>
                    </div>
                    <div class="callout callout-danger">
                    <div class="row"> 
                    <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tapetes</label><br>
                            <input type="checkbox" style="float:right;" style="margin:auto;" name="sel_tapete" id="sel_tapete" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Cuchilla limpia</label><br>
                            <input type="checkbox" name="sel_cuchilla" style="margin:auto;" id="sel_cuchilla" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">llavero</label><br>
                            <input type="checkbox" name="sel_llavero" style="margin:auto;" id="sel_llavero" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tercer stop</label><br>
                            <input type="checkbox" name="sel_tercerStop" style="margin:auto;"  id="sel_tercerStop" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                    </div>
                    <div class="row"> 
                    <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Emblemas</label><br>
                            <input type="checkbox" name="sel_emblema" style="margin:auto;" id="sel_emblema" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Parasoles</label><br>
                            <input type="checkbox" name="sel_parasol" style="margin:auto;" id="sel_parasol" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Manija</label><br>
                            <input type="checkbox" name="sel_manija" style="margin:auto;" id="sel_manija" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Cinturon seg.</label><br>
                            <input type="checkbox" name="sel_cinturon" style="margin:auto;" id="sel_cinturon" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                    </div>
                    <div class="row"> 
                    <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Copas ruedas</label><br>
                            <input type="checkbox" name="sel_copa" style="margin:auto;" id="sel_copa" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Espejos</label><br>
                            <input type="checkbox" name="sel_espejo" style="margin:auto;" id="sel_espejo" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Antena</label><br>
                            <input type="checkbox" name="sel_antena" style="margin:auto;" id="sel_antena" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Exploradoras</label><br>
                            <input type="checkbox" name="sel_exploradora" style="margin:auto;" id="sel_exploradora" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                          </div>
                      </div>
                    </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones:</label>
                            <textarea class="form-control" id="observaciones2" placeholder="observaciones"></textarea><br>
                          </div> 
                      </div>
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>
                      



                     <!-- FORMULARIO llanta-->
                    <div id="llanta-part" class="content" role="tabpanel" aria-labelledby="llanta-trigger">

                  <div class="callout callout-danger">
                  <div class="row">
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#1</label>
                            <select class="js-example-basic-single" id="sel_1" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#2</label>
                            <select class="js-example-basic-single" id="sel_2" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#3</label>
                            <select class="js-example-basic-single" id="sel_3" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#4</label>
                            <select class="js-example-basic-single" id="sel_4" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#5</label>
                            <select class="js-example-basic-single" id="sel_5" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#6</label>
                            <select class="js-example-basic-single" id="sel_6" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      </div>
                    <div class="row">  
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#7</label>
                            <select class="js-example-basic-single" id="sel_7" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#8</label>
                            <select class="js-example-basic-single" id="sel_8" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#9</label>
                            <select class="js-example-basic-single" id="sel_9" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#10</label>
                            <select class="js-example-basic-single" id="sel_10" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#11</label>
                            <select class="js-example-basic-single" id="sel_11" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#12</label>
                            <select class="js-example-basic-single" id="sel_12" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      </div>
                    <div class="row"> 
                    <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#13</label>
                            <select class="js-example-basic-single" id="sel_13" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#14</label>
                            <select class="js-example-basic-single" id="sel_14" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#15</label>
                            <select class="js-example-basic-single" id="sel_15" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#16</label>
                            <select class="js-example-basic-single" id="sel_16" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#17</label>
                            <select class="js-example-basic-single" id="sel_17" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#18</label>
                            <select class="js-example-basic-single" id="sel_18" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                    </div>
                    <div class="row"> 
                    
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">#19</label>
                            <select class="js-example-basic-single" id="sel_19" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Ninguno</option>
                            <option value="1">Golpe</option>  
                            <option value="1">Rayon</option> 
                            </select><br><br>
                          </div>
                      </div>
                    </div>

                      <div class="col-md-13">
                          <div class="form-group">
                            <label for="">Observaciones:</label>
                            <textarea class="form-control" id="txt_observaciones3" placeholder="Observaciones"></textarea><br>
                          </div>
                        </div>  
                        <div class="row">
                        <div class="col-md-12" >
                        <img src="../Vista/imagenes/inventario1.jpg" class="inventario" style=" width:80%; display:block; margin:auto;">
                        </div>
                        </div> 
                      </div>
                     
                    <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                    <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>




                      <!-- FORMULARIO ACCEITE-->
                      <div id="aceite-part" class="content" role="tabpanel" aria-labelledby="aceite-trigger">


                      <div class="callout callout-danger">
                        <div class="row">
                        <div class="col-4 col-sm-4">
                              <div class="form-group">
                                <label>Servicios</label>
                                <div class="select2-purple">
                                <select class="select2" multiple="multiple" id="sel_servicio1" data-placeholder="Selecciona los campos" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                  
                                </select>
                              </div>
                              </div>
                              <!-- /.form-group -->
                          </div>
                          <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo de Pago</label>
                            <select class="js-example-basic-single" id="sel_tipoPago" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Seleccionar</option>
                            <option value="1">Debito</option>  
                            <option value="2">Credito</option> 
                            <option value="3">Efectivo</option> 
                            </select><br><br>
                          </div>
                      </div>
                          <div class="col-4 col-sm-4">
                              <div class="form-group">
                                <label for="txt_recaudo">Recaudo</label>
                                <input type="text" class="form-control" id="txt_recaudo">
                              </div>
                          </div>
                          </div>
                        <div class="col-md-13">
                          <div class="form-group">
                            <label for="">Observaciones:</label>
                            <textarea class="form-control" id="txt_observaciones4" placeholder="Observaciones"></textarea><br>
                          </div>
                          </div>         
                      </div>

                      <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                      
                    </div>

                  </div>
                  <div style="margin-left:35%;">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                  <button type="submit" class="btn btn-primary" onclick="registrar_Servicio()">Guardar</button>
                  <!-- /.card-body <button type="submit" class="btn btn-success" onclick="cerrar_modal();crear_cliente();" >Crear cliente</button>-->
                  </div>
                </div>
              </div>
              
              <!-- /.card-body -->
              <div class="card-footer">
              
              </div>
            </div>
            <!-- /.card -->
          </div>
          
        </div>

        
        </div>
      </div>
    </div>

</div>

</form>


<!----------------------------------EDITAR ------------------------->
<form autocomplete="false" onsubmit="return false">

<div class="modal fade" id="modal_editar_OrdenServicio" role="dialog">

    <input type="hidden" id="idOrdenServicio">
    <input type="hidden" id="idServicio">

    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Orden de servicio</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE USUARIOS, CAMPOS -->
        
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body p-0">
                <div class="bs-stepper stepper-editar linear">


                  <div class="bs-stepper-header" role="tablist">

                    <!-- DATOS DEL VEHICULO -->
                    <div class="step active" data-target="#datos-part-edit" onclick="stepper.to(1)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="datos-part-edit" id="datos-trigger-edit" aria-selected="true">
                        <span class="bs-stepper-circle"><i class="fas fa-bus"></i></span>
                        <span class="bs-stepper-label">Datos del vehículo</span>
                      </button>
                    </div>

                    <!-- DATOS DE BATERIAS -->
                    <div class="line"></div>
                    <div class="step" data-target="#bateria-part-edit" onclick="stepper.to(2)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="bateria-part-edit" id="bateria-trigger-edit" aria-selected="false">
                        <span class="bs-stepper-circle"><i class="fas fa-car-battery"></i></span>
                        <span class="bs-stepper-label">Batería</span>
                      </button>
                    </div>

                    <!-- DATOS DE LLANTAS -->
                    <div class="line"></div>
                    <div class="step" data-target="#llanta-part-edit" onclick="stepper.to(3)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="llanta-part-edit" id="llanta-trigger-edit" aria-selected="false" >
                        <span class="bs-stepper-circle"><i class="fas fa-ring"></i></span>
                        <span class="bs-stepper-label">Llanta</span>
                      </button>
                    </div>

                    <!-- DATOS DE ACEITES -->
                    <div class="line"></div>
                    <div class="step" data-target="#aceite-part-edit" onclick="stepper.to(4)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="aceite-part-edit" id="aceite-trigger-edit" aria-selected="false" >
                        <span class="bs-stepper-circle"><i class="fas fa-oil-can"></i></span>
                        <span class="bs-stepper-label">Aceites</span>
                      </button>
                    </div>

                  </div><!-- FIN DE LOS TITULOS-->
                  <div class="bs-stepper-content">


                    <!-- FORMULARIO DATOIS-->
                    <div id="datos-part-edit" class="content active dstepper-block" role="tabpanel" aria-labelledby="datos-trigger-edit">
                    <div class="callout callout-danger">
                    <div class="row"> 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Placa</label>
                          <select class="js-example-basic-single"  name="state" id="sel_editar_placa_vehiculo" style="width:100%; heigth: 40px;" >    
                          </select><br><br>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Revisión bimestral Cotrautol</label>
                            <select class="js-example-basic-single"  name="state" id="txt_editar_revb" style="width:100%; heigth: 40px;">   
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Revisión registradora</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_rReg" style="width:100%; heigth: 40px;">   
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                        </div>
                        </div>
                      <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Km Gps</label>
                            <input type="text" class="form-control" id="txt_editar_kmGps"readonly><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Vencimiento del extintor</label>
                            <input type="date" class="form-control" id="txt_editar_vExtintor" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Observaciones de la registradora</label>
                            <input type="text" class="form-control" id="txt_editar_oReg" placeholder="Ingrese la observacion"><br>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-13">
                          <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea class="form-control" id="txt_editar_obs" placeholder="Ingrese las observaciones"></textarea><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Técnico</label>
                            <select class="js-example-basic-single" id="sel_editar_tecnico" name="state" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                        </div>
                        </div>
                      <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>



                    
                    <!-- FORMULARIO BATERIA-->
                    <div id="bateria-part-edit" class="content" role="tabpanel" aria-labelledby="bateria-trigger-edit">
                    <div class="callout callout-danger">
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Propiedad</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_bateria" style="width:100%; heigth: 40px;">
                              <option value="0">Seleccionar</option>
                              <option value="1">Inverlima</option>
                              <option value="2">Externo</option>     
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Bateria actual</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_tipoBateria" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Bateria vendida</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_marca" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                    </div>
                    <div class="row">  
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Serial</label>
                            <input type="text" class="form-control" id="txt_editar_serial" placeholder="Ingrese el serial"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Fecha de venta</label>
                            <input type="date" class="form-control" id="txt_editar_fVenta" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Fecha de instalación</label>
                            <input type="date" class="form-control" id="txt_editar_fInstalacion" style="width:100%; heigth: 40px;" ><br>
                          </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tiempo de uso</label>
                            <input type="text" class="form-control" id="txt_editar_tUso" placeholder="Registre el tiempo de uso"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Próximo cambio</label>
                            <input type="date" class="form-control" id="txt_editar_pCambio" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Próximo mantenimiento</label>
                            <input type="date" class="form-control" id="txt_editar_pMantenimiento" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-13">
                          <div class="form-group">
                            <label for="">Oportunidades de mejora</label>
                            <textarea class="form-control" id="txt_editar_oMejora" placeholder="Ingrese las observaciones"></textarea><br>
                          </div>
                        </div> 
                      </div> 
                      <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>
                      



                     <!-- FORMULARIO llanta-->
                    <div id="llanta-part-edit" class="content" role="tabpanel" aria-labelledby="llanta-trigger-edit">
                    <div class="callout callout-danger">
                    <h5 class="text-danger">LLANTA #1</h5>
                    <div class="row">

                      <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Serial</label>
                              <input type="text" class="form-control" id="txt_editar_llantaSerial1" placeholder="Ingrese el serial" ><br>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Profundidad</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_profundidad1" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                              </select><br><br>
                            </div>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_marca_llanta1" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_tipoMarca1" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Tracción</option>
                              <option value="2">Direccional</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_estado1" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Nueva</option>
                              <option value="2">Reencauchada</option>
                            </select><br><br>
                          </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Instalación</label>
                            <input type="date" class="form-control" id="txt_editar_fInstalacion1" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Reencauche</label>
                            <input type="date" class="form-control" id="txt_editar_fReencauche1" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Cambio</label>
                            <input type="date" class="form-control" id="txt_editar_fCambio1" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Rotación</label>
                            <input type="date" class="form-control" id="txt_editar_fRotacion1" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="callout callout-danger">
                    <h5 class="text-danger">LLANTA #2</h5>
                    <div class="row">

                      <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Serial</label>
                              <input type="text" class="form-control" id="txt_editar_llantaSerial2" placeholder="Ingrese el serial" ><br>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Profundidad</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_profundidad2" style="width:100%; heigth: 40px;">   
                              <option value="0">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                              </select><br><br>
                            </div>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_marca_llanta2" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_tipoMarca2" style="width:100%; heigth: 40px;">   
                              <option value="0">Seleccionar</option>
                              <option value="1">Tracción</option>
                              <option value="2">Direccional</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_estado2" style="width:100%; heigth: 40px;">   
                              <option value="0">Seleccionar</option>
                              <option value="1">Nueva</option>
                              <option value="2">Reencauchada</option>
                            </select><br><br>
                          </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Instalación</label>
                            <input type="date" class="form-control" id="txt_editar_fInstalacion2" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Reencauche</label>
                            <input type="date" class="form-control" id="txt_editar_fReencauche2" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Cambio</label>
                            <input type="date" class="form-control" id="txt_editar_fCambio2" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Rotación</label>
                            <input type="date" class="form-control" id="txt_editar_fRotacion2" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="callout callout-danger">
                    <h5 class="text-danger">LLANTA #3</h5>
                    <div class="row">

                      <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Serial</label>
                              <input type="text" class="form-control" id="txt_editar_llantaSerial3" placeholder="Ingrese el serial" ><br>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Profundidad</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_profundidad3" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                              </select><br><br>
                            </div>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_marca_llanta3" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_tipoMarca3" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Tracción</option>
                              <option value="2">Direccional</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_estado3" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Nueva</option>
                              <option value="2">Reencauchada</option>
                            </select><br><br>
                          </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Instalación</label>
                            <input type="date" class="form-control" id="txt_editar_fInstalacion3" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Reencauche</label>
                            <input type="date" class="form-control" id="txt_editar_fReencauche3" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Cambio</label>
                            <input type="date" class="form-control" id="txt_editar_fCambio3" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Rotación</label>
                            <input type="date" class="form-control" id="txt_editar_fRotacion3" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="callout callout-danger">
                    <h5 class="text-danger">LLANTA #4</h5>
                    <div class="row">

                      <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Serial</label>
                              <input type="text" class="form-control" id="txt_editar_llantaSerial4" placeholder="Ingrese el serial" ><br>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Profundidad</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_profundidad4" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                              </select><br><br>
                            </div>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_marca_llanta4" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_tipoMarca4" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Tracción</option>
                              <option value="2">Direccional</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_estado4" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Nueva</option>
                              <option value="2">Reencauchada</option>
                            </select><br><br>
                          </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Instalación</label>
                            <input type="date" class="form-control" id="txt_editar_fInstalacion4" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Reencauche</label>
                            <input type="date" class="form-control" id="txt_editar_fReencauche4" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Cambio</label>
                            <input type="date" class="form-control" id="txt_editar_fCambio4" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Rotación</label>
                            <input type="date" class="form-control" id="txt_editar_fRotacion4" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="callout callout-danger">
                    <h5 class="text-danger">LLANTA #5</h5>
                    <div class="row">

                      <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Serial</label>
                              <input type="text" class="form-control" id="txt_editar_llantaSerial5" placeholder="Ingrese el serial" ><br>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Profundidad</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_profundidad5" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                              </select><br><br>
                            </div>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_marca_llanta5" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_tipoMarca5" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Tracción</option>
                              <option value="2">Direccional</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_estado5" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Nueva</option>
                              <option value="2">Reencauchada</option>
                            </select><br><br>
                          </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Instalación</label>
                            <input type="date" class="form-control" id="txt_editar_fInstalacion5" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Reencauche</label>
                            <input type="date" class="form-control" id="txt_editar_fReencauche5" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Cambio</label>
                            <input type="date" class="form-control" id="txt_editar_fCambio5" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Rotación</label>
                            <input type="date" class="form-control" id="txt_editar_fRotacion5" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="callout callout-danger">
                    <h5 class="text-danger">LLANTA #6</h5>
                    <div class="row">

                      <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Serial</label>
                              <input type="text" class="form-control" id="txt_editar_llantaSerial6" placeholder="Ingrese el serial" ><br>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Profundidad</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_profundidad6" style="width:100%; heigth: 40px;">   
                              <option value="0">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                              </select><br><br>
                            </div>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_marca_llanta" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_tipoMarca6" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Tracción</option>
                              <option value="2">Direccional</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_estado6" style="width:100%; heigth: 40px;">   
                                <option value="0" selected>Seleccionar</option>
                              <option value="1">Nueva</option>
                              <option value="2">Reencauchada</option>
                            </select><br><br>
                          </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Instalación</label>
                            <input type="date" class="form-control" id="txt_editar_fInstalacion6" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Reencauche</label>
                            <input type="date" class="form-control" id="txt_editar_fReencauche6" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Cambio</label>
                            <input type="date" class="form-control" id="txt_editar_fCambio6" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Rotación</label>
                            <input type="date" class="form-control" id="txt_editar_fRotacion6" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="callout callout-danger">
                    <h5 class="text-danger">CALIBRACIÓN:</h5>
                    <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Llanta #1/Lbs.</label>
                            <input type="number" value="0" class="form-control" id="txt_editar_cal1" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Llanta #2/Lbs.</label>
                            <input type="number"value="0" class="form-control" id="txt_editar_cal2" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Llanta #3/Lbs.</label>
                            <input type="number"value="0" class="form-control" id="txt_editar_cal3" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Llanta #4/Lbs.</label>
                            <input type="number"value="0" class="form-control" id="txt_editar_cal4" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Llanta #5/Lbs.</label>
                            <input type="number"value="0" class="form-control" id="txt_editar_cal5" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Llanta #6/Lbs.</label>
                            <input type="number"value="0" class="form-control" id="txt_editar_cal6" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones de calibración</label>
                            <textarea  class="form-control" id="txt_editar_oCalibracion" ></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Balanceo #1.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_bal1" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Balanceo #2.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_bal2" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Balanceo #3.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_bal3" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Balanceo #4.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_bal4" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Balanceo #5.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_bal5" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Balanceo #6.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_bal6" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones de balanceo</label>
                            <textarea  class="form-control" id="txt_editar_oBalanceo" ></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Alineación #1.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_alineacion1" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Alineación #2.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_editar_alineacion2" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea  class="form-control" id="txt_editar_obs3" ></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones de mejora</label>
                            <textarea  class="form-control" id="txt_editar_obsM3" ></textarea>
                          </div>
                        </div>
                    </div>
                    </div>
                     
                    <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                    <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>




                      <!-- FORMULARIO ACCEITE-->
                      <div id="aceite-part-edit" class="content" role="tabpanel" aria-labelledby="aceite-trigger-edit">
                    <div class="callout callout-danger">
                    <h5 class="text-danger">CAMBIO DE ACEITE DEL MOTOR</h5>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Fecha</label>
                              <input type="date" class="form-control" id="txt_editar_fechaA" placeholder="Ingrese la fecha"><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Próximo cambio</label>
                              <input type="date" class="form-control " id="txt_editar_pCambioA" placeholder="Ingrese el proximo cambio"><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Kilometraje</label>
                              <input type="text" class="form-control" id="txt_editar_kilometraje" placeholder="Ingrese el Kilometraje"><br>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Cambio x Kilometraje</label>
                              <input type="text" class="form-control" id="txt_editar_ckilometraje" placeholder="Ingrese datos"><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Tipo de aceite</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_tipo_aceite" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Marca</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_marca_aceite" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Cantidad x 1/4</label>
                              <input type="Number"value="0" class="form-control" id="txt_editar_cantidad" placeholder="Ingrese datos"><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Presentación</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_presentacion1" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">Sellado</option>
                                <option value="2">Granel</option>
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Nivelación</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_nivelacion1" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Cantidad nivelada 1/4</label>
                              <input type="number"value="0" class="form-control" id="txt_editar_cNivelacion1" placeholder="Ingrese datos"><br>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Filtro aceite</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_filtro_aceite" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Filtro de combustible</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_filtro_combustible" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Filtro de combustible</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_filtro_combustible2" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Filtro de combustible</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_filtro_combustible3" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Filtro de aire</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_filtro_aire" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                        </div>
                        </div>
                    <div class="callout callout-danger">
                    <h5 class="text-danger">ACEITE DE CAJA</h5>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Tipo de aceite</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_tipo_aceite1" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Marca</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_marca_aceite1" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Ultimo cambio</label>
                              <input type="date" class="form-control" id="txt_editar_uCambio1" placeholder="Ingrese ultimo cambio"><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Próximo cambio</label>
                              <input type="date" class="form-control" id="txt_editar_pCambio1" placeholder="Ingrese proximo cambio"><br>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Cantidad x 1/4</label>
                                <input type="number"value="0" class="form-control" id="txt_editar_cantidad1" placeholder="Ingrese datos"><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Presentación</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_presentacion2" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Sellado</option>
                                  <option value="2">Granel</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Nivelación</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_nivelacion2" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Cantidad nivelada 1/4</label>
                                <input type="number"value="0" class="form-control" id="txt_editar_nivelacion2" placeholder="Ingrese datos"><br>
                              </div>
                            </div>
                          </div>
                          </div>
                    <div class="callout callout-danger">
                    <h5 class="text-danger">ACEITE DE LA TRANSMICIÓN</h5>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Tipo de aceite</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_tipo_aceite2" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Marca</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_marca_aceite2" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Ultimo cambio</label>
                              <input type="date" class="form-control" id="txt_editar_uCambio2" placeholder="Ingrese ultimo cambio"><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Próximo cambio</label>
                              <input type="date" class="form-control" id="txt_editar_pCambio2" placeholder="Ingrese proximo cambio"><br>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Cantidad x 1/4</label>
                                <input type="number"value="0" class="form-control" id="txt_editar_cantidad2" placeholder="Ingrese datos"><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Presentación</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_presentacion3" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Sellado</option>
                                  <option value="2">Granel</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Nivelación</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_nivelacion3" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Cantidad nivelada 1/4</label>
                                <input type="number"value="0" class="form-control" id="txt_editar_nivelacion3" placeholder="Ingrese datos"><br>
                              </div>
                            </div>
                          </div>
                          </div>
                    <div class="callout callout-danger">
                    <h5 class="text-danger">REFRIGERANTE</h5>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Tipo de aceite</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_tipo_aceite3" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Marca</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_marca_aceite3" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Ultimo cambio</label>
                              <input type="date" class="form-control" id="txt_editar_uCambio3" placeholder="Ingrese ultimo cambio"><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Próximo cambio</label>
                              <input type="date" class="form-control" id="txt_editar_pCambio3" placeholder="Ingrese proximo cambio"><br>
                            </div>
                          </div>
                        </div>
                        </div>
                    <div class="callout callout-danger">
                    <h5 class="text-danger">HIDRAULICO</h5>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Tipo de aceite</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_tipo_aceite4" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Marca</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_marca_aceite4" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Ultimo cambio</label>
                              <input type="date" class="form-control" id="txt_editar_uCambio4" placeholder="Ingrese ultimo cambio"><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Próximo cambio</label>
                              <input type="date" class="form-control" id="txt_editar_pCambio4" placeholder="Ingrese proximo cambio"><br>
                            </div>
                          </div>
                        </div>
                        </div>
                    <div class="callout callout-danger">
                    <h5 class="text-danger">MEDICION DE LÍQUIDOS</h5>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Líquido de frenos</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_lFreno" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Líquido de parabrisas</label>
                              <select class="js-example-basic-single"  name="state" id="sel_editar_lParabrisa" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Refrigerantes</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_refrigerante" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Hidraulico</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_hidraulico" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Motor</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_lMotor" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Caja</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_lCaja" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Transmisión</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_lTransmision" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                          </div>
                          </div>
                    <div class="callout callout-danger">
                    <h5 class="text-danger">OTROS</h5>
                          <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Limpieza de frenos</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_lFrenos1" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Engrase</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_engrase" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Sopleteo Radiador</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_sRadiador" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Sopleteo filtro de aire</label>
                                <select class="js-example-basic-single"  name="state" id="sel_editar_sFiltroAire" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea class="form-control" id="txt_editar_observacionesF" placeholder="Ingrese las observaciones"></textarea><br>
                          </div>
                        </div>
                          </div>
                          </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                      <button type="submit" class="btn btn-primary" onclick="modificar_orden_Servicio()">Guardar</button>
                    </div>
                    


                  </div>
                  
                </div>
              </div>
              
              <!-- /.card-body -->
              <div class="card-footer">
              
              </div>
            </div>
            <!-- /.card -->
          </div>
          
        </div>

        
        </div>
      </div>
    </div>

</div>

</form>


</form>


<!----------------------------------VER------------------------->
<form autocomplete="false" onsubmit="return false">



<div class="modal fade" id="modal_ver_Servicio" role="dialog">

    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Prestacion de servicio</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE USUARIOS, CAMPOS -->
        
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body p-0">
                <div class="bs-stepper stepper-ver linear">


                  <div class="bs-stepper-header" role="tablist">

                    <!-- DATOS DEL VEHICULO -->
                    <div class="step active" data-target="#datos-part_ver" onclick="stepper.to(1)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="datos-part_ver" id="datos-trigger_ver" aria-selected="true">
                        <span class="bs-stepper-circle"><i class="fas fa-bus"></i></span>
                        <span class="bs-stepper-label">Datos del vehículo</span>
                      </button>
                    </div>

                    <!-- DATOS DE BATERIAS -->
                    <div class="line"></div>
                    <div class="step" data-target="#bateria-part_ver" onclick="stepper.to(2)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="bateria-part_ver" id="bateria-trigger_ver" aria-selected="false">
                        <span class="bs-stepper-circle"><i class="fas fa-car-battery"></i></span>
                        <span class="bs-stepper-label">Inventario del vehiculo</span>
                      </button>
                    </div>

                    <!-- DATOS DE LLANTAS -->
                    <div class="line"></div>
                    <div class="step" data-target="#llanta-part_ver" onclick="stepper.to(3)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="llanta-part_ver" id="llanta-trigger_ver" aria-selected="false" >
                        <span class="bs-stepper-circle"><i class="fas fa-ring"></i></span>
                        <span class="bs-stepper-label">Estado vehiculo</span>
                      </button>
                    </div>  
                    <!-- DATOS DE ACEITES -->
                    <div class="line"></div>
                    <div class="step" data-target="#aceite-part_ver" onclick="stepper.to(4)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="aceite-part_ver" id="aceite-trigger_ver" aria-selected="false" >
                        <span class="bs-stepper-circle"><i class="fas fa-oil-can"></i></span>
                        <span class="bs-stepper-label">Servicio</span>
                      </button>
                    </div>
                  </div><!-- FIN DE LOS TITULOS-->
                  <div class="bs-stepper-content">


                    <!-- FORMULARIO DATOIS-->
                    <div id="datos-part_ver" class="content active dstepper-block" role="tabpanel" aria-labelledby="datos-trigger_ver">
                    <div class="callout callout-danger">
                    <div class="row"> 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Placa</label>
                          <select class="js-example-basic-single"  name="state" id="sel_placa_ver" style="width:100%; heigth: 40px;">    
                          </select><br><br>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Fecha de ingreso</label>
                            <input  disabled type="date" class="form-control" id="txt_fIngreso_ver" style="width:100%; heigth: 40px; text-align:center;" value="<?php echo date("Y-m-d");?>"><br>
                          </div>
                        </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Técnico</label>
                            <select class="js-example-basic-single" id="sel_tecnico_ver" name="state" style="width:100%; heigth: 40px;"> 
                            <option value="0">Seleccionar</option>
                            <option value="1">Diego Caycedo</option>  
                            </select><br><br>
                          </div>
                      </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea class="form-control" id="txt_observaciones1_ver" placeholder="observaciones"></textarea><br>
                          </div>
                        </div>
                        </div>
                      <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>



                    
                    <!-- FORMULARIO BATERIA-->
                    <div id="bateria-part_ver" class="content" role="tabpanel" aria-labelledby="bateria-trigger_ver">
                    <div class="callout callout-danger">
                      <h2>Inventario</h2><br>
                    <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Reloj</label>
                            <select class="js-example-basic-single"  name="state" id="sel_reloj_ver_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Radio-Caratula</label>
                            <select class="js-example-basic-single"  name="state" id="sel_radio_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">CDs-Casetes</label>
                            <select class="js-example-basic-single"  name="state" id="sel_cd_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Gato-palanca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_gato_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      </div>
                    <div class="row">  
                    <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Encendedor</label>
                            <select class="js-example-basic-single"  name="state" id="sel_encendedor_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Cenicero</label>
                            <select class="js-example-basic-single"  name="state" id="sel_cenicero_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Forros</label>
                            <select class="js-example-basic-single"  name="state" id="sel_forro_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Herramienta</label>
                            <select class="js-example-basic-single"  name="state" id="sel_herramienta_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      </div>
                    
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Rueda repuesto</label>
                            <select class="js-example-basic-single"  name="state" id="sel_rueda_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                    </div>
                    <div class="callout callout-danger">
                    <div class="row"> 
                    <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tapetes</label>
                            <select class="js-example-basic-single"  name="state" id="sel_tapete_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Cuchilla limpia</label>
                            <select class="js-example-basic-single"  name="state" id="sel_cuchilla_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">llavero</label>
                            <select class="js-example-basic-single"  name="state" id="sel_llavero_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tercer stop</label>
                            <select class="js-example-basic-single"  name="state" id="sel_tercerStop_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                    </div>
                    <div class="row"> 
                    <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Emblemas</label>
                            <select class="js-example-basic-single"  name="state" id="sel_emblema_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Parasoles</label>
                            <select class="js-example-basic-single"  name="state" id="sel_parasol_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Manija</label>
                            <select class="js-example-basic-single"  name="state" id="sel_manija_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Cinturon seg.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_cinturon_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                    </div>
                    <div class="row"> 
                    <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Copas ruedas</label>
                            <select class="js-example-basic-single"  name="state" id="sel_copa_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Espejos</label>
                            <select class="js-example-basic-single"  name="state" id="sel_espejo_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Antena</label>
                            <select class="js-example-basic-single"  name="state" id="sel_antena_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Exploradoras</label>
                            <select class="js-example-basic-single"  name="state" id="sel_exploradora_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">no</option>  
                            </select><br><br>
                          </div>
                      </div>
                    </div>
                      <div class="col-md-13">
                          <div class="form-group">
                            <label for="">Observaciones:</label>
                            <textarea class="form-control" id="observaciones2_ver" placeholder="observaciones"></textarea><br>
                          </div>
                        </div>  
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>
                      



                     <!-- FORMULARIO llanta-->
                    <div id="llanta-part_ver" class="content" role="tabpanel" aria-labelledby="llanta-trigger_ver">

                  <div class="callout callout-danger">
                  <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#1</label>
                            <select class="js-example-basic-single"  name="state" id="sel_1_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#2</label>
                            <select class="js-example-basic-single"  name="state" id="sel_2_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#3</label>
                            <select class="js-example-basic-single"  name="state" id="sel_3_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#4</label>
                            <select class="js-example-basic-single"  name="state" id="sel_4_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      </div>
                    <div class="row">  
                    <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#5</label>
                            <select class="js-example-basic-single"  name="state" id="sel_5_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#6</label>
                            <select class="js-example-basic-single"  name="state" id="sel_6_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#7</label>
                            <select class="js-example-basic-single"  name="state" id="sel_7_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#8</label>
                            <select class="js-example-basic-single"  name="state" id="sel_8_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      </div>
                    <div class="row"> 
                    <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#9</label>
                            <select class="js-example-basic-single"  name="state" id="sel_9_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#10</label>
                            <select class="js-example-basic-single"  name="state" id="sel_10_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#11</label>
                            <select class="js-example-basic-single"  name="state" id="sel_11_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#12</label>
                            <select class="js-example-basic-single"  name="state" id="sel_12_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                    </div>
                    <div class="row"> 
                    <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#13</label>
                            <select class="js-example-basic-single"  name="state" id="sel_13_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#14</label>
                            <select class="js-example-basic-single"  name="state" id="sel_14_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#15</label>
                            <select class="js-example-basic-single"  name="state" id="sel_15_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#16</label>
                            <select class="js-example-basic-single"  name="state" id="sel_16_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                    </div>
                    <div class="row"> 
                    <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#17</label>
                            <select class="js-example-basic-single"  name="state" id="sel_17_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#18</label>
                            <select class="js-example-basic-single"  name="state" id="sel_18_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">#19</label>
                            <select class="js-example-basic-single"  name="state" id="sel_19_ver" style="width:100%; heigth: 40px;"> 
                              <option value="0">Seleccionar</option>
                              <option value="1">Raya</option>
                              <option value="2">Golpe</option>  
                            </select><br><br>
                          </div>
                      </div>
                    </div>

                      <div class="col-md-13">
                          <div class="form-group">
                            <label for="">Observaciones:</label>
                            <textarea class="form-control" id="txt_observaciones3_ver" placeholder="Observaciones"></textarea><br>
                          </div>
                        </div>  
                        <div class="row">
                        <div class="col-md-12" >
                        <img src="../Vista/imagenes/inventario1.jpg" class="inventario" style=" width:80%; display:block; margin:auto;">
                        </div>
                        </div> 
                      </div>
                     
                    <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                    <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>




                      <!-- FORMULARIO ACCEITE-->
                      <div id="aceite-part_ver" class="content" role="tabpanel" aria-labelledby="aceite-trigger_ver">


                      <div class="callout callout-danger">
                        <h5 class="text-danger">CAMBIO DE ACEITE DEL MOTOR</h5>
                        
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Servicio</label>
                              <select class="js-example-basic-single"  name="state" id="sel_servicio1_ver" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Servicio</label>
                              <select class="js-example-basic-single"  name="state" id="sel_servicio2_ver" style="width:100%; heigth: 40px;">
                              </select><br><br>
                            </div>
                          </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Servicio</label>
                              <select class="js-example-basic-single"  name="state" id="sel_servicio3_ver" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Servicio</label>
                              <select class="js-example-basic-single"  name="state" id="sel_servicio4_ver" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Servicio</label>
                              <select class="js-example-basic-single"  name="state" id="sel_servicio5_ver" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Servicio</label>
                              <select class="js-example-basic-single"  name="state" id="sel_servicio6_ver" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          
                        </div> 
                        <div class="col-md-13">
                          <div class="form-group">
                            <label for="">Observaciones:</label>
                            <textarea class="form-control" id="txt_observaciones4_ver" placeholder="Observaciones"></textarea><br>
                          </div>
                          </div>         
                      </div>

                      <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                      
                    </div>

                  </div>
                  <div style="margin-left:35%;">
                  <button type="button" class="btn btn-danger" data-dismiss="modal" ><i class="fa fa-close"></i> Cancelar</button>
                  </div>
                </div>
              </div>
              
              <!-- /.card-body -->
              <div class="card-footer">
              
              </div>
            </div>
            <!-- /.card -->
          </div>
          
        </div>

        
        </div>
      </div>
    </div>

</div>

</form>



<script type="text/javascript" src="../js/ordenServicio.js"></script>
<script>
  listar_orden();
  listar_placa();
  listar_tecnico();
  listar_servicio();
  listar_marca();
  listar_marca_llanta();
  listar_tipo_aceite();
  listar_marca_aceite();
  listar_filtro_aceite();
  listar_filtro_combustible();
  listar_filtro_aire();
  
  fechaCuarenta();
  
  fechaCochenta();
  $(document).ready(function(){ 
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $("#sel_reloj").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $("#sel_radio").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    $("#sel_cd").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $("#sel_gato").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    $("#sel_encendedor").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $("#sel_cenicero").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    $("#sel_forro").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $("#sel_herramienta").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    $("#sel_rueda").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $("#sel_tapete").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    $("#sel_cuchilla").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $("#sel_llavero").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    $("#sel_tercerStop").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $("#sel_emblema").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
      
    $("#sel_parasol").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $("#sel_manija").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    $("#sel_cinturon").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $("#sel_copa").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    $("#sel_espejo").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $("#sel_antena").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    $("#sel_exploradora").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $('#txt_recaudo').inputmask('$ 999.999.999' ,{ numericInput: true })
    
  });

</script>