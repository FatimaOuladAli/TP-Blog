<?php

try {
    /* Etape 1: on instancie la classe PDO dans un objet $bdd (copier/coller en modifiant la ligne $bdd) */
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
        ];
        $bdd = new PDO('mysql:host=localhost;dbname=mon_blog', 'root', '', $options);
    } catch (Exception $e) {
    
        die('Erreur : ' . $e->getMessage());
    }

?>