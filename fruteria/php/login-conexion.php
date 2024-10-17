<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Consulta para obtener el usuario con ese email
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        
        // Verificar si la contraseña es correcta
        if (password_verify($password, $usuario['password'])) {
            echo "<script>alert('Inicio de sesión exitoso. ¡Bienvenido " . $usuario['nombre'] . "!');
            setTimeout(function() {
                window.location.href = '../index.php';
            }, 500); 
            </script>";
            exit();
        } else {
            echo "<script>
                alert('Contraseña incorrecta.');
                setTimeout(function() {
                    window.location.href = '../php/login.php';
                }, 1000); 
            </script>";

        }
    } else {
        echo "<script>
                alert('No existe ningún usuario con ese email.');
                setTimeout(function() {
                    window.location.href = '../php/login.php';
                }, 1000); 
            </script>";
    }
}
?>