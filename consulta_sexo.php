<?php
include("conexion.php");

$sexoSeleccionado = isset($_POST["sexo"]) ? $_POST["sexo"] : "";

$sql = "SELECT * FROM Clientes WHERE Sexo = '$sexoSeleccionado' ORDER BY Fecha_Inicio ASC";
$resultado = mysqli_query($conexion, $sql);
$clientes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta por Género</title>
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
    <h1>Consulta por Género</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="sexo">Seleccione el sexo:</label>
        <select name="sexo" id="sexo">
            <option value="Seleccione una opcion">Seleccione una opcion</option>
            <option value="M">M</option>
            <option value="F">F</option>
        </select>

        <input type="submit" value="Consultar">
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
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente['Nombres']; ?></td>
                    <td><?php echo $cliente['Apellidos']; ?></td>
                    <td><?php echo $cliente['CI']; ?></td>
                    <td><?php echo $cliente['Edad']; ?></td>
                    <td><?php echo $cliente['Celular']; ?></td>
                    <td><?php echo $cliente['Sexo']; ?></td>
                    <td><?php echo $cliente['Direccion']; ?></td>
                    <td><?php echo $cliente['Peso']; ?></td>
                    <td><?php echo $cliente['Altura']; ?></td>
                    <td><?php echo $cliente['Fecha_Inicio']; ?></td>
                    <td><?php echo $cliente['Fecha_Final']; ?></td>
                    <td><?php echo $cliente['Precio']; ?></td>
                    <td><?php echo $cliente['Plan']; ?></td>
                    <td><?php echo $cliente['Referencia']; ?></td>
                    <td>
                        <a href="editar.php?ci=<?php echo $cliente['CI']; ?>" class="button">Editar</a>
                        <a href="eliminar.php?ci=<?php echo $cliente['CI']; ?>" class="button">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="index.php" class="button">Volver a la Lista Completa</a>

    <a href="caratula.html" class="button red-button">Inicio</a> <!-- Nuevo botón "Inicio" -->
    
</body>
</html>
