<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Materiales</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">
<header>
    <?php $pageTitle = "Header"; include '../templates/header2.php'; ?>
</header>
<div class="container mx-auto py-10">
    <div class="flex justify-center items-center">
        <div class="w-full max-w-lg bg-white shadow-md rounded-lg p-8">
            <div class="flex justify-center mb-6">
                <img src="../images/logo.png" alt="Logo" class="w-20 h-20">
            </div>
            <h2 class="text-center text-2xl font-bold text-gray-800">Registrar Materiales</h2>
            <p class="text-center text-sm text-gray-600 mt-2 font-semibold">
                Formulario de Registro de Materiales<br>
                <a href="../tables/MaterialsTable.php" class="text-amber-400 hover:text-yellow-600 transition duration-700 hover:underline" title="Tabla Materiales">Ir a la Tabla</a>
            </p>
            <form class="mt-8 space-y-6" method="post">
                <div class="space-y-4">
                    <div>
                        <label for="idMaterial" class="block text-gray-700 font-semibold">ID del Material</label>
                        <input class="mt-2 p-2 border border-gray-300 rounded w-full focus:ring-amber-500 focus:border-amber-500" type="text" name="idMaterial" placeholder="ID del Material">
                    </div>
                    <div>
                        <label for="MaterialName" class="block text-gray-700 font-semibold">Nombre del Material</label>
                        <input class="mt-2 p-2 border border-gray-300 rounded w-full focus:ring-amber-500 focus:border-amber-500" type="text" name="MaterialName" placeholder="Nombre del Material">
                    </div>
                    <div>
                        <label for="Description" class="block text-gray-700 font-semibold">Descripción del Material</label>
                        <input class="mt-2 p-2 border border-gray-300 rounded w-full focus:ring-amber-500 focus:border-amber-500" type="text" name="Description" placeholder="Descripción del Material">
                    </div>
                    <div>
                        <label for="costoUnitario" class="block text-gray-700 font-semibold">Costo Unitario</label>
                        <input class="mt-2 p-2 border border-gray-300 rounded w-full focus:ring-amber-500 focus:border-amber-500" type="number" name="costoUnitario" placeholder="Costo Unitario">
                    </div>
                    <div>
                        <label for="cantidadMaterial" class="block text-gray-700 font-semibold">Cantidad de Material</label>
                        <input class="mt-2 p-2 border border-gray-300 rounded w-full focus:ring-amber-500 focus:border-amber-500" type="number" name="cantidadMaterial" placeholder="Cantidad de Material">
                    </div>
                    <div>
                        <label for="proovedor" class="block text-gray-700 font-semibold">Proveedor</label>
                        <select name="proovedor" id="proovedor" class="mt-2 p-2 border border-gray-300 rounded w-full focus:ring-amber-500 focus:border-amber-500">
                            <option value="" disabled selected>Elija Proveedor</option>
                            <option value="cobre">Cobre</option>
                            <option value="argo">Argo</option>
                            <option value="megamex">Megamex</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button class="bg-amber-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition duration-150" type="submit" name="register">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
include ("../con_db.php");

if (isset($_POST['register'])){
    // Recoger los datos del formulario y eliminar espacios en blanco
    $idMaterial = trim($_POST['idMaterial']);
    $MaterialName = trim($_POST['MaterialName']);
    $Description = trim($_POST['Description']);
    $costoUnitario = trim($_POST['costoUnitario']);
    $cantidadMaterial = trim($_POST['cantidadMaterial']);
    $proovedor = isset($_POST['proovedor']) ? trim($_POST['proovedor']) : '';
    $datereg = date("y/m/d");
    $errors = array(); // Array para almacenar mensajes de error

    // Validaciones de campos
    if (strlen($idMaterial) < 1 || strlen($MaterialName) < 1 || strlen($Description) < 1 || strlen($costoUnitario) < 1 || strlen($cantidadMaterial) < 1 || strlen($proovedor) < 1) {
        $errors[] = "Por favor, complete todos los campos.";
    }

    // Validación del campo proovedor
    if ($proovedor == '') {
        $errors[] = "Por favor, seleccione un proveedor.";
    }

    // Validaciones de longitud y rangos específicos
    if (strlen($idMaterial) > 4) {
        $errors[] = "El ID del material excede el límite de caracteres permitido (4 caracteres de la forma N000).";
    }
    if (strlen($MaterialName) > 30) {
        $errors[] = "El nombre del material excede el límite de caracteres permitido (30 caracteres).";
    }
    if (strlen($Description) > 100) {
        $errors[] = "La descripción del material excede el límite de caracteres permitido (100 caracteres).";
    }
    if ($costoUnitario < 10000 || $costoUnitario > 999999) {
        $errors[] = "El costo no está dentro del rango permitido (mínimo 10000, máximo 999999).";
    }
    if ($cantidadMaterial < 1 || $cantidadMaterial > 100) {
        $errors[] = "La cantidad no está dentro del rango permitido (mínimo 1, máximo 100).";
    }
    if (strlen($proovedor) > 50) {
        $errors[] = "El nombre del proveedor excede el límite de caracteres permitido (50 caracteres).";
    }

    // Validación de existencia de material
    $consultaMaterial = "SELECT * FROM materiales WHERE idMaterial = '$idMaterial'";
    $resultadoMaterial = mysqli_query($conex, $consultaMaterial);
    if (mysqli_num_rows($resultadoMaterial) > 0) {
        $errors[] = "El ID del material ya está registrado. Por favor, introduzca otro ID.";
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
        $consulta = "INSERT INTO materiales(idMaterial, MaterialName, Description, costoUnitario, cantidadMaterial, proovedor, date_reg) 
        VALUES ('$idMaterial', '$MaterialName', '$Description', '$costoUnitario', '$cantidadMaterial', '$proovedor', '$datereg')";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado){
            // Registro exitoso, muestra una alerta con SweetAlert2
            echo "<script>";
            echo "Swal.fire({";
            echo "  icon: 'success',";
            echo "  title: 'Éxito',";
            echo "  text: 'Material registrado exitosamente.'";
            echo "});";
        } else {
            // Error en el registro, muestra una alerta con SweetAlert2
            echo "<script>";
            echo "Swal.fire({";
            echo "  icon: 'error',";
            echo "  title: 'Error',";
            echo "  text: 'Algo ha salido mal.'";
            echo "});";
        }
    }
}

mysqli_close($conex);
?>
<footer> 
    <?php $pageTitle = "Footer"; include '../templates/footer.php'; ?>
</footer>
</body>
</html>
