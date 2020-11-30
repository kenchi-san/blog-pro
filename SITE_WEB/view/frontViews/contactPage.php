<div class="container contact-form">


    <?php
    if (isset($errors)) {
        foreach ($errors as $error) { ?>

            <div class="alert alert-danger" role="alert" style="margin-left: 30%;
    margin-right: 30%;text-align: center; margin-top: 2%">
                <?= clean($error); ?>
            </div>
        <?php
        }
    } ?>


    <form method="post">

        <h3>Me contacter</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nom complet*" value=""/>
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email *" value=""/>
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="Numéro de téléphone *" value=""/>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btnContact btn-primary" placeholder="Envoyer"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="message"></label>
                    <textarea id="message" name="message" class="form-control" placeholder="Votre message *"
                                                           style="width: 100%; height: 150px;"></textarea>
                </div>
            </div>
        </div>
    </form>
</div>