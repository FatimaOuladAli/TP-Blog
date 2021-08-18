<?php


//echo 'on doit modifier l\'article ' . $_GET['id'];


session_start();

require_once 'model.php';
unset($_SESSION['message']);
 //on ajoute en base de données

if(isset($_POST['titre'], $_POST['contenu'])){
	
    $modifierAticle = updateAticle($bdd, $_POST['titre'], $_POST['contenu'], $_GET['id']);

/* Etape 5 : on traite */
if($lignes){
    $_SESSION['message'] = 'Votre article a été modifié';
    header('Location: index.php');
}
}

//Récupération des données

$lignes = recuperation($bdd, $_GET['id']);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un article - Console</title>
</head>
<body>
<?php if(isset($_SESSION['message'])) echo $_SESSION['message'] ?>
<h1>Modifier un article</h1>

<form method="post">
    <div class="field">
        <label for="titre">Le titre</label> <br>
        <input type="text" name="titre" id="titre" value = "<?= $lignes['titre'] ?>">
    </div>

    <div class="field">
    <p>Les contenu de votre article (en HTML)</p>
    <textarea name="contenu" id="contenu" cols="30" rows="10"><?= $lignes['contenu'] ?></textarea>
    </div>

    <div class="submit">
        <input type="submit" value="Envoyer">
    </div>
</form>
    
</body>
</html>

