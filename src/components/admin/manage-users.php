
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administrar Usuarios</title>
	<link rel="stylesheet" href="styles/styleMain.css">
	<link rel="stylesheet" href="styles/styleUsers.css">
</head>
<body>
    <header>
	 <nav class="navbar" id="navbar">
      <div class="logo_container" id="logo-container">
        <img src="images/logo.webp" alt="Logo" class="logo">
        <span class="business-name">Plumber++</span>
      </div>
      <ul class = "menu" id="menu">
		<li><a href="destok.html">Dashboard</a></li>
		<li><a href="manage-users.php">Gestionar Usuarios</a></li>
		<li><a href="manage-tec.html">Gestionar Tecnicos</a></li>
		<li><a href="../technician/materialUsado.html">Gestionar Materiales</a></li>
      </ul>
    </nav> 
		<div class="user-info-container">
			<div class="user-info" id="user-info">
				<img src="images/admin_icon.jpg" alt="admin" class="user-icon">
				<span class="user-name">Nombre de Usuario</span>
				<i class="dropdown-icon">▼</i>
			</div>
			<div class="dropdown-menu" id="dropdown-menu">
				<a href="#">Perfil</a>
				<a href="#">Configuración</a>
				<a href="#">Cerrar Sesión</a>
			</div>
        </div>
    </header>
  <div class="container">
	<section class="admin-section">
      <h2>Administrar Usuarios</h1>
      <button class="add-user-btn">Agregar Usuario</button>
    </section>
    <main>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="user-table-body">
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario['id']) ?></td>
                            <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                            <td><?= htmlspecialchars($usuario['correo']) ?></td>
                            <td><?= htmlspecialchars($usuario['rol']) ?></td>
                            <td>
                                <button class="edit-btn" onclick="openUserModal(<?= htmlspecialchars(json_encode($usuario)) ?>)">Editar</button>
                                <form method="post" style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <button type="submit" class="delete-btn">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody> 
      </table>
    </main>
  </div>

  <!-- Modal para agregar/editar usuarios -->
  <div class="modal" id="user-modal">
    <div class="modal-content">
      <span class="close-btn">&times;</span>
      <h2>Agregar/Editar Usuario</h2>
      <form id="user-form">
        <label for="user-id">ID:</label>
        <input type="text" id="user-id" name="user-id" disabled>

        <label for="user-name">Nombre:</label>
        <input type="text" id="user-name" name="user-name" required>

        <label for="user-email">Correo:</label>
        <input type="email" id="user-email" name="user-email" required>

        <label for="user-role">Rol:</label>
        <select id="user-role" name="user-role">
          <option value="Administrador">Administrador</option>
          <option value="Editor">Editor</option>
          <option value="Viewer">Viewer</option>
        </select>

        <button type="submit">Guardar</button>
      </form>
    </div>
  </div>

	<script src="scripts/manageUser.js"></script>
	<script src="scripts/menu.js"></script>
</body>
</html>

