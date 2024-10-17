<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM usuarios WHERE id = $id";

    if ($conexion->query($query) === TRUE) {
        echo "<script>
                alert('Usuario eliminado con éxito.');
                setTimeout(function() {
                    window.location.href = '../php/listar_usuarios.php';
                }, 1000); 
            </script>";
    } else {
        echo "<script>
                alert('Error al eliminar usuario: " . addslashes($conexion->error) . "');
                setTimeout(function() {
                    window.location.href = '../php/listar_usuarios.php';
                }, 1000); 
            </script>";

    }
}
?>