<?php
include("conexion.php"); // Incluir el archivo de conexión a la base de datos

$mesSeleccionado = date('m'); // Obtener el mes actual
$anioSeleccionado = date('Y'); // Obtener el año actual

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verificar si se ha enviado un formulario con el método POST
    $mesSeleccionado = $_POST["mes"]; // Obtener el mes seleccionado en el formulario
    $anioSeleccionado = $_POST["anio"]; // Obtener el año seleccionado en el formulario
}

// Obtener la lista de clientes inscritos por mes y año seleccionados
$sql = "SELECT * FROM Clientes WHERE MONTH(Fecha_Inicio) = $mesSeleccionado AND YEAR(Fecha_Inicio) = $anioSeleccionado ORDER BY Fecha_Inicio ASC";
$resultado = mysqli_query($conexion, $sql); // Ejecutar la consulta SQL en la base de datos
$clientes = mysqli_fetch_all($resultado, MYSQLI_ASSOC); // Obtener todos los resultados de la consulta en un array asociativo

mysqli_close($conexion); // Cerrar la conexión a la base de datos
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes por Mes</title>
    <style>
        body {
            text-align: center;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a.button {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #4CAF50;
            color: #fff;
            border-radius: 4px;
        }

        a.button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Lista de Clientes por Mes</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="mes">Seleccione el mes:</label>
        <select name="mes" id="mes">
            <?php
            for ($i = 1; $i <= 12; $i++) { // Generar opciones para los meses del 1 al 12
                $selected = ($mesSeleccionado == $i) ? "selected" : ""; // Si el mes actual coincide con el mes en el ciclo, marcarlo como seleccionado
                echo "<option value='$i' $selected>$i</option>"; // Imprimir la opción en el formulario
            }
            ?>
        </select>
        <label for="anio">Seleccione el año:</label>
        <select name="anio" id="anio">
            <?php
            $anioActual = date("Y"); // Obtener el año actual
            for ($i = $anioActual; $i >= $anioActual - 5; $i--) { // Generar opciones para los últimos 5 años, empezando desde el año actual
                $selected = ($anioSeleccionado == $i) ? "selected" : ""; // Si el año actual coincide con el año en el ciclo, marcarlo como seleccionado
                echo "<option value='$i' $selected>$i</option>"; // Imprimir la opción en el formulario
            }
            ?>
        </select>
        <input type="submit" value="Mostrar">
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>CI</th>
                <th>Edad</th>
                <th>Celular</th>
                <th>Sexo</th>
                <th>Dirección</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Fecha de Inicio</th>
                <th>Fecha Final</th>
                <th>Precio</th>
                <th>Plan</th>
                <th>Referencia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?> <!-- Iterar sobre el array de clientes -->
                <tr>
                    <td><?php echo $cliente['Nombres']; ?></td> <!-- Imprimir el valor del campo 'Nombres' del cliente -->
                    <td><?php echo $cliente['Apellidos']; ?></td> <!-- Imprimir el valor del campo 'Apellidos' del cliente -->
                    <td><?php echo $cliente['CI']; ?></td> <!-- Imprimir el valor del campo 'CI' del cliente -->
                    <td><?php echo $cliente['Edad']; ?></td> <!-- Imprimir el valor del campo 'Edad' del cliente -->
                    <td><?php echo $cliente['Celular']; ?></td> <!-- Imprimir el valor del campo 'Celular' del cliente -->
                    <td><?php echo $cliente['Sexo']; ?></td> <!-- Imprimir el valor del campo 'Sexo' del cliente -->
                    <td><?php echo $cliente['Direccion']; ?></td> <!-- Imprimir el valor del campo 'Direccion' del cliente -->
                    <td><?php echo $cliente['Peso']; ?></td> <!-- Imprimir el valor del campo 'Peso' del cliente -->
                    <td><?php echo $cliente['Altura']; ?></td> <!-- Imprimir el valor del campo 'Altura' del cliente -->
                    <td><?php echo $cliente['Fecha_Inicio']; ?></td> <!-- Imprimir el valor del campo 'Fecha_Inicio' del cliente -->
                    <td><?php echo $cliente['Fecha_Final']; ?></td> <!-- Imprimir el valor del campo 'Fecha_Final' del cliente -->
                    <td><?php echo $cliente['Precio']; ?></td> <!-- Imprimir el valor del campo 'Precio' del cliente -->
                    <td><?php echo $cliente['Plan']; ?></td> <!-- Imprimir el valor del campo 'Plan' del cliente -->
                    <td><?php echo $cliente['Referencia']; ?></td> <!-- Imprimir el valor del campo 'Referencia' del cliente -->
                    <td>
                        <a href="editar.php?ci=<?php echo $cliente['CI']; ?>" class="button">Editar</a> <!-- Enlace para editar el cliente -->
                        <a href="eliminar.php?ci=<?php echo $cliente['CI']; ?>" class="button">Eliminar</a> <!-- Enlace para eliminar el cliente -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="index.php" class="button">Volver a la Lista Completa</a> <!-- Enlace para volver a la lista completa -->

    <a href="caratula.html" class="button red-button">Inicio</a> <!-- botón Inicio -->
    
</body>
</html>
