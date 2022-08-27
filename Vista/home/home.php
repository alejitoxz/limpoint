<?php
session_start();
$Rol = $_SESSION['ROL'];
if ($Rol == 1 || $Rol == 2) {

?>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
        <br>
            <div class="row">

                <div class="col-lg-3 col-3 animate__animated animate__bounce">
                <div class="small-box" style="background-color:#E34949; color:#FFFFFF;">
                    <div class="inner">
                    <h3 id="contadorRecaudoTotal" style="color:white;">0</h3>
                    <p>Total Recaudado</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-list"></i>
                    </div>
                    <a onclick="cargar_contenido('contenido_principal','ordenServicio/vista_ordenServicio_listar.php')" class="small-box-footer" style="color:#FFFFFF;">Total recaudo
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                </div>
                
                <div class="col-lg-3 col-3">
                <div class="small-box" style="background-color:#48E843; color:#FFFFFF;">
                    <div class="inner">
                    <h3 id="contadorServicioTotal">0</h3>
                    <p>Total Servicios</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-list"></i>
                    </div>
                    <a onclick="cargar_contenido('contenido_principal','ordenServicio/vista_ordenServicio_listar.php')" class="small-box-footer" style="color:#FFFFFF;">Total Servicios registrados
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                </div>

                <div class="col-lg-3 col-3">
                    <div class="small-box"style="background-color:#0800FF; color:#FFFFFF;">
                        <div class="inner">
                        <h3 id="contadorVehiculo">0</h3>
                        <p>Total Vehículos</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-taxi"></i>
                        </div>
                        <a onclick="cargar_contenido('contenido_principal','vehiculo/vista_vehiculo_listar.php')" class="small-box-footer" style="color:#FFFFFF;">Total de vehículos  registrados 
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box" style="background-color:#4AD5E8; color:#FFFFFF;">
                    <div class="inner">
                    <h3 id="contadorPropietario">0</h3>
                        <p>Total Clientes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                        <a onclick="cargar_contenido('contenido_principal','propietario/vista_propietario_listar.php')" class="small-box-footer" style="color:#FFFFFF;">Total de clientes registrados 
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
          
              

            </div>
        </div>
    </div>
</div> 

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
          
        <div class="row">
          
        <label style="margin-left:8px; margin-top:5px;" for="">Seleccionar fechas:</label>
        <input type="text" class="form-control" id="fecIni" style="margin-left:8px; width:26%; heigth: 40px; text-align:center;" >
        <button type="button" class="btn btn-primary" onclick="contarRecaudo(); contarOrden(); contarVehiculoUnit(); contarclienteUnit(); graficaOrdenes();graficaBateria(); graficaTecnico();" style="margin-left:4px; width:50px; border-radius:15%;"><i class="fa fa-caret-right"> </i></button><br>
        </div>
        <br>
            <div class="row">

                <div class="col-lg-3 col-3">
                  <div class="small-box" style="background-color:#E34949; color:#FFFFFF;">
                    <div class="inner">
                    <h3 id="contadorRecaudo">0</h3>
                    <p>Recaudo diario</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-list"></i>
                    </div>
                    <a onclick="listar_ordenp();" class="small-box-footer" style="color:#FFFFFF;">Recaudo diario
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>

                <div class="col-lg-3 col-3">
                <div class="small-box"style="background-color:#48E843; color:#FFFFFF;">
                    <div class="inner">
                    <h3 id="contadorServicio">0</h3>
                    <p>Servicios diarios</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-list"></i>
                    </div>
                    <a onclick="cargar_contenido('contenido_principal','ordenServicio/vista_ordenServicio_listar.php')" class="small-box-footer" style="color:#FFFFFF;">Servicios registrados en el dia
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                </div>

                <div class="col-lg-3 col-3">
                    <div class="small-box" style="background-color:#0800FF; color:#FFFFFF;">
                        <div class="inner">
                        <h3 id="contadorVehiculoDiario">0</h3>
                        <p>Vehículos diarios</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-taxi"></i>
                        </div>
                        <a onclick="cargar_contenido('contenido_principal','vehiculo/vista_vehiculo_listar.php')" class="small-box-footer" style="color:#FFFFFF;">Vehiculos registrados en el dia
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box" style="background-color:#4AD5E8; color:#FFFFFF;">
                    <div class="inner">
                    <h3 id="contadorClienteDiario">0</h3>
                        <p>Clientes diarios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                        <a onclick="cargar_contenido('contenido_principal','propietario/vista_propietario_listar.php')" class="small-box-footer">Clientes registrados en el dia
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
          
              

            </div>
        </div>
    </div>
</div> 

<?php
}
?>


<!--
<div class="row">
<div class="col-md-6">
  <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Llantas por orden</h3>
      </div>
      <div class="card-body">
        <div class="chart">
          <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
              <div class=""></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
              <div class=""></div>
            </div>
          </div>
          <canvas id="areaChartLlanta" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor">
        </canvas>
        </div>
      </div>
       
  </div>
</div> 
<div class="col-md-12">
  <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Aceites por orden</h3>
      </div>
      <div class="card-body">
        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas id="areaChartAceite" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
  </div>
</div>
</div>


<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
        <h1 class="card-title"><b>Proximos vencimientos</b></h1>
        </div>
        <div class="card-body">
             /.card-header -->
            <!--<div class="card-body">
            <div class="form-group">
                <div class="col-lg-10">
                    <div class="col-lg-2">
                    <button type="button" id="enviarC" class="btn btn-primary"  onclick="enviarCorreoA()" ><i class='fa fa-file-pdf'></i>Exportar</button>
                    </div> 
                </div>
            </div>
        <table id="tabla_alerta" class="display responsive nowrap " style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Propietario</th>
                    <th>Placa</th>
                    <th>E-mail</th>
                    <th>Vencimiento</th>
                    <th>Fecha</th>
                    <th>Enviar</th>
                </tr>
            </thead>
            <tbody id="Listadohome">
            </tbody>
        </table>
        </div>
             /.card-body -->
    <!--</div>
             /.card 
    </div>
</div>
-->
<div class="col-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Contenido Grafico</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Recaudo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Servicios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Vehiculos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Clientes</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                  <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Total recaudo por dia</h3>
                            </div>
                            <div class="card-body">
                              <div class="chart">
                                <div class="chartjs-size-monitor">
                                  <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                  </div>
                                  <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                  </div>
                                </div>
                                <canvas id="areaChartTecnico" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor">
                              </canvas>
                              </div>
                            </div>

                        </div>
                      </div>
                      
                      <div class="row">
                      <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Total recaudo anual</h3>

                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                  <i class="fas fa-times"></i>
                                </button>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
                              </div>
                            </div>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Total recaudo por punto </h3>
                            </div>
                            <div class="card-body">
                              <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="areaChartBateria" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
                              </div>
                            </div>
                        </div>
                      </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                     Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                     Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                     Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>

<form autocomplete="false" onsubmit="return false">

<div class="modal fade" id="listar_ordenpe" role="dialog">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Ordenes registradas</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE vehiculo, CAMPOS -->
          <table id="tabla_orden" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                      <th>Placa</th>
                      <th>Cliente</th>
                      <th>Fecha de recepcion</th>
                      <th>Recaudo</th>
                    </tr>
                    </thead>
                    <tbody id="listar_ordentwo">
                    </tbody>
            </table>
  </div>
  </form>

<script src="../js/home.js"></script>
<script>
  
  $(document).ready(function(){
    listar_ordentwo();
  })
</script>
<script src="../js/usuario.js"></script>
<script src="../js/home.js"></script>
<script src="../js/vehiculo.js"></script>
<script src="../js/propietario.js"></script>
<script>
    contarRecaudoTotal();
    contarRecaudo();
    contarOrdenTotal();
    contarOrden();
    contarVehiculo();
    contarVehiculoUnit();
    contarclienteUnit();
    contarPropietario();
    graficaOrdenes();
    graficaBateria();
    //graficaAceite();
   // graficaLlanta();
    graficaTecnico();
 // enviarCorreoA();
    //contarConductor();
</script>
<script src="../Vista/plugins/chart.js/Chart.min.js"></script>

<style>
    .red{
        background-color:red !important;
    }
</style>
