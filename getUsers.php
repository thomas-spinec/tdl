<?php
session_start();
// appel de la class
require_once 'class/User.php';
// instance
$user = new User();

$allUsers = $user->getAllUsers();

// encodage en json
echo json_encode($allUsers);
