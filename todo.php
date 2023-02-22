<?php
session_start();
// appel de la class
require_once 'class/Task.php';
// instance
$task = new Task();

// récupération des tâches via l'id de l'utilisateur
if ($_GET["User"] == "currentId") {
    $userId = $_SESSION["user"]["id"];
    $tasks = $task->getTasks($userId);
    // encodage en json
    echo json_encode($tasks);
} else {
    $userId = $_GET["User"];
    $tasks = $task->getTasks($userId);
    // encodage en json
    echo json_encode($tasks);
}
