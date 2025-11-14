// Ajax pretraga kurseva
console.log("JavaScript učitan!");

function performSearch() {
    console.log("Funkcija pozvana!");
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const query = searchInput.value;

    console.log("Query:", query);

    if (query.length < 2) {
        searchResults.innerHTML = '';
        searchResults.style.display = 'none';
        return;
    }

    // Ajax zahtev
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'search.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        console.log("Status:", xhr.readyState, xhr.status);
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Odgovor:", xhr.responseText);
            searchResults.innerHTML = xhr.responseText;
            searchResults.style.display = 'block';
        }
    };

    xhr.send('query=' + encodeURIComponent(query));
}

// Event listener kada se stranica učita
document.addEventListener('DOMContentLoaded', function () {
    console.log("DOM učitan!");

    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');

    if (searchInput) {
        console.log("Search input pronađen!");

        searchInput.addEventListener('input', performSearch);

        // Sakrij rezultate kada klikneš van
        document.addEventListener('click', function (e) {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.style.display = 'none';
            }
        });

    } else {
        console.log("Search input NIJE pronađen!");
    }
});