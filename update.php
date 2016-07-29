<?php
date_default_timezone_set('America/Lima');

$id = $_GET['id'];
$link = mysqli_connect('localhost', 'root', '', 'demo_crud');

$query1 = "SELECT * FROM users WHERE id =".$id;

if($result = mysqli_query($link, $query1)){
	while($user = mysqli_fetch_assoc($result)){
		$name = $user['name'];
		$email = $user['email'];
		$phone = $user['phone'];
	}
}

if(isset($_POST['sw']) == 1){
	$query2 = "UPDATE users SET name='".$_POST['name']."', email='".$_POST['email']."', phone='".$_POST['phone']."', modified='".$_POST['modified']."' WHERE id=".$_POST['id'];
	echo $query2;
	if(mysqli_query($link, $query2)){
		echo "La informacion se actualizo con exito";
		header('Location: index.php');
	}else{
		echo "Ocurrio un error al intentar actualizar";
	}
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nuevo usuario</title>
</head>
<body>
	<form action="update.php" method="post">
		<label for="name">Nombre: </label><input type="text" name="name" value="<?php echo $name; ?>" /><br /><br />
		<label for="email">Email: </label><input type="text" name="email" value="<?php echo $email; ?>" /><br /><br />
		<label for="phone">Telefono: </label><input type="text" name="phone" value="<?php echo $phone; ?>" /><br /><br />
		<input type="submit" name="actualizar" value="Actualizar" /><br />
		<a href="index.php"><< Volver</a>
		<input type="hidden" name="modified" value="<?php echo date("Y-m-d H:i:s", time()); ?>" />
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="sw" value="1" />
	</form>
</body>
</html>