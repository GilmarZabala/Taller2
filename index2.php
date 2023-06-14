<?php
include("conexion.php");

// Obtener la lista de clientes ordenados por fecha final
$sql = "SELECT * FROM Clientes ORDER BY Fecha_Final ASC"; // Consulta SQL para obtener la lista de clientes ordenados por fecha final de forma ascendente
$resultado = mysqli_query($conexion, $sql); // Ejecutar la consulta SQL en la conexión establecida
$clientes = mysqli_fetch_all($resultado, MYSQLI_ASSOC); // Obtener todos los resultados de la consulta como un arreglo asociativo

mysqli_close($conexion); // Cerrar la conexión a la base de datos
?>


<!DOCTYPE html>
<html>
<head>
    <title>Lista Total de Clientes</title>
    <style>
    body {
        text-align: center; /* Alinea el contenido de texto en el centro */
    }

    table {
        margin: 0 auto; /* Establece márgenes automáticos para centrar la tabla horizontalmente */
        border-collapse: collapse; /* Colapsa los bordes de la tabla */
    }

    th, td {
        padding: 8px; /* Agrega un relleno de 8 píxeles alrededor del contenido de las celdas de encabezado y de datos */
        text-align: center; /* Alinea el contenido de texto en el centro de las celdas de encabezado y de datos */
        border: 1px solid #ddd; /* Establece un borde de 1 píxel y color #ddd (gris claro) para las celdas de encabezado y de datos */
    }

    th {
        background-color: #f2f2f2; /* Establece un fondo de color #f2f2f2 (gris claro) para las celdas de encabezado */
    }

    a.button {
        display: inline-block; /* Muestra el enlace como un bloque en línea */
        padding: 8px 16px; /* Agrega un relleno de 8 píxeles en la parte superior e inferior y 16 píxeles en los lados del enlace */
        text-decoration: none; /* Quita la decoración de subrayado del enlace */
        background-color: #4CAF50; /* Establece un fondo de color #4CAF50 (verde) para el enlace */
        color: #fff; /* Establece el color de texto en blanco para el enlace */
        border-radius: 4px; /* Agrega esquinas redondeadas al enlace con un radio de 4 píxeles */
    }

    a.button:hover {
        background-color: #45a049; /* Cambia el fondo del enlace a #45a049 (verde oscuro) al pasar el cursor sobre él */
    }

    a.red-button {
        background-color: red; /* Establece un fondo de color rojo para el enlace */
    }

    a.red-button:hover {
        background-color: darkred; /* Cambia el fondo del enlace a darkred (rojo oscuro) al pasar el cursor sobre él */
    }

    a.purple-button {
        background-color: purple; /* Establece un fondo de color morado para el enlace */
    }

    a.purple-button:hover {
        background-color: darkmagenta; /* Cambia el fondo del enlace a darkmagenta (magenta oscuro) al pasar el cursor sobre él */
    }

    /* Estilos para las fechas */
    .fecha-rojo {
        background-color: red; /* Establece un fondo de color rojo para los elementos con la clase fecha-rojo */
        color: white; /* Establece el color de texto en blanco para los elementos con la clase fecha-rojo */
    }

    .fecha-amarillo {
        background-color: yellow; /* Establece un fondo de color amarillo para los elementos con la clase fecha-amarillo */
    }

    .fecha-verde {
        background-color: green; /* Establece un fondo de color verde para los elementos con la clase fecha-verde */
        color: white; /* Establece el color de texto en blanco para los elementos con la clase fecha-verde */
    }
</style>

</head>
<body>
    <h1>Lista Total de Clientes</h1> <!-- Encabezado principal de la página -->
    <a href="login.php" class="button red-button">Cerrar Sesion </a> <!-- Enlace para ir a la página de inicio -->
    <a href="agregar2.php" class="button">Nuevo Cliente</a> <!-- Enlace para agregar un nuevo cliente -->
    <a href="IMC2.php" class="button purple-button">IMC</a><br><br>
    <table>
        <thead>
            <tr>
                <th>Nombres</th> <!-- Encabezado de columna: Nombres -->
                <th>Apellidos</th> <!-- Encabezado de columna: Apellidos -->
                <th>CI</th> <!-- Encabezado de columna: CI -->
                <th>Edad</th> <!-- Encabezado de columna: Edad -->
                <th>Celular</th> <!-- Encabezado de columna: Celular -->
                <th>Sexo</th> <!-- Encabezado de columna: Sexo -->
                <th>Dirección</th> <!-- Encabezado de columna: Dirección -->
                <th>Peso</th> <!-- Encabezado de columna: Peso -->
                <th>Altura</th> <!-- Encabezado de columna: Altura -->
                <th>Fecha de Inicio</th> <!-- Encabezado de columna: Fecha de Inicio -->
                <th>Fecha Final</th> <!-- Encabezado de columna: Fecha Final -->
                <th>Precio</th> <!-- Encabezado de columna: Precio -->
                <th>Plan</th> <!-- Encabezado de columna: Plan -->
                <th>Referencia</th> <!-- Encabezado de columna: Referencia -->
                <th>Acciones</th> <!-- Encabezado de columna: Acciones -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?> <!-- Iteración sobre el arreglo de clientes -->
                <?php
                // Obtener la fecha actual
                $fechaActual = date('Y-m-d');

                // Comparar la fecha final con la fecha actual
                $fechaFinal = $cliente['Fecha_Final'];
                $diferencia = strtotime($fechaFinal) - strtotime($fechaActual);
                $diasDiferencia = round($diferencia / (60 * 60 * 24));

                // Determinar la clase CSS según la diferencia de días
                $claseFecha = '';
                if ($diasDiferencia < 0) {
                    $claseFecha = 'fecha-rojo'; // Clase CSS para fechas vencidas
                } elseif ($diasDiferencia <= 7) {
                    $claseFecha = 'fecha-amarillo'; // Clase CSS para fechas próximas a vencer
                } else {
                    $claseFecha = 'fecha-verde'; // Clase CSS para fechas válidas
                }
                ?>

                <tr>
                    <td><?php echo $cliente['Nombres']; ?></td> <!-- Valor de la columna: Nombres del cliente -->
                    <td><?php echo $cliente['Apellidos']; ?></td> <!-- Valor de la columna: Apellidos del cliente -->
                    <td><?php echo $cliente['CI']; ?></td> <!-- Valor de la columna: CI del cliente -->
                    <td><?php echo $cliente['Edad']; ?></td> <!-- Valor de la columna: Edad del cliente -->
                    <td><?php echo $cliente['Celular']; ?></td> <!-- Valor de la columna: Celular del cliente -->
                    <td><?php echo $cliente['Sexo']; ?></td> <!-- Valor de la columna: Sexo del cliente -->
                    <td><?php echo $cliente['Direccion']; ?></td> <!-- Valor de la columna: Dirección del cliente -->
                    <td><?php echo $cliente['Peso']; ?></td> <!-- Valor de la columna: Peso del cliente -->
                    <td><?php echo $cliente['Altura']; ?></td> <!-- Valor de la columna: Altura del cliente -->
                    <td><?php echo $cliente['Fecha_Inicio']; ?></td> <!-- Valor de la columna: Fecha de Inicio del cliente -->
                    <td class="<?php echo $claseFecha; ?>"><?php echo $cliente['Fecha_Final']; ?></td> <!-- Valor de la columna: Fecha Final del cliente con clase CSS dinámica -->
                    <td><?php echo $cliente['Precio']; ?></td> <!-- Valor de la columna: Precio del cliente -->
                    <td><?php echo $cliente['Plan']; ?></td> <!-- Valor de la columna: Plan del cliente -->
                    <td><?php echo $cliente['Referencia']; ?></td> <!-- Valor de la columna: Referencia del cliente -->
                    <td>
                        <a href="editar2.php?ci=<?php echo $cliente['CI']; ?>" class="button">Editar</a> <!-- Enlace para editar el cliente -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
</body>

</html>
