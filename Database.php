<?php
namespace matmanager;
//session_start();
class Database {
    private $conex;
    
    public function __construct() {
        $password = getenv('MYSQL_SECURE_PASSWORD');
        $this->conex = mysqli_connect("127.0.0.1", "root", "$password", "mat-manager");

        if ($this->conex->connect_error) {
            die("Error de conexión: " . $this->conex->connect_error);
        }
    }

    public function getConnection() {
        return $this->conex;
    }
}
?>
