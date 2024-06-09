<?php
namespace login;

//require_once "vendor/autoload.php";
require_once "con_db.php";
use LoginUser\Database;
class Login {
    private $conex;

    public function __construct() {
        // Conecta a la base de datos
        $db = new Database();
        $this->conex = $db->getConnection();
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Consulta la base de datos para verificar las credenciales
            $query = "SELECT * FROM users WHERE username = ? AND password = ?";
            $stmt = $this->conex->prepare($query);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            $registro = mysqli_fetch_assoc($result);
            $rol = $registro['role'];

            if ($result->num_rows == 1) {
                $_SESSION['username'] = $username;
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
                header('Location: index.php');
            }
        }
        $this->conex->close();
    }
}

$main = new Login();
$main->login();
?>
