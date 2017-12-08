<?php
session_start();
$mysql = new PDO('mysql:host=localhost;dbname=commerce', 'root', 'koko');
$result = $mysql->query('SELECT * FROM Produits WHERE id ='.$_POST['id']);
$produit = $result->fetch();

require_once 'function.php';

$panier = new Panier('Produits');

$valeurs = array(
	'Img' => $produit['Img'],
'Libelle' => $produit['Libelle'],
'Prix' => $produit['Prix'],
'qte' => $_POST['qte'],
'ID' => $produit['ID']
);


$panier->set($_POST['id'], $valeurs);
header('Location: votre_panier.php');
?>