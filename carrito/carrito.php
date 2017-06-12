<?php session_start()?>
<?php include('../includes/conexion.php'); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Carrito</title>
    <link href="../css/estilo.css" rel="stylesheet" />
</head>


<?php 
	$imgCabecera=url_base('iconos/current_car.png');
	include ('../plantilla/head.php'); 
?>

<?php
if(isset($_SESSION['carrito'])){
  	$mi_carrito=$_SESSION['carrito'];
}
if(isset($_POST['id_txt'])){
	$id=$_POST['id_txt'];
  	$nombre=$_POST['nombre'];
  	$precio=$_POST['precio'];
  	$cantidad=$_POST['cantidad'];
	$pos=-1;
	for($i=0;$i<count($mi_carrito);$i++){
		if($id==$mi_carrito[$i]['id']){
			$pos=$i;
		}
	}
	if($pos<>-1){
		$cuanto=$mi_carrito[$pos]['cantidad']+$cantidad;
		$mi_carrito[$pos]=array('id'=>$id,'nombre'=>$nombre,'precio'=>$precio,'cantidad'=>$cuanto);
	}else{
  	$mi_carrito[]=array('id'=>$id,'nombre'=>$nombre,'precio'=>$precio,'cantidad'=>$cantidad);
	}
}

if(isset($_POST['id2'])){
	$indice=$_POST['id2'];
	$cuanto=$_POST['cantidad2'];
	$mi_carrito[$indice]['cantidad']=$cuanto;
}
if(isset($_POST['id3'])){
	$indice=$_POST['id3'];
	$mi_carrito[$indice]=null;
}	
$_SESSION['carrito']=$mi_carrito;

?>
<body>
<div class="vistaCarrito">
<table width="350" border="0">
  <tr>
    <td colspan="5" align="center"><h4>Sus compras hasta el momento</h4></td>
    </tr>
  <tr>
    <td bgcolor="#CCCCCC">Producto</td>
    <td bgcolor="#CCCCCC">Precio</td>
    <td bgcolor="#CCCCCC">Cantidad</td>
    <td colspan="2" bgcolor="#CCCCCC">Subtotal</td>
  </tr>
<?php 
	if(isset($mi_carrito)){
			$total=0;
			for($i=0;$i<count($mi_carrito);$i++){
				if($mi_carrito[$i]<>null) {				
?>
  <tr>
    <td><?php echo $mi_carrito[$i]['nombre'] ?></td>
    <td><?php echo $mi_carrito[$i]['precio'] ?></td>
    <td>
    <form action="" method="post" name="actualizo">
    <input name="id2" type="hidden" value="<?php echo $i ?>" />
    <input name="cantidad2" type="text" value="<?php echo $mi_carrito[$i]['cantidad'] ?>" size="2" maxlength="2" />
    <input name="" type="image" src="../iconos/actualizar.jpg" />
    </form></td>
    <?php 
		$subtotal= $mi_carrito[$i]['precio']*$mi_carrito[$i]['cantidad'];
		$total=$total+$subtotal;
		?>
    <td><?php echo $subtotal ?></td>
    <td><form action="" method="post">
    	<input name="id3" type="hidden" value="<?php echo $i ?>" />
        <input name="" type="image" src="../iconos/delete.png" />
    </form></td>
  </tr>
<?php 
				}
			}
		}

?>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#CCCCCC">TOTAL</td>
    <td colspan="2" bgcolor="#CCCCCC"><?php echo $total ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><form id="form1" name="form1" method="post" action="confirmarpedido.php">
      <input type="submit" name="confirmar" id="confirmar" value="Confirmar" />
    </form></td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</div>
<p><a href="../principal.php">Volver</a></p>

</body>
</html>