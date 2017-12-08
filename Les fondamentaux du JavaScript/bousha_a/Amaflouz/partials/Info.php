<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/styles/index.css" type="text/css">
    <link rel="stylesheet" href="../assets/styles/Tel.css" type="text/css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>e-commerce</title>
</head>
<body class="body">
<html class="all">
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


<?php

try {
    $database = new PDO('mysql:host=localhost;dbname=commerce', 'root', 'koko');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $database->prepare("SELECT * FROM Produits WHERE Cat = 2");
$req->execute();
?>
<div class = "produit-block">
    <?php
    while($tab = $req->fetch())
    {
        ?>
        <div class = "produit">
            <h3><?php echo nl2br($tab['Libelle']) ?></h3>
            <img src="<?php echo nl2br($tab['Img']) ?>">
            <p><?php echo nl2br(utf8_encode($tab['Description'])) ?></p>
            <p><?php echo nl2br($tab['Prix']) ?> €</p>
        </div>
        <?php
    }
    $req->closeCursor();
    ?>
</div>
<?php

?>

<div class="footer">
    <p>Copyright © souiss_y/bousha_a-2017<br>
        Contact: sousis_y@etna-alternance.net
    </p>
</div>
</html>