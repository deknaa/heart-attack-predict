document.addEventListener('DOMContentLoaded', function () {
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

    document.addEventListener('DOMContentLoaded', function () {
        const themeToggleDesktop = document.getElementById('theme-toggle');
        const themeToggleMobile = document.getElementById('theme-toggle-mobile');
        const darkIconDesktop = document.getElementById('theme-toggle-dark-icon');
        const lightIconDesktop = document.getElementById('theme-toggle-light-icon');
        const darkIconMobile = document.getElementById('theme-toggle-dark-icon-mobile');
        const lightIconMobile = document.getElementById('theme-toggle-light-icon-mobile');

        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
            updateIcons();
        }

        function updateIcons() {
            const isDark = document.documentElement.classList.contains('dark');
            darkIconDesktop.classList.toggle('hidden', !isDark);
            lightIconDesktop.classList.toggle('hidden', isDark);
            darkIconMobile.classList.toggle('hidden', !isDark);
            lightIconMobile.classList.toggle('hidden', isDark);
        }

        themeToggleDesktop?.addEventListener('click', toggleDarkMode);
        themeToggleMobile?.addEventListener('click', toggleDarkMode);

        // Set initial theme
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        updateIcons();
    });

    // navigasi ketika di scroll berisi underline
     const sections = document.querySelectorAll("section[id]");
    const navLinks = document.querySelectorAll('a[href^="#"]');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            const id = entry.target.getAttribute("id");
            const navLink = document.querySelector(`a[href="#${id}"]`);

            if (entry.isIntersecting) {
                navLinks.forEach(link => {
                    link.classList.remove("border-red-500", "text-gray-900", "dark:text-white");
                    link.classList.add("border-transparent");
                });

                navLink.classList.add("border-red-500", "text-gray-900", "dark:text-white");
                navLink.classList.remove("border-transparent");
            }
        });
    }, {
        threshold: 0.6
    });

    sections.forEach(section => observer.observe(section));

});
