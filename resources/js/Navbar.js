document.addEventListener('DOMContentLoaded', function () {
    // Simple menu toggle
    const menuButton = document.querySelector('button[aria-expanded]');
    if (menuButton) {
        menuButton.addEventListener('click', function () {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            // Implementation for mobile menu toggle would go here
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    const navbar = document.getElementById('navbar');
    const navbarContent = navbar.querySelector('div');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 100) {
            navbar.classList.remove('w-full');
            navbar.classList.add('left-1/2', 'transform', '-translate-x-1/2', 'w-11/12',
                'md:w-10/12', 'lg:w-9/12', 'mt-4', 'rounded-xl', 'backdrop-blur-sm',
                'bg-white/80', 'dark:bg-gray-800/80', 'shadow-md');
        } else {
            navbar.classList.add('w-full');
            navbar.classList.remove('left-1/2', 'transform', '-translate-x-1/2', 'w-11/12',
                'md:w-10/12', 'lg:w-9/12', 'mt-4', 'rounded-xl', 'backdrop-blur-sm',
                'bg-white/80', 'dark:bg-gray-800/80', 'shadow-md');
        }
    });
});