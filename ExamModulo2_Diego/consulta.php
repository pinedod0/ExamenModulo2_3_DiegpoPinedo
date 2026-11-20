<?php
// consulta.php - Muestra todos los libros de la tabla libros

$conexion = mysqli_connect("localhost", "root", "", "libreria");

if (!$conexion) {
    die("Error de conexión con la base de datos: " . mysqli_connect_error());
}
mysqli_set_charset($conexion, "utf8mb4");

$sql = "SELECT idLibro, titulo, numPag, precio FROM libros ORDER BY idLibro";
$resultado = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de libros</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 16px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f0f0f0; }
        .error { background: #fdeaea; border: 1px solid #e53935; padding: 12px; border-radius: 6px; }
        a { display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Listado de libros</h1>

<?php if (!$resultado): ?>
    <p class="error">Error en la consulta: <?= htmlspecialchars(mysqli_error($conexion)) ?></p>
<?php elseif (mysqli_num_rows($resultado) === 0): ?>
    <p>No hay libros registrados todavía.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Nº de páginas</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?= (int) $fila["idLibro"] ?></td>
                <td><?= htmlspecialchars($fila["titulo"]) ?></td>
                <td><?= (int) $fila["numPag"] ?></td>
                <td><?= (int) $fila["precio"] ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php endif; ?>

    <a href="index.php">Registrar nuevo libro</a>
</body>
</html>
<?php mysqli_close($conexion); ?>
