<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<title>Gestor de Blogs</title>
</head>
<body>
	<?php
		$servidor = "localhost"; $usuario = "root"; $contrasena = ""; $bd = "blogs";
		$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);

		if($conexion->connect_error){ echo "Error al conectar a la Base de datos"; }

		$sql = "SELECT * FROM posts";
		$datos = $conexion->query($sql);
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Blogs</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Principal <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Nuevo blog</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
	          Opciones
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Nuevo blog</a>
	          <a class="dropdown-item" href="#">Consultar blogs</a>
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
				<?php
					if ($datos->num_rows > 0) {
				?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Titulo</th>
							<th>Fecha</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($blog = $datos->fetch_assoc()){
								echo "<tr>";
									echo "<td>".$blog["id"]."</td>";
									echo "<td>".$blog["titulo"]."</td>";
									echo "<td>".$blog["fecha"]."</td>";
									echo "<td><a class='btn btn-success'>Editar</a> <a class='btn btn-danger'>Eliminar</a></td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
				<?php } else { echo "<h1>No existen blogs</h1>"; $conexion->close(); } ?>
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