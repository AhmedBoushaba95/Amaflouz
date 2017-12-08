<?php
session_start();
require_once 'function.php';
$panier = new Panier('Produits');
$panier->delete($_GET['id']);
header('Location: votre_panier.php');
?>