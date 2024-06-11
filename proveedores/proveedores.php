<?php
namespace proveedores;
require_once __DIR__ . '/../Database.php';
use matmanager\Database;
class Proveedores
{
   public function RegisterProvider()
    {

        $db = new Database();
        $conex = $db->getConnection();
        if (isset($_POST['register'])) {
            $idProveedor = trim($_POST['idProveedor']);
            $nombre = trim($_POST['nameProveedor']);
            $materiales = trim($_POST['materiales']);
            $telefono = trim($_POST['telefono']);
            $correo = trim($_POST['correo']);
            $direccion = trim($_POST['direccion']);
            $datereg = date("y/m/d");
            $errors = array(); // Array para almacenar mensajes de error

            // Validación de campos obligatorios
            if (
                strlen($idProveedor) < 1 ||
                strlen($nombre) < 1 ||
                strlen($materiales) < 1 ||
                strlen($telefono) < 1 ||
                strlen($correo) < 1 ||
                strlen($direccion) < 1
            ) {
                return "<script>Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Por favor, complete todos los campos',
                            })</script>";
            }

            // Validación de formato de correo electrónico
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                echo "<script>Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Formato de correo electrónico no válido',
                            })</script>";
                return;
            }

            // Validación de longitud de teléfono
            if (strlen($telefono) < 10) {
                echo "<script>Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'El teléfono debe tener 10 caracteres.',
                            })</script>";
                return;
            }

            // Validación de existencia de proveedor
            $consultaProveedor = "SELECT * FROM proovedores WHERE idProveedor = '$idProveedor' OR correo = '$correo' OR telefono = '$telefono'";
            $resultadoProveedor = mysqli_query($conex, $consultaProveedor);
            if (mysqli_num_rows($resultadoProveedor) > 0) {
                $row = mysqli_fetch_assoc($resultadoProveedor);
                if ($row['idProveedor'] == $idProveedor) {
                    return "<script>Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'La ID ya está registrada. Por favor, introduzca otra ID.',
                                })</script>";
                    
                }
                if ($row['correo'] == $correo) {
                    echo "<script>Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'El correo electrónico ya está registrado. Por favor, introduzca otro correo electrónico.',
                                })</script>";
                    return;
                    
                }
                if ($row['telefono'] == $telefono) {
                    echo "<script>Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'El teléfono ya está registrado. Por favor, introduzca otro número de teléfono.',
                                })</script>";
                    return;
                }
            }

            // Si hay errores, muestra una alerta con SweetAlert2

            // Si no hay errores, procede con el registro
            $consulta = "INSERT INTO proovedores(idProveedor, nameProveedor, materiales, telefono, correo, direccion, date_reg) 
                            VALUES ('$idProveedor', '$nombre', '$materiales', '$telefono', '$correo', '$direccion', '$datereg')";
            $resultado = mysqli_query($conex, $consulta);
            if ($resultado) {
                // Registro exitoso, muestra una alerta con SweetAlert2          
                return "<script>Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Proveedor registrado exitosamente.'
                })</script>";


            } else {
                // Error en el registro, muestra una alerta con SweetAlert2
                return "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Algo ha salido mal.'
                })</script>";
            }
        }
    }
}