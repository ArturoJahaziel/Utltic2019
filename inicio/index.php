<?php 
	include('../sesiones/verificar_sesion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Registros de Alumnos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">

	<!-- Alertify	 -->
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/themes/bootstrap.css">
    <!-- pls -->
    <link rel="stylesheet" href="../pls/estilos.css">
    <link rel="stylesheet" href="../pls/font-awesome.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../pls/main.js"></script>
</head>
<body>
	<header>
		<?php 
			include('../layout/encabezado.php');
		 ?>
	</header><!-- /header -->	
	<div class="container-fluid" >
		<div class="row" id="cuerpo" style="display:none">
			<div class="col-xs-0 col-sm-3 col-md-2 col-lg-2">
			<?php 
				include('../layout/menuv.php');
			 ?>
			</div>
			<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 cont">
			   <div class="titulo borde sombra">
			        <h3>Lista de alumnos ingresados al CC</h3>
			   </div>	
			   <div class="contenido borde sombra">
                <div class="wrap">
        <ul class="tabs" >
            <li>  <a href="#tab1" onclick='cargar(1)'><span class="fa fa-home"></span><span class="tab-text">Alumnos dentro del CC</span></a></li>
            <li>  <a href="#tab2" onclick='cargar(2)'><span class="fa fa-group"></span><span class="tab-text">Alumno con Entrada y Salida</span></a></li>
            <li>  <a href="#tab3" onclick='cargar(3)'><span class="fa fa-briefcase"></span><span class="tab-text">Alumnos sin Salidas</span></a></li>
            <li>  <a href="#tab4" onclick='cargar(4)'><span class="fa fa-bookmark"></span><span class="tab-text">Lista por Carreras</span></a></li>
        </ul>

        <div class="secciones">
            <article id="tab1"> 
                <div class="row" id="div_1" style='display:none;'>
                        <div class="col-md-12">
                            <center><label>Alumnos dentro del Centro de Computo</label></center>
                            <br>
                             <div class="col-md-3">
                                <div class="form-group">
                                      <button class="btn btn-login btn-flat "  onclick="imprimir1()"><i class="fa fa-file-pdf-o"></i>  Generar PDF</button>
                                </div>
                             </div>
                        </div>
                        <hr>
                        <div class="col-md-12"> 
                            <div id="cuerpo_1">
                            </div>  
                        </div> 
                    </div>
            </article>
            <article id="tab2">
                <div class="row" id="div_2" style='display:none;'>
                        <div class="col-md-12">
                            <center><label>Alumnos con Entrada y Salida del Centro de Computo</label></center>
                            <br>
                            <form id="form_2" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button class="btn btn-login btn-flat "><i class="fa fa-file-pdf-o"></i> Generar PDF</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div id="cuerpo_2">
                                    
                            </div>  
                        </div>
                    </div>
            </article>
            <article id="tab3">
                <div class="row" id="div_3" style='display:none;'>
                        <center><label>Alumnos sin Salida del Centro de Computo</label></center>
                            <br>
                        <div class="col-md-12">
                            <form id="form_3">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <br>
                                                <button class="btn btn-login btn-flat "><i class="fa fa-file-pdf-o"></i> Generar PDF</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div id="cuerpo_3">
                                    
                            </div>  
                        </div>
                    </div>
            </article>
            <article id="tab4">
               <div class="row" id="div_4" style='display:none;'>
                        <center><label>Listado de Visitas de Alumnos por Carrera</label></center>
                        <br>
                        <div class="col-md-12">
                            <form id="form_4">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">

                                                <button class="btn btn-login btn-flat "><i class="fa fa-file-pdf-o"></i> Generar PDF</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div id="cuerpo_4">
                                    
                            </div>  
                        </div>
                    </div> 
            </article>
        </div>
            </div>
			   </div>
			</div>			
		</div>
	</div>
	<footer class="fondo">
		<?php 
			include('../layout/pie.php');
		 ?>			
	</footer>
	<div id="modalContra" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <form id="frmContra">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Actualizar Contraseña</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
                                <div class="form-group">
                                    <label for="pass">Contraseña Nueva:</label>
                                    <input onkeyup="verificar_pass()" type="password" id="pass" class="form-control " autofocus="" required="" placeholder="Escribe la contraseña">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-6">
                                <div class="form-group">
                                    <label for="pass1">Confirma Contraseña:</label>
                                    <input onkeyup="verificar_pass()" type="password" id="pass1" class="form-control " required="" placeholder="Confirma la contraseña">
                                </div>
                            </div>
                            <hr class="linea">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="button" id="btnCerrar" class="btn btn-login  btn-flat  pull-left" data-dismiss="modal">Cerrar</button>
                                <input disabled = "disabled" id="btn_actualizar_pass" type="submit" class="btn btn-login  btn-flat  pull-right" value="Actualizar Contraseña" onclick="actualizar_pass()">	
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        function ocultar(){
            for (var i = 1; i <= 5; i++){
                if($('#btn_'+i).hasClass('active')){
                    $('#btn_'+i).removeClass('active');
                }
                $("#carrera_"+i).empty();
                $('#div_'+i).hide();

            }
        }
        function cargar(numero){
            ocultar();
            $('#btn_'+numero).addClass('active'); 
            $('#div_'+numero).show();
            llenar_datos(numero);
            llenar_carrera(numero);
        }
        function llenar_datos(dato){
            $.ajax({
                url:"consulta_datos.php",
                type:"POST",
                dateType:"html",
                data:{
                    'dato':dato
                },
                success:function(respuesta){
                    $('#cuerpo_'+dato).html(respuesta);
                },
                error:function(xhr,status){
                    alert(xhr);
                },
            });
        }
        function llenar_carrera(numero)
        {
            $.ajax({
                url : 'comboCarreras.php',
                type : 'POST',
                dataType : 'html',
                success : function(respuesta) {
                    $("#carrera_"+numero).empty();
                    $("#carrera_"+numero).html(respuesta);      
                },
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
            });
        }
    </script>
    <script>
        function cambiar_contra(){
            $("#modalContra").modal("show");
            $("#frmContra")[0].reset();
            $('#modalContra').on('shown.bs.modal', function () {
                $('#pass').focus();            
            }); 
        }
        function actualizar_pass(){
            var pass   = $("#pass").val();
            $.ajax({
                url:"../sesiones/actualizar_pass2.php",
                type:"POST",
                dateType:"html",
                data:{
                    'pass':pass
                },
                success:function(respuesta){
                if (respuesta == "ok"){
                    alertify.set('notifier','position', 'bottom-right');
                    alertify.success('Se ha actualizado la contraseña' );
                    $("#frmContra")[0].reset();
                    $("#modalContra").modal("hide");
                }else{
                    alertify.set('notifier','position', 'bottom-right');
                    alertify.error('La contraseña es igual a la Anterior' );
                }
                },
                error:function(xhr,status){
                    alert(xhr);
                },
            });
        }

        function verificar_pass(){
            var pass1 = $('#pass').val();
            var pass2 = $('#pass1').val();

            if(pass1.trim() != "" && pass2.trim() !=""){
                if(pass1 == pass2){
                    $('#btn_actualizar_pass').removeAttr('disabled');
                }else{
                    $('#btn_actualizar_pass').attr('disabled', 'disabled');
                }
            }else{
                $('#btn_actualizar_pass').attr('disabled', 'disabled');
            }
        }



       
    </script>
	<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- Preloaders -->
    <script src="../plugins/Preloaders/jquery.preloaders.js"></script>
	
	<script src="../js/menu.js"></script>
	<script src="../js/precarga.js"></script>
	<script src="../js/salir.js"></script>
	<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- alertify -->
	<script type="text/javascript" src="../plugins/alertifyjs/alertify.js"></script>
	<script>
		window.onload = function() {
			$("#cuerpo").fadeIn("slow");
		};
	</script>
</body>
</html>