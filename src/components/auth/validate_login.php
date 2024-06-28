<?php
session_start();
ob_start(); // Iniciar el almacenamiento en búfer de salida
include_once("../../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar la consulta para evitar inyección SQL
    $sql = $conn->prepare("SELECT u.idUsuario, tu.nombre AS tipoCuenta FROM Usuario u JOIN TipoUsuarioCAT tu ON u.idTipoUsuario = tu.idTipoUsuario WHERE u.correo = ? AND u.contrasenia = ?");
    $sql->bind_param("ss", $email, $password);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tipoCuenta = $row['tipoCuenta'];

        if ($tipoCuenta === 'Administrador') {
            header("Location: ../admin/destok.html");
            exit();
        } elseif ($tipoCuenta === 'Técnico') {
            header("Location: ../technician/start_tech.html");
            exit();
        } else {
            header("Location: start_usr.html");
            exit();
        }
    } else {
        // Establecer el mensaje de error en la sesión
        $_SESSION['error_message'] = "Correo o contraseña incorrectos";
        header("Location: login.php"); // Redirigir de vuelta a la página de login
        exit();
    }
    
    $sql->close();
}
$conn->close();
ob_end_flush(); // Liberar el almacenamiento en búfer de salida y enviar la salida al navegador
?>
