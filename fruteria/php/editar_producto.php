<link rel="stylesheet" href="../css/agregaproductos.css"> <!-- CSS específico de la página -->

<?php
include '../conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM productos WHERE id = $id";
    $result = $conexion->query($query);
    $producto = $result->fetch_assoc();
}
?>
<button onclick="history.back()" class="btn">Volver Atrás</button>
<form action="editar_producto_conexion.php" method="POST">

<form action="editar_producto_conexion.php" method="POST">
  <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

  <label for="nombre">Nombre del Producto:</label>
  <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>

  <label for="precio">Precio:</label>
  <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required>

  <label for="cantidad">Cantidad:</label>
  <input type="number" name="stock" step="0.01" value="<?php echo $producto['stock']; ?>" required>
  
  <button type="submit" >Actualizar Producto</button>
</form>

<a href="../index.php" class="btn">Volver al Inicio</a>