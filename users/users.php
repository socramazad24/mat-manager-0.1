<?php
namespace users;
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Database.php';
use matmanager\Database;

class users
{
    public function processRegistration()
    {
        if (isset($_POST['register'])) {
            $idEmployee = trim($_POST['idEmployee']);
            $firstName = trim($_POST['firstName']);
            $lastName = trim($_POST['lastName']);
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $password_confirmation = $_POST['password_confirmation'];
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $role = $_POST['role'];
            $datereg = date("y/m/d");

            // Validate password and confirmation match
            if ($password !== $password_confirmation) {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Las contraseñas no coinciden',
                })</script>";
                return;
            }

            // Ensure all required fields are filled
            if (
                strlen($idEmployee) < 1 ||
                strlen($firstName) < 1 ||
                strlen($lastName) < 1 ||
                strlen($username) < 1 ||
                strlen($password) < 1 ||
                strlen($email) < 1 ||
                strlen($phone) < 1 ||
                strlen($role) < 1
            ) {
                return "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Por favor, complete todos los campos',
                })</script>";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Formato de correo electrónico no válido',
                })</script>";
                return;
            }

            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Create database connection
            $conex = new Database;
            $conn = $conex->getConnection();

            // Check if username already exists
            $sql_check = "SELECT * FROM users WHERE username = '$username'";
            $result_check = mysqli_query($conn, $sql_check);

            if (mysqli_num_rows($result_check) > 0) {
                return "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El nombre de usuario ya está en uso',
                })</script>";
            }

            // Insert new user into database
            $consulta = "INSERT INTO users(idEmployee, firstName, lastName, username, password, email, phone, role, date_reg) 
            VALUES ('$idEmployee', '$firstName', '$lastName', '$username', '$password', '$email', '$phone', '$role', '$datereg')";
            $resultado = mysqli_query($conn, $consulta);

            if ($resultado) {
                return "<script>Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Usuario registrado con éxito',
                })</script>";
            } else {
                return "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al registrar el usuario',
                })</script>";
            }

            // Close the database connection
            mysqli_close($conn);
        }
    }
}
$users = new Users;
$users -> processRegistration();
