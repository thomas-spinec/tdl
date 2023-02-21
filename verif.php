<?php
// class include
session_start();
require_once 'class/User.php';
// instance
$user = new User();

// test si le login est dispo
if (isset($_POST['verifLogin'])) {
    $login = $_POST['verifLogin'];
    $user->isUserExist($login);
}

// récupération de l'id de l'utilisateur connecté
if (isset($_POST['getId'])) {
    $id = $user->getId();
    echo json_encode($id);
}

// inscription
if (isset($_POST['insc'])) {
    $login = $_POST['login'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $user->register($login, $name, $surname, $password);
}

// connexion
if (isset($_POST['conn'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user->connect($login, $password);
}

// modification login
if (isset($_POST['modifLogin'])) {
    $login = $_POST['login'];
    $oldLogin = $_POST['oldLogin'];
    $password = $_POST['password'];
    $user->updateLogin($login, $oldLogin, $password);
}

// modification password
if (isset($_POST['modifPass'])) {
    $password = $_POST['password'];
    $newPassword = $_POST['newPassword'];
    $user->updatePassword($password, $newPassword);
}

// ajouter un id dans la colonne des droits d'un utilisateurs
if (isset($_POST['addDroit'])) {
    $idOther = $_POST['idOther'];
    $user->addDroit($idOther);
}
