<?php

class users extends database { //on crée une class clients dont le parent est database donc clients héritent des attributs et methodes de database
////on définit les attributs de la table users car ils n'existent pas dans database

    public $users_id;
    public $users_name;
    public $users_firstname;
    public $users_mail;
    public $users_age;
    public $users_login;
    public $users_password;
    public $users_admin;
    public $usertypes_id;

//      création fonction createusers pour ajouter des users dans la base de données
//    on crée une fonction qui va nous permettre d'inscrire les internautes
    public function CreateUsers() {
        $query = 'INSERT INTO `poqs_users` SET `users_name` = :name,'
                . ' `users_firstname` = :firstname,'     //:firstname = marqueur nominatif
                . ' `users_mail` = :mail,'
                . ' `users_age` = :age,'
                . ' `users_login` = :login,'
                . ' `users_password` = :password,'
                . '`users_admin` = :users_admin,'
                . '`usertypes_id`=:usertypes_id';

        //injection d'éléments dans la base de données (lastName,fistName...)donc on prépare la requête
        //besoin de bindvalue pour faire le lien entre les éléments que l'on va rentrer dans la base et 
        //les éléments du formulaire.
        $usersList = $this->database->prepare($query);
//        //les bindvalue sécurisent l'injection d'éléments dans la base en spécifiant les valeurs ...
        $usersList->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $usersList->bindValue(':name', $this->name, PDO::PARAM_STR);
        $usersList->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $usersList->bindValue(':age', $this->age, PDO::PARAM_INT);
        $usersList->bindValue(':login', $this->login, PDO::PARAM_STR);
        $usersList->bindValue(':password', $this->password, PDO::PARAM_STR);
        $usersList->bindValue(':users_admin', 0, PDO::PARAM_BOOL);
        $usersList->bindvalue(':usertypes_id', $this->usertypes_id, PDO::PARAM_INT);
//lorsque l'on prépare la requete on doit l'éxécuter
        return $usersList->execute();
    }

    //création fonction checkUsersByLogin pour vérifier si le login existe bien dans la base de données
    //je crée ma fonction checkUsersByLogin
    public function checkUserBylogin($users_login) {
        //je stock ma requête dans une variable $query
        $query = "SELECT * FROM `poqs_users` WHERE `users_login` LIKE :users_login";
        //le résultat de ma requête je la stocke dans $resultQueryCheckUserByLogin
        //$this = correspond aux attributs de ma classe users 
        $resultQuerycheckUserBylogin = $this->database->prepare($query);
        $resultQuerycheckUserBylogin->bindValue("users_login", $users_login, PDO::PARAM_STR);
        //avec le this il faut cibler l'élément de ma classe
        //le fetchall permet de récupérer toutes les infos de la requete et les transformer ds un tableau d'objets
        $resultQuerycheckUserBylogin->execute();
        $dataUser = $resultQuerycheckUserBylogin->fetch(PDO::FETCH_OBJ);
        return $dataUser;
        //le résultat = on lui demande d'aller chercher les éléments users pour en faire un tableau 
        //le parcourir et afficher ce que l'on souhaite
        //faire un fetch en utilisant l'objet PDO.
    }

    //on crée une méthode pour afficher le profil du user par son idr
    // sur la page moncompte.php
    public function displayUserById() {
        //je fais ma requête dans une variable $query
        $query = 'SELECT *' 
                . 'FROM `poqs_users`'
                . 'INNER JOIN `poqs_usertypes`'
                . 'ON `poqs_users`.`usertypes_id`=`poqs_usertypes`.`usertypes_id`'
                . 'WHERE `users_id`=`:users_id`';
        //le résultat de ma requête je le stocke dans $resultprofileevent
        //$this = correspond aux attributs de ma classe event, à l'élément de ma classe (table event)
        $resultProfileUser = $this->database->prepare($query);
        //avec le this=ATTRIBUT il faut cibler l'élément de ma classe 
        //Je lie le marqueur nominatif id à l'attribut id
        $resultProfileUser->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);
        $resultProfileUser->execute();
        $arrayProfileUser = $resultProfileUser->fetchAll(PDO::FETCH_OBJ);
        return $arrayProfileUser;
        //le résultat = on lui demande d'aller chercher les éléments firstname,lastname...etc donc il faut 
        //faire un fetchALL en utilisant l'objet PDO.
    }

}

?>
