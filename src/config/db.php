<?php
$servername = "localhost";
$username = "juan";
$password = "sp_penetreitor"; // Asegúrate de usar tu contraseña real
$dbname = "SystemPlumberBD"; // Asegúrate de que este nombre sea correcto

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "db.php included successfully and connected to database.";
?>
