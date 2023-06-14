<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST["ci"];
    $nuevoCI = $_POST["nuevoCI"]; // Nuevo campo para el CI
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $celular = $_POST["celular"];
    $sexo = $_POST["sexo"];
    $direccion = $_POST["direccion"];
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFinal = $_POST["fechaFinal"];
    $precio = $_POST["precio"];
    $plan = $_POST["plan"];
    $referencia = $_POST["referencia"];

    $sql = "UPDATE Clientes SET CI='$nuevoCI', Nombres='$nombres', Apellidos='$apellidos', Edad=$edad, Celular='$celular', Sexo='$sexo', Direccion='$direccion', Peso=$peso, Altura=$altura, Fecha_Inicio='$fechaInicio', Fecha_Final='$fechaFinal', Precio='$precio', Plan='$plan', Referencia='$referencia' WHERE CI='$ci'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "Cliente actualizado correctamente.";
    } else {
        echo "Error al actualizar cliente: " . mysqli_error($conexion);
    }

} 

if (isset($_GET["ci"])) {
    $ci = $_GET["ci"];

    $sql = "SELECT * FROM Clientes WHERE CI='$ci'";
    $resultado = mysqli_query($conexion, $sql);
    $cliente = mysqli_fetch_assoc($resultado);
} else {
    header("Location: index2.php");
    exit();
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
    <style>
        body {
            text-align: center;
        }

        form {
            margin: 0 auto;
            width: 400px;
            text-align: left;
        }

        label {
            display: inline-block;
            width: 120px;
            text-align: right;
            margin-right: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: 200px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        p.error {
            color: red;
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
    <h1>Editar Cliente</h1>
    <a href="index2.php" class="button">Regresar</a><br><br>
    <?php if ($cliente): ?>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <input type="hidden" name="ci" value="<?php echo $cliente['CI']; ?>">

            <div>
                <label for="nuevoCI">CI:</label> <!-- Nuevo campo para el CI -->
                <input type="text" name="nuevoCI" value="<?php echo $cliente['CI']; ?>" required>
            </div>

            <div>
                <label for="nombres">Nombres:</label>
                <input type="text" name="nombres" value="<?php echo $cliente['Nombres']; ?>" required>
            </div>

            <div>
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" value="<?php echo $cliente['Apellidos']; ?>" required>
            </div>

            <div>
                <label for="edad">Edad:</label>
                <input type="number" name="edad" value="<?php echo $cliente['Edad']; ?>" required>
            </div>

            <div>
                <label for="celular">Celular:</label>
                <input type="text" name="celular" value="<?php echo $cliente['Celular']; ?>" required>
            </div>

            <div>
                <label for="sexo">Sexo:</label>
                <select name="sexo" required>
                    <option value="M" <?php if ($cliente['Sexo'] === 'M') echo 'selected'; ?>>M</option>
                    <option value="F" <?php if ($cliente['Sexo'] === 'F') echo 'selected'; ?>>F</option>
                </select>
            </div>

            <div>
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" value="<?php echo $cliente['Direccion']; ?>" required>
            </div>

            <div>
                <label for="peso">Peso:</label>
                <input type="text" name="peso" value="<?php echo $cliente['Peso']; ?>" required>
            </div>

            <div>
                <label for="altura">Altura:</label>
                <input type="text" name="altura" value="<?php echo $cliente['Altura']; ?>" required>
            </div>

            <div>
                <label for="fechaInicio">Fecha de Inicio:</label>
                <input type="text" name="fechaInicio" id="fechaInicio" value="<?php echo $cliente['Fecha_Inicio']; ?>" required>
            </div>

            <div>
                <label for="fechaFinal">Fecha Final:</label>
                <input type="text" name="fechaFinal" id="fechaFinal" value="<?php echo $cliente['Fecha_Final']; ?>" required>
            </div>

            <div>
                <label for="precio">Precio:</label>
                <input type="text" name="precio" value="<?php echo $cliente['Precio']; ?>" required>
            </div>

            <div>
                <label for="plan">Plan:</label>
                <input type="text" name="plan" value="<?php echo $cliente['Plan']; ?>" required>
            </div>

            <div>
                <label for="referencia">Referencia:</label>
                <input type="text" name="referencia" value="<?php echo $cliente['Referencia']; ?>" required>
            </div>

            <div>
                <input type="submit" value="Actualizar Cliente">
            </div>
        </form>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(document).ready(function() {
                $("#fechaInicio").datepicker({
                    dateFormat: 'yy-mm-dd'
                });

                $("#fechaFinal").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
        </script>
    <?php else: ?>
        <p class="error">No se encontró el cliente.</p>
    <?php endif; ?>

    <br>
    <a href="index2.php" class="button red-button">Inicio</a> <!-- Nuevo botón "Inicio" -->

</body>
</html>
