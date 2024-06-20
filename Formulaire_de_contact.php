<?php
// ****** ACCES AUX DONNEES ******
try   // Connexion à la base de données
{
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $bdd = new PDO('mysql:host=localhost;dbname=carluxury', 'root', '', $options);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Ajouter cette ligne pour activer les exceptions
}
catch(Exception $err)
{
    die('Erreur connexion MySQL : ' . $err->getMessage());
}

// Vérification de la méthode de requête HTTP (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // Récupération des données du formulaire
    $Nom = $_POST['nom'];
    $Email = $_POST['email'];
    $Adresse = $_POST['adresse'];
    $Téléphone = $_POST['téléphone'];
    $message = $_POST['message'];

    // Préparation de la requête d'insertion dans la base de données
    $stmt = $bdd->prepare("INSERT INTO clients (nom, email, adresse, téléphone, message) VALUES (?, ?, ?, ?, ?)");
    
    // Liaison des valeurs aux paramètres de la requête
    $stmt->bindValue(1, $Nom, PDO::PARAM_STR);
    $stmt->bindValue(2, $Email, PDO::PARAM_STR);
    $stmt->bindValue(3, $Adresse, PDO::PARAM_STR);
    $stmt->bindValue(4, $Téléphone, PDO::PARAM_STR);
    $stmt->bindValue(5, $message, PDO::PARAM_STR);

    // Exécution de la requête
    if ($stmt->execute()) {
        
        // Affichage d'un message en cas de succès
        echo "Les informations ont été enregistrées avec succès.";
    } else {
        // Affichage d'un message d'erreur en cas d'échec de l'exécution de la requête
        echo "Erreur : " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" type="image/png" href="img/Car_Luxury__1_-removebg-preview.png" />
</head>

<body>
    <header>
        <div class="logo">
            <img src="img/Logo.png" alt="Logo Car Luxury">
        </div>
        <nav class="Rubriques">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php#voitures-conteneur">Nos Voitures</a></li>
                <li><a href="Formulaire_de_contact.php">Nous contacter</a></li>
            </ul>
        </nav>
    </header>
    <h2 class=titre_form>Contactez-nous</h2>
    <form method="post" action="Formulaire_de_contact.php">
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" required><br><br>
        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="adresse">Adresse :</label><br>
        <textarea id="adresse" name="adresse" required></textarea><br><br>
        <label for="téléphone">Téléphone :</label><br>
        <input type="text" id="téléphone" name="téléphone" required><br><br>
        <label for="message">Message :</label><br>
        <textarea id="message" name="message" required></textarea><br><br>
        <input type="submit" value="Envoyer">
    </form>
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
                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="25" height="40" viewBox="0 0 24 24"
                            fill="#ffffff">
                            <path
                                d="M16.98 0a6.9 6.9 0 0 1 5.08 1.98A6.94 6.94 0 0 1 24 7.02v9.96c0 2.08-.68 3.87-1.98 5.13A7.14 7.14 0 0 1 16.94 24H7.06a7.06 7.06 0 0 1-5.03-1.89A6.96 6.96 0 0 1 0 16.94V7.02C0 2.8 2.8 0 7.02 0h9.96zm.05 2.23H7.06c-1.45 0-2.7.43-3.53 1.25a4.82 4.82 0 0 0-1.3 3.54v9.92c0 1.5.43 2.7 1.3 3.58a5 5 0 0 0 3.53 1.25h9.88a5 5 0 0 0 3.53-1.25 4.73 4.73 0 0 0 1.4-3.54V7.02a5 5 0 0 0-1.3-3.49 4.82 4.82 0 0 0-3.54-1.3zM12 5.76c3.39 0 6.2 2.8 6.2 6.2a6.2 6.2 0 0 1-12.4 0 6.2 6.2 0 0 1 6.2-6.2zm0 2.22a3.99 3.99 0 0 0-3.97 3.97A3.99 3.99 0 0 0 12 15.92a3.99 3.99 0 0 0 3.97-3.97A3.99 3.99 0 0 0 12 7.98zm6.44-3.77a1.4 1.4 0 1 1 0 2.8 1.4 1.4 0 0 1 0-2.8z" />
                        </svg><i class="fab fa-instagram"></i></a>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="40" viewBox="0 0 24 24"
                            fill="#ffffff">
                            <path
                                d="M24 4.37a9.6 9.6 0 0 1-2.83.8 5.04 5.04 0 0 0 2.17-2.8c-.95.58-2 1-3.13 1.22A4.86 4.86 0 0 0 16.61 2a4.99 4.99 0 0 0-4.79 6.2A13.87 13.87 0 0 1 1.67 2.92 5.12 5.12 0 0 0 3.2 9.67a4.82 4.82 0 0 1-2.23-.64v.07c0 2.44 1.7 4.48 3.95 4.95a4.84 4.84 0 0 1-2.22.08c.63 2.01 2.45 3.47 4.6 3.51A9.72 9.72 0 0 1 0 19.74 13.68 13.68 0 0 0 7.55 22c9.06 0 14-7.7 14-14.37v-.65c.96-.71 1.79-1.6 2.45-2.61z" />
                        </svg><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/in/yassine-lahkim-d%C3%A9veloppementweb-alternance/"><svg
                            xmlns="http://www.w3.org/2000/svg" width="25" height="40" viewBox="0 0 24 24"
                            fill="#ffffff">
                            <path
                                d="M22.23 0H1.77C.8 0 0 .77 0 1.72v20.56C0 23.23.8 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.72V1.72C24 .77 23.2 0 22.23 0zM7.27 20.1H3.65V9.24h3.62V20.1zM5.47 7.76h-.03c-1.22 0-2-.83-2-1.87 0-1.06.8-1.87 2.05-1.87 1.24 0 2 .8 2.02 1.87 0 1.04-.78 1.87-2.05 1.87zM20.34 20.1h-3.63v-5.8c0-1.45-.52-2.45-1.83-2.45-1 0-1.6.67-1.87 1.32-.1.23-.11.55-.11.88v6.05H9.28s.05-9.82 0-10.84h3.63v1.54a3.6 3.6 0 0 1 3.26-1.8c2.39 0 4.18 1.56 4.18 4.89v6.21z" />
                        </svg><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer-section links">
                <h2>Liens Utiles</h2>
                <ul>
                    <li><a href="index.php" class="smooth-scroll1">Accueil</a></li>
                    <li><a href="index.php" class="smooth-scroll">Nos Voitures</a></li>
                    <li><a href="Formulaire_de_contact.php">Nous Contacter</a></li>
                </ul>
            </div>
        </div>
        </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 CarLuxury | Designed by You
        </div>
    </footer>
</body>

</html>