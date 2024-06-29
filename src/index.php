<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plumber++</title>
    <link rel="stylesheet" href="styles/styles1.css" />
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
        <li><a href="">Conócenos</a></li>
        <li><a href="">Únete</a></li>
        <li><a href="contact.php">Contáctanos</a></li>
      </ul>
    </nav>
    <div class="carousel-container">
      <div class="carousel">
        <div class="carousel-item">
          <img
            src="img/carrusel0.webp"
            alt="Personal calificado y el mejor servicio"
          />
          <div class="carousel-caption">
            Personal calificado y el mejor servicio
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/carrusel1.jpg" alt="Conoce nuestros servicios" />
          <div class="carousel-caption">Conoce nuestros servicios</div>
        </div>
        <div class="carousel-item">
          <img src="img/carrusel2.jpeg" alt="Locaciones en CDMX y publicidad" />
          <div class="carousel-caption">Muy bien ubicados en CDMX</div>
        </div>
        <div class="carousel-item">
          <img src="img/carrusel3.webp" alt="Regístrate" />
          <div class="carousel-caption">Regístrate</div>
        </div>
        <div class="carousel-item">
          <img src="img/carrusel4.jpg" alt="Sabías qué?" />
          <div class="carousel-caption">Sabías qué?</div>
        </div>
      </div>
      <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
      <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>
    <div class="content">
      <section class="hero">
        <h1>Plomeros en CDMX</h1>
        <p>
          Ofrecemos servicios profesionales de plomería para el mantenimiento y
          reparación de tu hogar o negocio. ¡Contáctanos para obtener una
          cotización! ¿Necesitas un plomero de confianza y eficiente en CDMX?
          ¡No busques más! En Plumber++ estamos a tu disposición para solucionar
          cualquier problema de plomería que tengas en tu hogar o negocio.
          Contamos con un equipo de profesionales altamente capacitados y con
          amplia experiencia, quienes te brindarán un servicio rápido, efectivo
          y de calidad. ¡No esperes más y acércate a la sucursal Plumber ++ más
          cercana a ti! ¡No te preocupes por tu problema de plomería, en
          Plumber++ lo solucionamos!
        </p>
      </section>

      <section id="servicios">
        <h2>Nuestros Servicios</h2>
        <div class="services-container">
          <div class="service-item">
            <img
              src="img/flex1.png"
              alt="Mantenimiento preventivo y lavado de tinacos"
            />
            <div class="service-description">
              <h3>Mantenimiento preventivo y lavado de tinacos</h3>
              <p>
                Incluye filtro de tinaco, solución sanitizante antibacterial y
                cepillo con extensor.
              </p>
              <button onclick="window.location.href='store.html#mantenimiento'">Más información</button>
            </div>
          </div>
          <div class="service-item">
            <img src="img/flex2.jpg" alt="Reparación de fuga de agua" />
            <div class="service-description">
              <h3>Reparación de fuga de agua</h3>
              <p>Incluye tubos de cobre, codos, soldadura y gas butano.</p>
              <button onclick="window.location.href='store.html#reparacion'">Más información</button>
            </div>
          </div>
          <div class="service-item">
            <img src="img/flex3.jpeg" alt="Instalación de calentador de agua" />
            <div class="service-description">
              <h3>Instalación de calentador de agua</h3>
              <p>
                Incluye kit de mangueras, cinta Teflón y válvulas de presión
                inversa.
              </p>
              <button onclick="window.location.href='store.html#instalacion'">Más información</button>
            </div>
          </div>
        </div>
      </section>
      

    <section class="testimonios">
      <h2>Testimonios de clientes satisfechos</h2>

      <div class="container">
        <div class="testimonios-texto" style="float: left; width: 60%">
          <div class="testimonio">
            <p>
              "Mi calentador se quedaba prendido todo el día y nunca se apagaba.
              Contraté los servicios de Plumber++ y localizaron el problema, fue
              una fuga de agua enterrada. Realmente quedé satisfecha con sus
              servicios y el precio vale por su atención y sus equipos."
            </p>
            <p>- Sra. Gómez</p>
          </div>

          <div class="testimonio">
            <p>
              "Mi drenaje estaba totalmente tapado y varios plomeros hicieron el
              intento. Contraté a Plumber++ y con sus máquinas realizaron el
              servicio muy rápido y limpio, y el agua ya corre perfectamente.
              ¡Servicio 100% recomendado!"
            </p>
            <p>- Sr. López</p>
          </div>

          <div class="testimonio">
            <p>
              "Tengo un hidroneumático que se empezó a quedar prendido sin usar
              las llaves. Vinieron varios plomeros y no pudieron localizar las
              fugas. Contraté a Plumber++ y con sus equipos de detección de
              fugas solucionaron mi problema."
            </p>
            <p>- Sra. Martínez</p>
          </div>
        </div>

        <div
          class="imagen"
          style="
            float: right;
            width: 35%;
            border: 1px solid #000;
            padding: 10px;
          "
        >
          <img
            src="img/testimonio.jpg"
            alt="Imagen de cliente satisfecho"
            style="width: 100%"
          />
        </div>

        <div style="clear: both"></div>
      </div>
    </section>

    <div class="content">
      <section class="hero">
        <h1>Ubicación más cercana</h1>
        <p>
          ¡Visítanos en nuestra tienda Plumber++ más cercana! Aprovecha nuestros
          servicios de plomería de alta calidad y lleva a cabo las reparaciones
          y el mantenimiento que tu hogar o negocio necesita. ¡Te esperamos para
          brindarte la mejor atención y soluciones profesionales!
        </p>
      </section>
    </div>

    <div class="iframe-container">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3760.860089118763!2d-99.14889792590897!3d19.50465433837808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f94c06d75fd7%3A0x3fe1567da2190ac9!2sESCOM%20-%20Escuela%20Superior%20de%20C%C3%B3mputo%20-%20IPN!5e0!3m2!1ses-419!2smx!4v1718175658706!5m2!1ses-419!2smx"
        width="800"
        height="600"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>

    <footer class="footer">
      <p>&copy; Plumber++ Tilines.inc</p>
      <p>Contamos con 4 módulos en CDMX, todos simétricos para tu comodidad.</p>
      <div class="contact">
        <p>Contáctanos al:</p>
        <p class="phone-number">553-639-1888</p>
      </div>
    </footer>

    <a href="https://wa.me/5536391888" class="whatsapp-float" target="_blank">
      <img src="img/whats.png" alt="WhatsApp" class="whatsapp-icon" />
    </a>

    <script src="scripts/script.js"></script>
  </body>
</html>
