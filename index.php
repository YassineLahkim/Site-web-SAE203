<?php
// ****** ACCES AUX DONNEES ******

// Connexion à la base de données
try {
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $bdd = new PDO('mysql:host=localhost;dbname=carluxury', 'root', '', $options);
} catch (Exception $err) {
    die('Erreur connexion MySQL : ' . $err->getMessage());
}

// Envoi de la requête SQL pour récupérer toutes les voitures
$reponse = $bdd->query("SELECT * FROM voiture;");

// Lecture de toutes les lignes de la réponse dans un tableau associatif
$table = $reponse->fetchAll(PDO::FETCH_ASSOC);

// Fin de la connexion à la base de données
$bdd = null;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarLuxury</title>
    <!-- Préchargement des polices Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Chargement de la police Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Inclusion de la feuille de style CSS -->
    <link rel="stylesheet" href="style/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/Car_Luxury__1_-removebg-preview.png" />
</head>

<body>

    <header>
        <div class="logo">
            <img src="img/Logo.png" alt="Logo Car Luxury">
        </div>
        <nav class="Rubriques">
            <ul>
                <li><a href="#accueil" id="Accueil">Accueil</a></li>
                <li><a href="#voitures-conteneur" id="voitures-lien">Nos Voitures</a></li>
                <li><a href="Formulaire_de_contact.php">Nous contacter</a></li>
            </ul>
        </nav>
    </header>

    <section id="accueil" class="accueil">
        <div class="accueil-content">
            <h1>Le meilleur dans la location de véhicules <b class="accent">De luxe</b></h1>
            <p>CarLuxury vous offre un choix de voitures luxueuses pour combler vos besoins. N'hésitez pas à louer vos
                voitures préférées chez nous !</p>
            <a class="contacter" href="Formulaire_de_contact.php">Contacter Nous !</a>
        </div>
        <img src="img/2220-removebg-preview.png" class="img-accueil" alt="Image Accueil">
    </section>

    <div class="heading">
        <span>Nos voitures</span>
        <h2>Les voitures que nous proposons</h2>
        <p>Chez Car Luxury, nous vous proposons une selection de voitures alliant élégance, charisme et performance pour
            vous satisfaire</p>
    </div>

    <!-- Section des voitures -->
    <div id="voitures-conteneur" class="voitures-conteneur">
        <?php foreach ($table as $voiture) : ?>
        <div class="boite">
            <!-- Affichage des images des voitures -->
            <img src="img/<?php echo $voiture['image'] . '.jpg'; ?>" alt="<?php echo $voiture['image']; ?>">
            <a href="affichage.php?id=<?php echo $voiture['voiture_id']; ?>">
                <!-- Affichage des informations des voitures -->
                <h2><?php echo $voiture['marque'] . ' ' . $voiture['modèle']; ?><br><?php echo $voiture['prix_jour']; ?>€/J</br>
                </h2>
            </a>
        </div>
        <?php endforeach; ?>
    </div>

    <script>
    // Fonction de défilement en douceur vers une section spécifique
    document.addEventListener('DOMContentLoaded', function() {
        const scrollToSection = (selector, target) => {
            document.querySelector(selector).addEventListener('click', function(event) {
                event.preventDefault();
                document.querySelector(target).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        };
        scrollToSection('#voitures-lien', '#voitures-conteneur');
        scrollToSection('#accueilid', '#accueil');
        scrollToSection('#voitures-lien1', '#voitures-conteneur');
    });
    </script>

    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h2>CarLuxury</h2>
                <p>CarLuxury est votre référence pour la location de véhicules de luxe. Nous offrons une gamme de
                    voitures de prestige pour toutes vos occasions spéciales.</p>
                <p><i class="fas fa-phone"></i>+33 1 23 45 67 89</p>
                <p><i class="fas fa-envelope"></i>contact@carluxury.com</p>
                <div class="contact"></div>
                <div class="socials">
                    <!-- Liens vers les réseaux sociaux -->
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="40" viewBox="0 0 24 24"
                            fill="#ffffff">
                            <path
                                d="M16.98 0a6.9 6.9 0 0 1 5.08 1.98A6.94 6.94 0 0 1 24 7.02v9.96c0 2.08-.68 3.87-1.98 5.13A7.14 7.14 0 0 1 16.94 24H7.06a7.06 7.06 0 0 1-5.03-1.89A6.96 6.96 0 0 1 0 16.94V7.02C0 2.8 2.8 0 7.02 0h9.96zm.05 2.23H7.06c-1.45 0-2.7.43-3.53 1.25a4.82 4.82 0 0 0-1.3 3.54v9.92c0 1.5.43 2.7 1.3 3.58a5 5 0 0 0 3.53 1.25h9.88a5 5 0 0 0 3.53-1.25 4.73 4.73 0 0 0 1.4-3.54V7.02a5 5 0 0 0-1.3-3.49 4.82 4.82 0 0 0-3.54-1.3zM12 5.76c3.39 0 6.2 2.8 6.2 6.2a6.2 6.2 0 0 1-12.4 0 6.2 6.2 0 0 1 6.2-6.2zm0 2.22a3.99 3.99 0 0 0-3.97 3.97A3.99 3.99 0 0 0 12 15.92a3.99 3.99 0 0 0 3.97-3.97A3.99 3.99 0 0 0 12 7.98zm6.44-3.77a1.4 1.4 0 1 1 0 2.8 1.4 1.4 0 0 1 0-2.8z" />
                        </svg></a>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="40" viewBox="0 0 24 24"
                            fill="#ffffff">
                            <path
                                d="M24 4.37a9.6 9.6 0 0 1-2.83.8 5.04 5.04 0 0 0 2.17-2.8c-.95.58-2 1-3.13 1.22A4.86 4.86 0 0 0 16.61 2a4.99 4.99 0 0 0-4.79 6.2A13.87 13.87 0 0 1 1.67 2.92 5.12 5.12 0 0 0 3.2 9.67a4.82 4.82 0 0 1-2.23-.64v.07c0 2.44 1.7 4.48 3.95 4.95a4.84 4.84 0 0 1-2.22.08c.63 2.01 2.45 3.47 4.6 3.51A9.72 9.72 0 0 1 0 19.74 13.68 13.68 0 0 0 7.55 22c9.06 0 14-7.7 14-14.37v-.65c.96-.71 1.79-1.6 2.45-2.61z" />
                        </svg></a>
                    <a href="https://www.linkedin.com/in/yassine-lahkim-d%C3%A9veloppementweb-alternance/"><svg
                            xmlns="http://www.w3.org/2000/svg" width="25" height="40" viewBox="0 0 24 24"
                            fill="#ffffff">
                            <path
                                d="M22.23 0H1.77C.8 0 0 .77 0 1.72v20.56C0 23.23.8 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.72V1.72C24 .77 23.2 0 22.23 0zM7.27 20.1H3.65V9.24h3.62V20.1zM5.47 7.76h-.03c-1.22 0-2-.83-2-1.87 0-1.06.8-1.87 2.05-1.87 1.24 0 2 .8 2.02 1.87 0 1.04-.78 1.87-2.05 1.87zM20.34 20.1h-3.63v-5.8c0-1.45-.52-2.45-1.83-2.45-1 0-1.6.67-1.87 1.32-.1.23-.11.55-.11.88v6.05H9.28s.05-9.82 0-10.84h3.63v1.54a3.6 3.6 0 0 1 3.26-1.8c2.39 0 4.18 1.56 4.18 4.89v6.21z" />
                        </svg></a>
                </div>
            </div>
            <div class="footer-section links">
                <h2>Liens Utiles</h2>
                <ul>
                    <li><a href="#accueil" id="accueilid" class="smooth-scroll1">Accueil</a></li>
                    <li><a href="#voitures-conteneur" id="voitures-lien1" class="smooth-scroll">Nos Voitures</a></li>
                    <li><a href="mailto:contact@carluxury.com">Nous Contacter</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 CarLuxury | Designed by You
        </div>
    </footer>
    <script src="scripts/script.js"></script>
</body>

</html>