document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('tech-modal');
  const addTechBtn = document.querySelector('.add-tech-btn');
  const closeBtn = document.querySelector('.close-btn');
  const techForm = document.getElementById('tech-form');
  const reportForm = document.getElementById('report-form');
  const reportTableBody = document.getElementById('report-table').querySelector('tbody');

  addTechBtn.onclick = () => {
    modal.style.display = 'block';
  }

  closeBtn.onclick = () => {
    modal.style.display = 'none';
  }

  window.onclick = (event) => {
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  }

  techForm.onsubmit = (event) => {
    event.preventDefault();
    // Aquí puedes añadir la lógica para agregar o editar un técnico
    modal.style.display = 'none';
  }

  reportForm.onsubmit = (event) => {
    event.preventDefault();
    // Aquí puedes añadir la lógica para generar el reporte
    // Por ahora, solo muestra una fila de ejemplo
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>María López</td>
      <td>2024-06-14</td>
      <td>08:00</td>
      <td>17:00</td>
      <td>9 horas</td>
    `;
    reportTableBody.appendChild(row);
  }

  const editBtns = document.querySelectorAll('.edit-btn');
  editBtns.forEach(btn => {
    btn.onclick = (event) => {
      modal.style.display = 'block';
      // Aquí puedes cargar los datos del técnico en el formulario
		}
  })
});
