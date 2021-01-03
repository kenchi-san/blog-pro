<div class="wrapper fadeInDown">
    <div id="formContent">

        <?php
        if (isset($errors)) {
            foreach ($errors as $error) { ?>
                <div class="alert alert-danger" role="alert" style="margin-left: 30%;
    margin-right: 30%;text-align: center; margin-top: 2%">
                    <?= $error; ?>  </div>

            <?php }
        }
        ?>
        <!-- register Form -->
        <form method="post">
            <div class="row">

                <div class="col-md-12">
                    <label for="username" class="sr-only">Nom de famille</label>
                    <input type="text" id="username" name="username" placeholder="username">


                    <label for="name" class="sr-only">Nom:</label>
                    <input type="text" id="name" name="name" placeholder="name">
                    <label for="firstname" class="sr-only">Prénom:</label>
                    <input type="text" id="firstname" name="firstname" placeholder="firstname">
                </div>
                <div class="col-md-12">
                    <label for="e-mail" class="sr-only">e-mail</label>
                    <input type="email" id="e-mail" name="email" placeholder="e-mail">
                    <label for="password" class="sr-only">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="password ">
                    <label for="password2" class="sr-only">confirmation de votre mot de passe:</label>
                    <input type="password" id="password2" name="password2" placeholder="Password Confirmation">
                </div>
            </div>
            <input type="submit" class="fadeIn fourth center" value="s'enregistrer">


        </form>


    </div>
</div>