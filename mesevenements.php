<?php
session_start();
if (!isset($_SESSION['users_id'])) {
    header('Location: index.php');
    exit();
}
include_once('controllers/controllermesevenements.php');
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
                    <a href="moncompte.php">retour mon compte</a>
                </div>
            </div>
            <div class="text-center">                        
                <h1 class="mt-5"><i class="myevents mx-auto"></i>Mes événements</h1>
                <!-- MODAL CONFIRMATION SUPPRESSION EVENEMENT -->
                <div class="modal fade" id="deleteEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">suppression d'un évenement</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer cet évenement ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <a id="validateDeleteEvent" href="#" type="button" class="btn btn-primary">Confirmer</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN MODAL CONFIRMATION SUPPRESSION EVENEMENT-->
            </div>
            <div class="row">
                <?php
                foreach ($arrayProfileEvent as $event) {
                    ?>
                    <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                        <div class="containerevent">
                            <div class="card-media">
                                <div class="card-media-object-container">
                                    <div class="card-media-object" style="background-image: url(img/<?= $event->event_picture ?>);"></div>
                                    <ul class="card-media-object-social-list d-flex justify-content-between">
                                        <li class="d-xl-none d-lg-none d-md-block d-sm-block d-xs-block rounded-circle bg-warning ml-1 mb-2">
                                            <a href="mesevenements.php?id=<?= $event->event_id ?>"><i class="mx-auto far fa-trash-alt pt-2 text-dark"></i></a>
                                        </li>
                                        <li class="d-xl-none d-lg-none d-md-block d-sm-block d-xs-block rounded-circle bg-warning ml-1 mb-2">
                                            <a href="modifyevent.php?id=<?= $event->event_id ?>"><i class="mx-auto fas fa-pencil-alt pt-2 text-dark"></i></a>
                                        </li>
                                        <li class="rounded-circle bg-warning ml-1 mb-2" data-container="body" data-toggle="popover"
                                            data-trigger="hover" data-placement="top" data-content="<?= $event->event_description ?>">
                                            <i class="mx-auto fas fa-search-plus text-dark pt-2"></i>
                                        </li>
                                    </ul>
                                </div>
                                <!-- body container -->
                                <div class="card-media-body col-sm-12 col-md-8 col-lg-8 mx-auto <?= $event->eventcategory_name ?>">
                                    <div class="card-media-body-top">
                                        <span class="subtle"> <?= $newdate = date('d/m/Y', strtotime($event->event_date)) ?> à <?= $newdate2 = date('H:i', strtotime($event->event_time)) ?></span>
                                        <div class="card-media-body-top-icons u-float-right d-flex justify-content-between ">
                                            <a data-toggle="modal" data-target="#deleteEvent" data-delete-id="<?= $event->event_id ?>" class="btn btn-outline-warning btn-sm d-none d-xl-block d-lg-block d-md-none d-sm-none d-xs-none delete-event">Supprimer</a>
                                            <a href="modifyevent.php?id=<?= $event->event_id ?>" class="btn btn-outline-warning btn-sm d-none d-xl-block d-lg-block d-md-none d-sm-none d-xs-none">Modifier</a>
                                        </div>
                                        <span class="card-media-body-heading small d-none d-xl-block d-lg-block d-md-none d-sm-none d-xs-none"><?= $event->event_title; ?></span>
                                        <a class="card-media-body-heading small d-xl-none d-lg-none d-md-block d-sm-block d-xs-block"  data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-title="<?= ($events->event_title); ?>"><?= substr($events->event_title, 0, 15); ?>...</a>


                                    </div>
                                    <div class="card-media-body-supporting-bottom">
                                        <span class="card-media-body-supporting-bottom-text subtle"><?= $event->showplaces_name ?></span>
                                        <span class="card-media-body-supporting-bottom-text subtle u-float-right"><?= $event->eventsub_category_name ?></span>
                                    </div>
                                    <div class="card-media-body-supporting-bottom card-media-body-supporting-bottom-reveal">
                                        <span class="card-media-body-supporting-bottom-text subtle">#<?= $event->eventcategory_name ?></span>
                                        <a href="https://www.digitick.com/" class="card-media-body-supporting-bottom-text card-media-link u-float-right"><img src="assets/images/digitick.jpg" width="50px" /></a>
                                    </div>
                                </div>
                                <!-- media container -->
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <!--            //creation d'un bouton SCROLL TO TOP//-->
            <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-circle-up"></i></button> 
        </div>

        <!--        <a href="index.php" class="btn btn-outline-warning btn-sm">Diffuser l'événement</a><br>-->


        <script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/script.js"></script>
    </body>
</html>




