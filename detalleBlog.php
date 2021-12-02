<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<title>Detalle de blog</title>
</head>
<body>
	<?php
		//eliminarBlog.php?id=1

		$servidor = "localhost"; $usuario = "root"; $contrasena = ""; $bd = "blogs";
		$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);

		if($conexion->connect_error){ echo "Error al conectar a la Base de datos"; }

		$id = $_GET["id"];

		$sql = "SELECT * FROM posts WHERE id=$id";
		$datos = $conexion->query($sql);

		$blog = $datos->fetch_assoc();

		$sql2 = "SELECT * FROM comentarios WHERE idpost = $id";
		$datos2 = $conexion->query($sql2);

		$registro = "SELECT total FROM reacciones WHERE idpost = $id AND num_reaccion=1";
		$datos = $conexion->query($registro);
		$reaccion_megusta = $datos->fetch_assoc();

		$registro2 = "SELECT total FROM reacciones WHERE idpost = $id AND num_reaccion=2";
		$datos2 = $conexion->query($registro2);
		$reaccion_meencanta = $datos2->fetch_assoc();
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Blogs</a>
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
	          <a class="dropdown-item" href="nuevoBlog.php">Nuevo blog</a>
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
			<div class="col-sm-6 offset-md-3">
				<div class="card">
				  <img src="imagenes/<?php echo $blog['imagen']; ?>" class="card-img-top" alt="...">
				  <div class="card-body">
				  	<div class="row mb-3">
				  		<div class="col-1">
				  			<a href="megusta.php?reaccion=1&id=<?php echo $blog['id']; ?>">
				  				<img src="imagenes/like.png" width="35px">
				  			</a>
				  		</div>
				  		<div class="col-2 mt-2 text-left">
				  			<?php echo $reaccion_megusta["total"]; ?>
				  		</div>
				  		<div class="col-1">
				  			<a href="megusta.php?reaccion=2&id=<?php echo $blog['id']; ?>">
				  				<img src="imagenes/meencanta.png" width="43px">
				  			</a>
				  		</div>
				  		<div class="col-2 mt-2 text-left">
				  			<?php echo $reaccion_meencanta["total"]; ?>
				  		</div>
				  	</div>
				    <h5 class="card-title"><?php echo $blog["titulo"]; ?></h5>
				    <p class="card-text"><?php echo $blog["contenido"]; ?></p>
				    <h5>Lo que los usuarios han comentado</h5>
				    <table class="table table-hover">
				    	<tbody>
				    	<?php
							while($c = $datos2->fetch_assoc()){
								echo "<tr>";
									echo "<td>".$c["comentario"]."</td>";
								echo "</tr>";
							}
						?>
				    	</tbody>
				    </table>
				    <div class="form-group">
				    	<form action="guardarComentario.php?id=<?php echo $blog['id']; ?>" method="POST">
				    		<label>Comentario:</label>
				    		<textarea name="comentario" rows="3" placeholder="Escribe un comentario" class="form-control" required></textarea>
				    		<input type="submit" value="Comentar" class="btn btn-info">
				    	</form>
				    </div>
				    <a href="consultarBlogs.php" class="btn btn-primary">Regresar a blogs</a>
				  </div>
				</div>
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