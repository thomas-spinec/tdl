<?php
session_start();
// appel de la class
require_once 'class/User.php';
// instance
$user = new User();

// récupération des droits de l'utilisateur
$droits = $user->getDroit();

// encodage en json
echo json_encode($droits);
