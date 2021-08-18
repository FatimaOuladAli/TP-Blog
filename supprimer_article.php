<?php

// echo 'on doit supprimer l\'article ' . $_GET['id'];

require_once 'model.php';
if(isset($_GET['id'])){
	
   $suppArticle = deleteArticle($bdd, $_GET['id']);

}
/* Etape 5 : on traite */
header('Location: index.php');
?>