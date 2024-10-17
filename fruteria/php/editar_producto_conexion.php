<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['stock'];

    $query = "UPDATE productos SET nombre = '$nombre', precio = '$precio', stock = '$cantidad' WHERE id = $id";

    if ($conexion->query($query) === TRUE) {
        echo "<script>
            alert('Producto actualizado con éxito.');
            setTimeout(function() {
                window.location.href = '../php/listar_productos.php'; 
            }, 1000); 
        </script>";

    } else {
        echo "<script>
            alert('Error: " . addslashes($conexion->error) . "');
            setTimeout(function() {
                window.location.href = '../php/listar_productos.php'; // Cambia la URL según sea necesario
            }, 1000); 
        </script>";

    }
}
?>