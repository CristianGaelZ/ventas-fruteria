<link rel="stylesheet" href="../css/listarcompras.css"> 

<?php
include '../conexion.php';

// Inicializa la variable de búsqueda
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Obtener total de ventas
$query_ventas = "
    SELECT SUM(total) AS total_ventas
    FROM ventas
";
$result_ventas = $conexion->query($query_ventas);
$total_ventas = $result_ventas->fetch_assoc()['total_ventas'] ?? 0;

// Obtener total de compras
$query_compras = "
    SELECT SUM(precio_compra * cantidad) AS total_compras
    FROM compras";
$result_compras = $conexion->query($query_compras);
$total_compras = $result_compras->fetch_assoc()['total_compras'] ?? 0;

// Calcular ganancia
$ganancia_total = $total_ventas - $total_compras;

// Consulta para obtener las compras
$query = "
    SELECT compras.id, productos.nombre AS nombre_producto, compras.cantidad, compras.precio_compra AS total, compras.fecha
    FROM compras
    JOIN productos ON compras.id_producto = productos.id
    WHERE 
        productos.nombre LIKE '%$busqueda%'
    ORDER BY compras.id ASC";

$result = $conexion->query($query);
if ($result->num_rows > 0) {
    echo '<button onclick="history.back()" class="btn">Volver Atrás</button>';
    ?>
    <form method="GET" action="" style="display: inline;">
        <input type="text" name="busqueda" placeholder="Buscar compra" value="<?php echo htmlspecialchars($busqueda); ?>">
        <button type="submit" class="btn1" >Buscar</button>
    </form>  

    <?php
    echo "<table border='1'>
            <tr>
                <th>ID Compra</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio de Compra</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre_producto']}</td>
                <td>{$row['cantidad']}</td>
                <td>{$row['total']}</td>
                <td>{$row['fecha']}</td>
                <td>
                    <form action='editar_compra.php' method='GET' style='display:inline-block;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button type='submit'>Editar</button>
                    </form>
                 <button onclick='imprimirFila({$row['id']}, \"{$row['nombre_producto']}\", {$row['cantidad']}, {$row['total']}, \"{$row['fecha']}\")'>
                        Imprimir
                    </button>
                </td>
              </tr>";
    }
    echo "</table>";

    // Tabla para los totales
    echo "<table class='table-totales'>
            <tr>
                <th>Total Gastado en Compras</th>
                <th>Total Ganado en Ventas</th>
                <th>Ganancia Total</th>
            </tr>
            <tr>
                <td>$" . number_format($total_compras, 2) . "</td>
                <td>$" . number_format($total_ventas, 2) . "</td>
                <td>$" . number_format($ganancia_total, 2) . "</td>
            </tr>
          </table>";

    // Botón "Volver al Inicio" debajo de las tablas
    echo '<a href="../index.php" class="btn-1">Volver al Inicio</a>';
} else {
    echo "No hay compras registradas.";
}

$conexion->close();

?>
<script>
// Función para imprimir los datos de una fila
function imprimirFila(id, producto, cantidad, total, fecha) {
    const contenido = `
        <h1>Información de la Compra</h1>
        <p><strong>ID Compra:</strong> ${id}</p>
        <p><strong>Producto:</strong> ${producto}</p>
        <p><strong>Cantidad:</strong> ${cantidad}</p>
        <p><strong>Precio de Compra:</strong> $${total.toFixed(2)}</p>
        <p><strong>Fecha:</strong> ${fecha}</p>
    `;

    const ventana = window.open('', '_blank');
    ventana.document.write('<html><head><title>Imprimir Compra</title></head><body>');
    ventana.document.write(contenido);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
    ventana.print();
    ventana.close();
}
</script>