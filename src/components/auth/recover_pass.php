<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recuperar Cuenta</title>
    <link rel="stylesheet" href="styles/styles3.css" />
    <link rel="stylesheet" href="styles/styles.css" />
</head>
<body>
    <nav class="navbar">
        <div class="logo_container">
            <img src="../../img/logo_A.png" alt="Logo" class="logo" />
            <span class="business-name">Plumber++</span>
        </div>
        <ul>
            <li><a href="../../index.php">Principal</a></li>
            <li><a href="login.php">Iniciar Sesión</a></li>
            <li><a href="../../store.php">Catálogo</a></li>
            <li><a href="">Conócenos</a></li>
            <li><a href="">Únete</a></li>
            <li><a href="../../contact.php">Contáctanos</a></li>
        </ul>
    </nav>
    <div class="sidebar"></div>

    <div class="card">
        <h1>Recuperar tu cuenta</h1>
        <p>Ingresa el correo electrónico que usaste para recuperar tu cuenta</p>
        <form id="recover-form" method="post" action="">
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Correo electrónico"
                required
            />
            <button type="submit" name="recover">Recuperar Cuenta</button>
        </form>
    </div>

    <?php
    include_once("../../config/db.php");

    if (isset($_POST['recover'])) {
        $email = $_POST['email'];

        // Verificar si el correo electrónico existe en la base de datos
        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Generar un token único
            $token = bin2hex(random_bytes(50));

            // Guardar el token en la base de datos con una expiración
            $sql = "UPDATE usuarios SET token='$token', token_expire=DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email='$email'";
            if ($conn->query($sql) === TRUE) {
                // Enviar el correo electrónico
                $to = $email;
                $subject = "Recuperar Cuenta";
                $message = "Para recuperar tu cuenta, haz clic en el siguiente enlace: ";
                $message .= "http://tu_dominio.com/reset_password.php?token=$token";
                $headers = "From: no-reply@tu_dominio.com\r\n";

                if (mail($to, $subject, $message, $headers)) {
                    echo "<p>Se ha enviado un correo electrónico con instrucciones para recuperar tu cuenta.</p>";
                } else {
                    echo "<p>Error al enviar el correo electrónico.</p>";
                }
            } else {
                echo "<p>Error al actualizar el token.</p>";
            }
        } else {
            echo "<p>No se encontró una cuenta con ese correo electrónico.</p>";
        }

        $conn->close();
    }
    ?>
</body>
</html>
