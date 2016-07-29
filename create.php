<?php
date_default_timezone_set('America/Lima');
if(isset($_POST['sw']) == 1){
	$link = mysqli_connect('localhost', 'root', '', 'demo_crud');
	$query = "INSERT INTO users (id, name, email, phone, created, modified) VALUES ('', '".$_POST['name']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['created']."', '' )";
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
	<title>Nuevo usuario</title>
</head>
<body>
	<form action="create.php" method="post">
		<label for="name">Nombre: </label><input type="text" name="name" /><br /><br />
		<label for="email">Email: </label><input type="text" name="email" /><br /><br />
		<label for="phone">Telefono: </label><input type="text" name="phone" /><br /><br />
		<input type="submit" name="guardar" value="Guardar" /><br />
		<a href="index.php"><< Volver</a>
		<input type="hidden" name="created" value="<?php echo date("Y-m-d H:i:s", time()); ?>" />
		<input type="hidden" name="sw" value="1" />
	</form>
</body>
</html>