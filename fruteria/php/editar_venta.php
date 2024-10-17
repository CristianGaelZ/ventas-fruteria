<link rel="stylesheet" type="text/css" href="../css/usuarioconexionphp.css"> <!-- CSS específico de la página -->

<?php
include '../conexion.php';

// Obtener el ID de la venta desde la URL
$id_venta = $_GET['id'];

// Consultar la venta existente
$query = "SELECT * FROM ventas WHERE id = $id_venta";
$result = $conexion->query($query);
$venta = $result->fetch_assoc();
?>
<button onclick="history.back()" class="btn">Volver Atrás</button>
<h1>Editar Venta</h1>
<form action="editar_venta_conexion.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $venta['id']; ?>">

    <label for="id_producto">Producto:</label>
    <select name="id_producto" required>
        <?php
        $productos = $conexion->query("SELECT * FROM productos");
        while ($producto = $productos->fetch_assoc()) {
            $selected = ($producto['id'] == $venta['id_producto']) ? 'selected' : '';
            echo "<option value='{$producto['id']}' $selected>{$producto['nombre']}</option>";
        }
        ?>
    </select>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" step="0.01" value="<?php echo $venta['cantidad']; ?>" required>

    <label for="total">Total:</label>
    <input type="number" step="0.01" name="total" value="<?php echo $venta['total']; ?>" required>

    <button type="submit">Actualizar Venta</button>
</form>

<a href="../index.php" class="btn">Volver al Inicio</a>