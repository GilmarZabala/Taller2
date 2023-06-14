<?php
include("conexion.php");

if (isset($_GET["ci"])) {
    $ci = $_GET["ci"];

    $sql = "DELETE FROM Clientes WHERE CI=$ci";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "Cliente eliminado correctamente.";
    } else {
        echo "Error al eliminar cliente: " . mysqli_error($conexion);
    }
} else {
    header("Location: index.php");
    exit();
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Cliente</title>
    <style>
        body {
            text-align: center;
        }

        h1 {
            margin-top: 20px;
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
    <h1>Eliminar Cliente</h1>
    <a href="index.php" class="button">Regresar</a><br><br>

</body>
</html>
