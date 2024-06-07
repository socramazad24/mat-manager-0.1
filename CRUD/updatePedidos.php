<?php
    include_once("../con_db.php");
    
    $idPedido = $_POST["idPedido"];
    $nameProveedor = $_POST['nameProveedor'];
    $materiales = $_POST['materiales'];
    $cantidad = $_POST['cantidad'];
    $costoUnitario =$_POST['costoUnitario'];                  
    $datereg = date("y/m/d");

    $sentencia = $conex->prepare("UPDATE pedidos SET nameProveedor=?,materiales=?,cantidad=?,costoUnitario=?,fecha_reg=? 
    WHERE idPedido=?");

    $sentencia->bind_param("ssiiss", $nameProveedor ,$materiales,$cantidad,$costoUnitario,$datereg,$idPedido );
    $sentencia->execute();
    header("location: ../tables/TablaPedidos.php");

?>