<?php 
namespace materiales;
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Database.php';
//require_once "../Auth.php";
use matmanager\Database;

    class materiales 
    {
       public function registerMateriales() {
            $db = new Database();
                $conex = $db->getConnection();
                if (isset($_POST['register'])) {
                $IdMaterial = trim($_POST['idMaterial']);   
                $MaterialName = trim($_POST['MaterialName']);
                $Description = trim($_POST['Description']);
                $costoUnitario = trim($_POST['costoUnitario']);
                $cantidadMaterial = trim($_POST['cantidadMaterial']);
                $proovedor = trim($_POST['idProveedor']);      
                $idPedido = trim($_POST['idPedido']);              
                $datereg = date("y/m/d");
                $errors = array(); // Array para almacenar mensajes de error
    
                // Validación de campos obligatorios
                if (
                    strlen($IdMaterial) < 1 ||
                    strlen($MaterialName) < 1 ||
                    strlen($Description) < 1 ||
                    strlen($costoUnitario) < 1 ||
                    strlen($cantidadMaterial) < 1 ||
                    strlen($proovedor) < 1 ||
                    strlen($idPedido) < 1
                ) {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Por favor, complete todos los campos.',
                    })</script>";
                    return;
                    
                }
    
                // Validación del campo proovedor
                if (empty($proovedor)) {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Por favor, seleccione un proveedor.',
                    })</script>";
                    return;
                }
    
                // Validación de existencia de material
                $consultaMaterial = "SELECT * FROM materiales WHERE idMaterial = ?";
                $stmt = $conex->prepare($consultaMaterial);
                $stmt->bind_param("s", $IdMaterial);
                $stmt->execute();
                $resultadoMaterial = $stmt->get_result();
                if ($resultadoMaterial->num_rows > 0) {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'El ID del material ya está registrado. Por favor, introduzca otro ID.',
                    })</script>";
                    return;
                    
                }
    
                // Si hay errores, muestra una alerta con SweetAlert2
                if (!empty($errors)) {
                    echo "<script>";
                    echo "Swal.fire({";
                    echo "  icon: 'error',";
                    echo "  title: 'Error',";
                    echo "  html: '" . implode("<br>", $errors) . "'";
                    echo "});";
                } else {
                    // Si no hay errores, procede con el registro
                    $consulta = "INSERT INTO materiales(idMaterial, MaterialName, Description, costoUnitario, cantidadMaterial, idProveedor, idPedido, date_reg) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conex->prepare($consulta);
                    $stmt->bind_param("sssdissi", $IdMaterial, $MaterialName, $Description, $costoUnitario, $cantidadMaterial, $proovedor, $idPedido, $datereg);
                    if ($stmt->execute()) {                    
                        echo "<script>Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'Material registrado exitosamente.',
                        })</script>";
                        return;
                    } else {
                        echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Algo ha salido mal. " . htmlspecialchars($conex->error) . "',
                        })</script>";
                        return;
                    }
                }
            }
            $conex->close();
        }
    }
?>