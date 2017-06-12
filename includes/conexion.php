<?php
$host='localhost';
$user ='root';
$pass = '';
$baseDatos='tienda';

$conexion = mysqli_connect($host,$user,$pass,$baseDatos)
	or die ('No se puede establecer la conexión'.mysqli_error());
	
define('URL_BASE','http://localhost/webstore/');
function url_base($cad){
	return URL_BASE.$cad;
}
?>