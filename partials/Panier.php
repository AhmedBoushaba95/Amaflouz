<?php
session_start();
require_once 'function.php';
$panier = new Panier('Produits');
$listeProduits = $panier->getPanier();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="../assets/styles/index.css" type="text/css">
    <link rel="stylesheet" href="../assets/styles/Panier.css" type="text/css">
    <title>e-commerce</title>
</head>
<div class="body">
    <div class="all">
        <div class="bloc">
            <h1>E-COMMERCE</h1>
            <div class="barre">
                <form action="" class="recherche">
                    <input class="champ" type="text" placeholder="Rechercher"/>
                    <a class="Rech" href="">Rechercher</a>
                </form>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="../index.php">ACCUEIL</a></li>
                    <li><a>BOUTIQUE</a></li>
                    <li><a>CATÉGORIES</a>
                        <ul>
                            <li><a href="Imageson.php">Image & Son</a></li>
                            <li><a href="Tel.php">Téléphonie</a></li>
                            <li><a href="Info.php">Informatique</a></li>
                            <li><a href="Elec.php">Électroménager</a></li>
                            <li><a href="Jeux.php">Jeux vidéo</a></li>
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
            <div class="log">
                <?php
                if (isset($_SESSION['connect'])) {
                    ?>
                    <ul class="ul">
                        <li class="li"><a class="co" href="deconnexion.php">Déconnexion</a></li>
                    </ul>
                    <?php
                } else {
                    ?>
                    <ul>
                        <li><a class="co" href="connexion.php">Connexion</a></li>
                        <div class="trait"></div>
                        <li><a class="co" href="inscription.php">Inscription</a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>
            <div class="buis">
                <a href="Panier.php"><img class="sac" title="Panier"
                                          src="../assets/images/shopping-1705800_960_720.png"></a>
                <img class="fav" src="../assets/images/star-1901588_960_720.png">
            </div>
        </div>
    </div>
</div>
    <?php
    if (isset($_SESSION['connect'])) {
    ?>

<?php
} else {
    ?>
    <div class="noco">
        <p>Pour accéder à votre panier veuillez vous <a href="connexion.php">connecter.</a></p>
    </div>
    <?php
}
?>
<?php if(!$listeProduits){ ?>
    <p>Votre panier est vide</p>
<?php }else{ ?>
<table border = "1" width="50%">

    <tr>
        <td>Libelle</td>
        <td>Prix</td>
        <td>Quantite</td>
        <td></td>
    </tr>

    <?php foreach($listeProduits as $produit){ ?>
    <tr>
        <td><?php print $produit['Libelle'] ?></td>
        <td><?php print $produit['Prix']*$produit['qte'] ?>€</td>
        <td><?php print $produit['qte'] ?></td>
        <td><a href="produit.php?id=<?php print $produit['ID'] ?>">Modifier</a> |
        <a href="supprimer_panier.php?id=<?php print $produit['ID'] ?>">Supprimer</a></td> 
    </tr>
    <?php } ?>
</table>
<?php } ?>
<div class="footer">
    <p>Copyright © souiss_y/bousha_a-2017<br>
        Contact: sousis_y@etna-alternance.net</p>
</div>
</body>
</html>