<?php

session_start();
require_once 'model.php';
unset($_SESSION['message']);

if(isset($_POST['titre'], $_POST['contenu'])){
	$ajouterArticle = addArticle($bdd, $_POST['titre'], $_POST['contenu']);

/* Etape 5 : on traite */
if($ajouterArticle){
    $_SESSION['message'] = 'Yes man!';
    header('Location: index.php');
}

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aujouter un article - Console</title>
</head>
<body>
<?php if(isset($_SESSION['message'])) echo $_SESSION['message'] ?>
<h1>Ajouter un article</h1>

<form method="post">
    <div class="field">
        <label for="titre">Le titre</label> <br>
        <input type="text" name="titre" id="titre">
    </div>

    <div class="field">
    <p>Les contenu de votre article (en HTML)</p>
    <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea>
    </div>

    <div class="submit">
        <input type="submit" value="Envoyer">
    </div>
</form>
    
</body>
</html>

