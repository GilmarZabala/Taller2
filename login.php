<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];

    // Verificar las credenciales del usuario (aquí debes implementar tu lógica de autenticación)

    // Ejemplo básico de autenticación (reemplaza con tu propia lógica)
    if (verificarCredenciales($nombreUsuario, $contrasena)) {
        // Inicio de sesión exitoso, guardar datos en la sesión
        $_SESSION["nombre_usuario"] = $nombreUsuario;

        // Redireccionar a la página de inicio después de iniciar sesión
        if ($nombreUsuario === "Zabala") {
            header("Location: caratula.html");
        } elseif ($nombreUsuario === "Arrascaita") {
            header("Location: index2.php");
        }
        exit();
    }
}

// Función para verificar las credenciales del usuario
function verificarCredenciales($nombreUsuario, $contrasena) {
    // Aquí debes implementar tu propia lógica de autenticación, como consultar una base de datos y verificar las credenciales del usuario

    // Ejemplo básico de autenticación
    $usuarios = [
        // Ejemplo de usuario "Zabala"
        [
            "nombre_usuario" => "Zabala",
            "contrasena" => "170299"
        ],
        // Ejemplo de usuario "Arrascaita"
        [
            "nombre_usuario" => "Arrascaita",
            "contrasena" => "123456"
        ]
    ];

    foreach ($usuarios as $usuario) {
        if ($usuario["nombre_usuario"] === $nombreUsuario && $usuario["contrasena"] === $contrasena) {
            return true; // Las credenciales son válidas
        }
    }

    return false; // Las credenciales son inválidas
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            margin-top: 50px;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        form {
            display: inline-block;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #666;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 250px;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            text-align: center;
        }

        input[type="submit"] {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-transform: uppercase;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .error-message {
            color: #f00;
            margin-top: 10px;
            text-align: center;
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <div class="form-wrapper">
        <div class="form-container">
            <h1>Iniciar Sesión</h1>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label for="nombre_usuario">Nombre de Usuario:</label>
                <input type="text" name="nombre_usuario" required><br><br>

                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" required><br><br>

                <input type="submit" value="Iniciar Sesión">

                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !verificarCredenciales($nombreUsuario, $contrasena)): ?>
                    <p class="error-message">Nombre de usuario o contraseña incorrectos.</p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>
