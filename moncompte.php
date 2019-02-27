<?php
session_start();
include_once('controllers/controllermoncompte.php');
?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Shortcut Icon -->
        <link rel="shortcut icon" href="assets/images/larsen.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
        <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/style.css" />

        <title>MON PROJET PRO</title>
    </head>
    <body>
        <?php
        include_once ('headernavbar.php');
        include_once ('navbar.php');
        ?>
        <div class="container-fluid">
            <div class="row justify-content-between mt-2">
                <div class="btn btn-outline-warning btn-sm ml-1">
                    <a href="index.php">Retour site</a>
                </div>
                <div class="btn btn-outline-warning btn-sm mr-1">
                    <a href="mesevenements.php">mes événements</a>
                </div>
            </div>
            <div class="text-center">                        
                <h1 class="mt-2"><i class="myevents mx-auto"></i>Mes informations</h1>
            </div>

            <div class="row">
                <?php
                foreach ($arrayProfileUser as $profileUser) {
                    ?>
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <div class="card" >
                            <i class="far fa-user fa-4x mr-2"></i>
                            <div class="card-body">
                                <h5 class="card-title"><?= $profileUser-> users_name ?>Card title</h5>
                                <p class="card-text"><?= $profileUser-> users_firstname ?> </p>
                                <p class="card-text"><?= $profileUser-> usertypes_id ?> </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?= $profileUser-> users_mail ?></li>
                                <li class="list-group-item"><?= $profileUser-> users_age ?></li>
                                <li class="list-group-item"><?= $profileUser-> users_login ?></li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Supprimer</a>
                                <a href="#" class="card-link">Modifier</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
        <!--        //creation d'un bouton SCROLL TO TOP//-->-->
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-circle-up"></i></button> 


        <!--        <a href = "index.php" class = "btn btn-outline-warning btn-sm">Diffuser l'événement</a><br>-->


        <script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/script.js"></script>
    </body>
</html>



