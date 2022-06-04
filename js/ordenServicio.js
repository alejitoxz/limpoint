
var table;
var rol;
function listar_orden(){

    rol = $("#rol").val();
    console.log("rol",rol)
    
    table = $('#tabla_orden').DataTable( {
        "ordering":false,
        "paging": true,
        "tabIndex": 0,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": true ,
        "processing": false,
        "ajax": {
            "url": "../controlador/ordenServicio/controlador_listar_orden.php",
            "type": "POST"
        },"columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }
        ],
        "columns": [
            { "data": "idPersona" },
            { "data": "id" },
            { "data": "placa" },
            { "data": "propietario" },
            { "data": "eCorreo",
            render: function(data, type, row){
                if(data=='1'){
                    return "<span class='badge bg-primary'>Correo enviado</span>"
                }else{
                    return "<span class='badge bg-danger'>Correo no enviado</span>"
                }
            }
            },
            { "data": "tecnico" ,
            render: function(data, type, row){
                if(data=='1'){
                    return "Diego Caycedo"
                }else{
                    return "<span class='badge bg-danger'>Correo no enviado</span>"
                }}
            },
            { "data": "fIngreso" },
            { "data": "usuario" },
            { "data": "observaciones" },
            
            {
                render: function(data, type, row){
                    if(rol == 1){
                        return "<button style='font-size:13px;' type='button' class='eliminar btn btn-danger'><i class='fa fa-trash'></i></button><button style='font-size:13px;' type='button' class='editar btn btn-info'><i class='fa fa-edit'></i></button><button style='font-size:13px;' type='button' class='ver btn btn-primary'><i class='fa fa-eye'></i></button><button style='font-size:13px;' type='button' class='enviarCorreo btn btn-success'><i class='fa fa-envelope'></i></button>"
                    }else if(rol == 2){
                        return "<button style='font-size:13px;' type='button' class='ver btn btn-primary'><i class='fa fa-eye'></i></button>"
                    }
                }
            }
        ],
        "language":idioma_espanol,
       select: true
    } );
    
}

// FUNCION PARA EXPORTAR REPORTE
function exportarReporte(){
    var url = "../controlador/ordenServicio/controlador_exportar_reporte.php"
    window.open(url,'_blank');
}

function AbrirModalRegistroServicio(){
    $("#modal_registro_Servicio").modal({backdrop:'static',keyboard:false})
    $("#modal_registro_Servicio").modal('show');
    $(document).ready(function(){
        $('.js-example-basic-single').select2();
        $("#modal_registro_Servicio").on('shown.bs.modal',function(){
        });
    
        // inicimos wizzard
          // BS-Stepper Init
          window.stepper = new Stepper(document.querySelector('.bs-stepper'))

          
          
    
      });
}
function AbrirModalEditarOrdenServicio(){
    $("#modal_editar_OrdenServicio").modal({backdrop:'static',keyboard:false})
    $("#modal_editar_OrdenServicio").modal('show');
    $(document).ready(function(){
        $('.js-example-basic-single').select2();
        $("#modal_editar_OrdenServicio").on('shown.bs.modal',function(){
        });
    
        // inicimos wizzard
          // BS-Stepper Init
          window.stepper = new Stepper(document.querySelector('.stepper-editar'))
          
    
      });
}

function listar_placa(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_placa_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['placa']+"</option>";
            } 
            $("#sel_placa").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_tecnico(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_tecnico_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['tecnico']+"</option>";
            }
            $("#sel_tecnico").html(cadena);
            $("#sel_editar_tecnico").html(cadena);
            $("#sel_ver_tecnico").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}



function listar_servicio(){
    
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_servicio_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        console.log("entra",resp)
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['orden']+"</option>";
            }
            $("#sel_servicio1").html(cadena);
            $("#sel_servicio2").html(cadena);
            $("#sel_servicio3").html(cadena);
            $("#sel_servicio4").html(cadena);
            $("#sel_servicio5").html(cadena);
            $("#sel_servicio6").html(cadena);

        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_marca(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_marca_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['marca']+"</option>";
            }
            $("#sel_marca").html(cadena);
            $("#sel_editar_marca").html(cadena);
            $("#sel_ver_marca").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_marca_llanta(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_marca_llanta_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['llanta']+"</option>";
            }
            $("#sel_marca_llanta").html(cadena);
            $("#sel_marca_llanta1").html(cadena);
            $("#sel_marca_llanta2").html(cadena);
            $("#sel_marca_llanta3").html(cadena);
            $("#sel_marca_llanta4").html(cadena);
            $("#sel_marca_llanta5").html(cadena);
            $("#sel_editar_marca_llanta").html(cadena);
            $("#sel_editar_marca_llanta1").html(cadena);
            $("#sel_editar_marca_llanta2").html(cadena);
            $("#sel_editar_marca_llanta3").html(cadena);
            $("#sel_editar_marca_llanta4").html(cadena);
            $("#sel_editar_marca_llanta5").html(cadena);
            $("#sel_ver_marca_llanta").html(cadena);
            $("#sel_ver_marca_llanta1").html(cadena);
            $("#sel_ver_marca_llanta2").html(cadena);
            $("#sel_ver_marca_llanta3").html(cadena);
            $("#sel_ver_marca_llanta4").html(cadena);
            $("#sel_ver_marca_llanta5").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_tipo_aceite(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_tipo_aceite_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['tipo_aceite']+"</option>";
            }
            $("#sel_tipo_aceite").html(cadena);
            $("#sel_tipo_aceite1").html(cadena);
            $("#sel_tipo_aceite2").html(cadena);
            $("#sel_tipo_aceite3").html(cadena);
            $("#sel_tipo_aceite4").html(cadena);
            $("#sel_editar_tipo_aceite").html(cadena);
            $("#sel_editar_tipo_aceite1").html(cadena);
            $("#sel_editar_tipo_aceite2").html(cadena);
            $("#sel_editar_tipo_aceite3").html(cadena);
            $("#sel_editar_tipo_aceite4").html(cadena);
            $("#sel_ver_tipo_aceite").html(cadena);
            $("#sel_ver_tipo_aceite1").html(cadena);
            $("#sel_ver_tipo_aceite2").html(cadena);
            $("#sel_ver_tipo_aceite3").html(cadena);
            $("#sel_ver_tipo_aceite4").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_marca_aceite(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_marca_aceite_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['marca_aceite']+"</option>";
            }
            $("#sel_marca_aceite").html(cadena);
            $("#sel_marca_aceite1").html(cadena);
            $("#sel_marca_aceite2").html(cadena);
            $("#sel_marca_aceite3").html(cadena);
            $("#sel_marca_aceite4").html(cadena);
            $("#sel_editar_marca_aceite").html(cadena);
            $("#sel_editar_marca_aceite1").html(cadena);
            $("#sel_editar_marca_aceite2").html(cadena);
            $("#sel_editar_marca_aceite3").html(cadena);
            $("#sel_editar_marca_aceite4").html(cadena);
            $("#sel_ver_marca_aceite").html(cadena);
            $("#sel_ver_marca_aceite1").html(cadena);
            $("#sel_ver_marca_aceite2").html(cadena);
            $("#sel_ver_marca_aceite3").html(cadena);
            $("#sel_ver_marca_aceite4").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_filtro_aceite(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_filtro_aceite_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['filtro_aceite']+"</option>";
            }
            $("#sel_filtro_aceite").html(cadena);
            $("#sel_editar_filtro_aceite").html(cadena);
            $("#sel_ver_filtro_aceite").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_filtro_aire(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_filtro_aire_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['filtro_aire']+"</option>";
            }
            $("#sel_filtro_aire").html(cadena);
            $("#sel_editar_filtro_aire").html(cadena);
            $("#sel_ver_filtro_aire").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_filtro_combustible(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_filtro_combustible_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['filtro_combustible']+"</option>";
            }
            $("#sel_filtro_combustible").html(cadena);
            $("#sel_filtro_combustible2").html(cadena);
            $("#sel_filtro_combustible3").html(cadena);
            $("#sel_editar_filtro_combustible").html(cadena);
            $("#sel_editar_filtro_combustible2").html(cadena);
            $("#sel_editar_filtro_combustible3").html(cadena);
            $("#sel_ver_filtro_combustible").html(cadena);
            $("#sel_ver_filtro_combustible2").html(cadena);
            $("#sel_ver_filtro_combustible3").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}

function registrar_Servicio(){
    var placa = $("#sel_placa").val();
    var fIngreso = $("#txt_fIngreso").val();
    var tecnico = $("#sel_tecnico").val();
    var observaciones1 = $("#txt_observaciones1").val();
    var reloj = $("#sel_reloj").val();
    var radio = $("#sel_radio").val();
    var cd = $("#sel_cd").val();
    var gato = $("#sel_gato").val();
    var encendedor = $("#sel_encendedor").val();
    var cenicero = $("#sel_cenicero").val();
    var forro = $("#sel_forro").val();
    var herramienta = $("#sel_herramienta").val();
    var rueda = $("#sel_rueda").val();
    var tapete = $("#sel_tapete").val();
    var cuchilla = $("#sel_cuchilla").val();
    var llavero = $("#sel_llavero").val();
    var tercerStop = $("#sel_tercerStop").val();
    var emblema = $("#sel_emblema").val();
    var parasol = $("#sel_parasol").val();
    var manija = $("#sel_manija").val();
    var cinturon = $("#sel_cinturon").val();
    var copa = $("#sel_copa").val();
    var espejo = $("#sel_espejo").val();
    var antena = $("#sel_antena").val();
    var exploradora = $("#sel_exploradora").val();
    var observaciones2 = $("#observaciones2").val();
    var numero1 = $("#sel_1").val();
    var numero2 = $("#sel_2").val();
    var numero3 = $("#sel_3").val();
    var numero4 = $("#sel_4").val();
    var numero5 = $("#sel_5").val();
    var numero6 = $("#sel_6").val();

    var numero7 = $("#sel_7").val();
    var numero8 = $("#sel_8").val();
    var numero9 = $("#sel_9").val();
    var numero10 = $("#sel_10").val();
    var numero11 = $("#sel_11").val();
    var numero12 = $("#sel_12").val();
    var numero13 = $("#sel_13").val();
    var numero14 = $("#sel_14").val();
    var numero15 = $("#sel_15").val();

    var numero16 = $("#sel_16").val();
    var numero17 = $("#sel_17").val();
    var numero18 = $("#sel_18").val();
    var numero19 = $("#sel_19").val();
    var observaciones3 = $("#txt_observaciones3").val();
    var servicio1 = $("#sel_servicio1").val();
    var servicio2 = $("#sel_servicio2").val();
    var servicio3 = $("#sel_servicio3").val();
    var servicio4 = $("#sel_servicio4").val();

    var servicio5 = $("#sel_servicio5").val();
    var servicio6 = $("#sel_servicio6").val();
    var observaciones4 = $("#txt_observaciones4").val();
    

    $.ajax({
        "url": "../controlador/ordenServicio/controlador_ordenServicio_registro.php",
        "type": "POST",
        data:{
        placa:placa,
        fIngreso:fIngreso,
        tecnico:tecnico,
        observaciones1:observaciones1,
        reloj:reloj,
        radio:radio,
        cd:cd,
        gato:gato,
        encendedor:encendedor,
        cenicero:cenicero,
        forro:forro,
        herramienta:herramienta,
        rueda:rueda,
        tapete:tapete,
        cuchilla:cuchilla,
        llavero:llavero,
        tercerStop:tercerStop,
        emblema:emblema,
        parasol:parasol,
        manija:manija,
        cinturon:cinturon,
        copa:copa,
        espejo:espejo,

        antena:antena,
        exploradora:exploradora,
        observaciones2:observaciones2,
        numero1:numero1,
        numero2:numero2,
        numero3:numero3,
        numero4:numero4,
        numero5:numero5,
        numero6:numero6,
        numero7:numero7,
        numero8:numero8,
        numero9:numero9,
        numero10:numero10,

        numero11:numero11,
        numero12:numero12,
        numero13:numero13,
        numero14:numero14,
        numero15:numero15,
        numero16:numero16,
        numero17:numero17,
        numero18:numero18,
        numero19:numero19,
        observaciones3:observaciones3,
        servicio1:servicio1,
        servicio2:servicio2,
        servicio3:servicio3,
        servicio4:servicio4,
        servicio5:servicio5,
        servicio6:servicio6,
        observaciones4:observaciones4
        }
    }).done(function(resp){
        
        if(resp > 0){
            if(resp==1){
            $("#modal_registro_OrdenServicio").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Registro realizado', "success").then((value)=>{
                table.ajax.reload();
                limpiarRegistro();
            });
        }else{
            Swal.fire("Mensaje De Advertencia",'El usuario ya se encuentra en uso', "warning");
        }
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar el Registro', "error");
        }
    })

}

$('#tabla_orden').on('click','.editar',function(){

    if(table.row(this).child.isShown()){
        var datosOrden = table.row(this).data();
    }else{
        var datosOrden = table.row($(this).parents('tr')).data();
    }
    
    var id =datosOrden.id;
    var placa =datosOrden.idVehiculo;
    var revBimCotrautol =datosOrden.revBimCotrautol;
    var rRegistradora =datosOrden.rRegistradora;
    var vExtintor =datosOrden.vExtintor;
    var oReg =datosOrden.oRegistradora;
    var observacion =datosOrden.observacion;     
    var tecnico =datosOrden.idTecnico;
    var bateria =datosOrden.bateria;
    var tipoBateria =datosOrden.tipoBateria;
    var marca =datosOrden.marca;
    var serial =datosOrden.serial;
    var fVenta =datosOrden.fVenta;
    var fInstalacion =datosOrden.fInstalacion;
    var tUso =datosOrden.tiempoUso;
    var pCambio =datosOrden.proximoCambio;
    var pMantenimiento =datosOrden.proximoMantenimiento;
    var oMejora =datosOrden.oportunidadesMejora;
    var llantaSerial1 =datosOrden.llanta1Serial;
    var profundidad1 =datosOrden.llanta1Profundidad;
    var opmarca1 =datosOrden.llanta1Marca;
    var tipoMarca1 =datosOrden.llanta1Tipo;
    var estado1 =datosOrden.llanta1Estado;
    var fInstalacion1 =datosOrden.llanta1Instalacion;
    var fReencauche1 =datosOrden.llanta1Reencauche;
    var fCambio1 =datosOrden.llanta1Cambio;
    var fRotacion1 =datosOrden.llanta1Rotacion;

    var llantaSerial2 =datosOrden.llanta2Serial;
    var profundidad2 =datosOrden.llanta2Profundidad;
    var opmarca2 =datosOrden.llanta2Marca;
    var tipoMarca2 =datosOrden.llanta2Tipo;
    var estado2 =datosOrden.llanta2Estado;
    var fInstalacion2 =datosOrden.llanta2Instalacion;
    var fReencauche2 =datosOrden.llanta2Reencauche;
    var fCambio2 =datosOrden.llanta2Cambio;
    var fRotacion2 =datosOrden.llanta2Rotacion;

    var llantaSerial3 =datosOrden.llanta3Serial;
    var profundidad3 =datosOrden.llanta3Profundidad;
    var opmarca3 =datosOrden.llanta3Marca;
    var tipoMarca3 =datosOrden.llanta3Tipo;
    var estado3 =datosOrden.llanta3Estado;
    var fInstalacion3 =datosOrden.llanta3Instalacion;
    var fReencauche3 =datosOrden.llanta3Reencauche;
    var fCambio3 =datosOrden.llanta3Cambio;
    var fRotacion3 =datosOrden.llanta3Rotacion;

    var llantaSerial4 =datosOrden.llanta4Serial;
    var profundidad4 =datosOrden.llanta4Profundidad;
    var opmarca4 =datosOrden.llanta4Marca;
    var tipoMarca4 =datosOrden.llanta4Tipo;
    var estado4 =datosOrden.llanta4Estado;
    var fInstalacion4 =datosOrden.llanta4Instalacion;
    var fReencauche4 =datosOrden.llanta4Reencauche;
    var fCambio4 =datosOrden.llanta4Cambio;
    var fRotacion4 =datosOrden.llanta4Rotacion;

    var llantaSerial5 =datosOrden.llanta5Serial;
    var profundidad5 =datosOrden.llanta5Profundidad;
    var opmarca5 =datosOrden.llanta5Marca;
    var tipoMarca5 =datosOrden.llanta5Tipo;
    var estado5 =datosOrden.llanta5Estado;
    var fInstalacion5 =datosOrden.llanta5Instalacion;
    var fReencauche5 =datosOrden.llanta5Reencauche;
    var fCambio5 =datosOrden.llanta5Cambio;
    var fRotacion5 =datosOrden.llanta5Rotacion;

    var llantaSerial6 =datosOrden.llanta6Serial;
    var profundidad6 =datosOrden.llanta6Profundidad;
    var opmarca6 =datosOrden.llanta6Marca;
    var tipoMarca6 =datosOrden.llanta6Tipo;
    var estado6 =datosOrden.llanta6Estado;
    var fInstalacion6 =datosOrden.llanta6Instalacion;
    var fReencauche6 =datosOrden.llanta6Reencauche;
    var fCambio6 =datosOrden.llanta6Cambio;
    var fRotacion6 =datosOrden.llanta6Rotacion;


    var calibracion1 =datosOrden.calibracionLlanta1;
    var calibracion2 =datosOrden.calibracionLlanta2;
    var calibracion3 =datosOrden.calibracionLlanta3;
    var calibracion4 =datosOrden.calibracionLlanta4;
    var calibracion5 =datosOrden.calibracionLlanta5;
    var calibracion6 =datosOrden.calibracionLlanta6;
    var oCalibracion =datosOrden.observacionCalibracion;
    var balanceo1 =datosOrden.Balanceo1;
    var balanceo2 =datosOrden.Balanceo2;
    var balanceo3 =datosOrden.Balanceo3;
    var balanceo4 =datosOrden.Balanceo4;
    var balanceo5 =datosOrden.Balanceo5;
    var balanceo6 =datosOrden.Balanceo6;
    var oBalanceo =datosOrden.oBalanceo;
    var alineacion1 =datosOrden.alineacion1;
    var alineacion2 =datosOrden.alineacion2;
    var observacionG3 =datosOrden.lObservacionGeneral;
    var observacionM3 =datosOrden.lObservacionMejora;

    var fecha =datosOrden.motorFecha;
    var pCambioA =datosOrden.motorProximoCambio;
    var kilometraje =datosOrden.motorKilometraje;
    var cKilometraje =datosOrden.motorCambioKilometraje;
    var tipoAceite =datosOrden.motorTipoAceite;

    var marca10 =datosOrden.motorMarca;
    var cantidad1 =datosOrden.motorCantidad;
    var presentacion1 =datosOrden.motorPresentacion;
    var nivelacion =datosOrden.motorNivelacion;
    var cNivelacion =datosOrden.motorCantidadNivelada;
    var fAceite =datosOrden.motorFiltroAceite;
    var fCombustible =datosOrden.motorfiltroCombustible;
    var fAire =datosOrden.motorFiltroAire;
    var tipoAceite1 =datosOrden.cajaTipoAceite;
    var marca1 =datosOrden.cajaMarca;
    var uCambio =datosOrden.cajaUltimoCambio;
    var pCambio10 =datosOrden.cajaProximoCambio;
    var cantidad2 =datosOrden.cajaCantidad;
    var presentacion2 =datosOrden.cajaPresentacion;
    var nivelacion2 =datosOrden.cajaNivelacion;
    var cNivelacion2 =datosOrden.cajaCantidadNivelada;

    var tipoAceite3 =datosOrden.transmicionTipoAceite;
    var marca3 =datosOrden.transmicionMarca;
    var uCambio3 =datosOrden.transmicionUltimoCambio;
    var pCambio3 =datosOrden.transmicionProximoCambio;
    var cantidad3 =datosOrden.transmicionCantidad;
    var presentacion3 =datosOrden.transmicionPresentacion;
    var nivelacion3 =datosOrden.transmicionNivelacion;
    var cNivelacion3 =datosOrden.transmicionCantidadNivelada;

    var tipoAceite4 =datosOrden.refrigeranteTipoAceite;
    var marca4 =datosOrden.refrigeranteMarca;
    var uCambio4 =datosOrden.refrigeranteUltimoCambio;
    var pCambio4 =datosOrden.refrigeranteProximoCambio;

    var tipoAceite5 =datosOrden.hidraulicoTipoAceite;
    var marca5 =datosOrden.hidraulicoMarca;
    var uCambio5 =datosOrden.hidraulicoUltimoCambio;
    var pCambio5 =datosOrden.hidraulicoProximoCambio;

    var lFreno =datosOrden.liquidoFrenos;
    var lParabrisa =datosOrden.liquidoParabrisas;
    var refrigerante =datosOrden.liquidoRefrigerantes;
    var hidraulico =datosOrden.liquidoHidraulico;
    var lMotor =datosOrden.liquidoMotor;
    var lCaja =datosOrden.liquidoCaja;
    var lTransmision =datosOrden.liquidoTransmision;

    var lFrenos1 =datosOrden.otrosLimpiezaFrenos;
    var engrase =datosOrden.otrosEngrase;
    var sRadiador =datosOrden.otrosSopleteoRadiador;
    var sFiltroAire =datosOrden.otrosSopleteoFiltroAire;
    var observacionesF = datosOrden.observacionesGenerales2;

    var idOrdenServicio =datosOrden.idOrdenServicio;
    var idServicio =datosOrden.idServicio;

    var fCombustible2 =datosOrden.motorfiltroCombustible2;
    var fCombustible3 =datosOrden.motorfiltroCombustible3;
    

    //levantar modal
    AbrirModalEditarOrdenServicio();
    //ingresas datos modal
    $("#idOrdenServicio").val(idOrdenServicio);
    $("#idServicio").val(idServicio);
    $("#sel_editar_placa_vehiculo").val(placa).trigger('change');
    $("#txt_editar_revb").val(revBimCotrautol);
    $("#sel_editar_rReg").val(rRegistradora).trigger('change');
    $("#txt_editar_kmGps").val(0);
    $("#txt_editar_vExtintor").val(vExtintor);
    $("#txt_editar_oReg").val(oReg);
    $("#txt_editar_obs").val(observacion);
    $("#sel_editar_tecnico").val(tecnico).trigger('change');
    $("#sel_editar_bateria").val(bateria).trigger('change');
    $("#sel_editar_tipoBateria").val(tipoBateria).trigger('change');
    $("#sel_editar_marca").val(marca).trigger('change');
    $("#txt_editar_serial").val(serial);
    $("#txt_editar_fVenta").val(fVenta);
    $("#txt_editar_fInstalacion").val(fInstalacion);
    $("#txt_editar_tUso").val(tUso);
    $("#txt_editar_pCambio").val(pCambio);
    $("#txt_editar_pMantenimiento").val(pMantenimiento);
    $("#txt_editar_oMejora").val(oMejora);
    $("#txt_editar_llantaSerial1").val(llantaSerial1);
    $("#sel_editar_profundidad1").val(profundidad1).trigger('change');
    $("#sel_editar_marca_llanta1").val(opmarca1).trigger('change');
    $("#sel_editar_tipoMarca1").val(tipoMarca1).trigger('change');
    $("#sel_editar_estado1").val(estado1).trigger('change');
    $("#txt_editar_fInstalacion1").val(fInstalacion1);
    $("#txt_editar_fReencauche1").val(fReencauche1);
    $("#txt_editar_fCambio1").val(fCambio1);
    $("#txt_editar_fRotacion1").val(fRotacion1);

    $("#txt_editar_llantaSerial2").val(llantaSerial2);
    $("#sel_editar_profundidad2").val(profundidad2).trigger('change');
    $("#sel_editar_marca_llanta2").val(opmarca2).trigger('change');
    $("#sel_editar_tipoMarca2").val(tipoMarca2).trigger('change');
    $("#sel_editar_estado2").val(estado2).trigger('change');
    $("#txt_editar_fInstalacion2").val(fInstalacion2).trigger('change');
    $("#txt_editar_fReencauche2").val(fReencauche2);
    $("#txt_editar_fCambio2").val(fCambio2);
    $("#txt_editar_fRotacion2").val(fRotacion2);

    $("#txt_editar_llantaSerial3").val(llantaSerial3);
    $("#sel_editar_profundidad3").val(profundidad3).trigger('change');
    $("#sel_editar_marca_llanta3").val(opmarca3).trigger('change');
    $("#sel_editar_tipoMarca3").val(tipoMarca3).trigger('change');
    $("#sel_editar_estado3").val(estado3).trigger('change');
    $("#txt_editar_fInstalacion3").val(fInstalacion3);
    $("#txt_editar_fReencauche3").val(fReencauche3);
    $("#txt_editar_fCambio3").val(fCambio3);
    $("#txt_editar_fRotacion3").val(fRotacion3);

    $("#txt_editar_llantaSerial4").val(llantaSerial4);
    $("#sel_editar_profundidad4").val(profundidad4).trigger('change');
    $("#sel_editar_marca_llanta4").val(opmarca4).trigger('change');
    $("#sel_editar_tipoMarca4").val(tipoMarca4).trigger('change');
    $("#sel_editar_estado4").val(estado4).trigger('change');
    $("#txt_editar_fInstalacion4").val(fInstalacion4);
    $("#txt_editar_fReencauche4").val(fReencauche4);
    $("#txt_editar_fCambio4").val(fCambio4);
    $("#txt_editar_fRotacion4").val(fRotacion4);

    $("#txt_editar_llantaSerial5").val(llantaSerial5);
    $("#sel_editar_profundidad5").val(profundidad5).trigger('change');
    $("#sel_editar_marca_llanta5").val(opmarca5).trigger('change');
    $("#sel_editar_tipoMarca5").val(tipoMarca5).trigger('change');
    $("#sel_editar_estado5").val(estado5).trigger('change');
    $("#txt_editar_fInstalacion5").val(fInstalacion5);
    $("#txt_editar_fReencauche5").val(fReencauche5);
    $("#txt_editar_fCambio5").val(fCambio5);
    $("#txt_editar_fRotacion5").val(fRotacion5);

    $("#txt_editar_llantaSerial6").val(llantaSerial6);
    $("#sel_editar_profundidad6").val(profundidad6).trigger('change');
    $("#sel_editar_marca_llanta").val(opmarca6).trigger('change');
    $("#sel_editar_tipoMarca6").val(tipoMarca6).trigger('change');
    $("#sel_editar_estado6").val(estado6).trigger('change');
    $("#txt_editar_fInstalacion6").val(fInstalacion6);
    $("#txt_editar_fReencauche6").val(fReencauche6);
    $("#txt_editar_fCambio6").val(fCambio6);
    $("#txt_editar_fRotacion6").val(fRotacion6);


    $("#txt_editar_cal1").val(calibracion1);
    $("#txt_editar_cal2").val(calibracion2);
    $("#txt_editar_cal3").val(calibracion3);
    $("#txt_editar_cal4").val(calibracion4);
    $("#txt_editar_cal5").val(calibracion5);
    $("#txt_editar_cal6").val(calibracion6);
    $("#txt_editar_oCalibracion").val(oCalibracion);
    $("#sel_editar_bal1").val(balanceo1).trigger('change');
    $("#sel_editar_bal2").val(balanceo2).trigger('change');
    $("#sel_editar_bal3").val(balanceo3).trigger('change');
    $("#sel_editar_bal4").val(balanceo4).trigger('change');
    $("#sel_editar_bal5").val(balanceo5).trigger('change');
    $("#sel_editar_bal6").val(balanceo6).trigger('change');
    $("#txt_editar_oBalanceo").val(oBalanceo);
    $("#sel_editar_alineacion1").val(alineacion1).trigger('change');
    $("#sel_editar_alineacion2").val(alineacion2).trigger('change');
    $("#txt_editar_obs3").val(observacionG3);
    $("#txt_editar_obsM3").val(observacionM3);

    $("#txt_editar_fechaA").val(fecha);
    $("#txt_editar_pCambioA").val(pCambioA);
    $("#txt_editar_kilometraje").val(kilometraje);
    $("#txt_editar_ckilometraje").val(cKilometraje);
    $("#sel_editar_tipo_aceite").val(tipoAceite).trigger('change');
    $("#sel_editar_marca_aceite").val(marca10).trigger('change');
    $("#txt_editar_cantidad").val(cantidad1);
    $("#sel_editar_presentacion1").val(presentacion1).trigger('change');
    $("#sel_editar_nivelacion1").val(nivelacion).trigger('change');
    $("#txt_editar_cNivelacion1").val(cNivelacion);
    $("#sel_editar_filtro_aceite").val(fAceite).trigger('change');
    $("#sel_editar_filtro_combustible").val(fCombustible).trigger('change');
    $("#sel_editar_filtro_aire").val(fAire).trigger('change');
    $("#sel_editar_tipo_aceite1").val(tipoAceite1).trigger('change');
    $("#sel_editar_marca_aceite1").val(marca1).trigger('change');
    $("#txt_editar_uCambio1").val(uCambio);
    $("#txt_editar_pCambio1").val(pCambio10);
    $("#txt_editar_cantidad1").val(cantidad2);
    $("#sel_editar_presentacion2").val(presentacion2).trigger('change');
    $("#sel_editar_nivelacion2").val(nivelacion2).trigger('change');
    $("#txt_editar_nivelacion2").val(cNivelacion2);

    $("#sel_editar_tipo_aceite2").val(tipoAceite3).trigger('change');
    $("#sel_editar_marca_aceite2").val(marca3).trigger('change');
    $("#txt_editar_uCambio2").val(uCambio3);
    $("#txt_editar_pCambio2").val(pCambio3);
    $("#txt_editar_cantidad2").val(cantidad3);
    $("#sel_editar_presentacion3").val(presentacion3).trigger('change');
    $("#sel_editar_nivelacion3").val(nivelacion3).trigger('change');
    $("#txt_editar_nivelacion3").val(cNivelacion3);

    $("#sel_editar_tipo_aceite3").val(tipoAceite4).trigger('change');
    $("#sel_editar_marca_aceite3").val(marca4).trigger('change');
    $("#txt_editar_uCambio3").val(uCambio4);
    $("#txt_editar_pCambio3").val(pCambio4);

    $("#sel_editar_tipo_aceite4").val(tipoAceite5).trigger('change');
    $("#sel_editar_marca_aceite4").val(marca5).trigger('change');
    $("#txt_editar_uCambio4").val(uCambio5);
    $("#txt_editar_pCambio4").val(pCambio5);

    $("#sel_editar_lFreno").val(lFreno).trigger('change');
    $("#sel_editar_lParabrisa").val(lParabrisa).trigger('change');
    $("#sel_editar_refrigerante").val(refrigerante).trigger('change');
    $("#sel_editar_hidraulico").val(hidraulico).trigger('change');
    $("#sel_editar_lMotor").val(lMotor).trigger('change');
    $("#sel_editar_lCaja").val(lCaja).trigger('change');
    $("#sel_editar_lTransmision").val(lTransmision).trigger('change');

    $("#sel_editar_lFrenos1").val(lFrenos1).trigger('change');
    $("#sel_editar_engrase").val(engrase).trigger('change');
    $("#sel_editar_sRadiador").val(sRadiador).trigger('change');
    $("#sel_editar_sFiltroAire").val(sFiltroAire).trigger('change');

    
    $("#txt_editar_observacionesF").val(observacionesF);

    $("#sel_editar_filtro_combustible2").val(fCombustible2).trigger('change');
    $("#sel_editar_filtro_combustible3").val(fCombustible3).trigger('change');

})

function modificar_orden_Servicio(){
 
    var placa = $("#sel_editar_placa_vehiculo").val();
    var revBimCotrautol = $("#txt_editar_revb").val();
    var rRegistradora = $("#sel_editar_rReg").val();
    var kmGps = $("#txt_editar_kmGps").val();
    var vExtintor = $("#txt_editar_vExtintor").val();
    var oReg = $("#txt_editar_oReg").val();
    var observacion = $("#txt_editar_obs").val();
    var tecnico = $("#sel_editar_tecnico").val();
    var bateria = $("#sel_editar_bateria").val();
    var tipoBateria = $("#sel_editar_tipoBateria").val();
    var marca = $("#sel_editar_marca").val();
    var serial = $("#txt_editar_serial").val();
    var fVenta = $("#txt_editar_fVenta").val();
    var fInstalacion = $("#txt_editar_fInstalacion").val();
    var tUso = $("#txt_editar_tUso").val();
    var pCambio = $("#txt_editar_pCambio").val();
    var pMantenimiento = $("#txt_editar_pMantenimiento").val();
    var oMejora = $("#txt_editar_oMejora").val();
    var llantaSerial1 = $("#txt_editar_llantaSerial1").val();
    var profundidad1 = $("#sel_editar_profundidad1").val();
    var opmarca1 = $("#sel_editar_marca_llanta1").val();
    var tipoMarca1 = $("#sel_editar_tipoMarca1").val();
    var estado1 = $("#sel_editar_estado1").val();
    var fInstalacion1 = $("#txt_editar_fInstalacion1").val();
    var fReencauche1 = $("#txt_editar_fReencauche1").val();
    var fCambio1 = $("#txt_editar_fCambio1").val();
    var fRotacion1 = $("#txt_editar_fRotacion1").val();

    var llantaSerial2 = $("#txt_editar_llantaSerial2").val();
    var profundidad2 = $("#sel_editar_profundidad2").val();
    var opmarca2 = $("#sel_editar_marca_llanta2").val();
    var tipoMarca2 = $("#sel_editar_tipoMarca2").val();
    var estado2 = $("#sel_editar_estado2").val();
    var fInstalacion2 = $("#txt_editar_fInstalacion2").val();
    var fReencauche2 = $("#txt_editar_fReencauche2").val();
    var fCambio2 = $("#txt_editar_fCambio2").val();
    var fRotacion2 = $("#txt_editar_fRotacion2").val();

    var llantaSerial3 = $("#txt_editar_llantaSerial3").val();
    var profundidad3 = $("#sel_editar_profundidad3").val();
    var opmarca3 = $("#sel_editar_marca_llanta3").val();
    var tipoMarca3 = $("#sel_editar_tipoMarca3").val();
    var estado3 = $("#sel_editar_estado3").val();
    var fInstalacion3 = $("#txt_editar_fInstalacion3").val();
    var fReencauche3 = $("#txt_editar_fReencauche3").val();
    var fCambio3 = $("#txt_editar_fCambio3").val();
    var fRotacion3 = $("#txt_editar_fRotacion3").val();

    var llantaSerial4 = $("#txt_editar_llantaSerial4").val();
    var profundidad4 = $("#sel_editar_profundidad4").val();
    var opmarca4 = $("#sel_editar_marca_llanta4").val();
    var tipoMarca4 = $("#sel_editar_tipoMarca4").val();
    var estado4 = $("#sel_editar_estado4").val();
    var fInstalacion4 = $("#txt_editar_fInstalacion4").val();
    var fReencauche4 = $("#txt_editar_fReencauche4").val();
    var fCambio4 = $("#txt_editar_fCambio4").val();
    var fRotacion4 = $("#txt_editar_fRotacion4").val();

    var llantaSerial5 = $("#txt_editar_llantaSerial5").val();
    var profundidad5 = $("#sel_editar_profundidad5").val();
    var opmarca5 = $("#sel_editar_marca_llanta5").val();
    var tipoMarca5 = $("#sel_editar_tipoMarca5").val();
    var estado5 = $("#sel_editar_estado5").val();
    var fInstalacion5 = $("#txt_editar_fInstalacion5").val();
    var fReencauche5 = $("#txt_editar_fReencauche5").val();
    var fCambio5 = $("#txt_editar_fCambio5").val();
    var fRotacion5 = $("#txt_editar_fRotacion5").val();

    var llantaSerial6 = $("#txt_editar_llantaSerial6").val();
    var profundidad6 = $("#sel_editar_profundidad6").val();
    var opmarca6 = $("#sel_editar_marca_llanta").val();
    var tipoMarca6 = $("#sel_editar_tipoMarca6").val();
    var estado6 = $("#sel_editar_estado6").val();
    var fInstalacion6 = $("#txt_editar_fInstalacion6").val();
    var fReencauche6 = $("#txt_editar_fReencauche6").val();
    var fCambio6 = $("#txt_editar_fCambio6").val();
    var fRotacion6 = $("#txt_editar_fRotacion6").val();


    var calibracion1 = $("#txt_editar_cal1").val();
    var calibracion2 = $("#txt_editar_cal2").val();
    var calibracion3 = $("#txt_editar_cal3").val();
    var calibracion4 = $("#txt_editar_cal4").val();
    var calibracion5 = $("#txt_editar_cal5").val();
    var calibracion6 = $("#txt_editar_cal6").val();
    var oCalibracion = $("#txt_editar_oCalibracion").val();
    var balanceo1 = $("#sel_editar_bal1").val();
    var balanceo2 = $("#sel_editar_bal2").val();
    var balanceo3 = $("#sel_editar_bal3").val();
    var balanceo4 = $("#sel_editar_bal4").val();
    var balanceo5 = $("#sel_editar_bal5").val();
    var balanceo6 = $("#sel_editar_bal6").val();
    var oBalanceo = $("#txt_editar_oBalanceo").val();
    var alineacion1 = $("#sel_editar_alineacion1").val();
    var alineacion2 = $("#sel_editar_alineacion2").val();
    var observacionG3 = $("#txt_editar_obs3").val();
    var observacionM3 = $("#txt_editar_obsM3").val();

    var fecha = $("#txt_editar_fechaA").val();
    var pCambioA = $("#txt_editar_pCambioA").val();
    var kilometraje = $("#txt_editar_kilometraje").val();
    var cKilometraje = $("#txt_editar_ckilometraje").val();
    var tipoAceite = $("#sel_editar_tipo_aceite").val();
    var marca10 = $("#sel_editar_marca_aceite").val();
    var cantidad1 = $("#txt_editar_cantidad").val();
    var presentacion1 = $("#sel_editar_presentacion1").val();
    var nivelacion = $("#sel_editar_nivelacion1").val();
    var cNivelacion = $("#txt_editar_cNivelacion1").val();
    var fAceite = $("#sel_editar_filtro_aceite").val();
    var fCombustible = $("#sel_editar_filtro_combustible").val();
    var fAire = $("#sel_editar_filtro_aire").val();
    var tipoAceite1 = $("#sel_editar_tipo_aceite1").val();
    var marca1 = $("#sel_editar_marca_aceite1").val();
    var uCambio = $("#txt_editar_uCambio1").val();
    var pCambio10 = $("#txt_editar_pCambio1").val();
    var cantidad2 = $("#txt_editar_cantidad1").val();
    var presentacion2 = $("#sel_editar_presentacion2").val();
    var nivelacion2 = $("#sel_editar_nivelacion2").val();
    var cNivelacion2 = $("#txt_editar_nivelacion2").val();

    var tipoAceite3 = $("#sel_editar_tipo_aceite2").val();
    var marca3 = $("#sel_editar_marca_aceite2").val();
    var uCambio3 = $("#txt_editar_uCambio2").val();
    var pCambio3 = $("#txt_editar_pCambio2").val();
    var cantidad3 = $("#txt_editar_cantidad2").val();
    var presentacion3 = $("#sel_editar_presentacion3").val();
    var nivelacion3 = $("#sel_editar_nivelacion3").val();
    var cNivelacion3 = $("#txt_editar_nivelacion3").val();

    var tipoAceite4 = $("#sel_editar_tipo_aceite3").val();
    var marca4 = $("#sel_editar_marca_aceite3").val();
    var uCambio4 = $("#txt_editar_uCambio3").val();
    var pCambio4 = $("#txt_editar_pCambio3").val();

    var tipoAceite5 = $("#sel_editar_tipo_aceite4").val();
    var marca5 = $("#sel_editar_marca_aceite4").val();
    var uCambio5 = $("#txt_editar_uCambio4").val();
    var pCambio5 = $("#txt_editar_pCambio4").val();

    var lFreno = $("#sel_editar_lFreno").val();
    var lParabrisa = $("#sel_editar_lParabrisa").val();
    var refrigerante = $("#sel_editar_refrigerante").val();
    var hidraulico = $("#sel_editar_hidraulico").val();
    var lMotor = $("#sel_editar_lMotor").val();
    var lCaja = $("#sel_editar_lCaja").val();
    var lTransmision = $("#sel_editar_lTransmision").val();

    var lFrenos1 = $("#sel_editar_lFrenos1").val();
    var engrase = $("#sel_editar_engrase").val();
    var sRadiador = $("#sel_editar_sRadiador").val();
    var sFiltroAire = $("#sel_editar_sFiltroAire").val();
    
    var observacionesF = $("#txt_editar_observacionesF").val();

    var idOrdenServicio = $("#idOrdenServicio").val();
    var idServicio = $("#idServicio").val();

    var fCombustible2 = $("#sel_editar_filtro_combustible2").val();
    var fCombustible3 = $("#sel_editar_filtro_combustible3").val();

    $.ajax({
        "url": "../controlador/ordenServicio/controlador_ordenServicio_modificar.php",
        "type": "POST",
        data:{
            idOrdenServicio: idOrdenServicio,
            idServicio:idServicio,
            placa:placa,
            revBimCotrautol:revBimCotrautol,
            rRegistradora:rRegistradora,
            kmGps:kmGps,
            vExtintor:vExtintor,
            oReg:oReg,
            observacion:observacion,
            tecnico:tecnico,
            bateria:bateria,
            tipoBateria:tipoBateria,
            marca:marca,
            serial:serial,
            fVenta:fVenta,
            fInstalacion:fInstalacion,
            tUso:tUso,
            pCambio:pCambio,
            pMantenimiento:pMantenimiento,
            oMejora:oMejora,
            llantaSerial1:llantaSerial1,
            profundidad1:profundidad1,
            opmarca1:opmarca1,
            tipoMarca1:tipoMarca1,
            estado1:estado1,
            fInstalacion1:fInstalacion1,
    
            fReencauche1:fReencauche1,
            fCambio1:fCambio1,
            fRotacion1:fRotacion1,
            llantaSerial2:llantaSerial2,
            profundidad2:profundidad2,
            opmarca2:opmarca2,
            tipoMarca2:tipoMarca2,
            estado2:estado2,
            fInstalacion2:fInstalacion2,
            fReencauche2:fReencauche2,
            fCambio2:fCambio2,
            fRotacion2:fRotacion2,
    
            llantaSerial3:llantaSerial3,
            profundidad3:profundidad3,
            opmarca3:opmarca3,
            tipoMarca3:tipoMarca3,
            estado3:estado3,
            fInstalacion3:fInstalacion3,
            fReencauche3:fReencauche3,
            fCambio3:fCambio3,
            fRotacion3:fRotacion3,
            llantaSerial4:llantaSerial4,
            profundidad4:profundidad4,
            opmarca4:opmarca4,
            tipoMarca4:tipoMarca4,
            estado4:estado4,
            fInstalacion4:fInstalacion4,
            fReencauche4:fReencauche4,
            fCambio4:fCambio4,
            fRotacion4:fRotacion4,
            llantaSerial5:llantaSerial5,
            profundidad5:profundidad5,
            opmarca5:opmarca5,
            tipoMarca5:tipoMarca5,
            estado5:estado5,
            fInstalacion5:fInstalacion5,
            fReencauche5:fReencauche5,
            fCambio5:fCambio5,
            fRotacion5:fRotacion5,
            llantaSerial6:llantaSerial6,
            profundidad6:profundidad6,
            opmarca6:opmarca6,
            tipoMarca6:tipoMarca6,
            estado6:estado6,
            fInstalacion6:fInstalacion6,
            fReencauche6:fReencauche6,
            fCambio6:fCambio6,
            fRotacion6:fRotacion6,
    
            calibracion1:calibracion1,
            calibracion2:calibracion2,
            calibracion3:calibracion3,
            calibracion4:calibracion4,
            calibracion5:calibracion5,
            calibracion6:calibracion6,
            oCalibracion:oCalibracion,
            balanceo1:balanceo1,
            balanceo2:balanceo2,
            balanceo3:balanceo3,
            balanceo4:balanceo4,
            balanceo5:balanceo5,
            balanceo6:balanceo6,
            oBalanceo:oBalanceo,
            alineacion1:alineacion1,
            alineacion2:alineacion2,
            observacionG3:observacionG3,
            observacionM3:observacionM3,
    
            fecha:fecha,
            pCambioA:pCambioA,
            kilometraje:kilometraje,
            cKilometraje:cKilometraje,
            tipoAceite:tipoAceite,
            marca10:marca10,
            cantidad1:cantidad1,
            presentacion1:presentacion1,
            nivelacion:nivelacion,
            cNivelacion:cNivelacion,
            fAceite:fAceite,
            fCombustible:fCombustible,
            fAire:fAire,
            tipoAceite1:tipoAceite1,
            marca1:marca1,
            uCambio:uCambio,
            pCambio10:pCambio10,
            cantidad2:cantidad2,
            presentacion2:presentacion2,
            nivelacion2:nivelacion2,
            cNivelacion2:cNivelacion2,
    
            tipoAceite3:tipoAceite3,
            marca3:marca3,
            uCambio3:uCambio3,
            pCambio3:pCambio3,
            cantidad3:cantidad3,
            presentacion3:presentacion3,
            nivelacion3:nivelacion3,
            cNivelacion3:cNivelacion3,
    
            tipoAceite4:tipoAceite4,
            marca4:marca4,
            uCambio4:uCambio4,
            pCambio4:pCambio4,
            tipoAceite5:tipoAceite5,
            marca5:marca5,
            uCambio5:uCambio5,
            pCambio5:pCambio5,
    
            lFreno:lFreno,
            lParabrisa:lParabrisa,
            refrigerante:refrigerante,
            hidraulico:hidraulico,
            lMotor:lMotor,
            lCaja:lCaja,
            lTransmision:lTransmision,
            lFrenos1:lFrenos1,
            engrase:engrase,
            sRadiador:sRadiador,
            sFiltroAire:sFiltroAire,
            observacionesF:observacionesF,
            fCombustible2:fCombustible2,
            fCombustible3:fCombustible3
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            $("#modal_editar_OrdenServicio").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Datos Actualizados', "success")
                .then((value)=>{
                table.ajax.reload();
            });
        
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar la edicion', "error");
        }
    })

}

function fechaCuarenta(dias){
    var Init = new Date(dias);
    Init.setDate(Init.getDate() + 40);
    mes = '' + (Init.getMonth() + 1),
    dia = '' + Init.getDate(),
    anio = Init.getFullYear();

    if (mes.length < 2) 
        mes = '0' + mes;
    if (dia.length < 2) 
        dia = '0' + dia;

    var fec = [anio, mes, dia].join('-');
    $("#txt_pCambioA").val(fec);
}

function fechaCochenta(dias,id){
    var Init = new Date(dias);
    Init.setDate(Init.getDate() + 180);
    mes = '' + (Init.getMonth() + 1),
    dia = '' + Init.getDate(),
    anio = Init.getFullYear();

    if (mes.length < 2) 
        mes = '0' + mes;
    if (dia.length < 2) 
        dia = '0' + dia;

    var fec = [anio, mes, dia].join('-');
    $("#"+id).val(fec);
}
function limpiarRegistro(){
    var fecha = new Date();
    fecha.setDate(fecha.getDate());
    mes = '' + (fecha.getMonth() + 1),
    dia = '' + fecha.getDate(),
    anio = fecha.getFullYear();

    if (mes.length < 2) 
        mes = '0' + mes;
    if (dia.length < 2) 
        dia = '0' + dia;

    var fec = [anio, mes, dia].join('-');

    $("#sel_placa_vehiculo").val(0);
    $("#txt_revb").val(0);
    $("#sel_rReg").val(0);
    $("#txt_kmGps").val("");
    $("#txt_vExtintor").val(fec);
    $("#txt_oReg").val("");
    $("#txt_obs").val("");
    $("#sel_tecnico").val(0);
    $("#sel_bateria").val(0);
    $("#sel_tipoBateria").val(0);
    $("#sel_marca").val(0);
    $("#txt_serial").val("");
    $("#txt_fVenta").val(fec);
    $("#txt_fInstalacion").val(fec);
    $("#txt_tUso").val("");
    $("#txt_pCambio").val();
    $("#txt_pMantenimiento").val();
    $("#txt_oMejora").val("");
    $("#txt_llantaSerial1").val("");
    $("#sel_profundidad1").val(0);
    $("#sel_marca_llanta1").val(0);
    $("#sel_tipoMarca1").val(0);
    $("#sel_estado1").val(0);
    $("#txt_fInstalacion1").val(fec);
    $("#txt_fReencauche1").val(fec);
    $("#txt_fCambio1").val();
    $("#txt_fRotacion1").val(fec);

    $("#txt_llantaSerial2").val("");
    $("#sel_profundidad2").val(0);
    $("#sel_marca_llanta2").val(0);
    $("#sel_tipoMarca2").val(0);
    $("#sel_estado2").val(0);
    $("#txt_fInstalacion2").val(fec);
    $("#txt_fReencauche2").val("");
    $("#txt_fCambio2").val("");
    $("#txt_fRotacion2").val("");

    $("#txt_llantaSerial3").val("");
    $("#sel_profundidad3").val(0);
    $("#sel_marca_llanta3").val(0);
    $("#sel_tipoMarca3").val(0);
    $("#sel_estado3").val(0);
    $("#txt_fInstalacion3").val(fec);
    $("#txt_fReencauche3").val(fec);
    $("#txt_fCambio3").val();
    $("#txt_fRotacion3").val(fec);

    $("#txt_llantaSerial4").val("");
    $("#sel_profundidad4").val(0);
    $("#sel_marca_llanta4").val(0);
    $("#sel_tipoMarca4").val(0);
    $("#sel_estado4").val(0);
    $("#txt_fInstalacion4").val(fec);
    $("#txt_fReencauche4").val(fec);
    $("#txt_fCambio4").val();
    $("#txt_fRotacion4").val(fec);

    $("#txt_llantaSerial5").val("");
    $("#sel_profundidad5").val(0);
    $("#sel_marca_llanta5").val(0);
    $("#sel_tipoMarca5").val(0);
    $("#sel_estado5").val(0);
    $("#txt_fInstalacion5").val(fec);
    $("#txt_fReencauche5").val(fec);
    $("#txt_fCambio5").val();
    $("#txt_fRotacion5").val(fec);

    $("#txt_llantaSerial6").val("");
    $("#sel_profundidad6").val(0);
    $("#sel_marca_llanta").val(0);
    $("#sel_tipoMarca6").val(0);
    $("#sel_estado6").val(0);
    $("#txt_fInstalacion6").val(fec);
    $("#txt_fReencauche6").val(fec);
    $("#txt_fCambio6").val();
    $("#txt_fRotacion6").val(fec);


    $("#txt_cal1").val("");
    $("#txt_cal2").val("");
    $("#txt_cal3").val("");
    $("#txt_cal4").val("");
    $("#txt_cal5").val("");
    $("#txt_cal6").val("");
    $("#txt_oCalibracion").val("");
    $("#sel_bal1").val(0);
    $("#sel_bal2").val(0);
    $("#sel_bal3").val(0);
    $("#sel_bal4").val(0);
    $("#sel_bal5").val(0);
    $("#sel_bal6").val(0);
    $("#txt_oBalanceo").val("");
    $("#sel_alineacion1").val(0);
    $("#sel_alineacion2").val(0);
    $("#txt_obs3").val("");
    $("#txt_obsM3").val("");

    $("#txt_fechaA").val(fec);
    $("#txt_pCambioA").val();
    $("#txt_kilometraje").val("");
    $("#txt_ckilometraje").val("");
    $("#sel_tipo_aceite").val(0);
    $("#sel_marca_aceite").val(0);
    $("#txt_cantidad1").val(0);
    $("#sel_presentacion1").val(0);
    $("#sel_nivelacion1").val(0);
    $("#txt_cNivelacion1").val(0);
    $("#sel_filtro_aceite").val(0);
    $("#sel_filtro_combustible").val(0);
    $("#sel_filtro_combustible2").val(0);
    $("#sel_filtro_combustible3").val(0);
    $("#sel_filtro_aire").val(0);
    $("#sel_tipo_aceite1").val(0);
    $("#sel_marca_aceite1").val(0);
    $("#txt_uCambio1").val(fec);
    $("#txt_pCambio1").val();
    $("#txt_cantidad2").val(0);
    $("#sel_presentacion2").val(0);
    $("#sel_nivelacion2").val(0);
    $("#txt_nivelacion2").val(0);

    $("#sel_tipo_aceite2").val(0);
    $("#sel_marca_aceite2").val(0);
    $("#txt_uCambio2").val(fec);
    $("#txt_pCambio2").val();
    $("#txt_cantidad3").val(0);
    $("#sel_presentacion3").val(0);
    $("#sel_nivelacion3").val(0);
    $("#txt_nivelacion3").val(0);

    $("#sel_tipo_aceite3").val(0);
    $("#sel_marca_aceite3").val(0);
    $("#txt_uCambio3").val(fec);
    $("#txt_pCambio3").val();

    $("#sel_tipo_aceite4").val(0);
    $("#sel_marca_aceite4").val(0);
    $("#txt_uCambio4").val(fec);
    $("#txt_pCambio4").val();

    $("#sel_lFreno").val(0);
    $("#sel_lParabrisa").val(0);
    $("#sel_refrigerante").val(0);
    $("#sel_hidraulico").val(0);
    $("#sel_lMotor").val(0);
    $("#sel_lCaja").val(0);
    $("#sel_lTransmision").val(0);

    $("#sel_lFrenos1").val(0);
    $("#sel_engrase").val(0);
    $("#sel_sRadiador").val(0);
    $("#sel_sFiltroAire").val(0);

    
    $("#txt_observacionesF").val("");
}

// FUNCION PARA ELIMINAR (ANULAR) REGISTRO
$('#tabla_orden').on('click','.eliminar',function(){
    if(table.row(this).child.isShown()){
        var idOrdenServicio = table.row(this).data().idOrdenServicio;
    }else{
        var idOrdenServicio = table.row($(this).parents('tr')).data().idOrdenServicio;
    }
    Swal.fire({
        title: '¿Seguro desea eliminar el registro?',
        text: "Una vez hecho esto, se eliminara del sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
          console.log(result);
        if (result.value) {
        modificar_estatus(idOrdenServicio,0);
          Swal.fire(
            'Eliminado',
            '¡Tu registro ha sido eliminado!',
            'success'
          )
        }
      })
    
})
function modificar_estatus(id,estatus){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_modificar_ordenServicio_estatus.php",
        type: "POST",
        data:{
        id:id,
        estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                    listar_orden();
                
            }else{
                Swal.fire("Mensaje De Advertencia",'No se pudo borrar el archivo', "warning")
            }
        }
    })
}

function AbrirModalVerOrdenServicio(){
    $("#modal_ver_OrdenServicio").modal({backdrop:'static',keyboard:false})
    $("#modal_ver_OrdenServicio").modal('show');
    $(document).ready(function(){
        $('.js-example-basic-single').select2();
        $("#modal_ver_OrdenServicio").on('shown.bs.modal',function(){
        });
    
        // inicimos wizzard
          // BS-Stepper Init
          window.stepper = new Stepper(document.querySelector('.stepper-ver'))

          
          
    
      });
}
$('#tabla_orden').on('click','.ver',function(){

    if(table.row(this).child.isShown()){
        var datosOrden = table.row(this).data();
    }else{
        var datosOrden = table.row($(this).parents('tr')).data();
    }
    
    var id =datosOrden.id;
    var placa =datosOrden.idVehiculo;
    var revBimCotrautol =datosOrden.revBimCotrautol;
    var rRegistradora =datosOrden.rRegistradora;
    var vExtintor =datosOrden.vExtintor;
    var oReg =datosOrden.oRegistradora;
    var observacion =datosOrden.observacion;     
    var tecnico =datosOrden.idTecnico;
    var bateria =datosOrden.bateria;
    var tipoBateria =datosOrden.tipoBateria;
    var marca =datosOrden.marca;
    var serial =datosOrden.serial;
    var fVenta =datosOrden.fVenta;
    var fInstalacion =datosOrden.fInstalacion;
    var tUso =datosOrden.tiempoUso;
    var pCambio =datosOrden.proximoCambio;
    var pMantenimiento =datosOrden.proximoMantenimiento;
    var oMejora =datosOrden.oportunidadesMejora;
    var llantaSerial1 =datosOrden.llanta1Serial;
    var profundidad1 =datosOrden.llanta1Profundidad;
    var opmarca1 =datosOrden.llanta1Marca;
    var tipoMarca1 =datosOrden.llanta1Tipo;
    var estado1 =datosOrden.llanta1Estado;
    var fInstalacion1 =datosOrden.llanta1Instalacion;
    var fReencauche1 =datosOrden.llanta1Reencauche;
    var fCambio1 =datosOrden.llanta1Cambio;
    var fRotacion1 =datosOrden.llanta1Rotacion;

    var llantaSerial2 =datosOrden.llanta2Serial;
    var profundidad2 =datosOrden.llanta2Profundidad;
    var opmarca2 =datosOrden.llanta2Marca;
    var tipoMarca2 =datosOrden.llanta2Tipo;
    var estado2 =datosOrden.llanta2Estado;
    var fInstalacion2 =datosOrden.llanta2Instalacion;
    var fReencauche2 =datosOrden.llanta2Reencauche;
    var fCambio2 =datosOrden.llanta2Cambio;
    var fRotacion2 =datosOrden.llanta2Rotacion;

    var llantaSerial3 =datosOrden.llanta3Serial;
    var profundidad3 =datosOrden.llanta3Profundidad;
    var opmarca3 =datosOrden.llanta3Marca;
    var tipoMarca3 =datosOrden.llanta3Tipo;
    var estado3 =datosOrden.llanta3Estado;
    var fInstalacion3 =datosOrden.llanta3Instalacion;
    var fReencauche3 =datosOrden.llanta3Reencauche;
    var fCambio3 =datosOrden.llanta3Cambio;
    var fRotacion3 =datosOrden.llanta3Rotacion;

    var llantaSerial4 =datosOrden.llanta4Serial;
    var profundidad4 =datosOrden.llanta4Profundidad;
    var opmarca4 =datosOrden.llanta4Marca;
    var tipoMarca4 =datosOrden.llanta4Tipo;
    var estado4 =datosOrden.llanta4Estado;
    var fInstalacion4 =datosOrden.llanta4Instalacion;
    var fReencauche4 =datosOrden.llanta4Reencauche;
    var fCambio4 =datosOrden.llanta4Cambio;
    var fRotacion4 =datosOrden.llanta4Rotacion;

    var llantaSerial5 =datosOrden.llanta5Serial;
    var profundidad5 =datosOrden.llanta5Profundidad;
    var opmarca5 =datosOrden.llanta5Marca;
    var tipoMarca5 =datosOrden.llanta5Tipo;
    var estado5 =datosOrden.llanta5Estado;
    var fInstalacion5 =datosOrden.llanta5Instalacion;
    var fReencauche5 =datosOrden.llanta5Reencauche;
    var fCambio5 =datosOrden.llanta5Cambio;
    var fRotacion5 =datosOrden.llanta5Rotacion;

    var llantaSerial6 =datosOrden.llanta6Serial;
    var profundidad6 =datosOrden.llanta6Profundidad;
    var opmarca6 =datosOrden.llanta6Marca;
    var tipoMarca6 =datosOrden.llanta6Tipo;
    var estado6 =datosOrden.llanta6Estado;
    var fInstalacion6 =datosOrden.llanta6Instalacion;
    var fReencauche6 =datosOrden.llanta6Reencauche;
    var fCambio6 =datosOrden.llanta6Cambio;
    var fRotacion6 =datosOrden.llanta6Rotacion;


    var calibracion1 =datosOrden.calibracionLlanta1;
    var calibracion2 =datosOrden.calibracionLlanta2;
    var calibracion3 =datosOrden.calibracionLlanta3;
    var calibracion4 =datosOrden.calibracionLlanta4;
    var calibracion5 =datosOrden.calibracionLlanta5;
    var calibracion6 =datosOrden.calibracionLlanta6;
    var oCalibracion =datosOrden.observacionCalibracion;
    var balanceo1 =datosOrden.Balanceo1;
    var balanceo2 =datosOrden.Balanceo2;
    var balanceo3 =datosOrden.Balanceo3;
    var balanceo4 =datosOrden.Balanceo4;
    var balanceo5 =datosOrden.Balanceo5;
    var balanceo6 =datosOrden.Balanceo6;
    var oBalanceo =datosOrden.oBalanceo;
    var alineacion1 =datosOrden.alineacion1;
    var alineacion2 =datosOrden.alineacion2;
    var observacionG3 =datosOrden.lObservacionGeneral;
    var observacionM3 =datosOrden.lObservacionMejora;

    var fecha =datosOrden.motorFecha;
    var pCambioA =datosOrden.motorProximoCambio;
    var kilometraje =datosOrden.motorKilometraje;
    var cKilometraje =datosOrden.motorCambioKilometraje;
    var tipoAceite =datosOrden.motorTipoAceite;
    var marca10 =datosOrden.motorMarca;
    var cantidad1 =datosOrden.motorCantidad;
    var presentacion1 =datosOrden.motorPresentacion;
    var nivelacion =datosOrden.motorNivelacion;
    var cNivelacion =datosOrden.motorCantidadNivelada;
    var fAceite =datosOrden.motorFiltroAceite;
    var fCombustible =datosOrden.motorfiltroCombustible;
    var fAire =datosOrden.motorFiltroAire;
    var tipoAceite1 =datosOrden.cajaTipoAceite;
    var marca1 =datosOrden.cajaMarca;
    var uCambio =datosOrden.cajaUltimoCambio;
    var pCambio10 =datosOrden.cajaProximoCambio;
    var cantidad2 =datosOrden.cajaCantidad;
    var presentacion2 =datosOrden.cajaPresentacion;
    var nivelacion2 =datosOrden.cajaNivelacion;
    var cNivelacion2 =datosOrden.cajaCantidadNivelada;

    var tipoAceite3 =datosOrden.transmicionTipoAceite;
    var marca3 =datosOrden.transmicionMarca;
    var uCambio3 =datosOrden.transmicionUltimoCambio;
    var pCambio3 =datosOrden.transmicionProximoCambio;
    var cantidad3 =datosOrden.transmicionCantidad;
    var presentacion3 =datosOrden.transmicionPresentacion;
    var nivelacion3 =datosOrden.transmicionNivelacion;
    var cNivelacion3 =datosOrden.transmicionCantidadNivelada;

    var tipoAceite4 =datosOrden.refrigeranteTipoAceite;
    var marca4 =datosOrden.refrigeranteMarca;
    var uCambio4 =datosOrden.refrigeranteUltimoCambio;
    var pCambio4 =datosOrden.refrigeranteProximoCambio;

    var tipoAceite5 =datosOrden.hidraulicoTipoAceite;
    var marca5 =datosOrden.hidraulicoMarca;
    var uCambio5 =datosOrden.hidraulicoUltimoCambio;
    var pCambio5 =datosOrden.hidraulicoProximoCambio;

    var lFreno =datosOrden.liquidoFrenos;
    var lParabrisa =datosOrden.liquidoParabrisas;
    var refrigerante =datosOrden.liquidoRefrigerantes;
    var hidraulico =datosOrden.liquidoHidraulico;
    var lMotor =datosOrden.liquidoMotor;
    var lCaja =datosOrden.liquidoCaja;
    var lTransmision =datosOrden.liquidoTransmision;

    var lFrenos1 =datosOrden.otrosLimpiezaFrenos;
    var engrase =datosOrden.otrosEngrase;
    var sRadiador =datosOrden.otrosSopleteoRadiador;
    var sFiltroAire =datosOrden.otrosSopleteoFiltroAire;
    var observacionesF = datosOrden.observacionesGenerales2;

    var idOrdenServicio =datosOrden.idOrdenServicio;
    var idServicio =datosOrden.idServicio;

    var fCombustible2 =datosOrden.motorfiltroCombustible2;
    var fCombustible3 =datosOrden.motorfiltroCombustible3;
    

    //levantar modal
    AbrirModalVerOrdenServicio();
    //ingresas datos modal
    $("#idOrdenServicio").val(idOrdenServicio);
    $("#idServicio").val(idServicio);
    $("#sel_ver_placa_vehiculo").val(placa).trigger('change');
    $("#txt_ver_revb").val(revBimCotrautol);
    $("#sel_ver_rReg").val(rRegistradora).trigger('change');
    $("#txt_ver_kmGps").val(0);
    $("#txt_ver_vExtintor").val(vExtintor);
    $("#txt_ver_oReg").val(oReg);
    $("#txt_ver_obs").val(observacion);
    $("#sel_ver_tecnico").val(tecnico).trigger('change');
    $("#sel_ver_bateria").val(bateria).trigger('change');
    $("#sel_ver_tipoBateria").val(tipoBateria).trigger('change');
    $("#sel_ver_marca").val(marca).trigger('change');
    $("#txt_ver_serial").val(serial);
    $("#txt_ver_fVenta").val(fVenta);
    $("#txt_ver_fInstalacion").val(fInstalacion);
    $("#txt_ver_tUso").val(tUso);
    $("#txt_ver_pCambio").val(pCambio);
    $("#txt_ver_pMantenimiento").val(pMantenimiento);
    $("#txt_ver_oMejora").val(oMejora);
    $("#txt_ver_llantaSerial1").val(llantaSerial1);
    $("#sel_ver_profundidad1").val(profundidad1).trigger('change');
    $("#sel_ver_marca_llanta1").val(opmarca1).trigger('change');
    $("#sel_ver_tipoMarca1").val(tipoMarca1).trigger('change');
    $("#sel_ver_estado1").val(estado1).trigger('change');
    $("#txt_ver_fInstalacion1").val(fInstalacion1);
    $("#txt_ver_fReencauche1").val(fReencauche1);
    $("#txt_ver_fCambio1").val(fCambio1);
    $("#txt_ver_fRotacion1").val(fRotacion1);

    $("#txt_ver_llantaSerial2").val(llantaSerial2);
    $("#sel_ver_profundidad2").val(profundidad2).trigger('change');
    $("#sel_ver_marca_llanta2").val(opmarca2).trigger('change');
    $("#sel_ver_tipoMarca2").val(tipoMarca2).trigger('change');
    $("#sel_ver_estado2").val(estado2).trigger('change');
    $("#txt_ver_fInstalacion2").val(fInstalacion2);
    $("#txt_ver_fReencauche2").val(fReencauche2);
    $("#txt_ver_fCambio2").val(fCambio2);
    $("#txt_ver_fRotacion2").val(fRotacion2);

    $("#txt_ver_llantaSerial3").val(llantaSerial3);
    $("#sel_ver_profundidad3").val(profundidad3).trigger('change');
    $("#sel_ver_marca_llanta3").val(opmarca3).trigger('change');
    $("#sel_ver_tipoMarca3").val(tipoMarca3).trigger('change');
    $("#sel_ver_estado3").val(estado3).trigger('change');
    $("#txt_ver_fInstalacion3").val(fInstalacion3);
    $("#txt_ver_fReencauche3").val(fReencauche3);
    $("#txt_ver_fCambio3").val(fCambio3);
    $("#txt_ver_fRotacion3").val(fRotacion3);

    $("#txt_ver_llantaSerial4").val(llantaSerial4);
    $("#sel_ver_profundidad4").val(profundidad4).trigger('change');
    $("#sel_ver_marca_llanta4").val(opmarca4).trigger('change');
    $("#sel_ver_tipoMarca4").val(tipoMarca4).trigger('change');
    $("#sel_ver_estado4").val(estado4).trigger('change');
    $("#txt_ver_fInstalacion4").val(fInstalacion4);
    $("#txt_ver_fReencauche4").val(fReencauche4);
    $("#txt_ver_fCambio4").val(fCambio4);
    $("#txt_ver_fRotacion4").val(fRotacion4);

    $("#txt_ver_llantaSerial5").val(llantaSerial5);
    $("#sel_ver_profundidad5").val(profundidad5).trigger('change');
    $("#sel_ver_marca_llanta5").val(opmarca5).trigger('change');
    $("#sel_ver_tipoMarca5").val(tipoMarca5).trigger('change');
    $("#sel_ver_estado5").val(estado5).trigger('change');
    $("#txt_ver_fInstalacion5").val(fInstalacion5);
    $("#txt_ver_fReencauche5").val(fReencauche5);
    $("#txt_ver_fCambio5").val(fCambio5);
    $("#txt_ver_fRotacion5").val(fRotacion5);

    $("#txt_ver_llantaSerial6").val(llantaSerial6);
    $("#sel_ver_profundidad6").val(profundidad6).trigger('change');
    $("#sel_ver_marca_llanta").val(opmarca6).trigger('change');
    $("#sel_ver_tipoMarca6").val(tipoMarca6).trigger('change');
    $("#sel_ver_estado6").val(estado6).trigger('change');
    $("#txt_ver_fInstalacion6").val(fInstalacion6);
    $("#txt_ver_fReencauche6").val(fReencauche6);
    $("#txt_ver_fCambio6").val(fCambio6);
    $("#txt_ver_fRotacion6").val(fRotacion6);


    $("#txt_ver_cal1").val(calibracion1);
    $("#txt_ver_cal2").val(calibracion2);
    $("#txt_ver_cal3").val(calibracion3);
    $("#txt_ver_cal4").val(calibracion4);
    $("#txt_ver_cal5").val(calibracion5);
    $("#txt_ver_cal6").val(calibracion6);
    $("#txt_ver_oCalibracion").val(oCalibracion);
    $("#sel_ver_bal1").val(balanceo1).trigger('change');
    $("#sel_ver_bal2").val(balanceo2).trigger('change');
    $("#sel_ver_bal3").val(balanceo3).trigger('change');
    $("#sel_ver_bal4").val(balanceo4).trigger('change');
    $("#sel_ver_bal5").val(balanceo5).trigger('change');
    $("#sel_ver_bal6").val(balanceo6).trigger('change');
    $("#txt_ver_oBalanceo").val(oBalanceo);
    $("#sel_ver_alineacion1").val(alineacion1).trigger('change');
    $("#sel_ver_alineacion2").val(alineacion2).trigger('change');
    $("#txt_ver_obs3").val(observacionG3);
    $("#txt_ver_obsM3").val(observacionM3);

    $("#txt_ver_fechaA").val(fecha);
    $("#txt_ver_pCambioA").val(pCambioA);
    $("#txt_ver_kilometraje").val(kilometraje);
    $("#txt_ver_ckilometraje").val(cKilometraje);
    $("#sel_ver_tipo_aceite").val(tipoAceite).trigger('change');
    $("#sel_ver_marca_aceite").val(marca10).trigger('change');
    $("#txt_ver_cantidad").val(cantidad1);
    $("#sel_ver_presentacion1").val(presentacion1).trigger('change');
    $("#sel_ver_nivelacion1").val(nivelacion).trigger('change');
    $("#txt_ver_cNivelacion1").val(cNivelacion);
    $("#sel_ver_filtro_aceite").val(fAceite).trigger('change');
    $("#sel_ver_filtro_combustible").val(fCombustible).trigger('change');
    $("#sel_ver_filtro_aire").val(fAire).trigger('change');
    $("#sel_ver_tipo_aceite1").val(tipoAceite1).trigger('change');
    $("#sel_ver_marca_aceite1").val(marca1).trigger('change');
    $("#txt_ver_uCambio1").val(uCambio);
    $("#txt_ver_pCambio1").val(pCambio10);
    $("#txt_ver_cantidad1").val(cantidad2);
    $("#sel_ver_presentacion2").val(presentacion2).trigger('change');
    $("#sel_ver_nivelacion2").val(nivelacion2).trigger('change');
    $("#txt_ver_nivelacion2").val(cNivelacion2);

    $("#sel_ver_tipo_aceite2").val(tipoAceite3).trigger('change');
    $("#sel_ver_marca_aceite2").val(marca3).trigger('change');
    $("#txt_ver_uCambio2").val(uCambio3);
    $("#txt_ver_pCambio2").val(pCambio3);
    $("#txt_ver_cantidad2").val(cantidad3);
    $("#sel_ver_presentacion3").val(presentacion3).trigger('change');
    $("#sel_ver_nivelacion3").val(nivelacion3).trigger('change');
    $("#txt_ver_nivelacion3").val(cNivelacion3);

    $("#sel_editar_tipo_aceite3").val(tipoAceite4).trigger('change');
    $("#sel_editar_marca_aceite3").val(marca4).trigger('change');
    $("#txt_editar_uCambio3").val(uCambio4);
    $("#txt_editar_pCambio3").val(pCambio4);

    $("#sel_ver_tipo_aceite4").val(tipoAceite5).trigger('change');
    $("#sel_ver_marca_aceite4").val(marca5).trigger('change');
    $("#txt_ver_uCambio4").val(uCambio5);
    $("#txt_ver_pCambio4").val(pCambio5);

    $("#sel_ver_lFreno").val(lFreno).trigger('change');
    $("#sel_ver_lParabrisa").val(lParabrisa).trigger('change');
    $("#sel_ver_refrigerante").val(refrigerante).trigger('change');
    $("#sel_ver_hidraulico").val(hidraulico).trigger('change');
    $("#sel_ver_lMotor").val(lMotor).trigger('change');
    $("#sel_ver_lCaja").val(lCaja).trigger('change');
    $("#sel_ver_lTransmision").val(lTransmision).trigger('change');

    $("#sel_ver_lFrenos1").val(lFrenos1).trigger('change');
    $("#sel_ver_engrase").val(engrase).trigger('change');
    $("#sel_ver_sRadiador").val(sRadiador).trigger('change');
    $("#sel_ver_sFiltroAire").val(sFiltroAire).trigger('change');

    
    $("#txt_ver_observacionesF").val(observacionesF);

    $("#sel_ver_filtro_combustible2").val(fCombustible2).trigger('change');
    $("#sel_ver_filtro_combustible3").val(fCombustible3).trigger('change');

});

// FUNCION PARA EDITAR REGISTRO
$('#tabla_orden').on('click','.enviarCorreo',function(){

    if(table.row(this).child.isShown()){
        var datosOrden = table.row(this).data();
    }else{
        var datosOrden = table.row($(this).parents('tr')).data();
    }
    console.log("entra".fecha_creacion);
    var email =datosOrden.email;
    var placa =datosOrden.placa;
    var revBimCotrautol =datosOrden.revBimCotrautol;
    var rRegistradora =datosOrden.rRegistradora;
    var vExtintor =datosOrden.vExtintor;
    var oReg =datosOrden.oRegistradora;
    var observacion =datosOrden.observacion;     
    var tecnico =datosOrden.tecnico;
    var bateria =datosOrden.txtbateria;
    var tipoBateria =datosOrden.txttipoBateria;
    var marca =datosOrden.txtmarca;
    var serial =datosOrden.serial;
    var fVenta =datosOrden.fVenta;
    var fInstalacion =datosOrden.fInstalacion;
    var tUso =datosOrden.tiempoUso;
    var pCambio =datosOrden.proximoCambio;
    var pMantenimiento =datosOrden.proximoMantenimiento;
    var oMejora =datosOrden.oportunidadesMejora;
    var llantaSerial1 =datosOrden.llanta1Serial;
    var profundidad1 =datosOrden.llanta1Profundidad;
    var opmarca1 =datosOrden.txtllanta1Marca;
    var tipoMarca1 =datosOrden.llanta1Tipo;
    var estado1 =datosOrden.llanta1Estado;
    var fInstalacion1 =datosOrden.llanta1Instalacion;
    var fReencauche1 =datosOrden.llanta1Reencauche;
    var fCambio1 =datosOrden.llanta1Cambio;
    var fRotacion1 =datosOrden.llanta1Rotacion;

    var llantaSerial2 =datosOrden.llanta2Serial;
    var profundidad2 =datosOrden.llanta2Profundidad;
    var opmarca2 =datosOrden.txtllanta2Marca;
    var tipoMarca2 =datosOrden.llanta2Tipo;
    var estado2 =datosOrden.llanta2Estado;
    var fInstalacion2 =datosOrden.llanta2Instalacion;
    var fReencauche2 =datosOrden.llanta2Reencauche;
    var fCambio2 =datosOrden.llanta2Cambio;
    var fRotacion2 =datosOrden.llanta2Rotacion;

    var llantaSerial3 =datosOrden.llanta3Serial;
    var profundidad3 =datosOrden.llanta3Profundidad;
    var opmarca3 =datosOrden.txtllanta3Marca;
    var tipoMarca3 =datosOrden.llanta3Tipo;
    var estado3 =datosOrden.llanta3Estado;
    var fInstalacion3 =datosOrden.llanta3Instalacion;
    var fReencauche3 =datosOrden.llanta3Reencauche;
    var fCambio3 =datosOrden.llanta3Cambio;
    var fRotacion3 =datosOrden.llanta3Rotacion;

    var llantaSerial4 =datosOrden.llanta4Serial;
    var profundidad4 =datosOrden.llanta4Profundidad;
    var opmarca4 =datosOrden.txtllanta4Marca;
    var tipoMarca4 =datosOrden.llanta4Tipo;
    var estado4 =datosOrden.llanta4Estado;
    var fInstalacion4 =datosOrden.llanta4Instalacion;
    var fReencauche4 =datosOrden.llanta4Reencauche;
    var fCambio4 =datosOrden.llanta4Cambio;
    var fRotacion4 =datosOrden.llanta4Rotacion;

    var llantaSerial5 =datosOrden.llanta5Serial;
    var profundidad5 =datosOrden.llanta5Profundidad;
    var opmarca5 =datosOrden.txtllanta5Marca;
    var tipoMarca5 =datosOrden.llanta5Tipo;
    var estado5 =datosOrden.llanta5Estado;
    var fInstalacion5 =datosOrden.llanta5Instalacion;
    var fReencauche5 =datosOrden.llanta5Reencauche;
    var fCambio5 =datosOrden.llanta5Cambio;
    var fRotacion5 =datosOrden.llanta5Rotacion;

    var llantaSerial6 =datosOrden.llanta6Serial;
    var profundidad6 =datosOrden.llanta6Profundidad;
    var opmarca6 =datosOrden.txtllanta6Marca;
    var tipoMarca6 =datosOrden.llanta6Tipo;
    var estado6 =datosOrden.llanta6Estado;
    var fInstalacion6 =datosOrden.llanta6Instalacion;
    var fReencauche6 =datosOrden.llanta6Reencauche;
    var fCambio6 =datosOrden.llanta6Cambio;
    var fRotacion6 =datosOrden.llanta6Rotacion;


    var calibracion1 =datosOrden.calibracionLlanta1;
    var calibracion2 =datosOrden.calibracionLlanta2;
    var calibracion3 =datosOrden.calibracionLlanta3;
    var calibracion4 =datosOrden.calibracionLlanta4;
    var calibracion5 =datosOrden.calibracionLlanta5;
    var calibracion6 =datosOrden.calibracionLlanta6;
    var oCalibracion =datosOrden.observacionCalibracion;
    var balanceo1 =datosOrden.Balanceo1;
    var balanceo2 =datosOrden.Balanceo2;
    var balanceo3 =datosOrden.Balanceo3;
    var balanceo4 =datosOrden.Balanceo4;
    var balanceo5 =datosOrden.Balanceo5;
    var balanceo6 =datosOrden.Balanceo6;
    var oBalanceo =datosOrden.oBalanceo;
    var alineacion1 =datosOrden.alineacion1;
    var alineacion2 =datosOrden.alineacion2;
    var observacionG3 =datosOrden.lObservacionGeneral;
    var observacionM3 =datosOrden.lObservacionMejora;

    var fecha =datosOrden.motorFecha;
    var pCambioA =datosOrden.motorProximoCambio;
    var kilometraje =datosOrden.motorKilometraje;
    var cKilometraje =datosOrden.motorCambioKilometraje;
    var tipoAceite =datosOrden.txttipoAceite;



    var marca10 =datosOrden.txtmotorMarca;
    var cantidad1 =datosOrden.motorCantidad;
    var presentacion1 =datosOrden.motorPresentacion;
    var nivelacion =datosOrden.motorNivelacion;
    var cNivelacion =datosOrden.motorCantidadNivelada;
    var fAceite =datosOrden.txtmotorFiltroAceite;
    var fCombustible =datosOrden.txtmotorfiltroCombustible;
    var fAire =datosOrden.txtmotorFiltroAire;
    var tipoAceite1 =datosOrden.cajaTipoAceite;
    var marca1 =datosOrden.cajaMarca;
    var uCambio =datosOrden.cajaUltimoCambio;
    var pCambio10 =datosOrden.cajaProximoCambio;
    var cantidad2 =datosOrden.cajaCantidad;
    var presentacion2 =datosOrden.cajaPresentacion;
    var nivelacion2 =datosOrden.cajaNivelacion;
    var cNivelacion2 =datosOrden.cajaCantidadNivelada;

    var tipoAceite3 =datosOrden.transmicionTipoAceite;
    var marca3 =datosOrden.transmicionMarca;
    var uCambio3 =datosOrden.transmicionUltimoCambio;
    var pCambio3 =datosOrden.transmicionProximoCambio;
    var cantidad3 =datosOrden.transmicionCantidad;
    var presentacion3 =datosOrden.transmicionPresentacion;
    var nivelacion3 =datosOrden.transmicionNivelacion;
    var cNivelacion3 =datosOrden.transmicionCantidadNivelada;

    var tipoAceite4 =datosOrden.refrigeranteTipoAceite;
    var marca4 =datosOrden.refrigeranteMarca;
    var uCambio4 =datosOrden.refrigeranteUltimoCambio;
    var pCambio4 =datosOrden.refrigeranteProximoCambio;

    var tipoAceite5 =datosOrden.hidraulicoTipoAceite;
    var marca5 =datosOrden.hidraulicoMarca;
    var uCambio5 =datosOrden.hidraulicoUltimoCambio;
    var pCambio5 =datosOrden.hidraulicoProximoCambio;

    var lFreno =datosOrden.liquidoFrenos;
    var lParabrisa =datosOrden.liquidoParabrisas;
    var refrigerante =datosOrden.liquidoRefrigerantes;
    var hidraulico =datosOrden.liquidoHidraulico;
    var lMotor =datosOrden.liquidoMotor;
    var lCaja =datosOrden.liquidoCaja;
    var lTransmision =datosOrden.liquidoTransmision;

    var lFrenos1 =datosOrden.otrosLimpiezaFrenos;
    var engrase =datosOrden.otrosEngrase;
    var sRadiador =datosOrden.otrosSopleteoRadiador;
    var sFiltroAire =datosOrden.otrosSopleteoFiltroAire;
    var observacionesF = datosOrden.observacionesGenerales2;

    var idOrdenServicio =datosOrden.idOrdenServicio;
    var idServicio =datosOrden.idServicio;

    var fCombustible2 =datosOrden.txtmotorfiltroCombustible2;
    var fCombustible3 =datosOrden.txtmotorfiltroCombustible3;
    var fecha_creacion =datosOrden.fecha_creacion;

    Swal.fire({
        title: '¿Seguro desea enviar un email?',
        text: "Una vez hecho esto, se enviará un email con los datos de vencimiento del registro",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                "url": "../Controlador/ordenServicio/controlador_ordenServicio_enviar_vencimiento.php",
                "type": "POST",
                data:{
                    email:email,
                    idOrdenServicio: idOrdenServicio,
                    idServicio:idServicio,
                    placa:placa,
                    revBimCotrautol:revBimCotrautol,
                    rRegistradora:rRegistradora,
                    vExtintor:vExtintor,
                    oReg:oReg,
                    observacion:observacion,
                    tecnico:tecnico,
                    bateria:bateria,
                    tipoBateria:tipoBateria,
                    marca:marca,
                    serial:serial,
                    fVenta:fVenta,
                    fInstalacion:fInstalacion,
                    tUso:tUso,
                    pCambio:pCambio,
                    pMantenimiento:pMantenimiento,
                    oMejora:oMejora,
                    llantaSerial1:llantaSerial1,
                    profundidad1:profundidad1,
                    opmarca1:opmarca1,
                    tipoMarca1:tipoMarca1,
                    estado1:estado1,
                    fInstalacion1:fInstalacion1,
            
                    fReencauche1:fReencauche1,
                    fCambio1:fCambio1,
                    fRotacion1:fRotacion1,
                    llantaSerial2:llantaSerial2,
                    profundidad2:profundidad2,
                    opmarca2:opmarca2,
                    tipoMarca2:tipoMarca2,
                    estado2:estado2,
                    fInstalacion2:fInstalacion2,
                    fReencauche2:fReencauche2,
                    fCambio2:fCambio2,
                    fRotacion2:fRotacion2,
            
                    llantaSerial3:llantaSerial3,
                    profundidad3:profundidad3,
                    opmarca3:opmarca3,
                    tipoMarca3:tipoMarca3,
                    estado3:estado3,
                    fInstalacion3:fInstalacion3,
                    fReencauche3:fReencauche3,
                    fCambio3:fCambio3,
                    fRotacion3:fRotacion3,
                    llantaSerial4:llantaSerial4,
                    profundidad4:profundidad4,
                    opmarca4:opmarca4,
                    tipoMarca4:tipoMarca4,
                    estado4:estado4,
                    fInstalacion4:fInstalacion4,
                    fReencauche4:fReencauche4,
                    fCambio4:fCambio4,
                    fRotacion4:fRotacion4,
                    llantaSerial5:llantaSerial5,
                    profundidad5:profundidad5,
                    opmarca5:opmarca5,
                    tipoMarca5:tipoMarca5,
                    estado5:estado5,
                    fInstalacion5:fInstalacion5,
                    fReencauche5:fReencauche5,
                    fCambio5:fCambio5,
                    fRotacion5:fRotacion5,
                    llantaSerial6:llantaSerial6,
                    profundidad6:profundidad6,
                    opmarca6:opmarca6,
                    tipoMarca6:tipoMarca6,
                    estado6:estado6,
                    fInstalacion6:fInstalacion6,
                    fReencauche6:fReencauche6,
                    fCambio6:fCambio6,
                    fRotacion6:fRotacion6,
            
                    calibracion1:calibracion1,
                    calibracion2:calibracion2,
                    calibracion3:calibracion3,
                    calibracion4:calibracion4,
                    calibracion5:calibracion5,
                    calibracion6:calibracion6,
                    oCalibracion:oCalibracion,
                    balanceo1:balanceo1,
                    balanceo2:balanceo2,
                    balanceo3:balanceo3,
                    balanceo4:balanceo4,
                    balanceo5:balanceo5,
                    balanceo6:balanceo6,
                    oBalanceo:oBalanceo,
                    alineacion1:alineacion1,
                    alineacion2:alineacion2,
                    observacionG3:observacionG3,
                    observacionM3:observacionM3,
            
                    fecha:fecha,
                    pCambioA:pCambioA,
                    kilometraje:kilometraje,
                    cKilometraje:cKilometraje,
                    tipoAceite:tipoAceite,
                    marca10:marca10,
                    cantidad1:cantidad1,
                    presentacion1:presentacion1,
                    nivelacion:nivelacion,
                    cNivelacion:cNivelacion,
                    fAceite:fAceite,
                    fCombustible:fCombustible,
                    fAire:fAire,
                    tipoAceite1:tipoAceite1,
                    marca1:marca1,
                    uCambio:uCambio,
                    pCambio10:pCambio10,
                    cantidad2:cantidad2,
                    presentacion2:presentacion2,
                    nivelacion2:nivelacion2,
                    cNivelacion2:cNivelacion2,
            
                    tipoAceite3:tipoAceite3,
                    marca3:marca3,
                    uCambio3:uCambio3,
                    pCambio3:pCambio3,
                    cantidad3:cantidad3,
                    presentacion3:presentacion3,
                    nivelacion3:nivelacion3,
                    cNivelacion3:cNivelacion3,
            
                    tipoAceite4:tipoAceite4,
                    marca4:marca4,
                    uCambio4:uCambio4,
                    pCambio4:pCambio4,
                    tipoAceite5:tipoAceite5,
                    marca5:marca5,
                    uCambio5:uCambio5,
                    pCambio5:pCambio5,
            
                    lFreno:lFreno,
                    lParabrisa:lParabrisa,
                    refrigerante:refrigerante,
                    hidraulico:hidraulico,
                    lMotor:lMotor,
                    lCaja:lCaja,
                    lTransmision:lTransmision,
                    lFrenos1:lFrenos1,
                    engrase:engrase,
                    sRadiador:sRadiador,
                    sFiltroAire:sFiltroAire,
                    observacionesF:observacionesF,
                    fCombustible2:fCombustible2,
                    fCombustible3:fCombustible3,
                    fecha_creacion:fecha_creacion
                }
            }).done(function(resp){
                
                if(resp > 0){
                    Swal.fire("¡Email enviado con exito!",'Pronto recibira el email', "success")
                }else{
                    Swal.fire("Error",'No se pudo enviar el email, revise su conexion', "error");
                }
            })
            listar_orden()
        }
      })

});