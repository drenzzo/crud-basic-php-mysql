<!DOCTYPE html>
<html>
<head>
	<title>CRUD basico con PHP y MySQL</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<h3>Eliminar usuario</h3>
		<p>Esta seguro que quiere eliminar este registro permanentemente de la base de datos?</p>
		<form action="delete.php" method="post">
			<input class="btn-danger" type="submit" name="eliminar" value="Eliminar" />
			<input type="hidden" name="sw" value="1" />
			<?php if(isset($_GET['id'])): ?>
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			<?php endif; ?>
		</form><br />
		<a class="btn" href="index.php"><< Volver</a>
	</div>
</body>
</html>
<?php 

//conexion a bbdd
$link = mysqli_connect('localhost', 'root', '', 'demo_crud');

//si el formulario fue enviado
if(isset($_POST['sw']) == 1){

	//cadena con la consulta de eliminacion segun el id de usuario
	$query = "DELETE FROM users WHERE id =".$_POST['id']; //No olvidar el WHERE en el DELETE!!

	if(mysqli_query($link, $query)){ //si la consulta devuelve un resultado
		header("Location: index.php"); //redirecciono a index.php
	}else{ //si hubo un error
		echo "Ocurrio un error al intentar eliminar el registro"; //mensaje de error
	}
}

//cierro conexion a bbdd
mysqli_close($link);
?>