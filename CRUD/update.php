<?php
    include_once("../con_db.php");

    
    $idMaterial = $_POST["idMaterial"];
    $MaterialName = $_POST['MaterialName'];
    $Description = $_POST['Description'];
    $costoUnitario = $_POST['costoUnitario'];
    $cantidadMaterial =$_POST['cantidadMaterial'];
    $proovedor = $_POST['proovedor'];                    
    $datereg = date("y/m/d");

    $sentencia = $conex->prepare("UPDATE materiales SET MaterialName=?,Description=?,costoUnitario=?,cantidadMaterial=?,proovedor=?,date_reg=?
    WHERE idMaterial=?");

    $sentencia->bind_param("ssiisss", $MaterialName ,$Description,$costoUnitario,$cantidadMaterial,$proovedor,$datereg,$idMaterial );
    $sentencia->execute();
    header("location: ../tables/MaterialsTable.php");

?>