<?php session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="finalizarPedido.php" onsubmit="return valido()">
<h1>Confirmar Pedido
</h1>

<table width="465" border="0">
  <tr>
    <td colspan="5" align="center">LISTADO DE COMPRAS</td>
  </tr>
  <tr>
    <td width="150" bgcolor="#FF9900">PRODUCTO</td>
    <td width="66" bgcolor="#FF9900">PRECIO</td>
    <td width="81" bgcolor="#FF9900">CANTIDAD</td>
    <td colspan="2" bgcolor="#FF9900">SUBTOTAL</td>
  </tr>
<?php 
if(isset($_SESSION['carrito'])){
  	$mi_carrito=$_SESSION['carrito'];
}
	if(isset($mi_carrito)){
			$total=0;
			for($i=0;$i<count($mi_carrito);$i++){
				if($mi_carrito[$i]<>null) {				
?>
  <tr>
    <td width="150" bgcolor="#FFFFCC"><?php echo $mi_carrito[$i]['nombre'] ?></td>
    <td bgcolor="#FFFFCC"><?php echo $mi_carrito[$i]['precio'] ?></td>
    <td bgcolor="#FFFFCC"><?php echo $mi_carrito[$i]['cantidad'] ?></td>
    <?php 
		$subtotal= $mi_carrito[$i]['precio']*$mi_carrito[$i]['cantidad'];
		$total=$total+$subtotal;
		?>
    <td width="54" bgcolor="#FFFFCC"><?php echo $subtotal ?></td>
    <td width="84" bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
<?php 
				}
			}
		}

?>

  <tr>
    <td width="150" bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">TOTAL</td>
    <td colspan="2" bgcolor="#FFFFCC"><?php echo $total ?></td>
  </tr>
  <tr>
    <td width="150" bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">
      </td>
    <td colspan="2" bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#FFFFCC">Datos del comprador</td>
    </tr>
  <tr>
    <td width="150" bgcolor="#FFFFCC">&nbsp;</td>
    <td colspan="4" bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
  <tr>
    <td width="150" bgcolor="#FFFFCC">Nombre: *</td>
    <td colspan="4" bgcolor="#FFFFCC"><label for="nombre"></label>
      <input name="nombre" type="text" id="nombre" size="40" /></td>
    </tr>
  <tr>
    <td width="150" bgcolor="#FFFFCC">Dirección:</td>
    <td colspan="4" bgcolor="#FFFFCC"><input name="direccion" type="text" id="direccion" size="40" /></td>
    </tr>
  <tr>
    <td width="150" bgcolor="#FFFFCC">Teléfono: *</td>
    <td colspan="4" bgcolor="#FFFFCC"><input name="tel" type="text" id="tel" size="40" /></td>
    </tr>
  <tr>
    <td width="150" bgcolor="#FFFFCC">Horario de contacto:*</td>
    <td colspan="4" bgcolor="#FFFFCC"><label for="textfield"></label>
      <input name="horario" type="text" id="horario" size="40" /></td>
  </tr>
  <tr>
    <td width="150" bgcolor="#FFFFCC">E-mail: *</td>
    <td colspan="4" bgcolor="#FFFFCC"><input name="correo" type="text" id="correo" size="40" /></td>
    </tr>
  <tr>
    <td width="150" bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC"><input type="submit" name="comprar" id="comprar" value="Comprar" /></td>
    <td bgcolor="#FFFFCC"></td>
    <td colspan="2" bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
</table>
</form>
<script type="text/javascript">
function valido(){
	if (document.form1.nombre.value=="" || document.form1.tel.value=="" || document.form1.correo.value=="") {
		alert ("Por favor ingrese los campos obligatorios (*)");
		document.form1.nombre.focus();
		return false;
	}else{
		if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(document.form1.correo.value)){
			alert("Se envió con éxito a  "+ document.form1.correo.value);
			return true;
		}else{
			alert("La dirección de e-mail es incorrecta");
			document.form1.correo.focus();
			return false; 
		}
	}
}
</script>
</body>
</html>