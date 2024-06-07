<?php
include("../con_db.php");

if (isset($_GET['idProveedor'])) {
	$idProveedor = $_GET['idProveedor'];

	$sql = "DELETE FROM `proovedores` WHERE idProveedor='$idProveedor'";
	$consulta=mysqli_query($conex,$sql);
	if($consulta){
    echo '<script language="javascript">';
	echo 'alert("Registro eliminado exitósamente");';
	echo 'window.location="../tables/TablaProveedores.php";';
	echo '</script>';
	
	} else {
	echo '<script language="javascript">';
	echo 'alert("Error eliminando registro!");';
	echo 'window.location="../tables/TablaProveedores.php";';
	echo '</script>';
	}
}