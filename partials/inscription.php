<!DOCTYPE html>

<?php

try {
    $database = new PDO('mysql:host=localhost;dbname=commerce', 'root', 'koko');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['inscription'])) {
    $nom = htmlspecialchars($_POST['Nom']);
    $prenom = htmlspecialchars($_POST['Prenom']);
    $sex = htmlspecialchars($_POST['sexe']);
    $tel = htmlspecialchars($_POST['Telephone']);
    $mail = htmlspecialchars($_POST['mail']);
    $pays = htmlspecialchars($_POST['Pays']);
    $ville = htmlspecialchars($_POST['Ville']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $code = htmlspecialchars($_POST['code_postal']);
    $comp = htmlspecialchars($_POST['complement']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);

    if (!empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['sexe']) && !empty($_POST['Telephone']) && !empty($_POST['mail']) && !empty($_POST['Pays']) && !empty($_POST['Ville']) && !empty($_POST['adresse']) && !empty($_POST['code_postal']) && !empty($_POST['complement']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $verifmail = $database->prepare("SELECT * FROM user WHERE mail = ?");
            $verifmail->execute(array($mail));
            $existmail = $verifmail->rowCount();

            if ($existmail == 0) {
                if ($password == $password2) {
                    $reauete = "INSERT INTO `dynam`.`user` (`ID`, `Nom`, `Prenom`, `Sexe`, `Telephone`, `Mail`, `Pays`, `Ville`, `Adresse`, `Code_postale`, `Comp_adress`, `pswd`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                    $inserto = $database->prepare($reauete);
                    $inserto->execute(array($nom, $prenom, $sex, $tel, $mail, $pays, $ville, $adresse, $code, $comp, $password));
                    sleep(0.5);
                    $erreur = "Votre compte a été créé";
                    header("refresh:1;url=../index.php");
                } else {
                    $erreur = "Vos mots de passe ne corespondent pas";
                }
            } else {
                $erreur = "Email déjà  utilisé";
            }
        } else {
            $erreur = "Adresse email non-valide";
        }
    } else {
        $erreur = "Veuillez remplire tout les champs s'il vous plait";
    }
}
?>
<html>
<head>
    <link rel="stylesheet" href="../assets/styles/inscription.css" type="text/css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>e-commerce</title>
</head>
<body>
<div class="inscript" align="center">
    <h2>Inscription</h2>
    <form class="forme" method="POST" action="">

        <table>
            <tr>
                <td>
                    <input class="in" type="text" name="Nom" placeholder="Nom">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="in" type="text" name="Prenom" placeholder="Prenom">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="contactChoice1"
                           name="sexe" value="Femme">
                    <label for="contactChoice1">Femme</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="contactChoice2"
                           name="sexe" value="Homme">
                    <label for="contactChoice2">Homme</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="in" type="text" name="Telephone" placeholder="Telephone">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="in" type="email" name="mail" placeholder="exemple@votreemail.com">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="in" type="text" name="Pays" placeholder="Pays">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="in" type="text" name="Ville" placeholder="Ville">
                  </td>
            </tr>
            <tr>
                <td>
                    <input class="in" type="text" name="adresse" placeholder="Adresse">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="in" type="number" name="code_postal" placeholder="Code Postal">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="in" type="text" name="complement" placeholder="Complement d'adresse">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="in" type="password" name="password" placeholder="Mot de passe">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="in" type="password" name="password2" placeholder="Confirmez votre mdp">
                </td>
            </tr>
        </table>
        <br>
        <input class="conf" type="submit" name="inscription" value="Confirmer">
    </form>
</div>
<?php
if (isset($erreur)) {
    echo '<p class="err">' . $erreur . "</p>";
}
?>
</body>
</html>