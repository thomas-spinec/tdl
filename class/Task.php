<?php
// Création de la classe Task

class Task
{
    // propriété
    private $id;
    private $task;
    private $state;
    private $dateCrea;
    private $dateRea;
    private $user_id;
    private $bdd;

    /* Constructeur */
    public function __construct()
    {
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
            $this->bdd = new PDO("mysql:host=$servername;dbname=$dbname; charset=utf8", $db_username, $db_password);

            // On définit le mode d'erreur de PDO sur Exception
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connexion réussie"; 
            $this->bdd->exec("set names utf8");
        }
        // si erreur, on capture les exceptions, s'il y en a une on affiche les infos
        catch (PDOException $e) {
            echo "Echec de la connexion : " . $e->getMessage();
            exit;
        }
    }

    /* Méthodes */

    //Ajout d'une tâche
    public function addTask($task, ?int $state, $user)
    {
        // html special chars
        $task = htmlspecialchars($task);
        $state = (int)htmlspecialchars($state);
        $user = htmlspecialchars($user);

        $requete = "INSERT INTO task (tache, state, dateCrea, id_utilisateur) VALUES (:task, :state, NOW(), :user_id)";

        $req = $this->bdd->prepare($requete);

        $req->execute(array(
            'task' => $task,
            'state' => $state,
            'user_id' => $user
        ));

        // fermeture connexion bdd
        $this->bdd = null;

        // return
        echo "ok";
    }

    //récupération des tâches
    public function getTasks($user)
    {
        // récupération des tâches via l'id de l'utilisateur ainsi qu'avec une date format de d/m/Y h:min

        $requete = "SELECT *, DATE_FORMAT(dateCrea, '%d/%m/%Y %H:%i') AS dateCrea, DATE_FORMAT(dateRea, '%d/%m/%Y %H:%i') AS dateRea  FROM task WHERE id_utilisateur = :user_id";

        $req = $this->bdd->prepare($requete);

        $req->execute(array(
            'user_id' => $user
        ));

        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        // fermeture connexion bdd
        $this->bdd = null;

        // return
        return $result;
    }

    // suppression d'une tâche
    public function deleteTask($id)
    {
        $requete = "DELETE FROM task WHERE id = :id";

        $req = $this->bdd->prepare($requete);

        $req->execute(array(
            'id' => $id
        ));

        // fermeture connexion bdd
        $this->bdd = null;

        // return
        echo "ok";
    }

    // Tâche marqué comme terminée
    public function taskDone($id)
    {
        $requete = "UPDATE task SET state=:bool WHERE id = :id";

        $req = $this->bdd->prepare($requete);

        $req->execute(array(
            'bool' => 1,
            'id' => $id
        ));

        // ajout de la date de réalisation
        $requete2 = "UPDATE task SET dateRea=NOW() WHERE id = :id";

        $req2 = $this->bdd->prepare($requete2);

        $req2->execute(array(
            'id' => $id
        ));

        // fermeture connexion bdd
        $this->bdd = null;

        // return
        echo "ok";
    }
}
