<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<!-- Alertify	 -->
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/themes/bootstrap.css">

	    <!-- bootstrap-toggle-master -->
	<link href="../plugins/bootstrap-toggle-master/css/bootstrap-toggle.css" rel="stylesheet">
    <link href="../plugins/bootstrap-toggle-master/stylesheet.css" rel="stylesheet">
</head>
<body class="login">
	<div class="container" style="display:none" id="registroEntrada">
		<div class="row justify-content-md-center">
			<div class="col-md-auto login-box borde sombra">
				<h3 class="text-center titulo" id="titulo_registro">Registro de Entrada</h3>
				<h3 class="text-center titulo" id="titulo_datos" style="display:none" >Registro del Alumno</h3>
				<hr>
				<form id="frmRegistro">
					<div class="form-row">
						<div class="col-md-12">
							<label for="" class="colorLetra">Matricula:</label>
					          <div class="form-group has-feedback salto">
					            <input type="text" id="matricula" placeholder="Matricula" class="form-control " autofocus onchange="verificar(this.value)">
					            <span class="glyphicon glyphicon-user form-control-feedback"></span>
					          </div>
						</div>
					</div>
				</form>
				<div class="container-fluid" id="btn_regresar">
					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-login  btn-flat  pull-left" onclick="regresar()"><i class="fas fa-undo" ></i> Regresar</button>
		 				</div>
					</div><!-- /.col -->
				</div>
				<div class="container-fluid" id="datos_alumno" style="display: none;">
					<div class="col-md-12">
						<center>
								<img src="" alt="" id="imagen" width="200px" height="200px">
						</center>	
						</div>
						<div class="col-md-12">
							<center>
								<br>
								<br>
								<label>Nombre:</label>
								<input type="text" align="center" id="nombre" class="form-control">
								<br>
								<br>
								<label>Carrera:</label>
								<input type="text" align="center" id="carrera" class="form-control">
								<input type="hidden" id="id_alumno" class="form-control">
							</center>
						</div>
						
				</div>
			</div>			
		</div>
	</div>
	<div class="container" style="display:none" id="cuerpo">
		<div class="row justify-content-md-center">
			<div class="col-md-auto login-box borde sombra">
				<h3 class="text-center titulo">Iniciar Sesión</h3>
				<hr>
				<form id="frmIngreso">
					<div class="form-row">
						<div class="col-md-12">
							<label for="" class="colorLetra">Nombre de usuario:</label>
					          <div class="form-group has-feedback salto">
					            <input type="text" id="username" placeholder="Usuario" class="form-control " autofocus>
					            <span class="glyphicon glyphicon-user form-control-feedback"></span>
					          </div>
						</div>
						<div class="col-md-12">
							<label for="" class="colorLetra">Contraseña:</label>
					          <div class="form-group has-feedback salto">
					            <input type="password" id="pass" placeholder="Usuario" class="form-control " >
					            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					          </div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<a class="btn btn-login btn-flat pull-left" id="btnRegistrar" onclick="mostrar()"><i class="fa fa-credit-card"></i> Registrar Entrada</a>
								&nbsp;
								<input id="chkContra"  onchange='evaluarCheck(this.value)' data-on="Si" data-off="No" type="checkbox" checked data-toggle="toggle" data-size="mini" value='no'><label class="colorLetra"> &nbsp; Cambiar Contra</label>
								<button type="submit" class="btn btn-login  btn-flat  pull-right" id="btnIngresar">
									<i class="fas fa-lock-open"></i>
									Ingresar
								</button>
							</div>
						</div><!-- /.col -->
					</div>
				</form>
			</div>			
		</div>
	</div>
	<div class="container" style="display:none" id="cambiarContra">
		<div class="row justify-content-md-center">
			<div class="col-md-auto login-box borde sombra">
				<h3 class="text-center titulo">Cambiar Contraseña</h3>
				<hr>
				<form id="frmCambiar">
					<div class="form-row">
						<div class="col-md-12">
							<input type="hidden" id="usuario" class="form-control">
						<div class="col-md-12">
							<label for="" class="colorLetra">Contraseña:</label>
								<div class="form-group has-feedback salto">
									<input type="password" id="vContra1"  class="form-control"  onkeyup="verificar_pass()">
									<span class="glyphicon glyphicon-lock form-control-feedback"></span>
								</div>
						</div>
						<div class="col-md-12">
							<label for="" class="colorLetra">Verificar Contraseña:</label>
								<div class="form-group has-feedback salto">
									<input type="password" id="vContra2"  class="form-control" onkeyup="verificar_pass()">
									<span class="glyphicon glyphicon-lock form-control-feedback"></span>
								</div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<button type="button" class="btn btn-login  btn-flat  pull-left" id="btnCancelar" onclick="cancelar()">
									<i class="fas fa-times"></i>
									Cancelar
								</button>
								<button type="submit" class="btn btn-login  btn-flat  pull-right" id="btnActualizar" disabled="disabled">
									<i class="fas fa-lock-open"></i>
									Actualizar
								</button>
								</div>
						</div><!-- /.col -->
					</div>
				</form>
			</div>			
		</div>
	</div>
	
	<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../plugins/Preloaders/jquery.preloaders.js"></script>
	<script src="../plugins/voice/responsivevoice.js"></script>

	<!-- alertify -->
	<script type="text/javascript" src="../plugins/alertifyjs/alertify.js"></script>
	<!-- bootstrap-toggle-master -->
	<script src="../plugins/bootstrap-toggle-master/doc/script.js"></script>
    <script src="../plugins/bootstrap-toggle-master/js/bootstrap-toggle.js"></script>
    <!-- Funciones propias -->
    <script src="funciones.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/precarga.js"></script>

	<script>
	window.onload = function() {
		$("#cuerpo").fadeIn("slow");
		$("#username").focus();
	};	
	$('#chkContra').bootstrapToggle('off');
	$('#chkContra').val('no');

	function verificar_pass(){
		var pass1 = $('#vContra1').val();
		var pass2 = $('#vContra2').val();

		if(pass1.trim() != "" && pass2.trim() !=""){
			if(pass1 == pass2){
				$('#btnActualizar').removeAttr('disabled');
			}else{
				$('#btnActualizar').attr('disabled', 'disabled');
			}
		}else{
			$('#btnActualizar').attr('disabled', 'disabled');
		}
	}
	function mostrar() {
		$('#cuerpo').hide();
		$("#registroEntrada").fadeIn('low');
	}
	function regresar(){
		$('#registroEntrada').hide();
		$("#cuerpo").fadeIn('low');	
		$('#matricula').val("");

		$('#datos_alumno').hide();
		$('#btn_regresar').show();
		$('#frmRegistro').show();
		$('#titulo_registro').show();
		$('#titulo_datos').hide();

		window.clearInterval(crono);
	}
	function hablar(texto){
		responsiveVoice.speak(texto,"Spanish Female"); 
	}
	function verificar(matricula){
		var matricula = matricula.trim();
		if(matricula == ""){
			alertify.set('notifier','position', 'bottom-right');
		    alertify.error('Verifica Campos');
		    $('#matricula').val("");
		}else{
			$.ajax({
		        url:"verificar_martricula.php",
		        type:"POST",
		        dateType:"html",
		        data: {'matricula':matricula},
		        success:function(respuesta){
		        	if(respuesta != "no"){
		        		$('#datos_alumno').show();

		        		$('#btn_regresar').hide();
		        		$('#frmRegistro').hide();
		        		$('#titulo_registro').hide();
		        		$('#titulo_datos').show();
		        		 
		        		var array = eval(respuesta);
		        		$('#id_alumno').val(array[0]);
		        		$('#nombre').val(array[1]);
		        		$('#matricula').val(array[2]);
		        		$('#carrera').val(array[3]);
						$('#imagen').attr('src', array[4]);

						var texto = array[1]+', '+array[5];

						hablar(texto);

						$('#matricula').val("");
		        		var crono = window.setInterval(regresar,6000);
		        	}else{
		        		alertify.set('notifier','position', 'bottom-right');
		        		alertify.error('No existe la matricula' );
		        		$('#matricula').val("");
		        		$('#matricula').focus();
		        	}
		        },
		        error:function(xhr,status){
		            alert(xhr);
		        },
		    });
		    return false;
		}
	}

	$('#btnActualizar').click(function(){
		usuario  = $('#usuario').val();
		vContra1 = $('#vContra1').val();
		$.ajax({
	        url:"actualizar_pass.php",
	        type:"POST",
	        dateType:"html",
	        data: {'vContra1':vContra1,'usuario':usuario},
	        success:function(respuesta){
	        	if(respuesta == "ok"){
	        		alertify.set('notifier','position', 'bottom-right');
	        		alertify.success('Se ha actualizado la contraseña' );
	        		preCarga(2000,2);
                    setInterval(entrando, 6000);
	        	}else{
	        		alertify.set('notifier','position', 'bottom-right');
	        		alertify.error('La Contraseña es igual a la anterior' );
	        	}
	        },
	        error:function(xhr,status){
	            alert(xhr);
	        },

	    });
	    return false;
	});
	function entrando(){
	    window.location='../inicio/index.php';
	}
	</script>


</body>
</html>
