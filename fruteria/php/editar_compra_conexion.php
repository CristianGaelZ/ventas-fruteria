<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_compra = $_POST['id'];
    $producto_id = $_POST['id_producto'];
    $cantidad_comprada = $_POST['cantidad'];
    $precio_compra = $_POST['precio_compra'];

    // Actualizar la compra
    $query = "UPDATE compras SET id_producto = $producto_id, cantidad = $cantidad_comprada, precio_compra = $precio_compra WHERE id = $id_compra";

    if ($conexion->query($query) === TRUE) {
        echo "<script>
        alert('Compra actualizada correctamente.');
        setTimeout(function() {
            window.location.href = '../php/listar_compras.php'; 
        }, 1000); 
        </script>";

    } else {
        echo "<script>
            alert('Error al actualizar la compra: " . addslashes($conexion->error) . "');
            setTimeout(function() {
                window.location.href = '../php/error_page.php'; // Cambia la URL según sea necesario
            }, 1000); 
        </script>";

    }
}

$conexion->close();
?>