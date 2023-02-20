<?php
// class include
require_once 'class/User.php';
// instance
$user = new User();
?>

<header>
    <div class="container">
        <div class="flex">
            <div id="left" class="ordi">
                <a href="index.php"><img src="img/Logo_onglet.png" alt=""></a>
            </div>

            <a href="#" id="openBtn">
                <span class="burger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <?php
            // test si l'utilisateur est connecté
            if (isset($_GET['deconnexion'])) {
                if ($_GET['deconnexion'] == true) {
                    $user->disconnect();
                    header('Location: index.php');
                }
            } else if ($user->isConnected()) {
                $login = $user->getLogin();
            ?>
                <nav class="mobile">
                    <ul>
                        <li><a class="a_head" href="index.php">Accueil</a></li>
                        <li><a class='a_head' href='profil.php'>Profil</a></li>
                        <li><a class='a_head' href='livre-or.php'>Livre d'or</a></li>
                    </ul>
                </nav>

                <div id='center'>
                    <h3>Bonjour <?= $login ?></h3>
                    <a href='index.php?deconnexion=true'><button>Déconnexion</button></a>
                </div>
                <nav class="ordi">
                    <ul>
                        <li><a class='a_head' href='profil.php'>Profil</a></li>
                        <li><a class='a_head' href='livre-or.php'>Livre d'or</a></li>
                    </ul>
                </nav>
            <?php
            } else {
            ?>
                <nav class="mobile">
                    <ul>
                        <li><a class="a_head" href="index.php">Accueil</a></li>
                        <li><a class='a_head' href='livre-or.php'>Livre d'or</a></li>
                    </ul>
                </nav>

                <div>
                    <a href='user.php?sign=conn'><button>Connexion</button></a>
                    <a href='user.php?sign=insc'><button>Inscription</button></a>
                </div>
                <div class="ordi">
                    <a class='a_head' href='index.php'>Accueil</a>
                    <a class='a_head' href='livre-or.php'>Livre d'or</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</header>