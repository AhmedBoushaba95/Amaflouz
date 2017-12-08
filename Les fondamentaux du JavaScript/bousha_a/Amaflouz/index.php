<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/styles/index.css" type="text/css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <script src="cookies.js"></script> 
    <title>e-commerce</title>
</head>

    <div class="bloc">
            <h1>E-COMMERCE</h1>
        <div class="barre">
            <form class="recherche" method="POST">
                <input class="champ" type="text" name="rech" placeholder="Rechercher"/>
                <a class="Rech" href="">Rechercher</a>
            </form>
        </div>
        <div class="nav">
            <ul>
                <li><a href="index.php">ACCUEIL</a></li>
                <li><a href="produit.html">PRODUIT</a></li>
                <li><a>BOUTIQUE</a></li>
                <li><a>CATÉGORIES</a>
                    <ul>
                        <li><a href="partials/Imageson.php">Image & Son</a></li>
                        <li><a href="partials/Tel.php">Téléphonie</a></li>
                        <li><a href="partials/Info.php">Informatique</a></li>
                        <li><a href="partials/Elec.php">Électroménager</a></li>
                        <li><a href="partials/Jeux.php">Jeux vidéo</a></li>
                    </ul>
                </li>
                <li><a>CONTACT</a></li>
                <li><a>MON COMPTE</a>
                    <ul>
                        <li class="li"><a>Commandes</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <section>
                    <h2> <body class="body" onload="checkCookie()">
<div class="all">
    <button onclick="toogleAndDisplayUID()" class="dispIDButton">Afficher votre identifiant</button>
    <span id="display_uid_span" class="dispIDSpanHidden"></span></h2>
</section>
        <div class="log">
            <?php
            if (isset($_SESSION['connect'])) {
                ?>
                <ul class="ul">
                    <li class="li"><a class="co" href="partials/deconnexion.php">Déconnexion</a></li>
                </ul>
                <?php
            } else {
                ?>
                <ul>
                    <li><a class="co" href="partials/connexion.php">Connexion</a></li>
                    <div class="trait"></div>
                    <li><a class="co" href="partials/inscription.php">Inscription</a></li>
                </ul>
                <?php
            }
            ?>
        </div>
        <div class="buis">
            <a href="partials/Panier.php"><img class="sac" title="Panier"
                                               src="assets/images/shopping-1705800_960_720.png"></a>
            <img class="fav" src="assets/images/star-1901588_960_720.png">
        </div>
    </div>
    <div class="new">
        <h1 class="titre">Nouveautés</h1>
        <a href="partials/cat.html"><img class="sams1"
                                         src="assets/images/samsung-galaxy-s8_8a0d10ed38f7af08__450_400.png"></a>
        <img class="sams2" src="assets/images/UE65HU7200-43.jpg">
        <img class="sams3" src="assets/images/bfr_overlay.jpg">
        <img class="sams4" src="assets/images/canon_eos_6d_mark_ii_1346735.jpg">
        <div class="price">
            <ul>
                <li>$589.90</li>
                <li>$799.99</li>
                <li>$349.49</li>
                <li>$599.95</li>
            </ul>
        </div>
    </div>

    <div class="footer">
        <p>Copyright © souiss_y/bousha_a-2017<br>
            Contact: sousis_y@etna-alternance.net
        </p>
    </div>
</div>

</body>

</html>
