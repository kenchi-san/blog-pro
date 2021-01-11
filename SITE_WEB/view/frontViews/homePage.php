<div class="container">
    <section class="row pb-2">
        <div class="col-lg-12 col-sm-12">
            <h1>
                A propos de moi
            </h1>
            <p>
                Jeune développeur diplomé depuis 2019 chez OpenClassrooms sur le parcours Chef de projet, spécialisé sur
                la technologie php/Symfony. Je suis passionné par la programmation et la création d'application en tout
                genre.
            </p>
            Depuis la fin de mon parcours, je garde une veille technologique constante et continue de réaliser des
            procjets qui sont consultables sur
            <a href="https://github.com/kenchi-san">mon GitHub</a>.
            <br>Vous trouverez toutes les informations ci-dessous.


        </div>
    </section>

    <!--list of movies with picture-->
    <section class="container">
        <div class="pt-5 pb-5">
            <?php foreach ($experiences as $key => $experience){
                if ($key % 2) {
                    ?>

                    <div class="row">
                        <div class="col-sm-6 order-sm-2">
                            <img class="w-100" alt="<?= $experience->getImg();  ?>" src="<?= VIEW_IMG.$experience->getImg();  ?>">
                        </div>
                        <div class="col-sm-6 order-sm-1">
                            <div class="mt-5">
                                <h1><?= $experience->getTitle(); ?></h1>
                                <br>
                                <?= $experience->getDescription(); ?>
                            </div>
                            <div class="row">
                                <div class="offset-lg-4 col-lg-6 offset-lg-2 pt-lg-5">
                                    <a href="<?=HOST.'showExperience.html?experienceId='.$experience->getId()?>" class="btn btn-info" role="button">Voir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else { ?>
                    <div class="row">
                        <div class="col-sm-6 order-sm-1 ">
                            <img class="w-100" alt="<?= $experience->getImg(); ?>" src="<?= VIEW_IMG.$experience->getImg()?>">
                        </div>
                        <div class="col-sm-6 order-sm-2">
                            <div class="mt-5">

                                <h1><?= $experience->getTitle(); ?></h1>
                                <br>
                                <?= $experience->getDescription(); ?>
                            </div>
                            <div class="row">
                                <div class="offset-lg-4 col-lg-6 offset-lg-2 pt-lg-5">
                                    <a href="<?=HOST.'showExperience.html?experienceId='.$experience->getId()?>" class="btn btn-info" role="button">Voir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php }?>


            <?php } ?>


    </section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</div>




