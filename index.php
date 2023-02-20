<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="site.css">
    <link rel="icon" type="images/png" sizes="64x64" href="img/Logo_onglet.png" />
    <script src="scripts/jquery-3.6.3.min.js"></script>
    <script src="scripts/user.js"></script>
    <script src="scripts/menu.js"></script>
</head>

<body>
    <!-- Header -->
    <?php
    // class include
    require_once 'class/User.php';
    // instance
    $user = new User();
    session_start();
    require_once 'includes/header.php';
    ?>
    <!-- /Header -->

    <!-- Main -->
    <main>
        <section class="centrage" id="intro">
            <h1>Bienvenue sur ToDoList!</h1>
            <p>Vous allez pouvoir créer des tâches afin de vous aider à vous organiser.</p>
            <p>Vous devez vous inscrire et vous connecter (formulaire présent ci-dessous) afin de commencer à organiser vos journées.</p>
            <p>Le prénom et le nom ne sont pas obligatoires</p>
        </section>
        <section class="centrage">
            <section id="inscription">
                <section class="background_form">
                    <h1>Inscription</h1>
                    <form action="" method="post">
                        <label for="name">Prénom</label>
                        <input type="text" name="name" class="name" placeholder="Prénom">
                        <p></p>
                        <label for="surname">Nom</label>
                        <input type="text" name="surname" class="surname" placeholder="Nom">
                        <p></p>
                        <label for="login">login</label>
                        <input type="text" name="login" class="login" placeholder="login" required>
                        <p></p>
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="password" placeholder="Mot de passe" required>
                        <p></p>
                        <label for="password2">Confirmation du mot de passe</label>
                        <input type="password" name="password2" id="password2" placeholder="Confirmation du mot de passe" required>
                        <p></p>
                        <input type="submit" value="S'inscrire" name="send" id="btnInsc">
                        <p></p>
                    </form>
                </section>
                <button id="switchConn">Connexion</button>
            </section>

            <section id="connexion">
                <button id="switchInsc">Inscription</button>
                <section class="background_form">
                    <h1>Connexion</h1>
                    <form action="" method="post">
                        <label for="login">login</label>
                        <input type="text" name="login" class="login" placeholder="login" required>
                        <p></p>
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="password" placeholder="Mot de passe" required>
                        <p></p>
                        <input type="submit" value="Se connecter" id="btnConn">
                        <p></p>
                    </form>
                </section>
            </section>
        </section>
    </main>
    <!-- /Main -->

    <!-- Footer -->
    <?php require_once 'includes/footer.php'; ?>
    <!-- /Footer -->

</body>

</html>