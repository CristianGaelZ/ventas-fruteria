<link rel='stylesheet' type='text/css' href='../css/nuevousuario.css'>

<button onclick="history.back()" class="btn">Volver Atrás</button>
<link rel="stylesheet" href="../css/estilo.css"> 

<form action="crear_usuario_conexion.php" method="POST">
  <label for="nombre">Nombre:</label>
  <input type="text" name="nombre" required>

  <label for="email">Correo Electrónico:</label>
  <input type="email" name="email" required>

  <label for="password">Contraseña:</label>
  <input type="password" name="password" required>

  <label for="rol">Rol:</label>
  <select name="rol" required>
    <option value="administrador">Administrador</option>
    <option value="vendedor">Vendedor</option>
  </select>

  <button type="submit">Crear Usuario</button>
</form>  

<a href="../index.php" class="button">Volver al Inicio</a>