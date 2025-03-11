<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script> --}}
    <title>HealthCare</title>
</head>

<body class="overflow-x-hidden font-sans antialiased text-gray-800 bg-gray-50">
    {{-- Navbar --}}
    <x-navbar></x-navbar>

    {{-- Hero Section --}}
    <x-landing-page.hero-section></x-landing-page.hero-section>

    {{-- Stats Section --}}
    <x-landing-page.stats></x-landing-page.stats>

    {{-- About Section --}}
    <x-landing-page.about></x-landing-page.about>

    {{-- How it works --}}
    <x-landing-page.how-its-work></x-landing-page.how-its-work>

    {{-- Risk factors --}}
    <x-landing-page.risk-factors></x-landing-page.risk-factors>

    {{-- Prediction --}}
    <x-landing-page.prediction></x-landing-page.prediction>

    {{-- Testimonials Section --}}
    <x-landing-page.testimony></x-landing-page.testimony>

    {{-- FAQ Section --}}
    <x-landing-page.faq></x-landing-page.faq>

    {{-- CTA Section --}}
    <x-landing-page.cta></x-landing-page.cta>

    {{-- Footer --}}
    <x-landing-page.footer></x-landing-page.footer>
</body>
@vite(['resources/js/darkMode.js'])
@vite(['resources/js/navbar.js'])
<script>
    AOS.init();
</script>
</html>