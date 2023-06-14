<?php
include("conexion.php");

// Ganancia por día
$sqlDia = "SELECT DATE(Fecha_Final) AS Fecha, SUM(Precio) AS Ganancia FROM Clientes GROUP BY DATE(Fecha_Final)";
$resultadoDia = mysqli_query($conexion, $sqlDia);
$gananciasDia = mysqli_fetch_all($resultadoDia, MYSQLI_ASSOC);

// Ganancia por mes
$sqlMes = "SELECT DATE_FORMAT(Fecha_Final, '%Y-%m') AS Fecha, SUM(Precio) AS Ganancia FROM Clientes GROUP BY DATE_FORMAT(Fecha_Final, '%Y-%m')";
$resultadoMes = mysqli_query($conexion, $sqlMes);
$gananciasMes = mysqli_fetch_all($resultadoMes, MYSQLI_ASSOC);

// Ganancia por año
$sqlAnio = "SELECT DATE_FORMAT(Fecha_Final, '%Y') AS Fecha, SUM(Precio) AS Ganancia FROM Clientes GROUP BY DATE_FORMAT(Fecha_Final, '%Y')";
$resultadoAnio = mysqli_query($conexion, $sqlAnio);
$gananciasAnio = mysqli_fetch_all($resultadoAnio, MYSQLI_ASSOC);

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ganancias por Día, Mes y Año</title>
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

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            text-transform: uppercase;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #555;
        }

        .red-button {
            background-color: #ff0000;
        }
    </style>
</head>
<body>
    <h1>Ganancias por Día, Mes y Año</h1>
    <h2>Ganancias por Día</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Ganancia</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gananciasDia as $ganancia): ?>
                <tr>
                    <td><?php echo $ganancia['Fecha']; ?></td>
                    <td><?php echo $ganancia['Ganancia']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Ganancias por Mes</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Ganancia</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gananciasMes as $ganancia): ?>
                <tr>
                    <td><?php echo $ganancia['Fecha']; ?></td>
                    <td><?php echo $ganancia['Ganancia']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Ganancias por Año</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Ganancia</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gananciasAnio as $ganancia): ?>
                <tr>
                    <td><?php echo $ganancia['Fecha']; ?></td>
                    <td><?php echo $ganancia['Ganancia']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<br>
    <a href="caratula.html" class="button red-button">Inicio</a> <!-- Nuevo botón "Inicio" -->
</body>
</html>
