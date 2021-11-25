<?php 

	$servidor = "localhost"; $usuario = "root"; $contrasena = ""; $bd = "blogs";
	$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);

	if($conexion->connect_error){ echo "Error al conectar a la Base de datos"; }

	$id = $_GET["id"];

	$sql = "DELETE FROM posts WHERE id=$id";

	if($conexion->query($sql) === TRUE){
		header('Location: consultarBlogs.php');
	} else {
		echo "Ocurrio un error: " . $conexion->error;
	}

?>