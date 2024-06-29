<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Página de Inicio - Plumber++</title>
    <link rel="stylesheet" href="styles/styles6.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="logo_container" onclick="toggleSidebar()">
        <span>Ver Opciones</span>
        <img src="../../img/list.jpg" alt="Logo" class="logo" />
      </div>
      <ul>
        <li><a href="../../index.php">Principal</a></li>
        <li><a href="../../store.php">Catálogo</a></li>
        <li><a href="">Conócenos</a></li>
        <li><a href="">Únete</a></li>
        <li><a href="../../contact.php">Contáctanos</a></li>
      </ul>
      <div class="user-info-container">
        <div class="user-info" id="user-info" onclick="toggleDropdown()">
          <img src="../../img/user_icon.png" alt="user" class="user-icon" />
          <span class="user-name">Usuario</span>
          <i class="dropdown-icon">▼</i>
        </div>
        <div class="dropdown-menu" id="dropdown-menu">
          <img src="../../img/dropmenu.png" alt="user" class="user-icon" />
          <a href="#">Perfil</a>
          <a href="#">Configuración</a>
          <a href="login.html">Cerrar Sesión</a>
        </div>
      </div>
    </nav>
    <main>
      <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
          <img
            src="../../img/logo_A.png"
            alt="Logo"
            class="sidebar-logo"
            onclick="toggleSidebar()"
          />
        </div>
        <ul>
          <li><a href="#">Mi Cuenta</a></li>
          <li><a href="#">Configuración</a></li>
          <li><a href="#">Historial de Pedidos</a></li>
          <li><a href="#">Métodos de Pago</a></li>
          <li><a href="#">Direcciones</a></li>
          <li><a href="#">Cerrar Sesión</a></li>
        </ul>
      </aside>
      <section class="content">
        <div class="welcome-container">
          <h1>¡Bienvenido, Usuario!</h1>
          <p>
            Esta es la página principal donde puedes gestionar todos los
            aspectos de tu cuenta y servicios de Plumber++.
          </p>
          <img src="../../img/mario.png" alt="Mario" class="welcome-image" />
        </div>
        <div class="dashboard-widgets">
          <div class="widget">
            <h3>Ver Catálogo</h3>
            <p>Explora todos los productos y servicios que ofrecemos.</p>
            <button onclick="window.location.href='catalog.html'">
              Ver Catálogo
            </button>
          </div>
          <div class="widget">
            <h3>Ver Cuenta</h3>
            <p>Accede y gestiona la información de tu cuenta.</p>
            <button onclick="window.location.href='account.html'">
              Ver Cuenta
            </button>
          </div>
          <div class="widget">
            <h3>Realizar Pedido de Servicio</h3>
            <p>Solicita un nuevo servicio de plomería.</p>
            <button onclick="window.location.href='service_request.html'">
              Realizar Pedido
            </button>
          </div>
          <div class="widget">
            <h3>Conócenos</h3>
            <p>Comienza ya y conoce nuestros servicios a fondo</p>
            <button onclick="window.location.href='account.html'">
              Ver Cuenta
            </button>
        </div>
      </section>
    </main>
    <footer class="footer">
      <p>&copy; Plumber++ Tilines.inc</p>
      <p>Contamos con 4 módulos en CDMX, todos simétricos para tu comodidad.</p>
      <div class="contact">
        <p>Contáctanos al:</p>
        <p class="phone-number">553-639-1888</p>
      </div>
    </footer>

    <script>
      function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        const content = document.querySelector(".content");
        sidebar.classList.toggle("active");
        content.classList.toggle("shifted");
      }

      function toggleDropdown() {
        const dropdownMenu = document.getElementById("dropdown-menu");
        dropdownMenu.classList.toggle("show");
      }
    </script>
  </body>
</html>
