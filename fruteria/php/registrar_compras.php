<link rel="stylesheet" href="../css/registracompras.css"> 
<?php
include '../conexion.php';
?>
<button onclick="history.back()" class="btn1">Volver Atrás</button>

<form action="registrar_compras_conexion.php" method="POST">
  <label for="producto">Producto:</label>
  <select name="id_producto" required>
    <?php
    $result = $conexion->query("SELECT * FROM productos");
    if ($result) {
        // Iterar sobre los resultados y crear opciones
        while ($producto = $result->fetch_assoc()) {
          echo "<option value='{$producto['id']}' data-precio='{$producto['precio']}'>{$producto['nombre']} - Stock: {$producto['stock']}</option>";
        }
    } else {
        echo "<option disabled>No hay productos disponibles</option>";
    }
    ?>
  </select>

  <label for="cantidad">Cantidad:</label>
  <input type="number" name="cantidad" step="0.01" required>

  <label for="precio_compra">Precio de Compra:</label>
  <input type="number" step="0.01" name="precio_compra">
<button type="submit">Registrar Compra</button>
</form>
<a href="../index.php" class="btn">Volver al Inicio</a>
