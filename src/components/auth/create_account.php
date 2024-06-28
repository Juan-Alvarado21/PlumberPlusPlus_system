<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crea tu cuenta</title>
    <link rel="stylesheet" href="styles/styles2.css" />
</head>
<body>
    <nav class="navbar">
        <div class="logo_container">
            <img src="../../img/logo_A.png" alt="Logo" class="logo" />
            <span class="business-name">Plumber++</span>
        </div>
        <ul>
            <li><a href="../../index.html">Principal</a></li>
            <li><a href="login.php">Iniciar Sesión</a></li>
            <li><a href="../../store.html">Catálogo</a></li>
            <li><a href="">Conócenos</a></li>
            <li class="active"><a href="">Únete</a></li>
            <li><a href="../../contact.html">Contáctanos</a></li>
        </ul>
    </nav>
    <div class="welcome-container">
        <h1>Bienvenido</h1>
        <p>Crea tu cuenta</p>
    </div>

    <div class="signup-container">
        <p>Selecciona el tipo de cuenta:</p>
        <button id="user-button" class="option-button" onclick="openModal('Usuario')">Usuario</button>
        <button id="admin-button" class="option-button" onclick="openModal('Administrador')">Administrador</button>
        <button id="technician-button" class="option-button" onclick="openModal('Técnico')">Técnico</button>
    </div>

    <img src="../../img/signup.gif" alt="Signup" class="signup-image" />

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal()">&times;</span>
            <h2>Formulario de Registro</h2>
            <form id="modal-form" action="register.php" method="post">
                <input type="hidden" name="tipoCuenta" id="tipoCuenta" value="">
                <div id="form-fields">
                    <!-- Aquí se agregarán dinámicamente los campos del formulario -->
                </div>
                <button type="submit">Crear Cuenta</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(tipoCuenta) {
            const modal = document.getElementById("modal");
            const formFields = document.getElementById("form-fields");
            const tipoCuentaInput = document.getElementById("tipoCuenta");

            modal.style.display = "block";
            tipoCuentaInput.value = tipoCuenta;

            let additionalFields = "";
            let welcomeMessage = "";

            if (tipoCuenta === "Administrador") {
                welcomeMessage = "--Bienvenido Administrador";
            } else if (tipoCuenta === "Técnico") {
                welcomeMessage = "--Bienvenido Técnico";
            } else if (tipoCuenta === "Usuario") {
                welcomeMessage = "--Bienvenido Usuario";
            }

            formFields.innerHTML = `
                <h2>${welcomeMessage}</h2>
                <label for="nombres">Nombres:</label>
                <input type="text" id="nombres" name="nombres" placeholder="Ingrese sus nombres" required>
                <label for="primer-apellido">Primer apellido:</label>
                <input type="text" id="primer-apellido" name="primer-apellido" placeholder="Ingrese su primer apellido" required>
                <label for="segundo-apellido">Segundo apellido:</label>
                <input type="text" id="segundo-apellido" name="segundo-apellido" placeholder="Ingrese su segundo apellido" required>
                <label for="fecha-nacimiento">Fecha de nacimiento:</label>
                <input type="date" id="fecha-nacimiento" name="fecha-nacimiento" required>
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required>
                ${additionalFields}
            `;
        }

        function closeModal() {
            const modal = document.getElementById("modal");
            modal.style.display = "none";
        }

        window.addEventListener("click", (event) => {
            const modal = document.getElementById("modal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    </script>
</body>
</html>
