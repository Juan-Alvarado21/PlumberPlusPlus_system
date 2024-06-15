document.addEventListener('DOMContentLoaded', () => {
	const modal = document.getElementById('user-modal');
	const addUserBtn = document.querySelector('.add-user-btn');
	const closeBtn = document.querySelector('.close-btn');
	const userForm = document.getElementById('user-form');

	addUserBtn.onclick = () => {
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
});
