<p>Esta seguro que quiere eliminar este registro permanentemente de la base de datos?</p>
<form action="delete.php" method="post">
	<input type="submit" name="eliminar" value="Eliminar" />
	<input type="hidden" name="sw" value="1" />
	<?php if(isset($_GET['id'])){ ?>
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
	<?php } ?>
</form>
<a href="index.php"><< Volver</a>
<?php 

$link = mysqli_connect('localhost', 'root', '', 'demo_crud');

if(isset($_POST['sw']) == 1){
	$query = "DELETE FROM users WHERE id =".$_POST['id']; //No olvidar el WHERE en el DELETE!!
	echo $query;
	if(mysqli_query($link, $query)){
		header("Location: index.php");
	}else{
		echo "Ocurrio un error al intentar eliminar el registro";
	}
}
mysqli_close($link);
?>