<?php
// connection à la BDD avec PDO
// en local ////////////////////
$servername = 'localhost';
$dbname = 'tdl';
$db_username = 'root';
$db_password = '';

// en ligne ///////////////////
// $servername = 'localhost';
// $dbname = 'thomas-spinec_tdl';
// $db_username = 'adminbdd';
// $db_password = 'basededonnees';


// essaie de connexion
try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname; charset=utf8", $db_username, $db_password);

    // On définit le mode d'erreur de PDO sur Exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connexion réussie"; 
    $bdd->exec("set names utf8");
}
// si erreur, on capture les exceptions, s'il y en a une on affiche les infos
catch (PDOException $e) {
    echo "Echec de la connexion : " . $e->getMessage();
    exit;
}

// select all
$sql = "SELECT * FROM utilisateurs WHERE id=:id";

// prepare
$stmt = $bdd->prepare($sql);

// execute with bind
$stmt->execute(['id' => 2]);

// fetch
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// print
var_dump($result["id_droit"][0]);
