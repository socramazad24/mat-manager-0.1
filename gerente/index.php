<?php
namespace index;
require_once "../templates/header2.php";
require_once "../con_db.php";
require_once "../Auth.php";
use Auth\AuthClass;
$auth = new AuthClass();
$auth->AuthF();
use LoginUser\Database;
use templates\header2;
$db = new Database();
$conex = $db->getConnection();

class Main {
    public function render() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="../styles/style.css">
        </head>
        <body>
            <header> 
                <?php $pageTitle = "Header"; include '../templates/header3.php';?>
            </header>

        </body>

        </html>
        </html>
        

        
        <?php
    }
}

// Instanciamos la clase y llamamos al método render para generar el HTML
$main = new Main();
$main->render();
?>