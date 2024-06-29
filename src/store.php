<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catálogo</title>
    <link rel="stylesheet" href="styles/styles4.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="logo_container">
        <img src="img/logo_A.png" alt="Logo" class="logo" />
        <span class="business-name">Plumber++</span>
      </div>
      <ul>
        <li><a href="index.php">Principal</a></li>
        <li><a href="components/auth/login.php">Iniciar Sesión</a></li>
        <li><a href="store.php">Catálogo</a></li>
        <li><a href="#">Conócenos</a></li>
        <li><a href="#">Únete</a></li>
        <li><a href="contact.php">Contáctanos</a></li>
      </ul>
    </nav>

    <div class="container">
      <div class="services-container">
        <h2>Servicios</h2>
        <div class="service-item">
          <img src="img/mantenimiento.png" alt="Mantenimiento" />
          <span>Mantenimiento</span>
        </div>
        <div class="service-item">
          <img src="img/reparaciones.png" alt="Reparaciones" />
          <span>Reparaciones</span>
        </div>
        <div class="service-item">
          <img src="img/instalaciones.png" alt="Instalaciones" />
          <span>Instalaciones</span>
        </div>
        <div class="img">
          <img src="img/mantenimiento_serv.jpg" alt="Mantenimiento Servicio" />
        </div>
      </div>

      <div class="content">
        <h2>Servicios</h2>
        <div id="mantenimiento" class="service-card">
          <img src="img/serv1.png" alt="Mantenimiento" />
          <h3>Mantenimiento preventivo y lavado de tinacos</h3>
          <p>
            Incluye filtro de tinaco, solución sanitizante antibacterial y
            cepillo con extensor.
          </p>
          <ul>
            <li>Filtro de tinaco: $84 MXN</li>
            <li>Solución sanitizante antibacterial: $179 MXN</li>
            <li>Cepillo con extensor: $27.38 MXN</li>
          </ul>
          <p>Precio: $2000 MXN</p>
        </div>
        <div id="reparacion" class="service-card">
          <img src="img/serv2.jpg" alt="Reparaciones" />
          <h3>Reparación de fuga de agua</h3>
          <p>Incluye tubos de cobre, codos, soldadura y gas butano.</p>
          <ul>
            <li>Tubos de cobre: $500 MXN (aproximadamente)</li>
            <li>Codos: $50 MXN</li>
            <li>Soldadura: $100 MXN</li>
            <li>Gas butano: $300 MXN</li>
          </ul>
          <p>Precio: $1500 MXN</p>
        </div>
        <div id="instalacion" class="service-card">
          <img src="img/serv3.jpg" alt="Instalaciones" />
          <h3>Instalación de calentador de agua</h3>
          <p>
            Incluye kit de mangueras, cinta Teflón y válvulas de presión
            inversa.
          </p>
          <ul>
            <li>Kit de mangueras: $200 MXN</li>
            <li>Cinta Teflón: $30 MXN</li>
            <li>Válvulas de presión inversa: $100 MXN</li>
          </ul>
          <p>Precio: $3000 MXN</p>
        </div>
        <div>
          <h3>
            ¿Tienes algún otro servicio que no esté en la lista? Contáctanos
          </h3>
          <button
            class="contact-button"
            onclick="window.location.href='contact.html'"
          >
            Contactar
          </button>
        </div>
      </div>
    </div>
    <script>
      window.addEventListener("scroll", function () {
        const serviceItems = document.querySelectorAll(".service-item");
        const serviceCards = document.querySelectorAll(".service-card");
        const scrollPosition = window.scrollY + window.innerHeight / 2;

        serviceCards.forEach((card, index) => {
          const rect = card.getBoundingClientRect();
          const cardPosition = rect.top + window.scrollY;

          if (
            scrollPosition >= cardPosition &&
            scrollPosition < cardPosition + rect.height
          ) {
            serviceItems.forEach((item) => item.classList.remove("highlight"));
            if (serviceItems[index]) {
              serviceItems[index].classList.add("highlight");
            }
          }
        });
      });
    </script>
  </body>
</html>
