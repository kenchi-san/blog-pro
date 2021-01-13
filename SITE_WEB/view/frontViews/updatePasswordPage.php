<?php if (isset($invalidToken) && $invalidToken === true): ?>
    <div class="alert alert-danger" role="alert" style="margin-left: 30%;
    margin-right: 30%;text-align: center; margin-top: 2%">
        <p>Le lien pour réinitialiser votre mot de passe n'est pas correcte</p>
    </div>


<?php else: ?>

    <?php if (isset($invalidePassword) && $invalidePassword === true): ?>
        <div class="alert alert-danger" role="alert" style="margin-left: 30%;
    margin-right: 30%;text-align: center; margin-top: 2%">
            <p>le deuxième mot de passe n'est pas identique. </p>  </div>

    <?php endif; ?>

    <?php if ($_POST && isset($invalidePassword2) && $invalidePassword2 === true): ?>
        <div class="alert alert-danger" role="alert" style="margin-left: 30%;
    margin-right: 30%;text-align: center; margin-top: 2%">
            <p>Le champ est vide </p>  </div>

    <?php endif; ?>

    <div class="container">
        <div class="mt-4 mb-4">
            <form method="post">
                <label for="password"></label><input type="password" id="password" class="fadeIn second form-control" name="password_1"
                                                     placeholder="nouveau mot de passe">
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
                <input type="password" id="password" class="fadeIn third " name="password_2"
                       placeholder="Confirmez votre mot de passe">

                <input type="submit" class="fadeIn fourth" value="Valider">
            </form>
        </div>

    </div>
<?php endif; ?>
