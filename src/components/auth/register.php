<?php
include_once("../../config/bd.php"); 

// Verificar que la conexión se estableció correctamente
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar que se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoCuenta = $_POST['tipoCuenta'];
    $nombres = $_POST['nombres'];
    $primerApellido = $_POST['primer-apellido'];
    $segundoApellido = $_POST['segundo-apellido'];
    $fechaNacimiento = $_POST['fecha-nacimiento'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Determinar el nombre correspondiente al tipo de cuenta
    $nombreTipoCuenta = '';
    if ($tipoCuenta === 'Usuario') {
        $nombreTipoCuenta = 'Usuario';
    } elseif ($tipoCuenta === 'Administrador') {
        $nombreTipoCuenta = 'Administrador';
    } elseif ($tipoCuenta === 'Técnico') {
        $nombreTipoCuenta = 'Técnico';
    } else {
        die("Tipo de cuenta no válido");
    }

    // Insertar en TipoUsuarioCAT
    $sql_tipo_usuario = $conn->prepare("INSERT INTO TipoUsuarioCAT (nombre) VALUES (?)");
    $sql_tipo_usuario->bind_param("s", $nombreTipoCuenta);

    if ($sql_tipo_usuario->execute() === TRUE) {
        $idTipoUsuario = $conn->insert_id; 

        // Crear la consulta de inserción en la tabla Usuario
        $sql_usuario = $conn->prepare("INSERT INTO Usuario (idTipoUsuario, correo, contrasenia, nombres, primerApellido, segundoApellido, fechaNacimiento) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql_usuario->bind_param("issssss", $idTipoUsuario, $email, $password, $nombres, $primerApellido, $segundoApellido, $fechaNacimiento);

        if ($sql_usuario->execute() === TRUE) {
            // Redirigir al login.html si el registro es exitoso
            header("Location: login.html");
            exit();
        } else {
            echo "Error al insertar en Usuario: " . $sql_usuario->error;
        }
        $sql_usuario->close();
    } else {
        echo "Error al insertar en TipoUsuarioCAT: " . $sql_tipo_usuario->error;
    }
    $sql_tipo_usuario->close();
}

$conn->close();
?>
