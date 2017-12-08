<?php
session_start();

$mysql = new PDO('mysql:host=localhost;dbname=commerce', 'root', 'koko');
$result = $mysql->query('SELECT * FROM Produits WHERE id ='.$_GET['id']);
$produit = $result->fetch();

require_once 'function.php';
$panier = new Panier('Produits');
$qte = 1;
if($produitPanier = $panier->get($_GET['ID'])){
	$qte = $produitPanier['qte'];
}
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
<div class="all">
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
                <li><a>ACCUEIL</a></li>
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
            <a href="Panier.php"><img class="sac" title="Panier"
                                               src="../assets/images/shopping-1705800_960_720.png"></a>
            <img class="fav" src="../assets/images/star-1901588_960_720.png">
        </div>
</div>
<div class = "produit-block">
    <div class="new">
        <h1 class="titre">Nouveautés</h1>
        <br /><br /><br /><br /><br /><br /> <br /> <bt >
<h3><?php print $produit['Libelle'] ?> <br />
	<img src="<?php echo nl2br($produit['Img']) ?>"><br />
 <?php print $produit['Prix'] ?> <br />euros</h3>
<p><?php echo nl2br(utf8_encode($produit['Description'])) ?></p>

<form action="ajout_panier.php" method="post">
	<p>
		<label>Quantite</label>
		<input type="number" name="qte" value="<?php print $qte ?>" />
	</p>
	<p>
		<input type="hidden" name="id" value="<?php print $produit['ID'] ?>" />
		<input type="submit" value="acheter" />
	</p>
</form>
        </div>
    </div>
    <div class="footer">
       
    </div>
</div>

</body>
</html>