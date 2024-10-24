<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>HealthCare</title>
</head>
<body>
    <x-navbar></x-navbar>
    <x-hero-section></x-hero-section>
    <x-landing-page.how-its-work></x-landing-page.how-its-work>
    <x-landing-page.testimony></x-landing-page.testimony>
</body>
</html>