<link rel="stylesheet" href="../css/registrarventas.css"> 
<?php
include '../conexion.php';
?>
<link rel="stylesheet" href="../css/estilo.css"> 
<button onclick="history.back()" class="btn">Volver Atrás</button>

<form action="registrar_ventas_conexion.php" method="POST">
  <label for="producto">Producto:</label>
  <select name="id_producto" id="productoSelect" required>
    <?php
    // Modificamos la consulta para mostrar solo productos con stock mayor a 0
    $result = $conexion->query("SELECT * FROM productos WHERE stock > 0");
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
  <input type="number" id="cantidadInput" step="0.01" name="cantidad" required>

  <label for="precio_compra">Precio:</label>
  <input type="number" step="0.01" name="precio_compra" id="precioCompraInput" required readonly>

  <label for="total">Total:</label>
  <input type="number" step="0.01" name="total" id="totalInput" required readonly>

  <button type="submit">Registrar Venta</button>
</form>

<a href="../index.php" class="btn">Volver al Inicio</a>

<script>
  const productoSelect = document.getElementById('productoSelect');
  const cantidadInput = document.getElementById('cantidadInput');
  const precioCompraInput = document.getElementById('precioCompraInput');
  const totalInput = document.getElementById('totalInput');

  // Función para actualizar el precio y el total
  function actualizarTotal() {
      const precio = productoSelect.options[productoSelect.selectedIndex].dataset.precio;
      const cantidad = cantidadInput.value;
      const total = precio * cantidad;

      // Actualizar los campos de precio y total
      precioCompraInput.value = precio;
      totalInput.value = total.toFixed(2); // Formatear a 2 decimales
  }

  // Eventos
  productoSelect.addEventListener('change', actualizarTotal);
  cantidadInput.addEventListener('input', actualizarTotal);
</script>