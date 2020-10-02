

<?php
if (isset($invalidToken) && $invalidToken === true): ?>
<p>Le lien pour réinitialiser votre mot de passe n'est pas correcte</p>
<?php elseif (isset($invalidePassword) && $invalidePassword ===true):  ?>
<p>le deuxième mot de passe n'est identique. </p>
<div class="container">
<div class="mt-4 mb-4">
    <form method="post">
        <input type="text" id="password" class="fadeIn second" name="password_1" placeholder="nouveau mot de passe">
        <input type="text" id="password" class="fadeIn third" name="password_2" placeholder="Confirmez votre mot de passe">

        <input type="submit" class="fadeIn fourth" value="Valider">
    </form>
</div>

</div>
<?php else: ?>

    <div class="container">
        <div class="mt-4 mb-4">
            <form method="post">
                <input type="text" id="password" class="fadeIn second" name="password_1" placeholder="nouveau mot de passe">
                <input type="text" id="password" class="fadeIn third" name="password_2" placeholder="Confirmez votre mot de passe">

                <input type="submit" class="fadeIn fourth" value="Valider">
            </form>
        </div>

    </div>
<?php endif; ?>
