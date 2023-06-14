<?php
$servername = "localhost"; // Dirección del servidor de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$database = "taller_2_23"; // Nombre de la base de datos

// Crear la conexión
$conexion = mysqli_connect($servername, $username, $password, $database); // Establecer la conexión a la base de datos usando los datos anteriores

// Verificar la conexión
if (!$conexion) { // Si la conexión no se pudo establecer
    die("Error de conexión: " . mysqli_connect_error()); // Mostrar mensaje de error y terminar la ejecución del script
}
?>
