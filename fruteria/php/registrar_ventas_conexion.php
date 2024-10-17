<?php
include '../conexion.php';

date_default_timezone_set('America/Mexico_City');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Asegúrate de que los nombres coincidan
    $producto_id = $_POST['id_producto'];
    $cantidad_vendida = $_POST['cantidad'];
    $total = $_POST['total'];
    $fecha = date('Y-m-d H:i:s');

    // Control de errores de entrada
    if (empty($producto_id) || empty($cantidad_vendida) || empty($total)) {
        die("Error: Todos los campos son obligatorios.");
    }

    // Verificar el stock del producto
    $query_stock = "SELECT stock FROM productos WHERE id = $producto_id";
    $resultado_stock = $conexion->query($query_stock);
    $producto = $resultado_stock->fetch_assoc();

    if ($producto['stock'] < $cantidad_vendida) {
        die("Error: No hay suficiente stock para realizar esta venta.");
    }

    // Registrar la venta
    $query_venta = "INSERT INTO ventas (id_producto, cantidad, total, fecha) 
                    VALUES ($producto_id, $cantidad_vendida, $total, '$fecha')";

    // Verificar si la consulta se ejecuta correctamente
    if ($conexion->query($query_venta) === TRUE) {
        // Reducir el inventario del producto
        $query_inventario = "UPDATE productos SET stock = stock - $cantidad_vendida WHERE id = $producto_id";
        
        if ($conexion->query($query_inventario) === TRUE) {
            echo "<script>
                alert('Venta registrada y inventario actualizado.');
                setTimeout(function() {
                    window.location.href = '../php/listar_ventas.php';
                }, 1000); 
            </script>";

        } else {
            echo "<script>
                alert('Error al actualizar el inventario: " . addslashes($conexion->error) . "');
                setTimeout(function() {
                    window.location.href = '../index.php'; 
                }, 1000); 
            </script>";

        }
    } else {
        // Muestra el error SQL para depuración
        echo "<script>
                alert('Error al registrar la venta: " . addslashes($conexion->error) . "');
                setTimeout(function() {
                    window.location.href = '../php/registrar_compras.php'; 
                }, 1000); 
            </script>";

    }
} else {
    echo "<script>
        alert('Método de solicitud no permitido.');
        setTimeout(function() {
            window.location.href = '../php/registrar_compras.php'; 
        }, 1000); 
    </script>";

}
?>