<?php
session_start();
// appel des class
require_once 'class/Task.php';
require_once 'class/User.php';
// instance
$user = new User();
$task = new Task();

// récupération des tâches via l'id de l'utilisateur
$userId = $user->getId();
$tasks = $task->getTasks($userId);

// encodage en json
echo json_encode($tasks);
