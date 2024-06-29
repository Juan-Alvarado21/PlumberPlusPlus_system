<?php
include_once("../../config/db.php");

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

    // Validar que el correo electrónico no esté ya registrado
    $sql_check_email = $conn->prepare("SELECT idUsuario FROM Usuario WHERE correo = ?");
    if (!$sql_check_email) {
        die("Error preparando la consulta: " . $conn->error);
    }
    $sql_check_email->bind_param("s", $email);
    $sql_check_email->execute();
    $result_check_email = $sql_check_email->get_result();
    if ($result_check_email->num_rows > 0) {
        echo "El correo electrónico ya está registrado.";
        exit();
    }
    $sql_check_email->close();

    // Validar la contraseña
    if (strlen($password) < 6) {
        echo "La contraseña debe tener al menos 6 caracteres.";
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Cifrar la contraseña

    // Asignar el idTipoUsuario basado en el tipo de cuenta
    switch ($tipoCuenta) {
        case 'Administrador':
            $idTipoUsuario = 1;
            break;
        case 'Técnico':
            $idTipoUsuario = 2;
            break;
        case 'Usuario':
            $idTipoUsuario = 3;
            break;
        default:
            die("Tipo de cuenta no válido");
    }

    // Crear la consulta de inserción en la tabla Usuario
    $sql_usuario = $conn->prepare("INSERT INTO Usuario (idTipoUsuario, correo, contrasenia, nombres, primerApellido, segundoApellido, fechaNacimiento) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$sql_usuario) {
        die("Error preparando la consulta: " . $conn->error);
    }
    $sql_usuario->bind_param("issssss", $idTipoUsuario, $email, $hashedPassword, $nombres, $primerApellido, $segundoApellido, $fechaNacimiento);

    if ($sql_usuario->execute() === TRUE) {
        //echo "Usuario registrado exitosamente.<br>";
		// Redirigir al login.php si el registro es exitoso
        header("Location: login.php");
        exit();
    } else {
        echo "Error al insertar en Usuario: " . $sql_usuario->error;
    }
    $sql_usuario->close();
}

$conn->close();
?>
