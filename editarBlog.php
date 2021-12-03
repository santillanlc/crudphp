<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<title>Editar blog</title>
</head>
<body>
	<?php 

		//Lo copié de detalleblog
		$servidor = "localhost"; $usuario = "root"; $contrasena = ""; $bd = "blogs";
		$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);

		if($conexion->connect_error){ echo "Error al conectar a la Base de datos"; }

		$id = $_GET["id"];

		$sql = "SELECT * FROM posts WHERE id=$id";
		$datos = $conexion->query($sql);

		$blog = $datos->fetch_assoc();

	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="nuevoBlog.php">Blogs</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php">Principal <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="nuevoBlog.php">Nuevo blog</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
	          Opciones
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Nuevo blog</a>
	          <a class="dropdown-item" href="consultarBlogs.php">Consultar blogs</a>
	          <div class="dropdown-divider"></div>
	        </div>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
	    </form>
	  </div>
	</nav><br>

	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Registro de Blog</h1><hr>
				<form action="actualizarBlog.php" method="POST">
					<input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
					<div class="form-group">
						<label for="titulo">Titulo del blog:</label>
						<input type="text" class="form-control" name="titulo" placeholder="Teclea el titulo" value="<?php echo $blog['titulo']; ?>">
					</div>
					<div class="form-group">
						<label for="contenido">Contenido:</label>
						<textarea  cols="30" rows="5" class="form-control" name="contenido" placeholder="Teclea contenido" required><?php echo $blog['contenido']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="imagen">Selecciona una imagen:</label>
						<div class="row">
							<div class="col-sm-3">
								<input type="radio" name="imagen" value="imagen1.jpg" <?php if($blog['imagen']=='imagen1.jpg') echo "checked";  ?>>
								<img src="imagenes/imagen1.jpg" alt="" class="img-fluid">
							</div>
							<div class="col-sm-3">
								<input type="radio" name="imagen" value="imagen2.jpg" <?php if($blog['imagen']=='imagen2.jpg') echo "checked";  ?>>
								<img src="imagenes/imagen2.jpg" alt="" class="img-fluid">
							</div>
							<div class="col-sm-3">
								<input type="radio" name="imagen" value="imagen3.jpg" <?php if($blog['imagen']=='imagen3.jpg') echo "checked";  ?>>
								<img src="imagenes/imagen3.jpg" alt="" class="img-fluid">
							</div>
						</div>
					</div>
					<div>
						<input type="submit" value="Guardar" class="btn btn-primary">
						<a href="consultarBlogs.php" class="btn btn-info">Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<hr>
	<footer class="text-center">
		Gestor de blogs &copy; 2021
	</footer><br>

	<script src=js/jquery.js></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>