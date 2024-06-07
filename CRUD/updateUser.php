<?php
    include_once ("../con_db.php");

    $idEmployee = $_POST['idEmployee'];
    $firstName = $_POST["firstName"];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password =$_POST['password'];  
    $email =$_POST['email'];
    $phone =$_POST['phone'];     
    $role =$_POST['role'];                           
    $datereg = date("y/m/d");

    $sentencia = $conex->prepare("UPDATE users SET firstName=?,lastName=?,username=?,password=?,email=?,phone=?,role=?,date_reg=? 
    WHERE idEmployee=?");

    $sentencia->bind_param("sssssisss", $firstName ,$lastName,$username,$password,$email,$phone,$role,$datereg,$idEmployee );
    $sentencia->execute();
    header("location: ../tables/recuperarUsuarios.php");

?>