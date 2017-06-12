<?php include ('includes/conexion.php'); 
$consulta=mysqli_query($conexion,"select * from productos where id=".$_POST['id']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<link href="css/estilo.css" rel="stylesheet" />
</head>
<body>
<?php 
$imgCabecera="iconos/ver_carrito.png";
include ('plantilla/head.php'); 
?>
<div class="contenedor">
	<?php 
	while($filas = mysqli_fetch_array($consulta)){
		$id=$filas['id'];
		$imagen=$filas['imagen'];
		$nombre=$filas['nombre'];
		$desc=$filas['descripcion'];
		$precio=$filas['precio'];
		$enStock=$filas['cuanto_hay'];
		$fecha=$filas['fecha'];
	?>
    <div class="cajaSola">
    	<h3><?php echo $nombre ?></h3>
        <img src="<?php echo $imagen ?>" width="200" />
        <p>$<?php echo $precio ?></p>
        <!--<a href="carrito/carrito.php"><img name="carrito" src="iconos/add.png" id="productos" alt="" /> </a>-->
        <form action="carrito/carrito.php" method="post" name="compra">
      		<input name="id_txt" type="hidden" value="<?php echo $id ?>" />
      		<input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
      		<input name="precio" type="hidden" value="<?php echo $precio ?>" />
     		<input name="cantidad" type="hidden" value="1" />
      		<input name="Comprar" type="submit" value="Comprar" />
      	</form>
     </div>
	<div class="cajaDes">
    	<p><h3>Descipción</h3></p>
        <p><?php echo $desc ?></p>
    </div>     
     
     <?php 
	}
	 ?>
</div>
</body>
</html>

