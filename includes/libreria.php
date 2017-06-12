<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<?php include('conexion.php'); ?>

<!--//******************************************************************************-->
<?php function verListadoProductos($modo,$conn){?>
<form id="form1" name="form1" method="post" action="">
  <table width="845" border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Buscar:</td>
      <td><input type="text" name="buscar" id="buscar" /></td>
      <td><input type="submit" name="aceptar" id="aceptar" value="Aceptar" /></form></td>
    </tr>
    <tr>
      <td colspan="8" align="center">Listado de productos</td>
    </tr>
    <tr align="center" bgcolor="#FF9900">
      <td>Id</td>
      <td>Imagen</td>
      <td>Nombre</td>
      <td>Descripción</td>
      <td>Precio</td>
      <td>Stock</td>
      <td>Fecha</td>
      <td>Agregar</td>
    </tr>
    
    <?php
		$consulta=mysqli_query($conn,"select * from productos");
		if (isset($_POST['buscar'])){
			$consulta=mysqli_query($conn,"select * from productos where nombre like '%".$_POST['buscar']."%'");
		}
		while($filas = mysqli_fetch_array($consulta)){
			$id=$filas['id'];
			if($modo<>'edicion'){
				$imagen=$filas['imagen'];
			}else{
				$imagen='../'.$filas['imagen'];
			}
			$nombre=$filas['nombre'];
			$desc=$filas['descripcion'];
			$precio=$filas['precio'];
			$stock=$filas['cuanto_hay'];
			$fecha=$filas['fecha'];
 			
		?>
    <?php if($modo<>'edicion'){?>
	<tr bgcolor="#FFFFCC">
      <td><?php echo $id ?></td>
      <td><img src="<?php echo $imagen ?>" width="180" height="100" /><br> </td>
      <td><?php echo $nombre ?></td>
      <td><?php echo $desc ?></td>
      <td><?php echo $precio ?></td>
      <td><?php echo $stock ?></td>
      <td><?php echo $fecha ?></td>
      <td>
      <form action="carrito/carrito.php" method="post" name="compra">
      <input name="id_txt" type="hidden" value="<?php echo $id ?>" />
      <input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
      <input name="precio" type="hidden" value="<?php echo $precio ?>" />
      <input name="cantidad" type="hidden" value="<?php echo $stock ?>" />
      <input name="Comprar" type="submit" value="Comprar" />
      </form></td>
      <?php }else {?>
	<tr bgcolor="#FFFFCC">
      <td><?php echo $id ?></td>
      <td><img src="<?php echo $imagen ?>" width="180" height="100" /><br> </td>
      <td><?php echo $nombre ?></td>
      <td><?php echo $desc ?></td>
      <td><?php echo $precio ?></td>
      <td><?php echo $stock ?></td>
      <td><?php echo $fecha ?></td>
      <td>
      <form action="editar.php" method="post" name="compra">
      <input name="id2" type="hidden" value="<?php echo $id ?>" />
      <input name="imagen2" type="hidden" value="<?php echo $imagen ?>" />
      <input name="nombre2" type="hidden" value="<?php echo $nombre ?>" />
	  <input name="desc2" type="hidden" value="<?php echo $desc ?>" />
      <input name="precio2" type="hidden" value="<?php echo $precio ?>" />
      <input name="cantidad2" type="hidden" value="<?php echo $stock ?>" />
      <input name="fecha2" type="hidden" value="<?php echo $fecha ?>"  />
      <input name="Editar" type="submit" value="Editar" />
      </form></td><td>
      <form id="borra" method="post" name="borrar" onclick="return confirm('¿Está seguro de eliminar <?php echo $nombre ?>?');" action="borrar.php"> 
      <input name="id3" type="hidden" value="<?php echo $id ?>" />
      <input name="nombre3" type="hidden" value="<?php echo $nombre ?>" />
      <input name="Comprar" type="submit" value="Borrar" />
      </form>
      
      </td>
	  <?php }?>
    </tr>
    <p>
    
      <?php }?>
      </table>  
 
 
<?php 
}
?>
  

<!--//******************************************************************************-->
<?php function encuentroRegistro($id,$conn){
	$sql="select * from productos where id= $id";
	$consulta=mysqli_query($conn, $sql) or die ('Consulta no válida: ' . mysqli_error($conn));
	$fila = mysqli_fetch_array($consulta);
	return $fila;
	
}
?>
<!--//******************************************************************************-->
<?php function grabarCambios($id,$nombre,$desc,$precio,$cantidad,$fecha,$imagen,$conn){
	if(isset($id)){
		$sql="UPDATE productos SET 
			nombre='$nombre',
			descripcion='$desc',
			precio='$precio',
			cuanto_hay='$cantidad',
			fecha='$fecha',
			imagen='$imagen'
			WHERE id=$id";
		mysqli_query($conn,$sql) or die ('Error updating record: '. mysqli_error($conn));
		}
	}
?>
<!--//******************************************************************************-->
<?php function borrar($id,$conn){
	$regAborrar=encuentroRegistro($id,$conn);
	$imagen=$regAborrar['imagen'];
	//$archivo=url_base($imagen);
	$archivo='C:/AppServ/www/webstore/'.$imagen;
	unlink($archivo);
	echo $archivo.' borrado';
	
	if(isset($id)){
		$sql="DELETE from productos 
			WHERE id=$id";
		mysqli_query($conn,$sql) or die ('Error deleting record: '. mysqli_error($conn));
		echo 'Registro borrado con éxito';
		}
	}
	
?>