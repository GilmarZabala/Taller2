<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Nombre del servidor de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$database = "taller_2_23"; // Nombre de la base de datos

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar si se ha establecido la conexión correctamente
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si se ha enviado una consulta de búsqueda
if (isset($_POST["buscar_ci"])) {
    $ciBuscar = $_POST["buscar_ci"];

    // Crear la consulta SQL para buscar el cliente por CI
    $sql = "SELECT * FROM clientes WHERE CI = '$ciBuscar'";

    // Ejecutar la consulta y obtener los resultados
    $result = $conn->query($sql);

    // Mostrar los resultados de la búsqueda
    if ($result->num_rows > 0) {
        echo "<style>
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

            a.red-button {
                background-color: red;
            }

            a.red-button:hover {
                background-color: darkred;
            }

            a.purple-button {
                background-color: purple;
            }

            a.purple-button:hover {
                background-color: darkmagenta;
            }
        </style>";

        echo "<h2>Resultados de la búsqueda:</h2>";
        echo "<table>";
        echo "<tr><th>Nombres</th><th>Apellidos</th><th>CI</th><th>Edad</th><th>Celular</th><th>Sexo</th><th>Dirección</th><th>Peso</th><th>Altura</th><th>Fecha de Inicio</th><th>Fecha Final</th><th>Precio</th><th>Plan</th><th>Referencia</th><th>Acciones</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Nombres"] . "</td>"; // Muestra el campo "Nombres" del cliente actual
            echo "<td>" . $row["Apellidos"] . "</td>"; // Muestra el campo "Apellidos" del cliente actual
            echo "<td>" . $row["CI"] . "</td>"; // Muestra el campo "CI" del cliente actual
            echo "<td>" . $row["Edad"] . "</td>"; // Muestra el campo "Edad" del cliente actual
            echo "<td>" . $row["Celular"] . "</td>"; // Muestra el campo "Celular" del cliente actual
            echo "<td>" . $row["Sexo"] . "</td>"; // Muestra el campo "Sexo" del cliente actual
            echo "<td>" . $row["Direccion"] . "</td>"; // Muestra el campo "Direccion" del cliente actual
            echo "<td>" . $row["Peso"] . "</td>"; // Muestra el campo "Peso" del cliente actual
            echo "<td>" . $row["Altura"] . "</td>"; // Muestra el campo "Altura" del cliente actual
            echo "<td>" . $row["Fecha_Inicio"] . "</td>"; // Muestra el campo "Fecha_Inicio" del cliente actual
            echo "<td>" . $row["Fecha_Final"] . "</td>"; // Muestra el campo "Fecha_Final" del cliente actual
            echo "<td>" . $row["Precio"] . "</td>"; // Muestra el campo "Precio" del cliente actual
            echo "<td>" . $row["Plan"] . "</td>"; // Muestra el campo "Plan" del cliente actual
            echo "<td>" . $row["Referencia"] . "</td>"; // Muestra el campo "Referencia" del cliente actual
            echo "<td>";
            echo "<a href=\"editar.php?ci=" . $row["CI"] . "\" class=\"button\">Editar</a>"; // Enlace para editar el cliente actual
            echo "<a href=\"eliminar.php?ci=" . $row["CI"] . "\" class=\"button red-button\">Eliminar</a>"; // Enlace para eliminar el cliente actual
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>No se encontraron resultados.</h2>"; // Mensaje si no se encontraron resultados de búsqueda
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

<style>
    body {
        text-align: center; /* Centrar el contenido del cuerpo */
    }

    table {
        margin: 0 auto; /* Centrar la tabla horizontalmente */
        border-collapse: collapse; /* Colapsar los bordes de la tabla */
    }

    th, td {
        padding: 8px; /* Espaciado interno de las celdas de encabezado y de datos */
        text-align: center; /* Centrar el contenido de las celdas de encabezado y de datos */
        border: 1px solid #ddd; /* Borde de 1px sólido con color #ddd */
    }

    th {
        background-color: #f2f2f2; /* Color de fondo para las celdas de encabezado */
    }

    a.button {
        display: inline-block; /* Mostrar el enlace como un bloque en línea */
        padding: 8px 16px; /* Espaciado interno del enlace */
        text-decoration: none; /* Sin decoración de texto para el enlace */
        background-color: #4CAF50; /* Color de fondo para el enlace */
        color: #fff; /* Color de texto para el enlace */
        border-radius: 4px; /* Borde redondeado del enlace */
    }

    a.button:hover {
        background-color: #45a049; /* Color de fondo al pasar el cursor sobre el enlace */
    }

    a.red-button {
        background-color: red; /* Color de fondo para el enlace rojo */
    }

    a.red-button:hover {
        background-color: darkred; /* Color de fondo al pasar el cursor sobre el enlace rojo */
    }

    a.purple-button {
        background-color: purple; /* Color de fondo para el enlace morado */
    }

    a.purple-button:hover {
        background-color: darkmagenta; /* Color de fondo al pasar el cursor sobre el enlace morado */
    }
</style>

<h2>Buscar Cliente por CI</h2> <!-- Título para la sección de búsqueda de cliente por CI -->

<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>"> <!-- Formulario para enviar la consulta de búsqueda -->
    <label for="buscar_ci">Ingrese el CI del cliente:</label> <!-- Etiqueta para el campo de entrada del CI del cliente -->
    <input type="text" name="buscar_ci" required> <!-- Campo de entrada para el CI del cliente, marcado como requerido -->
    <input type="submit" value="Buscar"> <!-- Botón de envío para realizar la búsqueda -->
</form>

<a href="caratula.html" class="button red-button">Inicio</a> <!-- Enlace para regresar a la página de inicio, con estilo de botón rojo -->
