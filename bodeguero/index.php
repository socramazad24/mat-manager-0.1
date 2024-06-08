<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/riva-dashboard-tailwind/riva-dashboard.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function filterMaterials() {
            const searchValue = document.getElementById('search').value.toLowerCase();
            const materials = document.getElementsByClassName('material-card');
            Array.from(materials).forEach(function(material) {
                const materialName = material.getElementsByClassName('material-name')[0].textContent.toLowerCase();
                const materialDescription = material.getElementsByClassName('material-description')[0].textContent.toLowerCase();
                const materialID = material.getElementsByClassName('material-id')[0].textContent.toLowerCase();
                const materialCost = material.getElementsByClassName('material-cost')[0].textContent.toLowerCase();
                const materialQuantity = material.getElementsByClassName('material-quantity')[0].textContent.toLowerCase();
                const materialProvider = material.getElementsByClassName('material-provider')[0].textContent.toLowerCase();
                const materialDate = material.getElementsByClassName('material-date')[0].textContent.toLowerCase();
                
                if (
                    materialName.includes(searchValue) || 
                    materialDescription.includes(searchValue) ||
                    materialID.includes(searchValue) ||
                    materialCost.includes(searchValue) ||
                    materialQuantity.includes(searchValue) ||
                    materialProvider.includes(searchValue) ||
                    materialDate.includes(searchValue)
                ) {
                    material.style.display = '';
                } else {
                    material.style.display = 'none';
                }
            });
        }
    </script>
</head>
<body>
    <header>
    <?php
        require_once "../templates/header2.php";
        $pageTitle = "Header";
        use templates\header2;

        $header = new header2();
        $header -> head2($pageTitle);
    ?>
    </header>
    
    <div class="flex min-h-screen bg-gray-50 justify-center">
        <div class="px-5 py-5">
            <h3 class="flex flex-col items-start justify-center m-2 ml-0 font-medium text-3xl">
                <span class="mr-2 font-bold">Materiales</span>
            </h3>

            <!-- Barra de búsqueda -->
            <div class="mb-5">
                <form onsubmit="return false;">
                    <input type="text" id="search" placeholder="Buscar materiales" onkeyup="filterMaterials()" class="border rounded-lg py-2 px-4 w-min">
                </form>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4" id="materialsGrid">
                <?php 
                include "../con_db.php";
                $consulta = "SELECT * FROM Materiales";
                $resultado = mysqli_query($conex, $consulta);  
                if ($resultado) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo '<div class="material-card uppercase max-w-xl cursor-pointer rounded-lg bg-white p-5 shadow duration-150 hover:scale-105 hover:shadow-md">';
                        echo '  <div>';
                        echo '    <div class="my-6 flex items-center justify-between px-4">';
                        echo '      <p class="material-name font-bold text-2xl text-amber-500">' . $row["MaterialName"] . '</p>';
                        echo '      <p class="material-id rounded-full bg-gray-400 px-3 py-2 text-xl font-semibold text-white">' . $row["idMaterial"] . '</p>';
                        echo '    </div>';
                        echo '    <div class="my-4 flex items-center justify-between px-4">';
                        echo '      <p class="text-base font-semibold text-gray-500 mr-10">Descripción</p>';
                        echo '      <p class="material-description rounded-full bg-gray-200 px-4 py-2 text-sm font-semibold text-gray-600">' . $row["Description"] . '</p>';
                        echo '    </div>';
                        echo '    <div class="my-4 flex items-center justify-between px-4">';
                        echo '      <p class="text-base font-semibold text-gray-500 mr-10">Costo Unitario</p>';
                        echo '      <p class="material-cost rounded-full bg-gray-200 px-3 py-2 text-sm font-semibold text-gray-600">$' . $row["costoUnitario"] . '</p>';
                        echo '    </div>';
                        echo '    <div class="my-4 flex items-center justify-between px-4">';
                        echo '      <p class="text-base font-semibold text-gray-500 mr-10">Cantidad</p>';
                        echo '      <p class="material-quantity rounded-full bg-gray-200 px-3 py-2 text-sm font-semibold text-gray-600">' . $row["cantidadMaterial"] . '</p>';
                        echo '    </div>';
                        echo '    <div class="my-4 flex items-center justify-between px-4">';
                        echo '      <p class="text-base font-semibold text-gray-500 mr-10">Proveedor</p>';
                        echo '      <p class="material-provider rounded-full bg-gray-200 px-3 py-2 text-sm font-semibold text-gray-600">' . $row["proovedor"] . '</p>';
                        echo '    </div>';
                        echo '    <div class="my-4 flex items-center justify-between px-4">';
                        echo '      <p class="text-base font-semibold text-gray-500 mr-10">Fecha</p>';
                        echo '      <p class="material-date rounded-full bg-gray-200 px-3 py-2 text-sm font-semibold text-gray-600">' . $row["date_reg"] . '</p>';
                        echo '    </div>';
                        echo '    <div class="my-4 flex items-center justify-between px-4">';
                        echo '      <p class="text-base font-semibold text-gray-500 mr-10">Acción</p>';
                        echo '      <p class="text-xl font-semibold text-gray-500">
                                  <a class="items-center justify-center font-sans font-bold whitespace-nowrap select-none bg-yellow-500/20 text-yellow-600 hover:bg-yellow-500/50 py-1 px-2 text-xs rounded-md duration-700" href="../CRUD/editar.php?idMaterial=' . $row["idMaterial"] . '">Editar</a> | 
                                  <a href="../CRUD/eliminar.php?idMaterial=' . $row["idMaterial"] . '" class="items-center justify-center font-sans font-bold whitespace-nowrap select-none bg-red-500/20 text-red-700 py-1 px-2 text-xs rounded-md hover:bg-red-500/50 duration-700">Eliminar</a>
                                  </p>';
                        echo '    </div>';
                        echo '  </div>';
                        echo '</div>';
                    } 
                } else {
                    echo '<p>No se encontraron registros</p>';    
                }
                mysqli_close($conex);
                ?>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2023 MAT-MANAGER
    </footer>
</body>
</html>
