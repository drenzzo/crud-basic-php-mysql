<?php 
	$link = mysqli_connect('localhost', 'root', '', 'demo_crud');
	$query = "SELECT * FROM users";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="create.php">Nuevo usuario</a>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Telefono</th>
				<th>Fecha</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
		<?php if($result = mysqli_query($link, $query)): ?>
			<?php while($user = mysqli_fetch_assoc($result)): ?>
				<tr>
					<td><?php echo $user['id']; ?></td>
					<td><a href="read.php?id=<?php echo $user['id'] ?>"><?php echo $user['name']; ?></a></td>
					<td><?php echo $user['email']; ?></td>
					<td><?php echo $user['phone']; ?></td>
					<td><?php echo $user['created']; ?></td>
					<td><?php echo $user['modified']; ?></td>
					<td><a href="update.php?id=<?php echo $user['id'] ?>">Editar</a> - <a href="delete.php?id=<?php echo $user['id'] ?>">Eliminar</a></td>
				</tr>
			<?php endwhile; ?>
			<?php mysqli_free_result($result); ?>
		<?php endif; ?>
		</tbody>		
	</table>
</body>
</html>
<?php mysqli_close($link); ?>