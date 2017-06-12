<?php session_start()?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php 
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$tel=$_POST['tel'];
$horario=$_POST['horario'];
$correo=$_POST['correo'];
$mi_carrito=$_SESSION['carrito'];


$saludo='
<h3> Gracias por su compra. <br></h3><h4>'.$nombre.'</h4>
Su transacción ha finalizado y le hemos enviado un correo electrónico.<br>
Un operario de nuestra empresa se contactará con usted.</br>
Saludos cordiales.';

$pedido='
<h3> Gracias por su compra. <br></h3><h4>'.$nombre.'</h4>
Su transacción ha finalizado.<br>
Un operario de nuestra empresa se contactará con usted.</br>
Saludos cordiales.
<br><br>
Datos del cliente:<br>
Tel: '.$tel.'<br>
Horario de contacto: '.$horario.'<br>
Dirección: '.$direccion.'<br>
E-mail: '.$correo.'<br><br>
';

if (isset($mi_carrito)){
	$total=0;
	$pedido.='
		<table width="200" border="0">
  	<tr>
    	<td colspan="5" align="center">LISTADO DE COMPRAS</td>
  	</tr>
  	<tr>
    	<td bgcolor="#FF9900">PRODUCTO</td>
    	<td bgcolor="#FF9900">PRECIO</td>
    	<td bgcolor="#FF9900">CANTIDAD</td>
    	<td colspan="2" bgcolor="#FF9900">SUBTOTAL</td>
  	</tr>
  	';
	for($i=0;$i<count($mi_carrito);$i++){
		if($mi_carrito[$i]<>null) {	
			$subtotal= $mi_carrito[$i]['precio']*$mi_carrito[$i]['cantidad'];
			$total=$total+$subtotal;
			$pedido.='					
  			<tr>
    			<td bgcolor="#FFFFCC">'.$mi_carrito[$i]['nombre'].'</td>
    			<td bgcolor="#FFFFCC">'.$mi_carrito[$i]['precio'].'</td>
    			<td bgcolor="#FFFFCC">'.$mi_carrito[$i]['cantidad'].'</td>
    	 		<td bgcolor="#FFFFCC">'.$subtotal.'</td>
    		<td bgcolor="#FFFFCC">&nbsp;</td>
  			</tr>';
		}
	}
$pedido.='<tr><td> Total: '.$total.'</td></tr>';
echo $saludo;
echo '<br><br> '.$pedido;

//************************************************* Enviando mail
// Varios destinatarios
$para  = $correo . ', '; // atención a la coma
$para .= 'jaimelme@yahoo.com';

// título
$título = 'Su compra realizada fue';

// mensaje
$mensaje = $pedido;

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

// Cabeceras adicionales
//$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: jaimelme <jaimelme@yahoo.com>' . "\r\n";
//$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Enviarlo
mail($para, $título, $mensaje, $cabeceras);

//*************************************************


}

?>