//on ready!!

$(document).ready(function(){
    $('.datepicker').datepicker({
        format:'yyyy-mm-dd',
        minDate:new Date(),
        yearRange:99
    });

    $('#myTable').pageMe({
      pagerSelector:'#myPager',
      activeColor: 'blue',
      prevText:'Anterior',
      nextText:'Siguiente',
      showPrevNext:true,
      hidePageNumbers:false,
      perPage:5
    });
    $('#divOculto').hide();
    

  /*   $('#table_citas').pageMe({
      pagerSelector:'#myPager_citas',
      activeColor: 'blue',
      prevText:'Anterior',
      nextText:'Siguiente',
      showPrevNext:true,
      hidePageNumbers:false,
      perPage:2
    }); */

});

function realizaProceso(cedula){
    //console.log($('#select_cedula_paciente').val());
    var parametros = {
            "cedula" : cedula,
            "filtro" : 0, 
            "value" : 1,
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'Model/datos.php', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () {

            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              //console.log(response);
              $('#select_cedula_paciente').html(response).fadeIn();               
            }
           
    });
    
}
function copyValue(){
  document.getElementById("cedula_paciente").value = document.getElementById("select_cedula_paciente").value;
}
function cambiarLongitudFilas(numeroFilas){

  console.log(numeroFilas);
  //$('#myTable').empty();
  $('#myTable').pageMe({
    perPage:numeroFilas
  });
}
function updateButtons(fecha){
   
    console.log(fecha);
    var element = document.getElementsByClassName("btn_horarios");
    $(".btn_horarios").removeClass(" disabled ");
    var parametros = {
              "fecha" : fecha,
      };
      $.ajax({
              data:  parametros, //datos que se envian a traves de ajax
              url:   'Model/horarios.php', //archivo que recibe la peticion
              type:  'post', //método de envio
              beforeSend: function () {
              },
              success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                console.log(response);
                $('#botones_horarios').html(response).fadeIn();
               
              for(var i = 1; i < response.length; i++){
                    
                    //console.log(response[i]);
                    var elemento = document.getElementById("select_horarios");
                   
                 for(var j = 1; j <= elemento.length; j++){
                   if(j == response[i]){
                     console.log(elemento);
                    
                    //elemento[j-1].className += " disabled selected";
                    //document.getElementById("select_horarios").options[j-1].disabled += 'selected' ;
                    document.getElementById("select_horarios").options[j].disabled = true;
                    //$("#select_horarios").prop('disabled', false)                     
                   }
                    
                      
                    
                                   
              } 
                  
                                 
            }
              }
             
      });
  }
  function filtrar(filtrar){
    // console.log($('#select_cedula_paciente').val());
     var parametros = {
             "filtro" : filtrar,
             "cedula" : 0,
             "value"  : 2
     };
     $.ajax({
             data:  parametros, //datos que se envian a traves de ajax
             url:   'Model/datos.php', //archivo que recibe la peticion
             type:  'post', //método de envio
             beforeSend: function () {
 
             },
             success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
               console.log(response);
               $('#table_citas').html(response).fadeIn();               
             }
            
     });
 }
 function filtrar_paciente(filtrar){
  // console.log($('#select_cedula_paciente').val());
   var parametros = {
           "filtro" : filtrar,
           "cedula" : 0,
           "value"  : 3
   };
   $.ajax({
           data:  parametros, //datos que se envian a traves de ajax
           url:   'Model/datos.php', //archivo que recibe la peticion
           type:  'post', //método de envio
           beforeSend: function () {

           },
           success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
             console.log(response);
             $('#myDiv').html(response).fadeIn();               
           }
          
   });
}
function buscar(){
  $('#divOculto').show();
  $('html').css({"background-color":"#000000c9"});
}
function cerrar(){
 // $('#divOculto').empty();
  $('#divOculto').hide();
  $('html').css({"background-color":"#ffffff"});
}