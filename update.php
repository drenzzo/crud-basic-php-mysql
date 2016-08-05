<?php
//zona horaria por defecto
date_default_timezone_set('America/Lima');

//conexion a bbdd
$link = mysqli_connect('localhost', 'root', '', 'demo_crud');

//si existe "id" en la url 
if(isset($_GET['id'])){
	$id = $_GET['id'];//le asigno una variable 
	$query1 = "SELECT * FROM users WHERE id =".$id; //cadena de consulta para el elemento $id
	if($result = mysqli_query($link, $query1)){ //si obtengo resultados ejecutando la consulta anterior
		while($user = mysqli_fetch_assoc($result)){ //asigno ese resultado a un array asociativo $user
			$name = $user['name']; //creo variables con los nombres de los campos de la tabla "users" 
			$email = $user['email'];
			$phone = $user['phone'];
		}
	}

}

if(isset($_POST['sw']) == 1){ //si se ha presionado el boton "Actualizar" 

	//cadena con la orden de actualizacion a la tabla "users" con los valores de los inputs enviados por POST
	$query2 = "UPDATE users SET name='".$_POST['name']."', email='".$_POST['email']."', phone='".$_POST['phone']."', modified='".$_POST['modified']."' WHERE id=".$_POST['id'];
	if(mysqli_query($link, $query2)){ //si la consulta se ejecuta con exito
		echo "La informacion se actualizo con exito"; //mensaje de exito
		header('Location: index.php'); //redireccion a index.php
	}else{ //si ocurrio un error
		echo "Ocurrio un error al intentar actualizar"; //mensaje de error
	}
}

//cierro conexion a bbdd
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD basico con PHP y MySQL</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<h3>Editar usuario</h3>
		<form action="update.php" method="post">
			<label for="name">Nombre: </label><br />
			<input type="text" name="name" value="<?php if(isset($name)) echo $name; ?>" /><br /><br />

			<label for="email">Email: </label><br />
			<input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>" /><br /><br />

			<label for="phone">Telefono: </label><br />
			<input type="text" name="phone" value="<?php if(isset($phone)) echo $phone; ?>" /><br /><br />

			<input class="btn-success" type="submit" name="actualizar" value="Actualizar" /><br /><br />
			<a class="btn" href="index.php"><< Volver</a>
			<input type="hidden" name="modified" value="<?php echo date("Y-m-d H:i:s", time()); ?>" />
			<input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>" />
			<input type="hidden" name="sw" value="1" />
		</form>
	</div>
</body>
</html>