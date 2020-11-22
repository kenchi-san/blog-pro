<?php if (isset($invalidToken) && $invalidToken === true): ?>

    <p>Le lien pour réinitialiser votre mot de passe n'est pas correcte</p>

<?php else: ?>

    <?php if (isset($invalidePassword) && $invalidePassword === true): ?>
        <p>le deuxième mot de passe n'est identique. </p>
    <?php endif; ?>

    <?php if ($_POST && isset($invalidePassword2) && $invalidePassword2 === true): ?>
        <p>Le champ est vide </p>
    <?php endif; ?>

    <div class="container">
        <div class="mt-4 mb-4">
            <form method="post">
                <input type="text" id="password" class="fadeIn second form-control" name="password_1"
                       placeholder="nouveau mot de passe">
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
                <input type="text" id="password" class="fadeIn third " name="password_2"
                       placeholder="Confirmez votre mot de passe">

                <input type="submit" class="fadeIn fourth" value="Valider">
            </form>
        </div>

    </div>
<?php endif; ?>
