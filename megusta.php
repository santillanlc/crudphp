<?php 

	$servidor = "localhost"; $usuario = "root"; $contrasena = ""; $bd = "blogs";
	$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);

	if($conexion->connect_error){ echo "Error al conectar a la Base de datos"; }

	$reaccion = $_GET["reaccion"];
	$id = $_GET["id"];

	$registro = "SELECT total FROM reacciones WHERE idpost = $id AND num_reaccion = $reaccion";
	$datos = $conexion->query($registro);

	$total_reacciones = $datos->fetch_assoc();

	$suma_reaccion = $total_reacciones["total"] + 1;

	$sql = "UPDATE reacciones SET total=$suma_reaccion WHERE idpost = $id AND num_reaccion = $reaccion";

	if($conexion->query($sql) === TRUE){
		header('Location: detalleBlog.php?id='.$id);
	} else {
		echo "Ocurrio un error: " . $conexion->error;
	}

?>