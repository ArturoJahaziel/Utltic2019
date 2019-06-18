<?php
	include("../sesiones/verificar_sesion.php");

	$dato = $_POST['dato'];

	if($dato == "1"){
		$cadena = "SELECT id_registro, id_alumno FROM registros WHERE fecha_salida is null AND activo = '1'";
	}else if($dato == "2"){
		$cadena = "SELECT id_registro, id_alumno FROM registros WHERE hora_ingreso is not null AND hora_salida is not null ";
	}else if($dato == "3"){
		$cadena = "SELECT id_registro, id_alumno FROM registros WHERE fecha_salida is null AND activo = '1'";
	}else if ($dato == "4"){
		$cadena = "SELECT id_carrera, nombre, abreviatura FROM carreras WHERE activo = '1'";
	}
	$consulta = mysql_query($cadena,$conexion);

	if($dato != "4"){
		?>
		<div class="table-responsive">
			<table id="example1" class="table table-responsive table-condensed table-bordered table-striped">
				<thead align="center">
				<tr class="info" >
					<th>#</th> 
					<th>Nombre</th>
					<th>Matricula</th>
					<th>Carrera</th>
				</tr>
				</thead>
				<tbody align="center">
				<?php 
				$n=1;
					while($row = mysql_fetch_array($consulta)){
			$cadena = "SELECT no_control, (SELECT nombre FROM carreras WHERE carreras.id_carrera = alumnos.id_carrera),CONCAT(personas.nombre,' ',personas.ap_paterno,' ',personas.ap_materno),personas.sexo FROM alumnos INNER JOIN personas ON personas.id_persona = alumnos.id_persona WHERE id_alumno = '$row[1]'";
			$cadena2 = mysql_query($cadena,$conexion);
			$row2 = mysql_fetch_array($cadena2);

					?>
				<tr>
					<td>
						<?php echo "$n"; ?>
					</p>
					</td>
					<td>
						<?php echo $row2[2]; ?>
					</p>
					</td>
					<td>
						<?php echo $row2[0]; ?>
					</p>
					</td>
					<td>
						<?php echo $row2[1]; ?>
					</p>
					</td>
				</tr>
				<?php
				$n++;
				}
				?>

				</tbody>

				<tfoot align="center">
				<tr class="info">
					<th>#</th> 
					<th>Nombre</th>
					<th>Matricula</th>
					<th>Carrera</th>
				</tr>
				</tfoot>
			</table>
		</div>

	<?php 
	}
	else{
	?>
			<div class="table-responsive">
			<table id="example1" class="table table-responsive table-condensed table-bordered table-striped">
				<thead align="center">
				<tr class="info" >
					<th>#</th>
					<th>Carrera</th>
					<th>Cantidad de Alumnos</th>
				</tr>
				</thead>
				<tbody align="center">
				<?php 
				$n=1;
				while ($row=mysql_fetch_row($consulta)) {
					$cadena_cant = mysql_query("SELECT registros.id_registro FROM registros INNER JOIN alumnos ON alumnos.id_alumno = registros.id_alumno WHERE alumnos.id_carrera = '$row[0]'",$conexion);
					$cantidad = mysql_num_rows($cadena_cant);
					?>
				<tr>
					<td >
						<?php echo "$n"; ?>
					</p>
					</td>
					<td>
						<?php echo $row[1]; ?>
					</p>
					</td>
					<td>
						<?php echo $cantidad; ?>
					</p>
					</td>
				</tr>
				<?php
				$n++;
				}
				?>

				</tbody>

				<tfoot align="center">
				<tr class="info">
					<th>#</th>
					<th>Carrera</th>
					<th>Cantidad de Alumnos</th>
				</tr>
				</tfoot>
			</table>
		</div>
<?php
	}
?>