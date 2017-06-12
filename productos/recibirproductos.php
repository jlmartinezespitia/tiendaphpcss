<?php include('../includes/conexion.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$rutaEnServidor='imagenes';
$rutaTemporal=$_FILES['imagen']['tmp_name'];
$nombreImagen=$_FILES['imagen']['name'];
$rutaDestino=$rutaEnServidor."/".$nombreImagen;
move_uploaded_file($rutaTemporal,'../'.$rutaDestino);

$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$desc=$_POST['descripcion'];
$enStock=$_POST['enStock'];
$fecha=$_POST['fecha'];

$sql="INSERT INTO productos (imagen,nombre,precio,descripcion,cuanto_hay,fecha)
	VALUES ('$rutaDestino',
	'$nombre',
	'$precio',
	'$desc',
	'$enStock',
	'$fecha')";
$res=mysqli_query($conexion,$sql);
if ($res){
	echo 'Se insertó un registro';
}else{
	echo 'No se pudo insertar';
}
?>
<html>
	<head>	
       	<meta http-equiv="refresh", content="1; url=cargarproductos.php">
	</head>
</html>
