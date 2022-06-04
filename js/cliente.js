var table;
function listar_cliente(){
    
    table = $('#tabla_ordens').DataTable( {
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
            "url": "../controlador/cliente/controlador_cliente_listar.php",
            "type": "POST"
        }
        ,"columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }, 
            
            {
                "targets": [ 1 ],
                "visible": false
            },
            {
                "targets": [ 2 ],
                "visible": false
            },
            {
                "targets": [ 3 ],
                "visible": false
            },
            {
                "targets": [ 4 ],
                "visible": false
            },
            {
                "targets": [ 5 ],
                "visible": false
            },
            {
                "targets": [ 6 ],
                "visible": false
            },
            {
                "targets": [ 7 ],
                "visible": false
            },
            {
                "targets": [ 8 ],
                "visible": false
            },
            {
                "targets": [ 9 ],
                "visible": false
            },
            {
                "targets": [ 10 ],
                "visible": false
            },
            {
                "targets": [ 11 ],
                "visible": false
            },
            {
                "targets": [ 12 ],
                "visible": false
            },
            {
                "targets": [ 13 ],
                "visible": false
            },
            {
                "targets": [ 14 ],
                "visible": false
            },
            {
                "targets": [ 15 ],
                "visible": false
            },
            {
                "targets": [ 16 ],
                "visible": false
            },
            {
                "targets": [ 17 ],
                "visible": false
            },
            {
                "targets": [ 18 ],
                "visible": false
            },
            {
                "targets": [ 19 ],
                "visible": false
            },
            {
                "targets": [ 20 ],
                "visible": false
            },
            {
                "targets": [ 21 ],
                "visible": false
            },
            {
                "targets": [ 22 ],
                "visible": false
            },
            {
                "targets": [ 23 ],
                "visible": false
            },
            {
                "targets": [ 24 ],
                "visible": false
            },
            {
                "targets": [ 25 ],
                "visible": false
            },
            {
                "targets": [ 26 ],
                "visible": false
            },
            {
                "targets": [ 27 ],
                "visible": false
            },
            {
                "targets": [ 28 ],
                "visible": false
            },
            {
                "targets": [ 29 ],
                "visible": false
            },
            {
                "targets": [ 30 ],
                "visible": false
            },
            {
                "targets": [ 31 ],
                "visible": false
            },
            {
                "targets": [ 32 ],
                "visible": false
            },
            {
                "targets": [ 33 ],
                "visible": false
            },
            {
                "targets": [ 34 ],
                "visible": false
            },
            {
                "targets": [ 35 ],
                "visible": false
            },
            {
                "targets": [ 36 ],
                "visible": false
            },
            {
                "targets": [ 37 ],
                "visible": false
            },
            {
                "targets": [ 38 ],
                "visible": false
            },
            {
                "targets": [ 39 ],
                "visible": false
            },
            {
                "targets": [ 40 ],
                "visible": false
            },
            {
                "targets": [ 41 ],
                "visible": false
            },
            {
                "targets": [ 42 ],
                "visible": false
            },
            {
                "targets": [ 43 ],
                "visible": false
            },
            {
                "targets": [ 44 ],
                "visible": false
            },
            {
                "targets": [ 45 ],
                "visible": false
            },
            {
                "targets": [ 46 ],
                "visible": false
            },
            {
                "targets": [ 47 ],
                "visible": false
            },
            {
                "targets": [ 48 ],
                "visible": false
            },
            {
                "targets": [ 49 ],
                "visible": false
            },
            {
                "targets": [ 50 ],
                "visible": false
            },
            {
                "targets": [ 51 ],
                "visible": false
            },
            {
                "targets": [ 52 ],
                "visible": false
            },
            {
                "targets": [ 53 ],
                "visible": false
            },
            {
                "targets": [ 54 ],
                "visible": false
            },
            {
                "targets": [ 55 ],
                "visible": false
            },
            {
                "targets": [ 56 ],
                "visible": false
            },
            {
                "targets": [ 57 ],
                "visible": false
            },
            {
                "targets": [ 58 ],
                "visible": false
            },
            {
                "targets": [ 59 ],
                "visible": false
            },
            {
                "targets": [ 60 ],
                "visible": false
            },
            {
                "targets": [ 61 ],
                "visible": false
            },
            {
                "targets": [ 62 ],
                "visible": false
            },
            {
                "targets": [ 63 ],
                "visible": false
            },
            {
                "targets": [ 64 ],
                "visible": false
            },
            {
                "targets": [ 65 ],
                "visible": false
            },
            {
                "targets": [ 66 ],
                "visible": false
            },
            {
                "targets": [ 67 ],
                "visible": false
            },
            {
                "targets": [ 68 ],
                "visible": false
            },
            {
                "targets": [ 69 ],
                "visible": false
            },
            {
                "targets": [ 70 ],
                "visible": false
            },
            {
                "targets": [ 71 ],
                "visible": false
            },
            {
                "targets": [ 72 ],
                "visible": false
            },
            {
                "targets": [ 73 ],
                "visible": false
            },
            {
                "targets": [ 74 ],
                "visible": false
            },
            {
                "targets": [ 75 ],
                "visible": false
            },
            {
                "targets": [ 76 ],
                "visible": false
            },
            {
                "targets": [ 77 ],
                "visible": false
            },
            {
                "targets": [ 78 ],
                "visible": false
            },
            {
                "targets": [ 79 ],
                "visible": false
            },
            {
                "targets": [ 80 ],
                "visible": false
            },
            {
                "targets": [ 81 ],
                "visible": false
            },
            {
                "targets": [ 82 ],
                "visible": false
            },
            {
                "targets": [ 83 ],
                "visible": false
            },
            {
                "targets": [ 84 ],
                "visible": false
            },
            {
                "targets": [ 85 ],
                "visible": false
            },
            {
                "targets": [ 86 ],
                "visible": false
            },
            {
                "targets": [ 87 ],
                "visible": false
            },
            {
                "targets": [ 88 ],
                "visible": false
            },
            
            {
                "targets": [ 89 ],
                "visible": false
            },
            {
                "targets": [ 90 ],
                "visible": false
            },
            {
                "targets": [ 91 ],
                "visible": false
            },
            {
                "targets": [ 92 ],
                "visible": false
            },
            {
                "targets": [ 93 ],
                "visible": false
            },
            {
                "targets": [ 94 ],
                "visible": false
            },
            {
                "targets": [ 95 ],
                "visible": false
            },
            {
                "targets": [ 96 ],
                "visible": false
            },
            {
                "targets": [ 97 ],
                "visible": false
            },
            {
                "targets": [ 98 ],
                "visible": false
            },
            {
                "targets": [ 99 ],
                "visible": false
            },
            {
                "targets": [ 100 ],
                "visible": false
            },
            {
                "targets": [ 101 ],
                "visible": false
            },
            {
                "targets": [ 102 ],
                "visible": false
            },
            {
                "targets": [ 103 ],
                "visible": false
            },
            {
                "targets": [ 104 ],
                "visible": false
            },
            {
                "targets": [ 105 ],
                "visible": false
            },
            {
                "targets": [ 106 ],
                "visible": false
            },
            {
                "targets": [ 107 ],
                "visible": false
            },
            {
                "targets": [ 108 ],
                "visible": false
            },
            {
                "targets": [ 109 ],
                "visible": false
            },
            {
                "targets": [ 110 ],
                "visible": false
            },
            {
                "targets": [ 111 ],
                "visible": false
            },
            {
                "targets": [ 112 ],
                "visible": false
            },
            {
                "targets": [ 113 ],
                "visible": false
            },
            {
                "targets": [ 114 ],
                "visible": false
            },
            {
                "targets": [ 115 ],
                "visible": false
            },
            {
                "targets": [ 116 ],
                "visible": false
            },
            {
                "targets": [ 117 ],
                "visible": false
            },
            {
                "targets": [ 118 ],
                "visible": false
            },
            {
                "targets": [ 119 ],
                "visible": false
            },
            {
                "targets": [ 120 ],
                "visible": false
            },
            {
                "targets": [ 121 ],
                "visible": false
            },
            {
                "targets": [ 123 ],
                "visible": false
            },
            {
                "targets": [ 124 ],
                "visible": false
            },
            {
                "targets": [ 125 ],
                "visible": false
            },
            {
                "targets": [ 126 ],
                "visible": false
            },
            {
                "targets": [ 127 ],
                "visible": false
            },
            {
                "targets": [ 128 ],
                "visible": false
            },
            {
                "targets": [ 129 ],
                "visible": false
            },
            {
                "targets": [ 130 ],
                "visible": false
            },
            {
                "targets": [ 131 ],
                "visible": false
            },
            {
                "targets": [ 132 ],
                "visible": false
            },
            {
                "targets": [ 133 ],
                "visible": false
            },
            {
                "targets": [ 134 ],
                "visible": false
            },
            {
                "targets": [ 135 ],
                "visible": false
            },
            {
                "targets": [ 136],
                "visible": false
            },
            {
                "targets": [ 137],
                "visible": false
            },
            {
                "targets": [ 138],
                "visible": false
            },
            {
                "targets": [ 139],
                "visible": false
            },
            {
                "targets": [ 140],
                "visible": false
            },
            {
                "targets": [ 141],
                "visible": false
            },
            {
                "targets": [ 142],
                "visible": false
            },
            {
                "targets": [ 143],
                "visible": false
            },
            {
                "targets": [ 144],
                "visible": false
            },
            {
                "targets": [ 145],
                "visible": false
            },
            {
                "targets": [ 146],
                "visible": false
            },
            {
                "targets": [ 147],
                "visible": false
            },
            {
                "targets": [ 148],
                "visible": false
            },
            {
                "targets": [ 149],
                "visible": false
            },
            {
                "targets": [ 150],
                "visible": false
            },
            {
                "targets": [ 151],
                "visible": false
            },
            {
                "targets": [ 152],
                "visible": false
            }
            ,
            {
                "targets": [ 153],
                "visible": false
            }
        ],
        "columns": [
            { "data": "txtmotorFiltroAire" },
            { "data": "txtmotorFiltroAceite" },
            { "data": "txtmotorfiltroCombustible" },
            { "data": "txtmotorfiltroCombustible2" },
            { "data": "txtmotorfiltroCombustible3" },
            { "data": "txtmotorMarca" },
            { "data": "txtllanta6Marca" },
            { "data": "txtllanta5Marca" },
            { "data": "txtllanta4Marca" },
            { "data": "txtllanta3Marca" },
            { "data": "txtllanta2Marca" },
            { "data": "txtllanta1Marca" },
            { "data": "txtmarca" },
            { "data": "txttipoBateria" },
            { "data": "txtbateria" },
            { "data": "txttipoAceite" },
            { "data": "email" },
            { "data": "bateria" },
            { "data": "tipoBateria" },
            { "data": "marca" },
            { "data": "serial" },
            { "data": "fVenta" },
            { "data": "fInstalacion" },
            { "data": "tiempoUso" },
            { "data": "proximoCambio" },
            { "data": "proximoMantenimiento" },
            { "data": "oportunidadesMejora" },
            { "data": "llanta1Serial" },
            { "data": "llanta1Profundidad" },
            { "data": "llanta1Marca" },
            { "data": "llanta1Tipo" },
            { "data": "llanta1Estado" },
            { "data": "llanta1Instalacion" },
            { "data": "llanta1Reencauche" },
            { "data": "llanta1Cambio" },
            { "data": "llanta1Rotacion" },
            { "data": "llanta2Serial" },
            { "data": "llanta2Profundidad" },
            { "data": "llanta2Marca" },
            { "data": "llanta2Tipo" },
            { "data": "llanta2Estado" },
            { "data": "llanta2Instalacion" },
            { "data": "llanta2Reencauche" },
            { "data": "llanta2Cambio" },
            { "data": "llanta2Rotacion" },
            { "data": "llanta3Serial" },
            { "data": "llanta3Profundidad" },
            { "data": "llanta3Marca" },
            { "data": "llanta3Tipo" },
            { "data": "llanta3Estado" },
            { "data": "llanta3Instalacion" },
            { "data": "llanta3Reencauche" },
            { "data": "llanta3Cambio" },
            { "data": "llanta3Rotacion" },
            { "data": "llanta4Serial" },
            { "data": "llanta4Profundidad" },
            { "data": "llanta4Marca" },
            { "data": "llanta4Tipo" },
            { "data": "llanta4Estado" },
            { "data": "llanta4Instalacion" },
            { "data": "llanta4Reencauche" },
            { "data": "llanta4Cambio" },
            { "data": "llanta4Rotacion" },
            { "data": "llanta5Serial" },
            { "data": "llanta5Profundidad" },
            { "data": "llanta5Marca" },
            { "data": "llanta5Tipo" },
            { "data": "llanta5Estado" },
            { "data": "llanta5Instalacion" },
            { "data": "llanta5Reencauche" },
            { "data": "llanta5Cambio" },
            { "data": "llanta5Rotacion" },
            { "data": "llanta6Serial" },
            { "data": "llanta6Profundidad" },
            { "data": "llanta6Marca" },
            { "data": "llanta6Tipo" },
            { "data": "llanta6Estado" },
            { "data": "llanta6Instalacion" },
            { "data": "llanta6Reencauche" },
            { "data": "llanta6Cambio" },
            { "data": "llanta6Rotacion" },
            { "data": "calibracionLlanta1" },
            { "data": "calibracionLlanta2" },
            { "data": "calibracionLlanta3" },
            { "data": "calibracionLlanta4" },
            { "data": "calibracionLlanta5" },
            { "data": "calibracionLlanta6" },
            { "data": "observacionCalibracion" },
            { "data": "Balanceo1" },
            { "data": "Balanceo2" },
            { "data": "Balanceo3" },
            { "data": "Balanceo4" },
            { "data": "Balanceo5" },
            { "data": "Balanceo6" },
            { "data": "oBalanceo" },
            { "data": "alineacion1" },
            { "data": "alineacion2" },
            { "data": "lObservacionGeneral" },
            { "data": "lObservacionMejora" },
            { "data": "motorFecha" },
            { "data": "motorProximoCambio" },
            { "data": "motorKilometraje" },
            { "data": "motorCambioKilometraje" },
            { "data": "motorTipoAceite" },
            { "data": "motorMarca" },
            { "data": "motorCantidad" },
            { "data": "motorPresentacion" },
            { "data": "motorNivelacion" },
            { "data": "motorCantidadNivelada" },
            { "data": "motorFiltroAceite" },
            { "data": "motorfiltroCombustible" },
            { "data": "motorFiltroAire" },
            { "data": "cajaTipoAceite" },
            { "data": "cajaMarca" },
            { "data": "cajaUltimoCambio" },
            { "data": "cajaProximoCambio" },
            { "data": "cajaCantidad" },
            { "data": "cajaPresentacion" },
            { "data": "cajaNivelacion" },
            { "data": "cajaCantidadNivelada" },
            { "data": "transmicionTipoAceite" },
            { "data": "transmicionMarca" },
            { "data": "transmicionUltimoCambio" },
            { "data": "transmicionProximoCambio" },
            { "data": "transmicionCantidad" },
            { "data": "transmicionPresentacion" },
            { "data": "transmicionNivelacion" },
            { "data": "transmicionCantidadNivelada" },
            { "data": "refrigeranteTipoAceite" },
            { "data": "refrigeranteMarca" },
            { "data": "refrigeranteUltimoCambio" },
            { "data": "refrigeranteProximoCambio" },
            { "data": "hidraulicoTipoAceite" },
            { "data": "hidraulicoMarca" },
            { "data": "hidraulicoUltimoCambio" },
            { "data": "hidraulicoProximoCambio" },
            { "data": "liquidoFrenos" },
            { "data": "liquidoParabrisas" },
            { "data": "liquidoRefrigerantes" },
            { "data": "liquidoHidraulico" },
            { "data": "liquidoMotor" },
            { "data": "liquidoCaja" },
            { "data": "liquidoTransmision" },
            { "data": "otrosLimpiezaFrenos" },
            { "data": "otrosEngrase" },
            { "data": "otrosSopleteoRadiador" },
            { "data": "otrosSopleteoFiltroAire" },
            { "data": "observacionesGenerales2" },
            { "data": "motorfiltroCombustible2" },
            { "data": "motorfiltroCombustible3" },
            { "data": "oRegistradora" },
            { "data": "vExtintor" },
            { "data": "idServicio" },
            { "data": "rRegistradora" },

            { "data": "idOrdenServicio" },
            { "data": "placa" },
            { "data": "cod_interno" },
            { "data": "eCorreo",
            render: function(data, type, row){
                if(data=='1'){
                    return "Correo enviado"
                }else{
                    return "Correo no enviado"
                }
            }
            },
            { "data": "tecnico" },
            { "data": "fecha_creacion" },
            { "data": "observacion" },
            {"defaultContent":
            "<button style='font-size:13px;' type='button' class='ver btn btn-primary'><i class='fa fa-eye'></i></button>"}
        ],
        "language":idioma_espanol,
       select: true
    } );
    
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