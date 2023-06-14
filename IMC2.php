<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Calculadora de Índice Corporal (IMC)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            padding: 8px;
            width: 100%;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-home {
            padding: 10px 20px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        h3 {
            margin-top: 20px;
            color: #333;
        }

        p {
            color: #666;
            font-weight: bold;
        }

        /* Media queries para hacer el diseño responsivo */
        @media (max-width: 480px) {
            form {
                max-width: 300px;
            }
        }

        @media (min-width: 481px) and (max-width: 768px) {
            form {
                max-width: 400px;
            }
        }
    </style>
</head>
<body>
    <h1>Calculadora de Índice Corporal (IMC)</h1>
    <form method="post" action="">
        <label for="weight">Peso (kg):</label>
        <input type="text" name="weight" id="weight" required><br><br>
        
        <label for="height">Altura (cm):</label>
        <input type="text" name="height" id="height" required><br><br>
        
        <input type="submit" name="calculate" value="Calcular">
    </form>
    
    <?php
    if(isset($_POST['calculate'])){
        $weight = $_POST['weight'];
        $height = $_POST['height'] / 100; // Convertir la altura a metros
        
        // Calcular el IMC
        $imc = $weight / ($height * $height);
        
        // Mostrar el resultado
        echo "<h3>Tu Índice de Masa Corporal (IMC) es: " . number_format($imc, 2) . "</h3>";
        
        // Interpretar el resultado
        if($imc < 18.5){
            echo "<p style='color: #ff7f00;'>Peso inferior al normal</p>";
        } elseif($imc >= 18.5 && $imc < 25){
            echo "<p style='color: #00cc00;'>Peso normal</p>";
        } elseif($imc >= 25 && $imc < 30){
            echo "<p style='color: #ffcc00;'>Sobrepeso</p>";
        } else {
            echo "<p style='color: #ff0000;'>Obesidad</p>";
        }
    }
    ?>

    <a class="btn-home" href="index2.php">Inicio</a>
</body>
</html>
