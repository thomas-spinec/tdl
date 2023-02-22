<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
    <link rel="stylesheet" href="site.css">
    <link rel="icon" type="images/png" sizes="64x64" href="img/Logo_onglet.png">
    <script src="https://kit.fontawesome.com/1a481da37a.js" crossorigin="anonymous"></script>
    <script src="scripts/jquery-3.6.3.min.js"></script>
    <script src="scripts/task.js"></script>
</head>

<body>
    <!-- Header -->
    <?php
    // class include
    require_once 'class/User.php';
    // instance
    session_start();
    $user = new User();
    // if not connected go to index.php
    if (!$user->isConnected()) {
        header('Location: index.php');
    }
    require_once 'includes/header.php';
    ?>
    <!-- /Header -->

    <!-- Main -->
    <main>
        <p id="hidden"><?= $user->getId() ?></p>
        <section class="centrage">
            <section id="todolist">
                <section id="droit">
                    <section>
                        <section class="background_form">
                            <div class="toggle">
                                <h4>donner les droits</h4>
                                <input type="checkbox" name="" id="slideRights">
                            </div>
                            <form action="" id="formRights">
                                <div id="usersRights"></div>
                                <input type="submit" value="donner les droits" name="send" id="btnRights">
                            </form>
                        </section>
                        <section class="background_form">
                            <div class="toggle">
                                <h4>modifier les tâches de :</h4>
                                <input type="checkbox" name="" id="slideUsersTasks">
                            </div>
                            <!-- Menu déroulant qui contiendra ceux qu'on peux gérer -->
                            <form action="" id="formUsersTasks">
                                <select name="user" id="usersTasks">
                                </select>
                                <input type="submit" value="modifier les tâches" name="send" id="btnUserTasks">
                            </form>

                        </section>
                    </section>
                </section>
                <section class="background_form" id="addTask">
                    <h2 id="title">ToDoList de <?= $user->getLogin() ?></h2>
                    <form action="" method="post" id="formTask">
                        <label for="task">Tâche:</label>
                        <input type="text" name="task" class="task" placeholder="Tâche" required>
                        <input type="hidden" name="state" value="0">
                        <input type="submit" value="Ajouter" name="send" id="btnAdd">
                    </form>
                    <p></p>
                </section>
                <section id="lists">
                    <section class="background_form">
                        <div class="toggle">
                            <h2>A Faire</h2>
                            <input type="checkbox" name="" id="slideToDo" checked>
                        </div>
                        <section id="toDo">
                        </section>
                    </section>
                    <section class="background_form">
                        <div class="toggle">
                            <h2>Finies</h2>
                            <input type="checkbox" name="" id="slideDone" checked>
                        </div>
                        <section id="done">
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </main>
    <!-- /Main -->

    <!-- Footer -->
    <?php
    require_once 'includes/footer.php';
    ?>
    <!-- /Footer -->
</body>

</html>