const sidebar = document.getElementById('sidebar-navigation-user');
const mobileMenu = document.getElementById('mobile-menu');

mobileMenu.addEventListener('click', function () {
    sidebar.classList.remove('hidden');
    sidebar.classList.add('block');
});
