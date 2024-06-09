<?php
namespace Auth;
class AuthClass {
    public function AuthF() {
        ?>
        <?php
        // dashboard.php
        session_start();

        if (!isset($_SESSION['username'])) {
            header("Location: ../index.php"); // Redirige al login si no está autenticado
            exit();
        }
        ?>        
        <?php
    }
}

// Instanciamos la clase y llamamos al método render para generar el HTML
$main = new AuthClass();
$main->AuthF();
?>