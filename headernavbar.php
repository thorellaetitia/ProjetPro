<?php
include_once ('include/createanevent.php');
?>

<div id="headernavbar">
    <div class="container-fluid header">
        <div class="row" id="header">
            <div class="introduction col-lg-4 col-md-4 col-sm-12">
                <p class="intro float-md-left float-sm-center">Larsen, votre agenda culturel gratuit</p> 
            </div>            
            <div class="connection col-lg-4 col-md-4 col-sm-12">
                <?php if (isset($_SESSION['userlogin'])) { ?>
                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#createanevent" data-whatever="createanevent">Créer son événement</button>
                <?php } ?>
            </div>

            <div class="connection col-lg-4 col-md-4 col-sm-12 float-md-right float-sm-center" id="headerbtnconnexion">
                <p class="connexion float-md-right float-sm-center"><?php if (isset($_SESSION['userlogin'])) { ?> Bienvenue  <?= $_SESSION['users_login'] ?><a href="moncompte.php" title="mon compte" id="loginpicto"><i class="far fa-user fa-2x mr-2"></i></a>
                        <a href="mesevenements.php"  title="mes événements" ><i class="far fa-edit fa-2x"></i></a>
                        <a href="deconnexion.php" title="déconnexion" ><i class="far fa-times-circle fa-2x"></i></a></p>
                <?php } else { ?>
                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#inscription" data-whatever="inscription">S'inscrire</button>
                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#seconnecter" data-whatever="seconnecter">connexion</button>
                <?php } ?>
            </div>    
        </div>
    </div>
</div>
<?php
//si la variable de session cretaeventok = l'événement est bien créé alors on affiche l'alerte suivante
if (isset($_SESSION['createEventOk'])) {
    ?>
    <div class="alert alert-warning mb-0 alert-dismissible fade show text-center" role="alert">
        Votre évenement a été créé avec succès, il est désormais consultable sur le site !!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
    <?php
    //on souhaite détruire cette variable de session afin qu'elle disparaisse lorsque l'on change
    //de page
} unset($_SESSION['createEventOk']);
?>
<?php
if (isset($_SESSION['deleteEventok'])) {
    ?>
    <div class="alert alert-danger mb-0 alert-dismissible fade show text-center" role = "alert">
        Votre évenement a bien été supprimé !
        <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
            <span aria-hidden = "true">&times;
            </span>
        </button>

    </div> 
    <?php
} unset($_SESSION['deleteEventok']);
?>

<?php
if (isset($_SESSION['modifyEventOK'])) {
    ?>
    <div class="alert alert-success mb-0 alert-dismissible fade show text-center" role = "alert">
        Votre évenement a bien été modifié !
        <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
            <span aria-hidden = "true">&times;
            </span>
        </button>

    </div> 
    <?php
} unset($_SESSION['modifyEventOK']);
?>


<?php
if (isset($_SESSION['inscriptionOK'])) {
    ?>
    <div class="alert alert-warning mb-0 alert-dismissible fade show text-center" role = "alert">
        Votre inscription est validée, vous pouvez vous connecter !!!
        <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
            <span aria-hidden = "true">&times;
            </span>
        </button>

    </div> 
    <?php
} unset($_SESSION['inscriptionOK']);
?>

<?php if (isset($_SESSION['userconnectedOK'])) {
    ?> 
    <div class="alert alert-light mb-0 alert-dismissible fade show text-center" role = "alert">
        Bienvenue  <?= $_SESSION['users_login'] ?> , vous êtes bien connecté(e) ! 
        Vous pouvez désormais créer votre événement.
        <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
            <span aria-hidden = "true">&times;
            </span>
        </button>
    </div> 
    <?php
} unset($_SESSION['userconnectedOK']);
?>

