<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $rol = $_POST['rol'];

    // Verificar si el email ya existe
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        echo "<script>
            alert('El correo electrónico ya está registrado.');
            setTimeout(function() {
                window.location.href = '../php/regcrear_usuario.php'; 
            }, 1000); 
        </script>";

    } else {
        // Insertar el nuevo usuario
        $query = "INSERT INTO usuarios (nombre, email, password, rol) VALUES ('$nombre', '$email', '$password', '$rol')";
        if ($conexion->query($query) === TRUE) {
            echo "<script>
                alert('Usuario creado con éxito.');
                setTimeout(function() {
                    window.location.href = '../index.php'; 
                }, 1000); 
            </script>";

        } else {
            echo "<script>
                alert('Error: " . addslashes($conexion->error) . "');
                setTimeout(function() {
                    window.location.href = '../php/crear_usuario.php'; 
                }, 1000); 
            </script>";

        }
    }
}
?>