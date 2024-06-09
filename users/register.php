<?php
namespace RegisterUser;
require_once "../templates/header2.php";
require_once "../con_db.php";
use LoginUser\Database;
use templates\header2;
$db = new Database();
$conex = $db->getConnection();

class RegisterUserClass {
    public function RegisterUserF() {
        ?>
        </html><!-- component -->
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <title>Registro de usuarios</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <script src="https://cdn.tailwindcss.com"></script>
            <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
            <!-- SweetAlert2 CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

            <!-- SweetAlert2 JS -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        </head>
        <body>
            <header>
                <?php $pageTitle = "Header"; include '../templates/header.php';?>
            </header>
            <div class="bg-gray-200 w-screen min-h-screen flex items-center justify-center">
                <div class="w-full py-8">
                    <div class="flex items-center justify-center space-x-2">
                        <img src="../images/logo.png" alt="" class="object-cover w-20 h-20 flex-shrink-0 ml-5">
                        <h1 class="text-3xl font-bold text-gray-600 tracking-wider">Mat-Manager</h1>
                    </div>
                    <div class="bg-white w-5/6 md:w-3/4 lg:w-2/3 xl:w-[500px] 2xl:w-[550px] mt-8 mx-auto px-16 py-8 rounded-lg shadow-2xl">
                        <h2 class="text-center text-2xl font-bold tracking-wide text-gray-800">Registro de Usuario</h2>
                        <p class="text-center text-sm text-gray-600 mt-2 font-semibold">Formulario de Registro de Usuario<br><a href="../tables/recuperarUsuarios.php" class="text-amber-400 hover:text-yellow-600 duration-700 hover:underline" title="Tabla Usuario">Ir a la Tabla</a></p>
                        <form class="my-8 text-sm" method='post'>
                            <div class="flex flex-col my-4">
                                <label for="idEmployee" class="text-gray-700 font-semibold">Cédula</label>
                                <input class="mt-2 p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900" type="text"  name="idEmployee" placeholder="Cedula" > 
                            </div>
                            <div class="flex flex-col my-4">
                                <label for="firstName" class="text-gray-700 font-semibold">Primer Nombre</label>
                                <input class='mt-2 p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900' type="text"  name="firstName" placeholder="Primer Nombre" >
                            </div>
                            <div class="flex flex-col my-4">
                                <label for="lastName" class="text-gray-700 font-semibold">Primer Apellido</label>
                                <input class='mt-2 p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900' type="text"  name="lastName" placeholder="Primer Apellido" >
                            </div>
                            <div class="flex flex-col my-4">
                                <label for="username" class="text-gray-700 font-semibold">Usuario</label>
                                <input class='mt-2 p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900'type="text"  name="username" placeholder="Usuario" >
                            </div>
                            <div class="flex flex-col my-4">
                                <label for="password" class="text-gray-700 font-semibold">Contraseña</label>
                                <div x-data="{ show: false }" class="relative flex items-center mt-2">
                                    <input :type=" show ? 'text': 'password' " name="password" id="password" class="flex-1 p-2 pr-10 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900" placeholder="Contraseña" type="password">
                                    <button @click="show = !show" type="button" class="absolute right-2 bg-transparent flex items-center justify-center text-gray-700">
                                        <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                        <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex flex-col my-4">
                                <label for="password_confirmation" class="text-gray-700 font-semibold">Confirmar Contraseña</label>
                                <div x-data="{ show: false }" class="relative flex items-center mt-2">
                                    <input :type=" show ? 'text': 'password' " name="password_confirmation" id="password_confirmation" class="flex-1 p-2 pr-10 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900" placeholder="Escriba nuevamente su contraseña" type="password">
                                    <button @click="show = !show" type="button" class="absolute right-2 bg-transparent flex items-center justify-center text-gray-700">
                                        <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                        <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex flex-col my-4">
                                <label for="email" class="text-gray-700 font-semibold">Correo Electronico</label>
                                <input class='mt-2 p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900' type="email"  name="email" placeholder="Correo Electronico" >     
                            </div>
                            <div class="flex flex-col my-4">
                                <label for="phone" class="text-gray-700 font-semibold">Telefono</label>
                                <input class='mt-2 p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900' type="tel"  name="phone" placeholder="Telefono" >

                            </div>

                            <div class="relative inline-flex">
                                <select id="role" name="role" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-600 px-4 py-2 pr-8 rounded-md shadow-sm focus:outline-none focus:border-yellow-500 focus:ring focus:ring-amber-600 focus:ring-opacity-50">
                                    <option value="" disabled selected>Elige un rol</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="gerente">Gerente</option>
                                    <option value="bodeguero">Bodeguero</option>
                                </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 font-semibold">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                        <br>
                        <div class="my-4 flex items-center justify-end space-x-4">
                            <button class="bg-amber-400 hover:bg-yellow-600 rounded-lg px-8 py-2 text-gray-100 hover:shadow-xl transition duration-150 uppercase" type="submit" name="register">Registrar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php 
            include("../con_db.php");

            if (isset($_POST['register'])){
                $idEmployee = trim($_POST['idEmployee']);
                $firstName = trim($_POST['firstName']);
                $lastName = trim($_POST['lastName']);
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $email = trim($_POST['email']);
                $phone = trim($_POST['phone']);
                $role = trim($_POST['role']);
                $datereg = date("y/m/d");
                $errors = array(); // Array para almacenar mensajes de error

                // Validación de campos obligatorios
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
                    $errors[] = "Por favor, complete todos los campos.";
                }

                // Validación de formato de correo electrónico
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Por favor, introduzca un correo electrónico válido.";
                }

                // Validación de longitud de contraseña
                if (strlen($password) < 6) {
                    $errors[] = "La contraseña debe tener al menos 6 caracteres.";
                }

                // Validación de existencia de usuario
                $consultaUser = "SELECT * FROM users WHERE username = '$username' OR email = '$email' OR phone = '$phone'";
                $resultadoUser = mysqli_query($conex, $consultaUser);
                if (mysqli_num_rows($resultadoUser) > 0) {
                    $row = mysqli_fetch_assoc($resultadoUser);
                    if ($row['username'] == $username) {
                        $errors[] = "El usuario ya existe. Por favor, elija otro nombre de usuario.";
                    }
                    if ($row['email'] == $email) {
                        $errors[] = "El correo electrónico ya está registrado. Por favor, introduzca otro correo electrónico.";
                    }
                    if ($row['phone'] == $phone) {
                        $errors[] = "El teléfono ya está registrado. Por favor, introduzca otro número de teléfono.";
                    }
                }

                // Validación de existencia de ID
                $consultaID = "SELECT * FROM users WHERE idEmployee = '$idEmployee'";
                $resultadoID = mysqli_query($conex, $consultaID);
                if (mysqli_num_rows($resultadoID) > 0) {
                    $errors[] = "La ID ya está registrada. Por favor, introduzca otra ID.";
                }

                // Si hay errores, muestra una alerta con SweetAlert2
                if (!empty($errors)) {
                    echo "<script>";
                    echo "Swal.fire({";
                    echo "  icon: 'error',";
                    echo "  title: 'Error',";
                    echo "  html: '" . implode("<br>", $errors) . "'";
                    echo "});";
                    echo "</script>";
                } else {
                    // Si no hay errores, procede con el registro
                    $consulta = "INSERT INTO users(idEmployee, firstName, lastName, username, password, email, phone, role, date_reg) 
                    VALUES ('$idEmployee', '$firstName', '$lastName', '$username', '$password', '$email', '$phone', '$role', '$datereg')";
                    $resultado = mysqli_query($conex, $consulta);
                    if ($resultado){
                        // Registro exitoso, muestra una alerta con SweetAlert2
                        echo "<script>";
                        echo "Swal.fire({";
                        echo "  icon: 'success',";
                        echo "  title: 'Éxito',";
                        echo "  text: 'Te has registrado exitosamente.'";
                        echo "});";
                        echo "</script>";
                    } else {
                        // Error en el registro, muestra una alerta con SweetAlert2
                        echo "<script>";
                        echo "Swal.fire({";
                        echo "  icon: 'error',";
                        echo "  title: 'Error',";
                        echo "  text: 'Algo ha salido mal.'";
                        echo "});";
                        echo "</script>";
                    } 
                }
            }
            mysqli_close($conex);
        ?>



            </div>
            <footer> 
            <?php $pageTitle = "Footer"; include '../templates/footer.php';?>

            </footer>
        </body>
        </html>
        <?php
    }
}

// Instanciamos la clase y llamamos al método render para generar el HTML
$main = new RegisterUserClass();
$main->RegisterUserF();
?>