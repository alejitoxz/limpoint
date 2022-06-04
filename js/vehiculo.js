var tabla_vehiculo;
function listar_vehiculo(){
    tabla_vehiculo = $('#tabla_vehiculos').DataTable( {
        "ordering":false,
        "paging": true,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": true ,
        "processing": false,
        "ajax": {
            "url": "../controlador/vehiculo/controlador_listar_vehiculo.php",
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }
        ],
        "columns": [
            { "data": "idPropietario" },
            { "data": "id" },
            { "data": "placa" },
            { "data": "tipoVehiculo" },
            { "data": "alianza" },
            { "data": "empresa" },
            { "data": "nombre" },
            {"defaultContent":
            "<button style='font-size:13px;' type='button' class='eliminarv btn btn-danger'><i class='fa fa-trash'></i></button><button style='font-size:13px;' type='button' class='editarv btn btn-info'><i class='fa fa-edit'></i></button>"}
        ],
        "language":idioma_espanol,
       select: true
    } );
    
}
function AbrirModalRegistroVehiculo(){
    $("#modal_registro_vehiculo").modal({backdrop:'static',keyboard:false})
    $("#modal_registro_vehiculo").modal('show');
}
function listar_pro(){
    
    $.ajax({
        "url": "../controlador/vehiculo/controlador_listar_propietario.php",
        "type": "POST"
    }).done(function(resp){
        
        var data = JSON.parse(resp);
        
        var cadena="";
        
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['dueno']+"</option>";
            }
            
            $("#sel_pro_vehiculo").html(cadena);
            $("#sel_pro_vehiculo_edit").html(cadena);
        }else{
            cadena+="<option value='0'>No se encontraron registros</option>"; 
        }
    })
}


function listar_alianza(){
    $.ajax({
        "url": "../controlador/vehiculo/controlador_alianza_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['alianza']+"</option>";
            }
            $("#sel_alianza").html(cadena);
            $("#sel_empresa_edit").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function registrar_vehiculo(){
    var txt_interno = $("#txt_interno").val();
    var txt_placa = $("#txt_placa").val();
    var txt_marca = $("#txt_marca").val();
    var txt_modelo = $("#txt_modelo").val();

    var txt_chasis = $("#txt_chasis").val();
    var txt_pasajeros = $("#txt_pasajeros").val();
    var sel_empresa = $("#sel_empresa").val();
    var sel_pro_vehiculo = $("#sel_pro_vehiculo").val();

    var txt_soat = $("#txt_soat").val();
    var txt_tecnomecanica = $("#txt_tecnomecanica").val();
    var txt_poliza_cont = $("#txt_poliza_cont").val();
    var txt_poliza_ext = $("#txt_poliza_ext").val();

    var venc_soat = $("#venc_soat").val();
    var venc_tecno = $("#venc_tecno").val();
    var venc_poliza_cont = $("#venc_poliza_cont").val();
    var venc_poliza_ext = $("#venc_poliza_ext").val();


    if( txt_interno == '' ||
        txt_placa == ''
    ){
        return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/vehiculo/controlador_vehiculo_registrar.php",
        "type": "POST",
        data:{
            txt_interno:txt_interno,
            txt_placa:txt_placa,
            txt_marca:txt_marca,
            txt_modelo:txt_modelo,
            txt_chasis:txt_chasis,
            txt_pasajeros:txt_pasajeros,
            sel_empresa:sel_empresa,
            sel_pro_vehiculo:sel_pro_vehiculo,
            txt_soat:txt_soat,
            txt_tecnomecanica:txt_tecnomecanica,
            txt_poliza_cont:txt_poliza_cont,
            txt_poliza_ext:txt_poliza_ext,
            venc_soat:venc_soat,
            venc_tecno:venc_tecno,
            venc_poliza_cont:venc_poliza_cont,
            venc_poliza_ext:venc_poliza_ext
            
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            if(resp==1){
            $("#modal_registro_vehiculo").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Registro realizado', "success").then((value)=>{
                tabla_vehiculo.ajax.reload();
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
// FUNCION PARA ELIMINAR (ANULAR) REGISTRO
$('#tabla_vehiculo').on('click','.eliminarv',function(){
    if(table.row(this).child.isShown()){
        var idVehiculo = table.row(this).data().id;
    }else{
        var idVehiculo = table.row($(this).parents('tr')).data().id;
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
        modificar_estatusV(idVehiculo,0);
          Swal.fire(
            'Eliminado',
            '¡Tu registro ha sido eliminado!',
            'success'
          )
        }
      })
});

function modificar_estatusV(id,estatus){
    $.ajax({
        "url": "../controlador/vehiculo/controlador_modificar_vehiculo_estatus.php",
        type: "POST",
        data:{
        id:id,
        estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                    listar_vehiculo();
                
            }else{
                Swal.fire("Mensaje De Advertencia",'No se pudo borrar el archivo', "warning")
            }
        }
    })
}

function AbrirModalEditarV(){
    $("#modal_editar_v").modal({backdrop:'static',keyboard:false})
    $("#modal_editar_v").modal('show');
    
}

// FUNCION PARA EDITAR REGISTRO
$('#tabla_vehiculos').on('click','.editarv',function(){

    if(tabla_vehiculo.row(this).child.isShown()){
        var datosVehiculo = tabla_vehiculo.row(this).data();
    }else{
        var datosVehiculo = tabla_vehiculo.row($(this).parents('tr')).data();
    }
    console.log("datos",datosVehiculo)
    var idPropietario = datosVehiculo.idPropietario;
    var idEmpresa = datosVehiculo.idEmpresa;
    var id = datosVehiculo.id;
    var cod_interno = datosVehiculo.cod_interno;
    var placa = datosVehiculo.placa;
    var marca = datosVehiculo.marca;
    var modelo = datosVehiculo.modelo;
    var chasis = datosVehiculo.chasis;
    var num_pasajero = datosVehiculo.num_pasajero;
    var soat = datosVehiculo.soat;
    var pContractual = datosVehiculo.pContractual;
    var pExtraContractual = datosVehiculo.pExtraContractual;
    var tecnomecanica = datosVehiculo.tecnomecanica;
    var vSoat = datosVehiculo.vSoat;
    var vContractual = datosVehiculo.vContractual;
    var vExtraContractual = datosVehiculo.vExtraContractual;
    var vTecnomecanica = datosVehiculo.vTecnomecanica;

    //levantar modal
    AbrirModalEditarV();
    $("#idVehiculo").val(id);
    //ingresas datos modal
    $("#txt_interno_edit").val(cod_interno);
    $("#txt_placa_edit").val(placa);
    $("#txt_marca_edit").val(marca);
    $("#txt_modelo_edit").val(modelo);

    $("#txt_chasis_edit").val(chasis);
    $("#txt_pasajeros_edit").val(num_pasajero);
    $("#sel_empresa_edit").val(idEmpresa).trigger('change');
    $("#sel_pro_vehiculo_edit").val(idPropietario).trigger('change');

    $("#txt_soat_edit").val(soat);
    $("#txt_tecnomecanica_edit").val(tecnomecanica);
    $("#txt_poliza_cont_edit").val(pContractual);
    $("#txt_poliza_ext_edit").val(pExtraContractual);

    $("#venc_soat_edit").val(vSoat);
    $("#venc_tecno_edit").val(vTecnomecanica);
    $("#venc_poliza_cont_edit").val(vContractual);
    $("#venc_poliza_ext_edit").val(vExtraContractual);

})
function modificar_vehiculo(){
    var txt_interno = $("#txt_interno_edit").val();
    var txt_placa = $("#txt_placa_edit").val();
    var txt_marca = $("#txt_marca_edit").val();
    var txt_modelo = $("#txt_modelo_edit").val();

    var txt_chasis = $("#txt_chasis_edit").val();
    var txt_pasajeros = $("#txt_pasajeros_edit").val();
    var sel_empresa = $("#sel_empresa_edit").val();
    var sel_pro_vehiculo = $("#sel_pro_vehiculo_edit").val();

    var txt_soat = $("#txt_soat_edit").val();
    var txt_tecnomecanica = $("#txt_tecnomecanica_edit").val();
    var txt_poliza_cont = $("#txt_poliza_cont_edit").val();
    var txt_poliza_ext = $("#txt_poliza_ext_edit").val();

    var venc_soat = $("#venc_soat_edit").val();
    var venc_tecno = $("#venc_tecno_edit").val();
    var venc_poliza_cont = $("#venc_poliza_cont_edit").val();
    var venc_poliza_ext = $("#venc_poliza_ext_edit").val();

    var id = $("#idVehiculo").val();


    if( txt_interno == '' ||
        txt_placa == ''
    ){
        return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
    }
        

    $.ajax({
        "url": "../controlador/vehiculo/controlador_vehiculo_modificar.php",
        "type": "POST",
        data:{
        id:id,
        txt_interno:txt_interno,
        txt_placa:txt_placa,
        txt_marca:txt_marca,
        txt_modelo:txt_modelo,
        txt_chasis:txt_chasis,
        txt_pasajeros:txt_pasajeros,
        sel_empresa:sel_empresa,
        sel_pro_vehiculo:sel_pro_vehiculo,
        txt_soat:txt_soat,
        txt_tecnomecanica:txt_tecnomecanica,
        txt_poliza_cont:txt_poliza_cont,
        txt_poliza_ext:txt_poliza_ext,
        venc_soat:venc_soat,
        venc_tecno:venc_tecno,
        venc_poliza_cont:venc_poliza_cont,
        venc_poliza_ext:venc_poliza_ext
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            $("#modal_editar_v").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Datos Actualizados', "success")
                .then((value)=>{
                    tabla_vehiculo.ajax.reload();
            });
        
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar la edicion', "error");
        }
    })

}

function contarVehiculo(){
    $("#contadorVehiculo").html(0);
    $.ajax({
        url:'../controlador/vehiculo/controlador_contador_vehiculo.php',
        type:'post',
    }).done(function(req){
		var resultado=eval("("+req+")");
        if(resultado.length>0){
            $("#contadorVehiculo").html(resultado[0]['contadorVehiculo']);
         }else{
            $("#contadorVehiculo").html(0);
         }
            
            
    })
}

function limpiarRegistro(){
    $("#idVehiculo").val("");
    //ingresas datos modal
    $("#txt_interno").val("");
    $("#txt_placa").val("");
    $("#txt_marca").val("");
    $("#txt_modelo").val("");

    $("#txt_chasis").val("");
    $("#txt_pasajeros").val("");
    $("#sel_empresa").val(0).trigger('change');
    $("#sel_pro_vehiculo").val(0).trigger('change');

    $("#txt_soat").val("");
    $("#txt_tecnomecanica").val("");
    $("#txt_poliza_cont").val("");
    $("#txt_poliza_ext").val("");

    $("#venc_soat").val("");
    $("#venc_tecno").val("");
    $("#venc_poliza_cont").val("");
    $("#venc_poliza_ext").val("");
    
}