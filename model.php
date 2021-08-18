<?php 

/* fonction qui retourn le mot de passe de la base de données*/
    require 'try.php';

    function retourneMdp($bdd, $login){
       $sql = 'SELECT mdp FROM utilisateurs WHERE login = ?';
        $q = $bdd-> prepare($sql);
        $q -> execute([$login]);
        $mdp = $q -> fetchColumn();
        $q -> closeCursor();
        return $mdp;
    }

    function getArticle($bdd, $id){
        $sql = 'SELECT billets.titre, billets.contenu, billets.date_creation 
                FROM billets 
                WHERE billets.id=:id';
        $q = $bdd->prepare($sql); 
        $q->execute(array('id' => $id));
        $article =  $q->fetch(PDO::FETCH_ASSOC);
        $q->closeCursor();
        return $article;
    }

    function getCommentaires($bdd, $id){
        $sql = 'SELECT commentaires.auteur, commentaires.commentaire, commentaires.date_commentaire 
                FROM commentaires 
                WHERE commentaires.id_billet = :id';
        $q = $bdd->prepare($sql);
        $lignes = $q->execute(['id' => $id,]);
        $commentaires = $q->fetchAll(PDO::FETCH_ASSOC);
        return $commentaires;
    }

    function addArticle($bdd, $titre, $contenu){
        $sql = 'INSERT INTO billets(titre, contenu, date_creation) 
        VALUES (:titre, :contenu, NOW())';
        $q = $bdd->prepare($sql);
        return $q->execute(array(
            //on reseigne le tableau
            //ex 'variable' => $_POST['variable'],
            'titre' => htmlspecialchars($titre),
            'contenu' => htmlspecialchars($contenu),
        ));
    }

    function updateAticle($bdd, $titre, $contenu, $id){
        $sql = 'UPDATE billets 
            SET titre = :titre, contenu = :contenu, date_creation = NOW() 
            WHERE billets.id = :id';
        $q = $bdd->prepare($sql);
        return $q->execute(array(
            //on reseigne le tableau
            //ex 'variable' => $_POST['variable'],
            'titre' => htmlspecialchars($titre),
            'contenu' => htmlspecialchars($contenu),
            'id' => $id,
        ));
    }

    function recuperation($bdd, $id){
        $sql = 'SELECT titre, contenu FROM billets WHERE billets.id = :id';
        $q = $bdd -> prepare($sql);
        $q -> execute(['id' => $id]);
        $lignes = $q -> fetch(PDO::FETCH_ASSOC);
        return $lignes;
    }

    function deleteArticle($bdd, $id){
        $sql = 'DELETE FROM billets WHERE billets.id = :id';
        $q = $bdd->prepare($sql);
        $lignes = $q->execute(array(
            //on reseigne le tableau
            //ex 'variable' => $_POST['variable'],
            'id' => $id,
        ));
        return $lignes;
    }

    function getArticles($bdd){
        $sql = 'SELECT DISTINCT billets.id,billets.titre,billets.contenu,
        DATE_FORMAT(billets.date_creation, \'Le %e/%m/%Y\') AS date, COUNT(commentaires.commentaire)
        AS commentaire
        FROM commentaires
        RIGHT JOIN billets
        ON billets.id = commentaires.id_billet
        GROUP BY billets.titre';
        $q = $bdd->query($sql);
        $commentaires = $q->fetchAll(PDO::FETCH_ASSOC);
        return $commentaires;

    }
?>