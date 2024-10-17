<?php
include '../conexion.php';

date_default_timezone_set('America/Mexico_City');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Asegúrate de que los nombres coincidan
    $producto_id = $_POST['id_producto']; // Cambié esto para que coincida con el formulario
    $cantidad_comprada = $_POST['cantidad'];
    $precio_compra = $_POST['precio_compra']; // Cambié esto para que coincida con el formulario
    $fecha = date('Y-m-d H:i:s');

    // Control de errores de entrada
    if (empty($producto_id) || empty($cantidad_comprada) || empty($precio_compra)) {
        die("Error: Todos los campos son obligatorios.");
    }

    // Registrar la compra
    $query_compra = "INSERT INTO compras (id_producto, cantidad, precio_compra, fecha) 
                     VALUES ($producto_id, $cantidad_comprada, $precio_compra, '$fecha')";

    // Verificar si la consulta se ejecuta correctamente
    if ($conexion->query($query_compra) === TRUE) {
        // Aumentar el inventario del producto
        $query_inventario = "UPDATE productos SET stock = stock + $cantidad_comprada WHERE id = $producto_id";
        
        if ($conexion->query($query_inventario) === TRUE) {
            echo "<script>
                alert('Compra registrada y inventario actualizado.');
                setTimeout(function() {
                    window.location.href = '../php/listar_compras.php'; 
                }, 1000); 
            </script>";

        } else {
            echo "<script>
                alert('Error al actualizar el inventario: " . addslashes($conexion->error) . "');
                setTimeout(function() {
                    window.location.href = '../index.php'; /
                }, 1000); 
            </script>";

        }
    } else {
        // Muestra el error SQL para depuración
        echo "<script>
            alert('Error al registrar la compra: " . addslashes($conexion->error) . "');
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