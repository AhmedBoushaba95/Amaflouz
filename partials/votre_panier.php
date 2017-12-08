<?php
session_start();
require_once 'function.php';
$panier = new Panier('Produits');
$listeProduits = $panier->getPanier();
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
            if (isset($_SESSION['connect'])) {?>

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
            <a href="votre_panier.php"><img class="sac" title="Panier"
                                               src="../assets/images/shopping-1705800_960_720.png"></a>
            <img class="fav" src="assets/images/star-1901588_960_720.png">
        </div>
    </div>

        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            	<?php if(!$listeProduits){ ?>
			     <p>Votre panier est vide</p>
			      <?php }else{ ?>
					 <center>  <table border = "1" width="50%">

					   <tr>
					   	<td>Photo de produit</td>
					   <td>Libelle</td>
					   <td>Prix</td>
					   <td>Quantite</td>
					   <td></td>
					   </tr>

					   <?php foreach($listeProduits as $produit){ ?>
										      <tr>
										      	<td><img src="<?php echo nl2br($produit['Img']) ?>" style="width: 150px;"></td>
										      <td><?php print $produit['Libelle'] ?></td>
										      <td><?php print $produit['Prix']*$produit['qte'] ?>€</td>
										      <td><?php print $produit['qte'] ?></td>
										      <td><a href="produit.php?id=<?php print $produit['ID'] ?>">Modifier</a> |
										      <a href="supprimer_panier.php?id=<?php print $produit['ID'] ?>">Supprimer</a></td>
										      </tr>
										      <?php } ?>
					   </table></center>
					   <?php } ?>