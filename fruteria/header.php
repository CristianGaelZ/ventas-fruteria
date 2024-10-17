<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    // Si no ha iniciado sesión, redirigir al formulario de login
    header('Location: login.php');
    exit();
}
?>