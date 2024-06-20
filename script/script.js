document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour gérer le défilement en douceur
    const smoothScroll = (selector, target) => {
        document.querySelector(selector).addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelector(target).scrollIntoView({ behavior: 'smooth' });
        });
    };

    // Défilement en douceur vers les sections spécifiques
    smoothScroll('#voitures-lien', '#voitures-conteneur');
    smoothScroll('footer a[href="#voitures-conteneur"]', '#voitures-conteneur');
    smoothScroll('footer a[href="#accueil"]', '#accueil');
});