<!DOCTYPE html>

<?php
session_start();

try {
    $database = new PDO('mysql:host=localhost;dbname=commerce', 'root', 'koko');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['connexion']))
{
    $mailco = htmlspecialchars($_POST['email']);
    $psswdco = sha1($_POST['psswdco']);

    if(!empty($mailco) && !empty($psswdco))
    {
        $requser = $database->prepare("SELECT * FROM user WHERE Mail = ? && pswd = ?");
        $requser->execute(array($mailco, $psswdco));
        $existuser = $requser->rowCount();
        if ($existuser == 1)
        {
            $infouser = $requser->fetch();
            $_SESSION['id'] = $infouser['id'];
            $_SESSION['mail'] = $infouser['mail'];
            $_SESSION['connect'] = 1;
            header("Location: ../index.php?id=".$_SESSION['id']);
        }
        else{
            $erreur = "Pseudo/Mot de passe invalide";
        }
    }
    else{
        $erreur = "Veuillez remplir tous les champs";
    }
}

?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>

<body>

<div align="center">
    <h2>Connexion</h2>
    <form method="POST" action="">
        <input type="text" name="email" placeholder="Mail"> <br>
        <input type="password" name="psswdco" placeholder="Mot de passe"> <br>
        <input type="submit" name="connexion" value="Connexion">

    </form>
    <p>Ou <a href="inscription.php">inscrivez-vous</a></p>
    <?php
    if (isset($erreur)) {
        echo '<p class="err">' .$erreur. "</p>";
    }
    ?>
</div>

</body>
</html>