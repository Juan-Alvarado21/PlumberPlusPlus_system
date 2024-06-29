<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar Sesión</title>
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
            <li><a href="../../store.html">Catálogo</a></li>
            <li><a href="#">Conócenos</a></li>
            <li><a href="#">Únete</a></li>
            <li><a href="../../contact.html">Contáctanos</a></li>
        </ul>
    </nav>

    <div class="welcome-container">
        <h1>Bienvenido</h1>
        <p>Inicia sesión</p>
    </div>
    <div class="login-container">
        <div class="tabs">
            <button class="tab-button active" onclick="showForm('user')">Usuario</button>
            <button class="tab-button" onclick="showForm('admin')">Admin</button>
            <button class="tab-button" onclick="showForm('tech')">Técnico</button>
        </div>

        <div id="user" class="form-container active">
            <form id="user-form" method="POST" action="validate_login.php" onsubmit="return validateForm('user-form');">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Por favor, ingresa un correo electrónico válido." />
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required pattern=".{6,}" title="La contraseña debe tener al menos 6 caracteres." />
                <input type="hidden" name="tipoCuenta" value="Usuario">
                <input type="submit" value="Iniciar Sesión" />
            </form>
            <div class="recover-password">
                Olvidaste tu contraseña?
                <a href="recover_pass.html">Recuperar cuenta</a>
            </div>
            <div class="create-account">
                No tienes una cuenta? <a href="create_account.php">Crear cuenta</a>
            </div>
        </div>

        <div id="admin" class="form-container">
            <form id="admin-form" method="POST" action="validate_login.php" onsubmit="return validateForm('admin-form');">
                <label for="admin-email">Correo Electrónico</label>
                <input type="email" id="admin-email" name="email" placeholder="Ingresa tu correo electrónico" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Por favor, ingresa un correo electrónico válido." />
                <label for="admin-password">Contraseña</label>
                <input type="password" id="admin-password" name="password" placeholder="Ingresa tu contraseña" required pattern=".{6,}" title="La contraseña debe tener al menos 6 caracteres." />
                <input type="hidden" name="tipoCuenta" value="Administrador">
                <input type="submit" value="Iniciar Sesión" />
            </form>
            <div class="recover-password">
                Olvidaste tu contraseña?
                <a href="recover_pass.html">Recuperar cuenta</a>
            </div>
            <div class="create-account">
                No tienes una cuenta? <a href="create_account.php">Crear cuenta</a>
            </div>
        </div>

        <div id="tech" class="form-container">
            <form id="tech-form" method="POST" action="validate_login.php" onsubmit="return validateForm('tech-form');">
                <label for="tech-email">Correo Electrónico</label>
                <input type="email" id="tech-email" name="email" placeholder="Ingresa tu correo electrónico" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Por favor, ingresa un correo electrónico válido." />
                <label for="tech-password">Contraseña</label>
                <input type="password" id="tech-password" name="password" placeholder="Ingresa tu contraseña" required pattern=".{6,}" title="La contraseña debe tener al menos 6 caracteres." />
                <input type="hidden" name="tipoCuenta" value="Técnico">
                <input type="submit" value="Iniciar Sesión" />
            </form>
            <div class="recover-password">
                Olvidaste tu contraseña?
                <a href="recover_pass.html">Recuperar cuenta</a>
            </div>
            <div class="create-account">
                No tienes una cuenta? <a href="create_account.php">Crear cuenta</a>
            </div>
        </div>
    </div>

    <div id="success-alert" class="success-alert">
        Iniciaste sesión correctamente.
    </div>

    <div id="error-alert" class="error-alert" style="display: none;">
        Correo o contraseña incorrectos.
    </div>

    <script>
        function showForm(formId) {
            const forms = document.querySelectorAll(".form-container");
            forms.forEach((form) => form.classList.remove("active"));
            document.getElementById(formId).classList.add("active");

            const buttons = document.querySelectorAll(".tab-button");
            buttons.forEach((button) => button.classList.remove("active"));
            document.querySelector(`[onclick="showForm('${formId}')"]`).classList.add("active");
        }

        function validateForm(formId) {
            const form = document.getElementById(formId);
            if (form.checkValidity()) {
                return true;
            } else {
                alert("Por favor, completa todos los campos correctamente.");
                return false;
            }
        }

        // Mostrar el mensaje de error si existe en la sesión
        <?php if (isset($_SESSION['error_message'])): ?>
            document.getElementById("error-alert").style.display = "block";
            setTimeout(() => {
                document.getElementById("error-alert").style.display = "none";
            }, 3000);
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>
    </script>
</body>
</html>