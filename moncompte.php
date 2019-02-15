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
        ?>
        <?php
        include_once ('navbar.php');
        ?>
        <div class="closebutton">
            <a href="index.php">Fermer</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach ($resultAllDataEvent as $events) {
                   
                    ?>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div id="event">
                            <div class="card-body">
                                <div class="card">
                                    <img class="img-fluidcard" src="img/<?= $events->event_picture ?>" alt="event_picture">
                                    <div class="card-body">
                                        <h1>Récapitulatif</h1>
                                        <h1 class="card-title">Titre :<?= $events->users_id ?><?= $events->event_title ?></h1>
                                        <p class="card-text">Description: <?= $events->event_description ?></p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Catégorie :<?= $events->eventcategory_name ?></li>
                                        <li class="list-group-item">Date :<?= $events->event_date ?></li>
                                        <li class="list-group-item">Heure :<?= $events->event_time ?></li>
                                        <li class="list-group-item">Lieu :<?= $events->showplaces_name ?> <?= $events->showplaces_postalcode ?></li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="#" class="card-link">Supprimer</a>
                                        <a href="modifyevent.php?id=<?= $events->event_id ?>" class="card-link">Modifier l'événement</a>
                                    </div>
                                    <div class="footer">
                                        <div>Prix indicatif : </div>
                                        <div>Réserver vos billets<a href="https://www.digitick.com/"><img src="assets/images/digitick.jpg" width="50px" /></a></div>
                                    </div>
                                </div>  

                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/script.js"></script>
    </body>
</html>



