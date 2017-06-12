<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php include('../includes/libreria.php'); ?>
<?php
	$id=$_POST['id'];
  	$nombre=$_POST['nombre'];
	$desc=$_POST['desc'];
  	$precio=$_POST['precio'];
  	$cantidad=$_POST['stock'];
	$fecha=$_POST['fecha'];
		
	if($_FILES['imagen2']['name']<>""){
		$rutaEnServidor='imagenes';
		$nombreImagen=$_FILES['imagen2']['name'];
		$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
		$rutaTemporal=$_FILES['imagen2']['tmp_name'];
		move_uploaded_file(utf8_decode($rutaTemporal),'../'.utf8_decode($rutaDestino));
		$a=grabarCambios($id,$nombre,$desc,$precio,$cantidad,$fecha,$rutaDestino,$conexion);
	}else{
		$recuperoRegistro=encuentroRegistro($id,$conexion);
		$rutaOriginal=$recuperoRegistro['imagen'];
		$a=grabarCambios($id,$nombre,$desc,$precio,$cantidad,$fecha,$rutaOriginal,$conexion);
	}
?>
<html>
		<head>	
			<meta http-equiv="refresh", content="1; url=buscar.php">
		</head>
	</html>