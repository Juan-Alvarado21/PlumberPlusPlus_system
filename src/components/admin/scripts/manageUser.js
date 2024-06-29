
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('user-modal');
            const addUserBtn = document.querySelector('.add-user-btn');
            const closeBtn = document.querySelector('.close-btn');
            const userForm = document.getElementById('user-form');

            addUserBtn.onclick = () => {
                openUserModal();
            }

            closeBtn.onclick = () => {
                modal.style.display = 'none';
            }

            window.onclick = (event) => {
                if (event.target == modal) {
                  modal.style.display = 'none';
                }
            }
        });

        function openUserModal(user = {}) {
            document.getElementById('modal-title').innerText = user.id ? 'Editar Usuario' : 'Agregar Usuario';
            document.getElementById('modal-action').value = user.id ? 'update' : 'create';
            document.getElementById('user-id').value = user.id || '';
            document.getElementById('user-name').value = user.nombre || '';
            document.getElementById('user-email').value = user.correo || '';
            document.getElementById('user-role').value = user.rol || 'Administrador';
            document.getElementById('user-modal').style.display = 'block';
        }

