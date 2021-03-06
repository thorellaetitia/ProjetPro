<?php
include_once('controllers/controllerinscription.php');
?>

<div class="modal fade <?= $modalErrorinscription ? 'modalErrorinscription' : ''; ?>" id="inscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- debut modal -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modalinscription">Pas encore inscrit ? Inscrivez-vous rapidement en quelques clics</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form-->
                
                <form method="post" action="" >
                    <div class="form-group  text-center">
                        Vous êtes : <select name="usertypes_id" required >
                            <option>Veuillez renseigner un champ</option> 
                            <option value="1" <?= isset ($_POST['usertypes_id']) && $_POST['usertypes_id'] == 1 ? 'selected' : '' ?>>Professionnel</option>
                            <option value="2" <?= isset ($_POST['usertypes_id']) && ($_POST['usertypes_id'] == 2) ? 'selected' : '' ?>>Particulier</option>
                            <span class="error"><?= isset($errorsArrayevent['usertypes_id']) ? $errorsArrayevent['usertypes_id'] : ''; ?></span>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Votre nom : </label>
                        <input type="text" name="name" id="name" placeholder="ex : Dupont" value="<?= (isset($name)) ? $name : ''; ?>"  required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['name']) ? $errorsArrayinscription['name'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="firstname">Votre prénom :</label> 
                        <input type="text" name="firstname" id="firstname" placeholder="ex : Stéphane" value="<?= (isset($firstname)) ? $firstname : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['firstname']) ? $errorsArrayinscription['firstname'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="age">Votre âge : </label> 
                        <input type="text" name="age" id="age" placeholder="âge" value="<?= (isset($age)) ? $age : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['age']) ? $errorsArrayinscription['age'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="mail">Votre mail : </label> 
                        <input type="email" name="mail" id="age" placeholder="monsieurtruc@gmail.com" value="<?= (isset($mail)) ? $mail : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['mail']) ? $errorsArrayinscription['mail'] : ''; ?></span>
                    </div>                         
                    <div class="form-group">
                        <label for="login">Votre login : </label>
                        <input type="text" name="login" id="login" placeholder="login" value="<?= (isset($login)) ? $login : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['login']) ? $errorsArrayinscription['login'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="password" id="password" placeholder="mot de passe" required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['password']) ? $errorsArrayinscription['password'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="secondpassword">Confirmer : </label>
                        <input type="password" name="secondpassword" id="password" placeholder="mot de passe" required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['secondpassword']) ? $errorsArrayinscription['secondpassword'] : ''; ?></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <input type="submit" class="btn btn-primary " name="createUserBtn" value="S'inscrire" />
                    </div>
                </form>
                <!--fin du form-->
                
            </div>
        </div>
    </div>
</div><!-- fin modal -->
