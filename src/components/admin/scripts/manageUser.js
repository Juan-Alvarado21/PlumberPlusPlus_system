document.addEventListener('DOMContentLoaded', function() {
    // Obtener referencia al botón de agregar usuario
    const addUserBtn = document.querySelector('.add-user-btn');
    addUserBtn.addEventListener('click', function() {
        openUserModal();
    });

    // Función para abrir el modal de usuario
    function openUserModal(user = {}) {
        document.getElementById('modal-title').innerText = user.id ? 'Editar Usuario' : 'Agregar Usuario';
        document.getElementById('modal-action').value = user.id ? 'update' : 'create';
        document.getElementById('user-id').value = user.id || '';
        document.getElementById('user-name').value = user.nombre || '';
        document.getElementById('user-email').value = user.correo || '';
        document.getElementById('user-modal').style.display = 'block';
    }

    // Agregar eventos al cargar la página
    const modal = document.getElementById('user-modal');
    const closeBtn = document.querySelector('.close-btn');

    closeBtn.onclick = () => {
        closeUserModal();
    }

    window.onclick = (event) => {
        if (event.target == modal) {
            closeUserModal();
        }
    }

    function closeUserModal() {
        document.getElementById('user-modal').style.display = 'none';
    }
});

