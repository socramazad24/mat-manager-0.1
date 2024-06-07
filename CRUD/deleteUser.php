<?php
include("../con_db.php");

if (isset($_GET['idEmployee'])) {
	$idEmployee = $_GET['idEmployee'];

	$sql = "DELETE FROM `users` WHERE idEmployee='$idEmployee'";
	$consulta=mysqli_query($conex,$sql);
	if($consulta){
        echo '<script language="javascript">';
        echo 'alert("Registro eliminado exitósamente");';
        echo 'window.location="../tables/recuperarUsuarios.php";';
        echo '</script>';
	
	} else {
        echo '<script language="javascript">';
        echo 'alert("Error eliminando registro!");';
        echo 'window.location="../tables/recuperarUsuarios.php";';
        echo '</script>';
	}
}