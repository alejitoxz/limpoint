var table_miscelaneos;
function listar_miscelaneos(){
    table_miscelaneos = $('#tabla_miscelaneos').DataTable( {
        "ordering":false,
        "paging": true,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": true ,
        "processing": false,
        "ajax": {
            "url": "../controlador/miscelaneos/controlador_miscelaneos_listar.php",
            "type": "POST"
        },
        "columns": [
            //{ "data": "id" },
            { "data": "descripcion" },
            {"defaultContent":
            "<button style='font-size:13px;' type='button' class='eliminarc btn btn-danger'><i class='fa fa-trash'></i></button><button style='font-size:13px;' type='button' class='editarc btn btn-info'><i class='fa fa-edit'></i></button>"}
        ],
        "language":idioma_espanol,
       select: true
    } );
    
}
function AbrirModalRegistromiscelaneos(){
    $("#modal_registro_miscelaneos").modal({backdrop:'static',keyboard:false})
    $("#modal_registro_miscelaneos").modal('show');
}

function registrar_miscelaneos(){
    var descripcion = $("#txt_descripcion").val();

    if( descripcion == ''
        ){
            return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
        }
    $.ajax({
        "url": "../controlador/miscelaneos/controlador_miscelaneos_registro.php",
        "type": "POST",
        data:{
        descripcion:descripcion,
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            if(resp==1){
            $("#modal_registro_miscelaneos").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Registro realizado', "success").then((value)=>{
                table_miscelaneos.ajax.reload();
                limpiarRegistro();
            });
        }
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar el Registro', "error");
        }
    })

}
function limpiarRegistro(){
    $("#txt_descripcion").val("");
}

// FUNCION PARA ELIMINAR (ANULAR) REGISTRO
$('#tabla_miscelaneos').on('click','.eliminarc',function(){
    if(table_miscelaneos.row(this).child.isShown()){
        var idmiscelaneos = table_miscelaneos.row(this).data().id;
    }else{
        var idmiscelaneos = table_miscelaneos.row($(this).parents('tr')).data().id;
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
        modificar_estatus(idmiscelaneos,0);
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
        "url": "../controlador/miscelaneos/controlador_modificar_miscelaneos_estatus.php",
        type: "POST",
        data:{
        id:id,
        estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                    listar_miscelaneos();
                
            }else{
                Swal.fire("Mensaje De Advertencia",'No se pudo borrar el archivo', "warning")
            }
        }
    })
}


function AbrirModalEditarC(){
    $("#modal_editar_C").modal({backdrop:'static',keyboard:false})
    $("#modal_editar_C").modal('show');
}

// FUNCION PARA EDITAR REGISTRO
$('#tabla_miscelaneos').on('click','.editarc',function(){
    
    if(table_miscelaneos.row(this).child.isShown()){
        var datosmiscelaneos = table_miscelaneos.row(this).data();
    }else{
        var datosmiscelaneos = table_miscelaneos.row($(this).parents('tr')).data();
    }
    
    var id = datosmiscelaneos.id;
    var descripcion = datosmiscelaneos.descripcion;
     //levantar modal
    AbrirModalEditarC();
    //ingresas datos modal
    $("#id").val(id);
    $("#txt_miscelaneos_edit").val(descripcion);
   
})
function modificar_miscelaneos(){
    var id = $("#id").val();
    var descripcion = $("#txt_miscelaneos_edit").val();

    console.log(descripcion);
    if( descripcion == ''
    ){
            return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
        }

    $.ajax({
        "url": "../controlador/miscelaneos/controlador_miscelaneos_editar.php",
        "type": "POST",
        data:{
        id:id,
        descripcion:descripcion,
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            $("#modal_editar_C").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Datos Actualizados', "success")
                .then((value)=> {
                table_miscelaneos.ajax.reload();
            });
        
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar la edicion', "error");
        }
    })

}