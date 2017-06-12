<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Documento sin título</title>
	<link href="css/estilo.css" rel="stylesheet" />
</head>

<?php include ('includes/conexion.php'); 
	$consulta=mysqli_query($conexion,"select * from productos");
	$numReg=mysqli_num_rows($consulta); //Número total de registros
	$regPagina= 5; //Número de registros a mostrar en cada página
	$cantidadPaginas=ceil($numReg/$regPagina); //redondea siempre hacia arriba
	$nroPagina=$_GET['num'];
	if (is_numeric($nroPagina)){
		$regInicio=($nroPagina-1)*$regPagina; //registro de inicio
	}else{
		$regInicio=0; //no se pasó 'num' o es nulo
	}
	$consulta=mysqli_query($conexion,"select * from productos limit $regInicio, $regPagina");
?>

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
    <div class="caja">
    	<h3><?php echo $nombre ?></h3>
        <img src="<?php echo $imagen ?>" width="120" height="90" />
        <p>$<?php echo $precio ?></p>
        <form action="detalle.php" method="post" name="detalle">
        	<input name="id" type="hidden" value="<?php echo $id ?>" />
            <input name="" type="image" src="iconos/detalle.png" />
        </form>
        
     </div>
     <?php 
	}
	 ?>
</div>
<div id="paginador" align="center">
<?php
	if ($nroPagina>1)
		echo "<a href='galeria.php?num=".($nroPagina-1)."'>Anterior</a> ";
	if (is_numeric($nroPagina)){ //también puede ser isset($_GET['num'])
    	for($i=1;$i<=$cantidadPaginas;$i++){
    		if ($i==$nroPagina){ ?>
        		<u> <?php echo $i." "; ?> </u>
          	<?php }else{
          		echo "<a href='galeria.php?num=$i'>$i</a> ";
			}
     	}
	}else{ //que no haya vínculo del 1 la primera vez que se entra
		echo "1 ";
		for($i=2;$i<=$cantidadPaginas;$i++){
    		if ($i==$nroPagina){
        		echo $i." ";
          	}else{
          		echo "<a href='galeria.php?num=$i'>$i</a> ";
			}
     	}
	}
	if (is_numeric($nroPagina)){
		if ($nroPagina<$cantidadPaginas)
			echo "<a href='galeria.php?num=".($nroPagina+1)."'>Siguiente</a> ";
	}else{
			echo "<a href='galeria.php?num=2'>Siguiente</a> ";
	}
	?>
</div>
</body>
</html>

