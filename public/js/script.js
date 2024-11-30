// Initialisation des étoiles
let stars = document.querySelectorAll('.star');
let ratingValue = 0;

// Fonction de survol des étoiles
stars.forEach(star => {
    star.addEventListener('mouseover', () => {
        let value = parseInt(star.getAttribute('data-value'));
        highlightStars(value);
    });

    star.addEventListener('mouseout', () => {
        highlightStars(ratingValue);
    });

    // Sélectionner l'étoile lors du clic
    star.addEventListener('click', () => {
        ratingValue = parseInt(star.getAttribute('data-value'));
        highlightStars(ratingValue);
    });
});

// Mettre en surbrillance les étoiles
function highlightStars(value) {
    stars.forEach(star => {
        if (parseInt(star.getAttribute('data-value')) <= value) {
            star.classList.add('selected');
        } else {
            star.classList.remove('selected');
        }
    });
}

// Fonction pour soumettre l'avis
function submitReview() {
    let reviewText = document.getElementById('review-text').value;

    if (ratingValue === 0) {
        alert('Veuillez sélectionner une note!');
        return;
    }

    // Vous pouvez envoyer l'avis au serveur ici, par exemple avec AJAX
    document.getElementById('review-result').innerText = "Avis soumis avec une note de " + ratingValue + " étoiles : " + reviewText;
}
