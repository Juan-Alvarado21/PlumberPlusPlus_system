<?php
session_start();
ob_start();
include_once("../../config/db.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar la consulta para evitar inyección SQL
    $sql = $conn->prepare("SELECT u.idUsuario, u.contrasenia, tu.nombre AS tipoCuenta FROM Usuario u JOIN TipoUsuarioCAT tu ON u.idTipoUsuario = tu.idTipoUsuario WHERE u.correo = ?");
    if ($sql === false) {
        die("Error preparando la consulta: " . $conn->error);
    }

    $sql->bind_param("s", $email);
    if ($sql->execute() === false) {
        die("Error ejecutando la consulta: " . $sql->error);
    }

    $result = $sql->get_result();
    if ($result === false) {
        die("Error obteniendo el resultado: " . $sql->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['contrasenia'];
        $tipoCuenta = $row['tipoCuenta'];

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['tipoCuenta'] = $tipoCuenta; // Guardar el tipo de cuenta en la sesión
            if ($tipoCuenta === 'Administrador') {
                header("Location: ../admin/destok.html");
                exit();
            } elseif ($tipoCuenta === 'Técnico') {
                header("Location: ../technician/start_tech.html");
                exit();
            } else {
                header("Location: start_usr.php");
                exit();
            }
        } else {
            // Contraseña incorrecta
            $_SESSION['error_message'] = "Correo o contraseña incorrectos";
            header("Location: login.php");
            exit();
        }
    } else {
        // Usuario no encontrado
        $_SESSION['error_message'] = "Correo o contraseña incorrectos";
        header("Location: login.php");
        exit();
    }

    $sql->close();
}

$conn->close();
ob_end_flush();
?>
