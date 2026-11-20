<?php
// index.php - Formulario para registrar nuevos libros
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar libro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; padding: 0 16px; }
        label { display: block; margin-top: 14px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 18px; cursor: pointer; }
        a { display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Registrar nuevo libro</h1>

    <form action="insertarLibro.php" method="POST">
        <label for="titulo">Título del libro</label>
        <input type="text" id="titulo" name="titulo" maxlength="255" required>

        <label for="numPag">Número de páginas</label>
        <input type="number" id="numPag" name="numPag" min="1" step="1" required>

        <label for="precio">Precio</label>
        <input type="number" id="precio" name="precio" min="0" step="1" required>

        <button type="submit">Guardar libro</button>
    </form>

    <a href="consulta.php">Ver todos los libros</a>
</body>
</html>
