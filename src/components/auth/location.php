<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dirección</title>
    <link rel="stylesheet" href="styles/styles5.css" />
    <!--AQUI VA LA API KEY DE MAPS-->

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
    <div class="main-content">
      <div class="sidebar">
        <div id="map"></div>
      </div>
      <div class="card">
        <h1>Selecciona tu localidad</h1>
        <form
          id="address-form"
          method="POST"
          action="register_address.php"
          onsubmit="return validateForm();"
        >
          <div>
            <label for="calle">Calle</label>
            <input
              type="text"
              id="calle"
              name="calle"
              placeholder="Calle"
              required
            />
          </div>
          <div>
            <label for="entidad">Entidad Federativa</label>
            <input
              type="text"
              id="entidad"
              name="entidad"
              placeholder="Entidad Federativa"
              required
            />
          </div>
          <div>
            <label for="codigo_postal">C.P.</label>
            <input
              type="text"
              id="codigo_postal"
              name="codigo_postal"
              placeholder="Código Postal"
              required
              pattern="\d{5}"
              title="El código postal debe ser de 5 dígitos"
            />
          </div>
          <div>
            <label for="num_exterior">Número Exterior</label>
            <input
              type="text"
              id="num_exterior"
              name="num_exterior"
              placeholder="Número Exterior"
              required
            />
          </div>
          <div>
            <label for="num_interior">Número Interior (opcional)</label>
            <input
              type="text"
              id="num_interior"
              name="num_interior"
              placeholder="Número Interior (opcional)"
            />
          </div>
          <div>
            <label for="referencias">Referencias</label>
            <textarea
              id="referencias"
              name="referencias"
              placeholder="Referencias"
            ></textarea>
          </div>
          <button type="submit">Enviar</button>
        </form>
      </div>
    </div>

    <dialog id="message-dialog">
      <div>
        <span class="success-icon">&#10003;</span>
        <p id="dialog-message"></p>
      </div>
      <button id="close-dialog">Cerrar</button>
    </dialog>

    <script>
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
          center: { lat: 19.432608, lng: -99.133209 }, // Centro de la Ciudad de México
        });
      }

      function geocodeAddress(geocoder, map, address) {
        geocoder.geocode({ address: address }, (results, status) => {
          if (status === "OK") {
            const location = results[0].geometry.location;
            const lat = location.lat();
            const lng = location.lng();
            if (isWithinCDMX(lat, lng)) {
              map.setCenter(location);
              new google.maps.Marker({
                map: map,
                position: location,
              });
              showDialog(
                "¡Dirección válida!, te encuentras en la Ciudad de México."
              );
            } else {
              alert("La dirección no está dentro de la Ciudad de México.");
            }
          } else {
            showDialog(
              "Geocode was not successful for the following reason: " + status
            );
          }
        });
      }

      function isWithinCDMX(lat, lng) {
        const cdmxBounds = {
          north: 19.592757,
          south: 19.019585,
          west: -99.364202,
          east: -98.940163,
        };
        return (
          lat <= cdmxBounds.north &&
          lat >= cdmxBounds.south &&
          lng <= cdmxBounds.east &&
          lng >= cdmxBounds.west
        );
      }

      function showDialog(message) {
        const dialog = document.getElementById("message-dialog");
        const dialogMessage = document.getElementById("dialog-message");
        dialogMessage.textContent = message;
        dialog.showModal();
        const closeDialogButton = document.getElementById("close-dialog");
        closeDialogButton.addEventListener("click", () => {
          dialog.close();
        });
      }

      document
        .getElementById("address-form")
        .addEventListener("submit", function (event) {
          event.preventDefault();
          const calle = document.getElementById("calle").value;
          const entidad = document.getElementById("entidad").value;
          const codigoPostal = document.getElementById("codigo_postal").value;
          const numExterior = document.getElementById("num_exterior").value;
          const numInterior = document.getElementById("num_interior").value;
          const referencias = document.getElementById("referencias").value;

          const address = `${calle}, ${numExterior}, ${
            numInterior ? numInterior + ", " : ""
          }${codigoPostal}, ${entidad}`;

          const geocoder = new google.maps.Geocoder();
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: { lat: 19.432608, lng: -99.133209 },
          });
          geocodeAddress(geocoder, map, address);
        });
    </script>
  </body>
</html>
