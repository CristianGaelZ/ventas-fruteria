<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM productos WHERE id = $id";

    if ($conexion->query($query) === TRUE) {
        echo "<script>
                alert('Producto eliminado con éxito.');
                setTimeout(function() {
                    window.location.href = '../php/listar_productos.php';
                }, 1000); 
            </script>";
    } else {
        echo "<script>
                alert('Error al eliminar producto: " . addslashes($conexion->error) . "');
                setTimeout(function() {
                    window.location.href = '../php/listar_productos.php';
                }, 1000); 
            </script>";


    }
}
?>