// Back to top button
const backToTopButton = document.getElementById('back-to-top');
window.addEventListener('scroll', function () {
    if (window.scrollY > 300) {
        backToTopButton.classList.remove('opacity-0');
        backToTopButton.classList.add('opacity-100');
    } else {
        backToTopButton.classList.remove('opacity-100');
        backToTopButton.classList.add('opacity-0');
    }
});

backToTopButton.addEventListener('click', function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});