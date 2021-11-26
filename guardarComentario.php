<?php 

	$servidor = "localhost"; $usuario = "root"; $contrasena = ""; $bd = "blogs";
	$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);

	if($conexion->connect_error){ echo "Error al conectar a la Base de datos"; }

	$id = $_GET["id"];
	$comentario = $_POST["comentario"];
	$fecha = date("Y-m-d");
	$idusuario = 1;

	$sql = "INSERT INTO comentarios (comentario, fecha, idpost, idusuario) VALUES ('$comentario', '$fecha', $id, $idusuario)";

	if($conexion->query($sql) === TRUE){
		header('Location: detalleBlog.php?id='.$id);
	} else {
		echo "Ocurrio un error: " . $conexion->error;
	}

?>