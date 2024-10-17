<?php
// Incluir la conexión a la base de datos
include '../conexion.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar el usuario por ID
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conexion->query($query);
    $usuario = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <?php
    // Asignar el archivo CSS usando echo
    echo '<link rel="stylesheet" type="text/css" href="../css/usuarioconexionphp.css">';
    ?>
</head>
<body>
    <!-- Botón Volver Atrás -->
    <button onclick="history.back()" class="btn">Volver Atrás</button>

    <form action="editar_usuario_conexion.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>

        <label for="password">Nueva Contraseña (dejar en blanco para no cambiarla):</label>
        <input type="password" name="password">

        <label for="rol">Rol:</label>
        <select name="rol" required>
            <option value="administrador" <?php if ($usuario['rol'] == 'administrador') echo 'selected'; ?>>Administrador</option>
            <option value="vendedor" <?php if ($usuario['rol'] == 'vendedor') echo 'selected'; ?>>Vendedor</option>
        </select>

        <button type="submit">Actualizar Usuario</button>
    </form>

    <a href="../index.php" class="btn">Volver al Inicio</a>
</body>
</html>
