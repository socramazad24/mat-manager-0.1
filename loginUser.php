<?php
// Conecta a la base de datos
include("con_db.php");

if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta la base de datos para verificar las credenciales
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conex->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $registro =mysqli_fetch_assoc($result);
    $rol = $registro['role'];
    

    if ($result->num_rows == 1) {
        
        if ($rol == 'administrador') {
            header('Location: admin/index.php');
            exit();
        } elseif ($rol == 'gerente') {
            header('Location: gerente/index.php');
            exit();
        } elseif ($rol == 'bodeguero') {
            header('Location: bodeguero/index.php');
            exit();
        } 
    } else {
        // Las credenciales son inválidas
        echo '<script>alert("Credenciales incorrectas");</script>';
        //echo '<script>alert("Credenciales incorrectas. Inténtalo de nuevo.");</script>';
        header(header: 'location: index.php');
        //echo "Credenciales incorrectas. Inténtalo de nuevo.";

    }
}
$conex->close();
?>