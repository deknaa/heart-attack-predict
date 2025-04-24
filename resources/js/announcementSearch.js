
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search');

    searchInput.addEventListener('keyup', function () {
        let search = this.value;

        fetch(`/announcement/search?search=${search}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('list-announcements').innerHTML = data;
            });
    });
});
