// Sélection des éléments
const form_container = document.querySelector('#form_container');
const inscription_button = document.querySelector('#inscription_button');
const connection_button = document.querySelector('#connection_button');
const disconnection_button = document.querySelector('#disconnection_button');
const addcomment_button = document.querySelector('#addcomment_button');
const livre_or = document.querySelector('#livre_or');
const profil_button = document.querySelector('#profil_button');

// évènements
if (inscription_button !== null) {
    inscription_button.addEventListener("click", (e) => {
        e.preventDefault();
        fetch('inscription.php')
            .then((response) => {
                return response.text();
            })
            .then((response) => {
                form_container.innerHTML = response;
            })
    })
}

if (connection_button !== null) {
    connection_button.addEventListener("click", (e) => {
        e.preventDefault();
        fetch('connection.php')
            .then((response) => {
                return response.text();
            })
            .then((response) => {
                form_container.innerHTML = response;
            })
    })
}

if (disconnection_button !== null) {
    disconnection_button.addEventListener("click", (e) => {
        e.preventDefault();
        fetch('disconnection.php')
            .then(() => document.location.reload('../index.php'));
    })
}

if (addcomment_button !== null) {
    addcomment_button.addEventListener("click", (e) => {
        e.preventDefault();
        fetch('addComment.php')
            .then((response) => {
                return response.text();
            })
            .then((response) => {
                form_container.innerHTML = response;
            })
    })
}

if (livre_or !== null) {
    livre_or.addEventListener("click", (e) => {
        e.preventDefault();
        fetch('livre_or.php')
            .then((response) => {
                return response.text();
            })
            .then((response) => {
                form_container.innerHTML = response;
            })
    })
}

if (profil_button !== null) {
    profil_button.addEventListener("click", (e) => {
        e.preventDefault();
        fetch('profil.php')
            .then((response) => {
                return response.text();
            })
            .then((response) => {
                form_container.innerHTML = response;
            })
    })
}
