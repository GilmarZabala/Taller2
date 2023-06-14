<?php
include("conexion.php");

// Verificar si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $ci = $_POST["ci"];
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

    // Crear la consulta SQL para insertar un nuevo cliente en la base de datos
    $sql = "INSERT INTO clientes (Nombres, Apellidos, CI, Edad, Celular, Sexo, Direccion, Peso, Altura, Fecha_Inicio, Fecha_Final, Precio, Plan, Referencia) VALUES ('$nombres', '$apellidos', '$ci', '$edad', '$celular', '$sexo', '$direccion', '$peso', '$altura', '$fechaInicio', '$fechaFinal', '$precio', '$plan', '$referencia')";
    
    // Ejecutar la consulta SQL
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si la consulta se ejecutó correctamente
    if ($resultado) {
        echo "Cliente agregado correctamente.";
    } else {
        echo "Error al agregar cliente: " . mysqli_error($conexion);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Agregar un Cliente Nuevo</title>
    <style>
        /* Estilos CSS para el documento */
        body {
            text-align: center; /* Alinea el texto al centro */
        }

        form {
            margin: 0 auto; /* Centra el formulario horizontalmente */
            width: 400px; /* Establece el ancho del formulario */
            text-align: left; /* Alinea el texto del formulario a la izquierda */
        }

        label {
            display: inline-block; /* Muestra las etiquetas en línea */
            width: 100px; /* Establece el ancho de las etiquetas */
            text-align: right; /* Alinea el texto de las etiquetas a la derecha */
        }

        input[type="text"],
        input[type="number"] {
            width: 200px; /* Establece el ancho de los campos de texto y números */
        }

        input[type="submit"] {
            margin-top: 10px; /* Agrega un margen superior de 10 píxeles */
            width: 100%; /* Establece el ancho al 100% del contenedor */
            padding: 8px; /* Agrega un relleno de 8 píxeles alrededor del botón */
            background-color: #4CAF50; /* Establece el color de fondo del botón */
            color: white; /* Establece el color del texto del botón */
            border: none; /* Elimina el borde del botón */
            border-radius: 4px; /* Agrega bordes redondeados al botón */
            cursor: pointer; /* Cambia el cursor a un puntero cuando se pasa por encima del botón */
        }

        a.button {
            display: inline-block; /* Muestra el enlace como un bloque en línea */
            padding: 8px 16px; /* Agrega relleno al enlace */
            text-decoration: none; /* Quita la decoración de texto del enlace */
            background-color: #4CAF50; /* Establece el color de fondo del enlace */
            color: #fff; /* Establece el color del texto del enlace */
            border-radius: 4px; /* Agrega bordes redondeados al enlace */
        }

        a.button:hover {
            background-color: #45a049; /* Cambia el color de fondo del enlace cuando se pasa por encima */
        }
    </style>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> <!-- Incluye la hoja de estilos de jQuery UI -->
</head>

<body>
    <h1>Agregar un Cliente Nuevo</h1> <!-- Título principal de la página -->

    <a href="caratula.html" class="button">Inicio</a><br><br> <!-- Enlace de navegación a la página de inicio -->

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>"> <!-- Formulario para enviar datos mediante el método POST -->

        <label for="nombres">Nombres:</label> <!-- Etiqueta para el campo "Nombres" -->
        <input type="text" name="nombres" required><br><br> <!-- Campo de entrada de texto para el nombre -->

        <label for="apellidos">Apellidos:</label> <!-- Etiqueta para el campo "Apellidos" -->
        <input type="text" name="apellidos" required><br><br> <!-- Campo de entrada de texto para los apellidos -->

        <label for="ci">CI:</label> <!-- Etiqueta para el campo "CI" -->
        <input type="text" name="ci" required><br><br> <!-- Campo de entrada de texto para el número de identificación -->

        <label for="edad">Edad:</label> <!-- Etiqueta para el campo "Edad" -->
        <input type="number" name="edad" required><br><br> <!-- Campo de entrada numérica para la edad -->

        <label for="celular">Celular:</label> <!-- Etiqueta para el campo "Celular" -->
        <input type="text" name="celular" required><br><br> <!-- Campo de entrada de texto para el número de celular -->

        <label for="sexo">Sexo:</label> <!-- Etiqueta para el campo "Sexo" -->
        <select name="sexo" required> <!-- Menú desplegable para seleccionar el sexo -->
            <option value="Seleccione una opcion">Seleccione una opción</option> <!-- Opción por defecto -->
            <option value="M">M</option> <!-- Opción para sexo masculino -->
            <option value="F">F</option> <!-- Opción para sexo femenino -->
        </select><br><br> <!-- Salto de línea después del menú desplegable -->

        <label for="direccion">Dirección:</label> <!-- Etiqueta para el campo "Dirección" -->
        <input type="text" name="direccion" required><br><br> <!-- Campo de entrada de texto para la dirección -->

        <label for="peso">Peso:</label> <!-- Etiqueta para el campo "Peso" -->
        <input type="text" name="peso" required><br><br> <!-- Campo de entrada de texto para el peso -->

        <label for="altura">Altura:</label> <!-- Etiqueta para el campo "Altura" -->
        <input type="text" name="altura" required><br><br> <!-- Campo de entrada de texto para la altura -->

        <label for="fechaInicio">Fecha Inicio:</label> <!-- Etiqueta para el campo "Fecha Inicio" -->
        <input type="text" name="fechaInicio" id="fechaInicio" required><br><br> <!-- Campo de entrada de texto para la fecha de inicio -->

        <label for="fechaFinal">Fecha Final:</label> <!-- Etiqueta para el campo "Fecha Final" -->
        <input type="text" name="fechaFinal" id="fechaFinal" required><br><br> <!-- Campo de entrada de texto para la fecha final -->

        <label for="precio">Precio:</label> <!-- Etiqueta para el campo "Precio" -->
        <input type="text" name="precio" required><br><br> <!-- Campo de entrada de texto para el precio -->

        <label for="plan">Plan:</label> <!-- Etiqueta para el campo "Plan" -->
        <input type="text" name="plan" required><br><br> <!-- Campo de entrada de texto para el plan -->

        <label for="referencia">Referencia:</label> <!-- Etiqueta para el campo "Referencia" -->
        <input type="text" name="referencia" required><br><br> <!-- Campo de entrada de texto para la referencia -->

        <input type="submit" value="Agregar Cliente"> <!-- Botón de envío del formulario -->

    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Inclusión de la librería jQuery -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> <!-- Inclusión de la librería jQuery UI -->

    <script>
        $(document).ready(function() { <!-- Inicio de script jQuery después de cargar la página -->
            $("#fechaInicio").datepicker({ <!-- Inicialización del selector de fecha para el campo "Fecha Inicio" -->
                dateFormat: 'yy-mm-dd' <!-- Formato de fecha: año-mes-día -->
            });

            $("#fechaFinal").datepicker({ <!-- Inicialización del selector de fecha para el campo "Fecha Final" -->
                dateFormat: 'yy-mm-dd' <!-- Formato de fecha: año-mes-día -->
            });
        });
    </script>

    <br> <!-- Salto de línea final -->
</body>

</html>
