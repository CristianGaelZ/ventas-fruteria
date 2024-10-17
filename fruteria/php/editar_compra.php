<link rel="stylesheet" type="text/css" href="../css/usuarioconexionphp.css"> <!-- CSS específico de la página -->

<?php
include '../conexion.php';

// Obtener el ID de la compra desde la URL
$id_compra = $_GET['id'];

// Consultar la compra existente
$query = "SELECT * FROM compras WHERE id = $id_compra";
$result = $conexion->query($query);
$compra = $result->fetch_assoc();
?>
<button onclick="history.back()" class="btn">Volver Atrás</button>
<h1>Editar Compra</h1>
<form action="editar_compra_conexion.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $compra['id']; ?>">

    <label for="id_producto">Producto:</label>
    <select name="id_producto" required>
        <?php
        $productos = $conexion->query("SELECT * FROM productos");
        while ($producto = $productos->fetch_assoc()) {
            $selected = ($producto['id'] == $compra['id_producto']) ? 'selected' : '';
            echo "<option value='{$producto['id']}' $selected>{$producto['nombre']}</option>";
        }
        ?>
    </select>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" step="0.01" value="<?php echo $compra['cantidad']; ?>" required>

    <label for="precio_compra">Precio de Compra:</label>
    <input type="number" step="0.01" name="precio_compra" value="<?php echo $compra['precio_compra']; ?>" required>

    <button type="submit">Actualizar Compra</button>
</form>

<a href="../index.php" class="inicio">Volver al Inicio</a>
