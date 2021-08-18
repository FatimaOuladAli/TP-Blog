<?php

require_once 'model.php';


if (isset($_GET['id']) && $_GET['id'] > 0) {

    $article = getArticle($bdd, $_GET['id']);
    $commentaires = getCommentaires($bdd, $_GET['id']);
} else {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article['titre'] ?> - Mon super Blog</title>
</head>

<body>
    <h1><?= $article['titre'] ?></h1>
    <p><?= $article['date_creation'] ?></p>

    <div class="content">
        <?= $article['contenu'] ?>

        <section>
            <h2>Les commentaires</h2>

            <?php foreach ($commentaires as $commentaire) :  ?>
                <p>Le <?= $commentaire['date_commentaire'] ?>, <?= $commentaire['auteur'] ?> a dit :</p>
                <blockquote><?= $commentaire['commentaire'] ?></blockquote>
            <?php endforeach; ?>
        </section>
    </div>

</body>

</html>