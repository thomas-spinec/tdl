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
        <section class="centrage">
            <section id="todolist">
                <section class="background_form">
                    <h1>ToDoList</h1>
                    <form action="" method="post" id="formTask">
                        <label for="task">Tâche:</label>
                        <input type="text" name="task" class="task" placeholder="Tâche" required>
                        <input type="hidden" name="state" value="0">
                        <input type="submit" value="Ajouter" name="send" id="btnAdd">
                    </form>
                    <p></p>
                </section>
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
    </main>
    <!-- /Main -->

    <!-- Footer -->
    <?php
    require_once 'includes/footer.php';
    ?>
    <!-- /Footer -->
</body>

</html>