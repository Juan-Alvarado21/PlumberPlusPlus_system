<?php
$servername = "proyectoweb.clsyq2imcoao.us-east-1.rds.amazonaws.com";  // Cambia esto por tu nombre de servidor
$username = "admi";    // Cambia esto por tu nombre de usuario de la base de datos
$password = "Tilines11$"; // Cambia esto por tu contraseña de la base de datos
$dbname = "SystemPlumber"; // Cambia esto por el nombre de tu base de datos

    // Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
