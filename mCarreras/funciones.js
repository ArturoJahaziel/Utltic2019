function llenar_lista(){
     // console.log("Se ha llenado lista");
    preCarga(1000,4);
    $.ajax({
        url:"llenarLista.php",
        type:"POST",
        dateType:"html",
        data:{},
        success:function(respuesta){
            $("#lista").html(respuesta);
            $("#lista").slideDown("fast");
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    });	
}

function ver_alta(){
    preCarga(800,4);
    $("#lista").slideUp('low');
    $("#alta").slideDown('low');
    $("#nombre").focus();
}

function ver_lista(){
    $("#alta").slideUp('low');
    $("#lista").slideDown('low');
}

$('#btnLista').on('click',function(){
    llenar_lista();
    ver_lista();
});

$("#frmAlta").submit(function(e){
  
    var nombre      = $("#nombre").val();
    var abreviatura = $("#abreviatura").val();

    $.ajax({
        url:"guardar.php",
        type:"POST",
        dateType:"html",
        data:{
                'nombre':nombre,
                'abreviatura':abreviatura
                },
        success:function(respuesta){
            if(respuesta == "ok"){
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('Se ha guardado el registro' );
                $("#frmAlta")[0].reset();
                $("#nombre").focus();
                llenar_lista();
                ver_lista(); 
            }else{
                alertify.set('notifier','position', 'bottom-right');
                alertify.error('Registro Duplicado' );
            }
        },
        error:function(xhr,status){
            alert(xhr);
        },
    });
    e.preventDefault();
    return false;
});

function abrirModalEditar(nombre_carrera,abreviatura,ide){
   
    $("#frmActuliza")[0].reset();
    $("#nombreE").val(nombre_carrera);
    $("#abreviaturaE").val(abreviatura);
    $("#idE").val(ide);

    $(".select2").select2();

    $("#modalEditar").modal("show");

     $('#modalEditar').on('shown.bs.modal', function () {
        $('#nombreE').focus();
     });   
}

$("#frmActuliza").submit(function(e){
  
    var nombre      = $("#nombreE").val();
    var abreviatura = $("#abreviaturaE").val();
    var ide         = $("#idE").val();

    $.ajax({
        url:"actualizar.php",
        type:"POST",
        dateType:"html",
        data:{
            'nombre':nombre,
            'abreviatura':abreviatura,
            'ide':ide
        },
        success:function(respuesta){
        if (respuesta == "ok"){
            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha actualizado el registro' );
            $("#frmActuliza")[0].reset();
            $("#modalEditar").modal("hide");
            llenar_lista();
        }else{
            alertify.set('notifier','position', 'bottom-right');
            alertify.error('Registro Duplicado' );
        }
        },
        error:function(xhr,status){
            alert(xhr);
        },
    });
    e.preventDefault();
    return false;
});

function status(concecutivo,id){
    var nomToggle = "#interruptor"+concecutivo;
    var nomBoton  = "#boton"+concecutivo;
    var numero    = "#tConsecutivo"+concecutivo;
    var carrera   = "#tCarrera"+concecutivo;
    var abreviatura    = "#tAbreviatura"+concecutivo;

    if( $(nomToggle).is(':checked') ) {
        // console.log("activado");
        var valor=0;
        alertify.success('Registro habilitado' );
        $(nomBoton).removeAttr("disabled");
        $(numero).removeClass("desabilita");
        $(carrera).removeClass("desabilita");
        $(abreviatura).removeClass("desabilita");
    }else{
        console.log("desactivado");
        var valor=1;
        alertify.error('Registro deshabilitado' );
        $(nomBoton).attr("disabled", "disabled");
        $(numero).addClass("desabilita");
        $(carrera).addClass("desabilita");
        $(abreviatura).addClass("desabilita");
    }
    // console.log(concecutivo+' | '+id);
    $.ajax({
        url:"status.php",
        type:"POST",
        dateType:"html",
        data:{
            'valor':valor,
            'id':id
        },
        success:function(respuesta){
            // console.log(respuesta);
        },
        error:function(xhr,status){
            alert(xhr);
        },
    });
}
function imprimir(){
  var titular = "Lista de Carreras";
  var mensaje = "¿Deseas generar un archivo con PDF con la lista de carreras activas";
  // var link    = "pdfListaPersona.php?id="+idPersona+"&datos="+datos;
  var link    = "pdfListaCarreras.php?";

  alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
  alertify.confirm(
      titular, 
      mensaje, 
      function(){ 
          window.open(link,'_blank');
          }, 
      function(){ 
              alertify.error('Cancelar') ; 
              // console.log('cancelado')
            }
  ).set('labels',{ok:'Generar PDF',cancel:'Cancelar'}); 
}