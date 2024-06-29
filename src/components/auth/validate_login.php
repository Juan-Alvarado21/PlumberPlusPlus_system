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

	$select = $conn->prepare("select * from Usuario where correo=?");
	$select->bind_param("s",$email);
	$select->execute();
	$arr = $select->get_result()->fetch_all(MYSQLI_ASSOC);
	$select->close();

	if(sizeof($arr)>=1) {
		$_SESSION['usuario'] = $arr[0]['usuario'];
		$_SESSION['tipo'] = $arr[0]['tipoUsuario'];
		$hashedPassword = $arr[0]['contrasenia'];
		if (password_verify($password, $hashedPassword)) {
			// Existe el usuario con la contrasenia
			$tipo = $arr[0]['idTipoUsuario'];
			switch($tipo) {
			case 1:
                header("Location: ../admin/destok.html");
				break;
			case 2:
                header("Location: ../technician/start_tech.html");
				break;
			default:
                header("Location: start_usr.php");
				break;
				
			}
		} else {
			header("Location: login.php");
		}
	} else {
		// Correo no fue encontrado
		header("Location: login.php");
	}


    // Preparar la consulta para evitar inyección SQL
//    $sql = $conn->prepare("SELECT u.idUsuario, u.contrasenia, tu.nombre AS tipoCuenta FROM Usuario u JOIN TipoUsuarioCAT tu ON u.idTipoUsuario = tu.idTipoUsuario WHERE u.correo = ?");
//    if ($sql === false) {
//        die("Error preparando la consulta: " . $conn->error);
//    }
//
//    $sql->bind_param("s", $email);
//    if ($sql->execute() === false) {
//        die("Error ejecutando la consulta: " . $sql->error);
//    }
//
//    $result = $sql->get_result();
//    if ($result === false) {
//        die("Error obteniendo el resultado: " . $sql->error);
//    }
//
//    if ($result->num_rows > 0) {
//        $row = $result->fetch_assoc();
//		$hashedPassword = $row['contrasenia'];
//		echo $row['idTipoUsuario'];
//        $tipoCuenta = $row['idTipoUsuario'];
//
//        if (password_verify($password, $hashedPassword)) {
//            $_SESSION['tipoCuenta'] = $tipoCuenta; // Guardar el tipo de cuenta en la sesión
//            if ($tipoCuenta === 1) {
//                header("Location: ../admin/destok.html");
//                exit();
//            } elseif ($tipoCuenta === 2) {
//                header("Location: ../technician/start_tech.html");
//                exit();
//            } else {
//                //header("Location: start_usr.php");
//                //exit();
//            }
//        } else {
//            // Contraseña incorrecta
//            $_SESSION['error_message'] = "Correo o contraseña incorrectos";
//            header("Location: login.php");
//            exit();
//        }
//    } else {
//        // Usuario no encontrado
//        $_SESSION['error_message'] = "Correo o contraseña incorrectos";
//        header("Location: login.php");
//        exit();
//    }
//
	//    $sql->close();

}

$conn->close();
ob_end_flush();
?>
