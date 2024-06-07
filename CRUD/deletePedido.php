<?php
include("../con_db.php");
if (isset($_GET['idPedido'])) {
	$idPedido = $_GET['idPedido'];

	$sql = "DELETE FROM `pedidos` WHERE idPedido='$idPedido'";
	$consulta=mysqli_query($conex,$sql);
	if($consulta){
    echo '<script language="javascript">';
	echo 'alert("Registro eliminado exitósamente");';
	echo 'window.location="../tables/TablaPedidos.php";';
	echo '</script>';
	
	} else {
	echo '<script language="javascript">';
	echo 'alert("Error eliminando registro!");';
	echo 'window.location="../tables/TablaPedidos.php";';
	echo '</script>';
	}
}