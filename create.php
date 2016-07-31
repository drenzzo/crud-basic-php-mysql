<?php
date_default_timezone_set('America/Lima');
if(isset($_POST['sw']) == 1){
	$link = mysqli_connect('localhost', 'root', '', 'demo_crud');
	$query = "INSERT INTO users (id, name, email, phone, created) VALUES (0, '".$_POST['name']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['created']."' )";
	if(mysqli_query($link, $query)){
		echo "La informacion se guardo con exito";
		header('Location: index.php');
	}else{
		echo "Ocurrio un error al intentar guardar";
	}
	mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD basico con PHP y MySQL</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<h3>Nuevo usuario</h3>
		<form action="create.php" method="post">
			<label for="name">Nombre: </label><br />
			<input type="text" name="name" /><br /><br />
			<label for="email">Email: </label><br />
			<input type="text" name="email" /><br /><br />
			<label for="phone">Telefono: </label><br />
			<input type="text" name="phone" /><br /><br />
			<input class="btn-primary" type="submit" name="guardar" value="Guardar" /><br /><br />
			<a class="btn" href="index.php"><< Volver</a>
			<input type="hidden" name="created" value="<?php echo date("Y-m-d H:i:s", time()); ?>" />
			<input type="hidden" name="sw" value="1" />
		</form>
		
	</div>
</body>
</html>