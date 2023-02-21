<?php
session_start();
// appel de la class
require_once 'class/Task.php';
// instance
$task = new Task();

// récupération des tâches via l'id de l'utilisateur
if (isset($_POST["idUser"])) {
    $userId = $_POST["idUser"];
    $tasks = $task->getTasks($userId);
    // encodage en json
    echo json_encode($tasks);
}
