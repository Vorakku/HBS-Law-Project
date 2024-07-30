function search() {
    const searchInput = document.getElementById('searchInput');
    const filterValue = searchInput.value;

    const searchUrl = document.currentScript.getAttribute('data-search-url');

    fetch(searchUrl + '?query=' + filterValue)
        .then(response => response.text())
        .then(data => {
            const dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.innerHTML = data;
        });
}
