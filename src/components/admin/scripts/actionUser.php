<?php
header('Content-Type: application/json');

include '../../../config/db.php';

// Obtener el método HTTP
$method = $_SERVER['REQUEST_METHOD'];

$response = [];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Obtener un solo usuario por ID
            $id = $_GET['id'];
            $sql = "SELECT id, nombre, correo, rol FROM usuarios WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $response = $user;
            $stmt->close();
        } else {
            // Obtener todos los usuarios
            $sql = "SELECT id, nombre, correo, rol FROM usuarios";
            $result = $conn->query($sql);
            $usuarios = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $usuarios[] = $row;
                }
            }
            $response = $usuarios;
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['id'])) {
            // Actualizar usuario existente
            $id = $data['id'];
            $nombre = $data['nombre'];
            $correo = $data['correo'];
            $rol = $data['rol'];
            $stmt = $conn->prepare("UPDATE usuarios SET nombre=?, correo=?, rol=? WHERE id=?");
            $stmt->bind_param("sssi", $nombre, $correo, $rol, $id);
        } else {
            // Insertar nuevo usuario
            $nombre = $data['nombre'];
            $correo = $data['correo'];
            $rol = $data['rol'];
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, rol) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre, $correo, $rol);
        }
        if ($stmt->execute()) {
            $response = ['success' => true];
        } else {
            $response = ['success' => false, 'error' => $stmt->error];
        }
        $stmt->close();
        break;
    case 'DELETE':
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'];
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $response = ['success' => true];
        } else {
            $response = ['success' => false, 'error' => $stmt->error];
        }
        $stmt->close();
        break;
    default:
        $response = ['success' => false, 'error' => 'Método HTTP no soportado'];
        break;
}

$conn->close();
echo json_encode($response);
?>
