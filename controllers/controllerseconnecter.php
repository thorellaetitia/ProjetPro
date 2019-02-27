<?php

require_once './models/modelDatabase.php';
require_once './models/modelUsers.php';

//j'instancie un nouvel objet
$loginusersObj = new users();

//on déclare un tableau d'erreurs vide;
$errorsArrayconnection = [];

//création d'une variable pour l'ouverture du modal en cas d'erreurs
$modalErrorconnection = false;


if (isset($_POST['connectBtn'])) { // au clic du bouton, on lance les vérifications
    
    if (isset($_POST['users_login'])) {
        $users_login = htmlspecialchars($_POST['users_login']);
        if (empty($_POST['users_login'])) {
            $errorsArrayconnection['users_login'] = 'login incorrect';
        }
    }

    if (isset($_POST['users_password'])) {
        $users_password = htmlspecialchars($_POST['users_password']);

        if (empty($_POST['users_password'])) {
            $errorsArrayconnection['users_password'] = 'mot de passe incorrect';
        }
    }

    //si et seulement si le tableau d'erreurs n'est pas égal à 0 alors le modal s'ouvre à nouveau
    if (count($errorsArrayinscription) !== 0) {
        $modalErrorconnection = true;
    }

    //si le tableau d'erreurs lié à la connexion est strictement égal à 0 alors on 
    //appliquera la méthode checkUserByLogin pour vérifier si le login existe bien dans la base de données.
    if (count($errorsArrayconnection) == 0) {
        $dataUser = $loginusersObj->checkUserBylogin($users_login);

        //on va vérifier que le mot de passe soit égal au mot de passe récupéré dans la bdd
        if (is_object($dataUser)) {
            //si le mot de passe est le bon alors on créé les objets et on récupère
        // les informations suivantes via le $_SESSION
            if (password_verify($users_password, $dataUser->users_password)) {
                $_SESSION['users_id'] = $dataUser->users_id;
                $_SESSION['users_name'] = $dataUser->users_name;
                $_SESSION['users_firstname'] = $dataUser->users_firstname;
                $_SESSION['users_mail'] = $dataUser->users_mail;
                $_SESSION['users_age'] = $dataUser->users_age;
                $_SESSION['users_login'] = $dataUser->users_login;
                $_SESSION['usertypes_id'] = $dataUser->usertypes_id;
                $_SESSION['userlogin'] = true;
                $_SESSION['userconnectedOK'] = true;
                //si tout est ok on se dirige vers la page mesevenements.php
                header('Location: mesevenements.php');
                exit();
                //sinon
            } else { 
                //création d'un message si le user se trompe de mot de passe
                $messageNonValidPassword = true;
            }
        } else {
            //création d'un message si le user n'a pas de compte
            $messageErrorAccount = true;
            
        }
        
    }
    
}
