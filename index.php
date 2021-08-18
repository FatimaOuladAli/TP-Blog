<?php


session_start();
require_once 'model.php';
/* si la session n'existe pas ou qu'elle est vide alors on redirige vers la page de connexion */
if(!isset($_SESSION['login']) || empty($_SESSION['login'])) header('Location: connexion.php');

$commentaires = getArticles($bdd);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mon super blog</title>
</head>
<body>
<?php if(isset($_SESSION['message'])) echo $_SESSION['message'] ?>
    <header>
        <h1>Mon super blog</h1>

        <a href="connexion.php?deconnecter">Se déconnecter</a>
    </header>
    <main>
        <?php foreach($commentaires as $commentaire): ?>
        <section class="article">
        
            <h2><?= htmlspecialchars($commentaire['titre']) ?></h2>
            <p><?= $commentaire['date'] ?></p>
            <p class="resume"><?= htmlspecialchars(substr($commentaire['contenu'], 0, 50)) . '...' ?></p>
            <p class="readmore"><a href="article.php?id=<?= $commentaire['id'] ?>">Lire la suite</a></p>
            <p class="commentaire">Il y a : <?= $commentaire['commentaire']; ?> commentaires</p>
            <ul>    
                <li><a href="modifier_article.php?id=<?= $commentaire['id'] ?>">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 25.525 25.525" style="enable-background:new 0 0 25.525 25.525;" xml:space="preserve" width="20">
<g>
	<g>
		<path style="fill:#010002;" d="M8.602,15.186l-1.466,5.119l5.12-1.465l9.878-9.877l-3.653-3.655L8.602,15.186z M18.979,7.539
			c0.217,0.217,0.217,0.571,0,0.787l-7.723,7.722c-0.217,0.217-0.57,0.217-0.786,0c-0.217-0.217-0.217-0.57,0-0.787l7.721-7.722
			C18.409,7.323,18.764,7.323,18.979,7.539z M25.525,5.552l-2.416,2.417l-3.646-3.645l2.418-2.417L25.525,5.552z M15.471,17.891
			l1.813-1.813v7.539H0V6.563l5.122-4.35h12.163v2.288l-1.813,1.844V3.744H7.064v4.487H1.811v13.856H15.47L15.471,17.891
			L15.471,17.891z"/>
	</g>
</g>
</svg>
                 Modifier cet article</a></li>
                <li><a href="supprimer_article.php?id=<?= $commentaire['id'] ?>">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="20" viewBox="0 0 488.936 488.936" style="enable-background:new 0 0 488.936 488.936;"
	 xml:space="preserve">
<g>
	<g>
		<path d="M381.16,111.948H107.376c-6.468,0-12.667,2.819-17.171,7.457c-4.504,4.649-6.934,11.014-6.738,17.477l9.323,307.69
			c0.39,12.92,10.972,23.312,23.903,23.312h20.136v-21.012c0-24.121,19.368-44.049,43.488-44.049h127.896
			c24.131,0,43.893,19.928,43.893,44.049v21.012h19.73c12.933,0,23.52-10.346,23.913-23.268l9.314-307.7
			c0.195-6.462-2.234-12.863-6.738-17.513C393.821,114.767,387.634,111.948,381.16,111.948z"/>
		<path d="M309.166,435.355H181.271c-6.163,0-11.915,4.383-11.915,11.516v30.969c0,6.672,5.342,11.096,11.915,11.096h127.895
			c6.323,0,11.366-4.773,11.366-11.096v-30.969C320.532,440.561,315.489,435.355,309.166,435.355z"/>
		<path d="M427.696,27.106C427.696,12.138,415.563,0,400.591,0H88.344C73.372,0,61.239,12.138,61.239,27.106v30.946
			c0,14.973,12.133,27.106,27.105,27.106H400.59c14.973,0,27.105-12.133,27.105-27.106L427.696,27.106L427.696,27.106z"/>
	</g>
</g>
        </svg>
                Supprimer cet article</a></li>
            </ul>
        </section>
       
        <?php endforeach; ?>
        
    </main>
</body>
</html>
