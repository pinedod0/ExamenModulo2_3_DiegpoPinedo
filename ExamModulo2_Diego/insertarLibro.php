<?php

// Establecer conexión
$servidor = "localhost";
$usuario  = "root";
$password = "";
$baseDatos = "libreria";

$conexion = mysqli_connect($servidor, $usuario, $password, $baseDatos);

// Comprobar conexion
if (!$conexion) {
    die("Error de conexión con la base de datos: " . mysqli_connect_error());
}
mysqli_set_charset($conexion, "utf8mb4");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar libro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 0 16px; }
        .ok { background: #e6f7e6; border: 1px solid #4caf50; padding: 12px; border-radius: 6px; }
        .error { background: #fdeaea; border: 1px solid #e53935; padding: 12px; border-radius: 6px; }
        a { display: inline-block; margin-top: 16px; margin-right: 12px; }
    </style>
</head>
<body>
    <h1>Resultado de la inserción</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recuperar los datos enviados desde el formulario mediante POST
    $titulo = isset($_POST["titulo"]) ? trim($_POST["titulo"]) : "";
    $numPag = isset($_POST["numPag"]) ? trim($_POST["numPag"]) : "";
    $precio = isset($_POST["precio"]) ? trim($_POST["precio"]) : "";

    // Validación básica
    if ($titulo === "" || $numPag === "" || $precio === ""
        || !ctype_digit($numPag) || !ctype_digit($precio)) {
        echo '<p class="error">Error: todos los campos son obligatorios y número de páginas y precio deben ser números enteros positivos.</p>';
    } else {
        $titulo = mysqli_real_escape_string($conexion, $titulo);
        $numPag = (int) $numPag;
        $precio = (int) $precio;

        // 4. Crear la consulta SQL INSERT INTO (idLibro es autoincremental, no se inserta)
        $sql = "INSERT INTO libros (titulo, numPag, precio) VALUES ('$titulo', $numPag, $precio)";

        // 5. Ejecutar la consulta mediante mysqli_query()
        $resultado = mysqli_query($conexion, $sql);

        // 6. Mostrar mensaje indicando si la inserción se ha realizado correctamente o no
        if ($resultado) {
            echo '<p class="ok">El libro se ha insertado correctamente.</p>';
        } else {
            echo '<p class="error">Error al insertar el libro: ' . htmlspecialchars(mysqli_error($conexion)) . '</p>';
        }
    }
} else {
    echo '<p class="error">No se han recibido datos. Usa el formulario para registrar un libro.</p>';
}

// 7. Cerrar la conexión con la base de datos mediante mysqli_close()
mysqli_close($conexion);
?>
    <a href="index.php">Registrar otro libro</a>
    <a href="consulta.php">Ver libros</a>
</body>
</html>
