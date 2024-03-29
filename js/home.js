const colorArray = [
		  '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
		  '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680', 
		  '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
		  '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3', 
		  '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];
      
      var table;
      const formatterPesoHome  = new Intl.NumberFormat('es-CO', {
        style: 'currency',
        currency: 'COP',
        minimumFractionDigits: 0
    })
    function listar_ordentwo(){
      rol = $("#rol").val();
      console.log("rol",rol)
      var fecha = $("#fecIni").val();
      var inicioDate = fecha.substring(0, 16);
      var finDate = fecha.substring(18, 38);
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
              "url": "../controlador/home/controlador_listar_orden.php",
              "type": "POST",
              data:{
                inicioDate:inicioDate,
                finDate:finDate
                }
          },
          "columns": [
              { "data": "placa" },
              { "data": "propietario" },
              { "data": "fIngreso" },
              { "data": "recaudo" ,
              render: function(data, type, row){
                return formatterPesoHome.format(data);
              }}
          ],
          "language":idioma_espanol,
         select: true
      } );
      
  }

function listar_ordenp(){
  $("#listar_ordenpe").modal({backdrop:'static',keyboard:false})
  $("#listar_ordenpe").modal('show');
  listar_ordentwo();

  $(document).ready(function(){
      $('.js-example-basic-single').select2();
      $("#listar_ordenpe").on('shown.bs.modal',function(){
      });
  
      // inicimos wizzard
        // BS-Stepper Init
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        listar_ordentwo();
        
        
  
    });
}


/* FUNCION PARA EDITAR REGISTRO
$('#tabla_alerta').on('click','.enviarCorreo',function(){

    if(table.row(this).child.isShown()){
        var datos = table.row(this).data();
    }else{
        var datos = table.row($(this).parents('tr')).data();
    }

    var propietario = datos.propietario;
    var placa = datos.placa;
    var email = datos.email;
    var Vencimiento = datos.Vencimiento;
    var Fecha = datos.Fecha;

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
                "url": "../Controlador/home/controlador_home_enviar_vencimiento.php",
                "type": "POST",
                data:{
                Propietario : propietario,
                Vencimiento : Vencimiento,
                Placa       : placa,
                Email       : email,
                Fecha       : Fecha
                }
            }).done(function(resp){
                if(resp > 0){
                    Swal.fire("¡Email enviado con exito!",'Pronto recibira el email', "success")
                }else{
                    Swal.fire("Error",'No se pudo enviar el email, revise su conexion', "error");
                }
            })
        }
      })

})

// FUNCION PARA EXPORTAR REPORTE
function reporte(){
    var url = "../controlador/home/controlador_exportar_reporte.php"
    window.open(url,'_blank');
}
*/
function contarOrden(){

  $("#contadorServicio").html(0);

  var fecha = $("#fecIni").val();
  var inicioDate = fecha.substring(0, 16);
  var finDate = fecha.substring(18, 38);
  $.ajax({
      url:'../controlador/home/controlador_contador_orden.php',
      type:'post',
      data:{
        inicioDate:inicioDate,
        finDate:finDate
        }
  }).done(function(req){
  var resultado=eval("("+req+")");

      if(resultado.length>0){
          $("#contadorServicio").html(resultado[0]['contadorServicio']);
       }else{
          $("#contadorServicio").html(0);
       }
          
          
  })
}
function contarVehiculoUnit(){

  $("#contadorServicio").html(0);

  var fecha = $("#fecIni").val();
  var inicioDate = fecha.substring(0, 16);
  var finDate = fecha.substring(18, 38);
  $.ajax({
      url:'../controlador/home/controlador_contador_vehiculoUnit.php',
      type:'post',
      data:{
        inicioDate:inicioDate,
        finDate:finDate
        }
  }).done(function(req){
  var resultado=eval("("+req+")");

      if(resultado.length>0){
          $("#contadorVehiculoDiario").html(resultado[0]['contadorVehiculoDiario']);
       }else{
          $("#contadorVehiculoDiario").html(0);
       }
          
          
  })
}
function contarclienteUnit(){

  $("#contadorClienteDiario").html(0);

  var fecha = $("#fecIni").val();
  var inicioDate = fecha.substring(0, 16);
  var finDate = fecha.substring(18, 38);
  $.ajax({
      url:'../controlador/home/controlador_contador_clienteUnit.php',
      type:'post',
      data:{
        inicioDate:inicioDate,
        finDate:finDate
        }
  }).done(function(req){
  var resultado=eval("("+req+")");

      if(resultado.length>0){
          $("#contadorClienteDiario").html(resultado[0]['contadorClienteDiario']);
       }else{
          $("#contadorClienteDiario").html(0);
       }
          
          
  })
}
function contarclienteTotal(){

  $("#contadorClienteTotal").html(0);

  var fecha = $("#fecIni").val();
  var inicioDate = fecha.substring(0, 16);
  var finDate = fecha.substring(18, 38);
  $.ajax({
      url:'../controlador/home/controlador_contador_clienteTotal.php',
      type:'post',
      data:{
        inicioDate:inicioDate,
        finDate:finDate
        }
  }).done(function(req){
  var resultado=eval("("+req+")");

      if(resultado.length>0){
          $("#contadorClienteTotal").html(resultado[0]['contadorClienteTotal']);
       }else{
          $("#contadorClienteTotal").html(0);
       }
          
          
  })
}


function contarOrdenTotal(){

  $("#contadorServicioTotal").html(0);

  $.ajax({
      url:'../controlador/home/controlador_contador_ordenTotal.php',
      type:'post'
  }).done(function(req){
  var resultado=eval("("+req+")");

  if(resultado.length>0){
          $("#contadorServicioTotal").html(resultado[0]['contadorServicioTotal']);
       }else{
          $("#contadorServicioTotal").html(0);
       }
          
          
  })
}

function contarRecaudoTotal(){

  $("#contadorRecaudoTotal").html(0);



  $.ajax({
      url:'../controlador/home/controlador_contador_recaudoTotal.php',
      type:'post'
  }).done(function(req){
  var resultado=eval("("+req+")");

      if(resultado.length>0){
          var valor = formatterPesoHome.format(resultado[0]['contadorRecaudoTotal']);
          $("#contadorRecaudoTotal").html(valor);
       }else{
          $("#contadorRecaudoTotal").html(0);
       }
          
          
  })
}

function contarRecaudo(){

  $("#contadorRecaudo").html(0);
  var fecha = $("#fecIni").val();
  var inicioDate = fecha.substring(0, 16);
  var finDate = fecha.substring(18, 38);


  $.ajax({
      url:'../controlador/home/controlador_contador_recaudo.php',
      type:'post',
      data:{
        inicioDate:inicioDate,
        finDate:finDate
      }
  }).done(function(req){
  var resultado=eval("("+req+")");
      if(resultado[0]['contadorRecaudo']>0){
          var valor1 = formatterPesoHome.format(resultado[0]['contadorRecaudo']);
          $("#contadorRecaudo").html(valor1);
       }else{
          $("#contadorRecaudo").html(0);
       }  
  })
}

/* funcion para charts de ordenbes de servicio por meses */
function graficaOrdenes(){
  var fecha = $("#fecIni").val();
  var inicioDate = fecha.substring(0, 16);
  var finDate = fecha.substring(18, 38);
    $.ajax({
        "url": "../Controlador/home/controlador_grafico_orden.php",
        "type": "POST",
        data:{
          inicioDate:inicioDate,
          finDate:finDate
          }
    }).done(function(resp){
    
        var resultado = eval("(" + resp + ")");

        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
        var areaChartData = {
        labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        datasets: [
            {
            label               : 'Ordenes registradas',
            backgroundColor     : colorArray,
            borderColor         : 'rgba(17,61,40)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : resultado[0]
            }
        ]
        }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'bar',
      data: areaChartData,
      options: areaChartOptions,
      
    })

    })
}

// funcion para charts de ordenbes de servicio por meses
function graficaBateria(){
  var fecha = $("#fecIni").val();
  var inicioDate = fecha.substring(0, 16);
  var finDate = fecha.substring(18, 38);
  $.ajax({
      "url": "../Controlador/home/controlador_grafico_bateria.php",
      "type": "POST",
      data:{
        inicioDate:inicioDate,
        finDate:finDate
        }
  }).done(function(resp){
  
    var resultado = eval("(" + resp + ")");
    console.log("alianza",resp);
      var nombres =[];
      var cantidad =[];
        for(var i=0; i<resultado.length;i++){

        
          nombres[i] = resultado[i]["nombres"]
          cantidad[i] = resultado[i]["cantidad"]
        
        }
     
         
          

      var areaChartCanvas = $('#areaChartBateria').get(0).getContext('2d')
      var areaChartData = {
      labels  : nombres,
      datasets: [
          {
          label               : 'Numero de Revisiones',
          backgroundColor     : colorArray,
          borderColor         : '#380038',
          pointRadius         : true,
          pointColor          : '#3b8bba',
          color               : '#380038',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data  	            : cantidad
          }
      ]
      }

     

  var areaChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },

    scales: {
      
      xAxes: [{
        gridLines : {
          display : false,
        }
      }],
      yAxes: [{
        
        gridLines : {
          display : false,
        }
      }],
      
    }
  }

  // This will get the first returned node in the jQuery collection.
  new Chart(areaChartCanvas, {
    type: 'bar',
    data: areaChartData,
    options: areaChartOptions

  })

  })
}


// funcion para charts de ordenbes de servicio por meses
function graficaAceite(){
  var fecha = $("#fecIni").val();
  var inicioDate = fecha.substring(0, 16);
  var finDate = fecha.substring(18, 38);
  $.ajax({
      "url": "../Controlador/home/controlador_grafico_aceite.php",
      "type": "POST",
      data:{
        inicioDate:inicioDate,
        finDate:finDate
        }
  }).done(function(resp){
  
    var resultado = eval("(" + resp + ")");
    
    var nombres =[];
    var cantidad =[];
      for(var i=0; i<resultado.length;i++){

      
        nombres[i] = resultado[i]["nombres"]
        cantidad[i] = resultado[i]["cantidad"]
      
      }
           
      console.log("aceite",resultado);
      
    var areaChartCanvas = $('#areaChartAceite').get(0).getContext('2d')
    var areaChartData = {
    labels  : nombres,
    datasets: [
        {
        label               : 'Ordenes registradas',
        backgroundColor     : colorArray,
        pointRadius         : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data  	            : cantidad
        }
    ]
    }

  var areaChartOptions = {
    maintainAspectRatio : false,
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart.js Pie Chart'
      }
    }
    
  }

  // This will get the first returned node in the jQuery collection.
  new Chart(areaChartCanvas, {
    type: 'pie',
    data: areaChartData,
    options: areaChartOptions
  })

  })
}

// funcion para charts de ordenbes de servicio por meses
function graficaLlanta(){
  $.ajax({
      "url": "../Controlador/home/controlador_grafico_llanta.php",
      "type": "POST",
  }).done(function(resp){
  
      var resultado = eval("(" + resp + ")");

      var areaChartCanvas = $('#areaChartLlanta').get(0).getContext('2d')
      var areaChartData = {
      labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
      datasets: [
          {
          label               : 'Ordenes registradas',
          backgroundColor     : 'rgba(17,61,40,0.8)',
          borderColor         : 'rgba(17,61,40)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : resultado[0]
          }
      ]
      }

  var areaChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  new Chart(areaChartCanvas, {
    type: 'bar',
    data: areaChartData,
    options: areaChartOptions
  })

  })
}

// funcion para charts de ordenbes de servicio por meses
function graficaTecnico(){
  var fecha = $("#fecIni").val();
  var inicioDate = fecha.substring(0, 16);
  var finDate = fecha.substring(18, 38);
  
  $.ajax({
      "url": "../Controlador/home/controlador_grafico_tecnico.php",
      "type": "POST",
      data:{
        inicioDate:inicioDate,
        finDate:finDate
        }
  }).done(function(resp){
    
    var resultado = eval("(" + resp + ")");
    
      var nombres =[];
      var cantidad =[];
        for(var i=0; i<resultado.length;i++){

        
          if (resultado[i]["tipoVehiculo"] == 1) {
            nombres[i] = "AUTOMOVIL";
            cantidad[i] = resultado[i]["cantidad"]
          }else if (resultado[i]["tipoVehiculo"] == 2) {
            nombres[i] = "CAMIONETA";
            cantidad[i] = resultado[i]["cantidad"]
          }
          
        
        }
               

      var areaChartCanvas = $('#areaChartTecnico').get(0).getContext('2d')
      var areaChartData = {
      labels  : nombres,
      datasets: [
          {
          label               : '# Revisiones',
          backgroundColor     : colorArray,
          borderColor         : 'rgba(17,61,40)',
          pointRadius         : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data  	            : cantidad
          }
      ]
      }

    

  var areaChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  new Chart(areaChartCanvas, {
    type: 'bar',
    data: areaChartData,
    options: areaChartOptions
  })

  })
}

//setInterval(enviarCorreoA(),3600000)
function enviarCorreoA(){


    $.ajax({
      "url": "../Controlador/home/controlador_home_enviar_vencimientoA.php",
      "type": "POST"
    })
}

const date = new Date();
const year = date.getFullYear();
const month = date.getDate();
const day = date.getDay();

const fechaActual = year+"/"+month+"/"+day;
const inicio = fechaActual+" 00:00";
const fin = fechaActual+" 23:59";

$("#fecIni").daterangepicker({
  timePicker: true,
  timePicker24Hour:true,
  
  locale: {
    format: 'YYYY/MM/DD HH:ss'
  }

});




