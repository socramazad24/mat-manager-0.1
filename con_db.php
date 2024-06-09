<?php
namespace LoginUser;

class Database {
    private $conex;

    public function __construct() {
        $this->conex = mysqli_connect("localhost", "root", "", "mat-manager");

        if ($this->conex->connect_error) {
            die("Error de conexión: " . $this->conex->connect_error);
        }
    }

    public function getConnection() {
        return $this->conex;
    }
}
?>
