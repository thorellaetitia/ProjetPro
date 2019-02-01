<?php
include_once('controllers/controllerseconnecter.php');
?>

<!-- Modal -->
<div class="modal fade <?= $modalErrorconnection ? 'modalErrorconnection' : ''; ?>" id="seconnecter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalConnecter">Déjà inscrit ? Se connecter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php ?>
                <!--form-->
                <form method="post" action="">
                    <div class="form-group">
                        <label for="login">Votre login : </label>
                        <input type="text" name="login" id="login" placeholder="login" value="<?php isset($login) ? $login : '';  ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayconnection['login']) ? $errorsArrayconnection['login'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="password" id="password" placeholder="mot de passe" value="<?php isset($password) ? $password : '';  ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayconnection['password']) ? $errorsArrayconnection['password'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="secondpassword">Confirmer : </label>
                        <input type="password" name="secondpassword" id="secondpassword" placeholder="mot de passe" value="<?php isset($secondpassword) ? $secondpassword : '';  ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayconnection['secondpassword']) ? $errorsArrayconnection['secondpassword'] : ''; ?></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <input type="submit" class="btn btn-primary " name="submit" value="Se connecter" /><br>
                    </div>
                </form>

            </div>
            <!--fin du form-->
        </div>
    </div>
</div>

