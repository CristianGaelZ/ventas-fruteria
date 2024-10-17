<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_venta = $_POST['id'];
    $producto_id = $_POST['id_producto'];
    $cantidad_vendida = $_POST['cantidad'];
    $total = $_POST['total'];

    // Actualizar la venta
    $query = "UPDATE ventas SET id_producto = $producto_id, cantidad = $cantidad_vendida, total = $total WHERE id = $id_venta";

    if ($conexion->query($query) === TRUE) {
        echo "<script>
            alert('Venta actualizada correctamente.');
            setTimeout(function() {
                window.location.href = '../php/listar_ventas.php'; 
            }, 1000); 
        </script>";

    } else {
        echo "<script>
            alert('Error al actualizar la venta: " . addslashes($conexion->error) . "');
            setTimeout(function() {
                window.location.href = '../index.php'; // Cambia la URL según sea necesario
            }, 1000); 
        </script>";

    }
}

$conexion->close();
?>