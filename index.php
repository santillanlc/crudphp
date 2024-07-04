<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<title>Gestor de Blogsddd</title>
</head>
<body>
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
			<div class="col">
				<div class="jumbotron">
				  <h1 class="display-4">Bienvenido!</h1>
				  <p class="lead">Esta es una página para la gestión de blogs</p>
				  <hr class="my-4">
				  <p>Puedes consultar diferentes tipos de blogs, así como también crear tu propio blog, además de poder dar tu opinión en un comentario.</p>
				  <a class="btn btn-primary btn-lg" href="consultarBlogs.php" role="button">Explorar blogs...</a>
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