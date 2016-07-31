<?php 
	$link = mysqli_connect('localhost', 'root', '', 'demo_crud');
	$query = "SELECT * FROM users";
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD basico con PHP y MySQL</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<h3>Lista de usuarios</h3>
		<a href="create.php" class='btn btn-primary'>Nuevo usuario</a>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Teléfono</th>
					<th>Creación</th>
					<th>Modificación</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php if($result = mysqli_query($link, $query)): ?>
				<?php while($user = mysqli_fetch_assoc($result)): ?>
					<tr>
						<td width="5%" class="text-center"><?php echo $user['id']; ?></td>
						<td width="20%"><a href="read.php?id=<?php echo $user['id'] ?>"><?php echo $user['name']; ?></a></td>
						<td width="15%"><?php echo $user['email']; ?></td>
						<td width="15%" class="text-center"><?php echo $user['phone']; ?></td>
						<td width="15%"><?php echo $user['created']; ?></td>
						<td width="15%"><?php echo $user['modified']; ?></td>
						<td width="15%" class="text-center">
							<a href="update.php?id=<?php echo $user['id'] ?>" class='btn btn-success'>Editar</a> <a href="delete.php?id=<?php echo $user['id'] ?>" class='btn btn-danger'>Eliminar</a>
						</td>
					</tr>
				<?php endwhile; ?>
				<?php mysqli_free_result($result); ?>
			<?php endif; ?>
			</tbody>		
		</table>
	</div>
</body>
</html>
<?php mysqli_close($link); ?>