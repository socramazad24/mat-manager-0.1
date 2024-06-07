<?php
include("../con_db.php");

if (isset($_GET['idMaterial'])) {
	$idMaterial = $_GET['idMaterial'];

	$sql = "DELETE FROM `materiales` WHERE idMaterial='$idMaterial'";
	$consulta=mysqli_query($conex,$sql);
	if($consulta){
    echo '<script language="javascript">';
	echo 'alert("Registro eliminado exitósamente");';
	echo 'window.location="../tables/MaterialsTable.php";';
	echo '</script>';
	
	} else {
	echo '<script language="javascript">';
	echo 'alert("Error eliminando registro!");';
	//echo 'window.location="../tables/MaterialsTable.php";';
	echo '</script>';
	}
}



?>