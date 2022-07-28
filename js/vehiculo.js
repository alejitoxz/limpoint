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
            },
            {
                "targets": [ 1 ],
                "visible": false
            },
            {
                "targets": [ 2 ],
                "visible": false
            }
        ],
        "columns": [
            { "data": "idAlianza" },
            { "data": "idPropietario" },
            { "data": "idMarca" },
            { "data": "id" },
            { "data": "placa" },
            { "data": "marca" },
            { "data": "tipoVehiculo" },
            { "data": "alianza" },
            { "data": "empresa" },
            { "data": "nombre" },
            {"defaultContent":"<button style='font-size:13px;' type='button' class='eliminarv btn btn-danger'><i class='fa fa-trash'></i></button><button style='font-size:13px;' type='button' class='editarv btn btn-info'><i class='fa fa-edit'></i></button>"}
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
            $("#sel_pro_vehiculo_editar").html(cadena);
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
            $("#sel_alianza_editar").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}

function listar_marca(){
    $.ajax({
        "url": "../controlador/vehiculo/controlador_marca_listar.php",
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
            $("#sel_marca_editar").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function limpiarRegistro(){
    //ingresas datos modal
    $("#txt_placa").val("");
    $("#sel_marca").val(0).trigger('change');
    $("#sel_tipoVehiculo").val(0).trigger('change');
    $("#sel_alianza").val(0).trigger('change');
    $("#sel_pro_vehiculo").val(0).trigger('change');
}

function registrar_vehiculo(){
    var placa = $("#txt_placa").val();
    var tipoVehiculo = $("#sel_tipoVehiculo").val();
    var alianza = $("#sel_alianza").val();
    var pro_vehiculo = $("#sel_pro_vehiculo").val();
    var marca = $("#sel_marca").val();


    if(
        txt_placa == ''
    ){
        return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/vehiculo/controlador_vehiculo_registrar.php",
        "type": "POST",
        data:{
            placa:placa,
            alianza:alianza,
            tipoVehiculo:tipoVehiculo,
            pro_vehiculo:pro_vehiculo,
            marca:marca
            
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
    var idPropietario = datosVehiculo.idPropietario;
    var id = datosVehiculo.id;
    var placa = datosVehiculo.placa;
    var marca = datosVehiculo.idMarca;
    var tipoVehiculo = datosVehiculo.tipoVehiculo;
    var alianza = datosVehiculo.idAlianza;

    //levantar modal
    AbrirModalEditarV();
    //ingresas datos modal
    $("#idVehiculo").val(id);
    $("#txt_placa_editar").val(placa);
    $("#sel_marca_editar").val(marca).trigger('change');
    $("#sel_tipoVehiculo_editar").val(tipoVehiculo).trigger('change');
    $("#sel_alianza_editar").val(alianza).trigger('change');
    $("#sel_pro_vehiculo_editar").val(idPropietario).trigger('change');
    
})
function modificar_vehiculo(){
    var placa = $("#txt_placa_editar").val();
    var marca = $("#sel_marca_editar").val();
    var tipoVehiculo = $("#sel_tipoVehiculo_editar").val();
    var alianza = $("#sel_alianza_editar").val();
    var idPropietario = $("#sel_pro_vehiculo_editar").val();
    var id = $("#idVehiculo").val();
    

    if(
        txt_placa == ''
    ){
        return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
    }
        

    $.ajax({
        "url": "../controlador/vehiculo/controlador_vehiculo_modificar.php",
        "type": "POST",
        data:{
        id:id,
        placa:placa,
        marca:marca,
        tipoVehiculo:tipoVehiculo,
        alianza:alianza,
        idPropietario:idPropietario
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

// FUNCION PARA ELIMINAR (ANULAR) REGISTRO
$('#tabla_vehiculos').on('click','.eliminarv',function(){
    
    if(table.row(this).child.isShown()){
        var idVehiculo = tabla_vehiculo.row(this).data().id;
    }else{
        var idVehiculo = tabla_vehiculo.row($(this).parents('tr')).data().id;
    }
    console.log("entra",idVehiculo)
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

function mayus(e) {
    e.value = e.value.toUpperCase();
    //e.value = e.value.toLowerCase(); minuscula
}