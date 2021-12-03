<?php 
	
	$id = $_POST["id"];
	$titulo = $_POST["titulo"];
	$contenido = $_POST["contenido"];
	$imagen = $_POST["imagen"];
	$idusuario = 1;
	$fecha = date("Y-m-d");

	$servidor = "localhost"; $usuario = "root"; $contrasena = ""; $bd = "blogs";
	$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);

	if($conexion->connect_error){ echo "Error al conectar a la Base de datos"; }

	$sql = "UPDATE posts SET titulo=$titulo, contenido=$contenido, imagen=$imagen WHERE id=$id";

	if($conexion->query($sql) === TRUE){
		header('Location: consultarBlogs.php');
	} else {
		echo "Ocurrio un error: " . $conexion->error;
	}

?>