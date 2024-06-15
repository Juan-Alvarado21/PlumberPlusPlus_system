document.addEventListener('DOMContentLoaded', () => {
    const logoContainer = document.getElementById('logo-container');
    const navbar = document.getElementById('navbar');
    const userInfo = document.getElementById('user-info');
    const dropdownMenu = document.getElementById('dropdown-menu');
    
	logoContainer.addEventListener('click', () => {
        navbar.classList.toggle('expanded');
    });

    userInfo.addEventListener('click', () => {
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', (event) => {
        if (!userInfo.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });

});


