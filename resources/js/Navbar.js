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

    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    // Toggle mobile menu
    mobileMenuButton.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
    });

    // Sync theme toggles
    const themeToggle = document.getElementById('theme-toggle');
    const themeToggleMobile = document.getElementById('theme-toggle-mobile');
    const darkIcon = document.getElementById('theme-toggle-dark-icon');
    const lightIcon = document.getElementById('theme-toggle-light-icon');
    const darkIconMobile = document.getElementById('theme-toggle-dark-icon-mobile');
    const lightIconMobile = document.getElementById('theme-toggle-light-icon-mobile');

    // Function to update theme and icons
    function updateTheme(isDark) {
        if (isDark) {
            document.documentElement.classList.add('dark');
            darkIcon.classList.add('hidden');
            lightIcon.classList.remove('hidden');
            darkIconMobile.classList.add('hidden');
            lightIconMobile.classList.remove('hidden');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            darkIcon.classList.remove('hidden');
            lightIcon.classList.add('hidden');
            darkIconMobile.classList.remove('hidden');
            lightIconMobile.classList.add('hidden');
            localStorage.setItem('color-theme', 'light');
        }
    }

    // Check initial theme
    if (localStorage.getItem('color-theme') === 'dark' ||
        (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        updateTheme(true);
    } else {
        updateTheme(false);
    }

    // Toggle theme events
    themeToggle.addEventListener('click', function () {
        let isDark = document.documentElement.classList.contains('dark');
        updateTheme(!isDark);
    });

    themeToggleMobile.addEventListener('click', function () {
        let isDark = document.documentElement.classList.contains('dark');
        updateTheme(!isDark);
    });
});
