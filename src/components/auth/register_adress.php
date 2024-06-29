<?php
include_once("../../config/db.php");

// Verificar que la conexión se estableció correctamente
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar que se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $calle = $_POST['calle'];
    $entidad = $_POST['entidad'];
    $codigoPostal = $_POST['codigo_postal'];
    $numExterior = $_POST['num_exterior'];
    $numInterior = $_POST['num_interior'] ? $_POST['num_interior'] : null;
    $referencias = $_POST['referencias'];

    // Validar que el código postal existe en la tabla codigoPostalCAT
    $sql_check_cp = $conn->prepare("SELECT idCodigoPostal FROM codigoPostalCAT WHERE codigoPostal = ?");
    if (!$sql_check_cp) {
        die("Error preparando la consulta: " . $conn->error);
    }
    $sql_check_cp->bind_param("i", $codigoPostal);
    $sql_check_cp->execute();
    $result_check_cp = $sql_check_cp->get_result();
    if ($result_check_cp->num_rows > 0) {
        $row = $result_check_cp->fetch_assoc();
        $idCodigoPostal = $row['idCodigoPostal'];
    } else {
        echo "Código postal no encontrado.";
        exit();
    }
    $sql_check_cp->close();

    // Insertar en la tabla Direccion
    $sql_direccion = $conn->prepare("INSERT INTO Direccion (idCodigoPostal, calle, entidadFederativa, noExt, noInt, referencias) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$sql_direccion) {
        die("Error preparando la consulta: " . $conn->error);
    }
    $sql_direccion->bind_param("isssis", $idCodigoPostal, $calle, $entidad, $numExterior, $numInterior, $referencias);

    if ($sql_direccion->execute() === TRUE) {
        echo "Dirección registrada exitosamente.";
        // exit();
    } else {
        echo "Error al insertar en Direccion: " . $sql_direccion->error;
    }
    $sql_direccion->close();
}

$conn->close();
?>
