<link rel="stylesheet" href="../css/agregaproductos.css"> <!-- CSS específico de la página -->

<!-- Botón de volver atrás -->
<button onclick="history.back()" class="btn btn-back">Volver Atrás</button>

<!-- Título centrado -->
<h1 class="title">Registrar Productos</h1>

<!-- Formulario para agregar productos -->
<form action="agregar_productos_conexion.php" method="POST" class="form-producto">
  <label for="nombre">Nombre del Producto:</label>
  <input type="text" name="nombre" required>
  <br><br>

  <label for="precio">Precio:</label>
  <input type="number" step="0.01" name="precio" required>
  <br><br>

  <label for="stock">Cantidad:</label>
  <input type="number" name="stock" step="0.01" required>
  <br><br>

  <button type="submit" class="btn">Agregar Producto</button>
</form>

<!-- Enlace para volver al inicio con nuevo diseño -->
<a href="../index.php" class="btn btn-inicio">Volver al Inicio</a>
