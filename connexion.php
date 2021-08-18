<?php 
session_start();

require 'model.php';
require 'tools.php';

if(isset($_GET['deconnecter'])) unset($_SESSION['login']);
/* si les post[login] et post[mdp] exsiste et qu'elles sont vide alors 
on laisse un message du type remplir tous les champs */
if(isset($_POST['login'], $_POST['mdp'])){
    if(empty($_POST['login']) || empty($_POST['mdp'])){
        $_SESSION['message'] = 'veuillez remplir tous les champs';
    }else{
        /*$mdp mot de passe de la base de donnees*/
        $mdp = retourneMdp($bdd, $_POST['login']);
        if(password_verify($_POST['mdp'], $mdp)){
            $_SESSION['login'] = $_POST['login'];
            header('Location: index.php');
        }else{
            $_SESSION['message'] = 'Identifiant ou mot de passe incorrects';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
<h1>Se connecter</h1>
<?php if(isset($_SESSION['message'])) afficheMsg(); ?>

<form action="" method="post">
    <div class="field">
        <label for="login">Login</label>
        <input type="text" name="login" id="login">
    </div>
    <div class="field">
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">
    </div>

    <input type="submit" value="Se connecter">
</form>
    
</body>
</html>