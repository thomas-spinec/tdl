<?php
session_start();
// appel des class
require_once 'class/Task.php';
require_once 'class/User.php';
// instance
$user = new User();
$task = new Task();

// ajout de la tâche dans la bdd
if (isset($_POST["send"])) {
    $text = $_POST["task"];
    $state = (int)$_POST["state"];
    if ($_GET["User"] == "currentId") {
        $userId = $_SESSION["user"]["id"];
    } else {
        $userId = $_GET["User"];
    }
    $task->addTask($text, $state, $userId);
}

// suppression de la tâche dans la bdd
if (isset($_POST["action"]) && $_POST["action"] == "delete") {
    $id = $_POST["id"];
    $task->deleteTask($id);
}

// tâche marqué comme terminée
if (isset($_POST["action"]) && $_POST["action"] == "done") {
    $id = $_POST["id"];
    $task->taskDone($id);
}
