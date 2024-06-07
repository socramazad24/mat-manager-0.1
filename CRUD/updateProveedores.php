<?php
    include_once("../con_db.php");

    
    $idProveedor = trim($_POST['idProveedor']);
    $nombre = trim($_POST['nombre']);
    $materiales = trim($_POST['materiales']);
    $telefono = trim($_POST['telefono']);
    $correo = trim($_POST['correo']); 
    $direccion = trim($_POST['direccion']);
    $datereg = date("y/m/d");                     
    //UPDATE proovedores SET idProveedor='[value-1]',nameProveedor='[value-2]',`='[value-3]',='[value-4]',='[value-5]',`='[value-6]',date_reg='[value-7]' WHERE 1
    $sentencia = $conex->prepare("UPDATE proovedores SET idProveedor=?,nameProveedor=?,materiales=?,telefono=?,correo=?,direccion=?,date_reg=?
    WHERE idProveedor=?");

    $sentencia->bind_param("sssissss", $idProveedor ,$nombre,$materiales,$telefono,$correo,$direccion,$datereg,$idProveedor );
    $sentencia->execute();
    header("location: ../tables/TablaProveedores.php");

?>