<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pónte en contacto</title>
    <link rel="stylesheet" href="styles/stylesContact.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="logo_container">
        <img src="img/logo_A.png" alt="Logo" class="logo" />
        <span class="business-name">Plumber++</span>
      </div>
      <ul>
        <li><a href="index.html">Principal</a></li>
        <li><a href="components/auth/login.html">Iniciar Sesión</a></li>
        <li><a href="store.html">Catálogo</a></li>
        <li><a href="">Conócenos</a></li>
        <li><a href="">Únete</a></li>
        <li><a href="contact.php">Contáctanos</a></li>
      </ul>
    </nav>
    <div class="contact-container">
      <form
        action="https://api.web3forms.com/submit"
        method="POST"
        value="5baf04f3-333a-4e9c-86e9-7ecf8cfb20ba"
        class="contact-form"
      >
        <div class="message-container">
          <h1>Contáctanos</h1>
        </div>
        <input
          type="hidden"
          name="access_key"
          value="5baf04f3-333a-4e9c-86e9-7ecf8cfb20ba"
        />
        <input
          type="text"
          name="name"
          placeholder="Nombre Completo"
          class="contact-inputs"
          required
        />
        <input
          type="email"
          name="email"
          placeholder="Correo Electrónico"
          class="contact-inputs"
          required
        />
        <input
          type="tel"
          name="phone"
          placeholder="Número de Teléfono"
          class="contact-inputs"
        />
        <textarea
          name="message"
          placeholder="Escribe tu mensaje"
          class="contact-inputs"
          required
        ></textarea>
        <button type="submit">Enviar</button>
      </form>
    </div>
  </body>
</html>
