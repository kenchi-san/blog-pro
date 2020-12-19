<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>blog pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--footer css-->

    <link rel="stylesheet" href="<?= ASSERT . '/footer.css' ?>"/>
    <link rel="stylesheet" href="<?= ASSERT . '/contact.css' ?>"/>
    <link rel="stylesheet" href="<?= ASSERT . '/login.css' ?>"/>
    <link rel="stylesheet" href="<?= ASSERT . '/blog.css' ?>"/>
    <link rel="stylesheet" href="<?= ASSERT . '/normalize.css' ?>"/>

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="<?= HOST . 'homePage.html' ?>">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href=""> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= HOST . 'blogPage.html' ?>">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= HOST . 'contact.html' ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= HOST . '/public/CV_Hugo_Charon.pdf'; ?>" download="">Télécharger
                        mon CV</a>
                </li>
                <?php if (!isset($_SESSION['auth']) || $_SESSION['auth']["user_status_id"] != \Model\Entities\UserEntity::STATUS_ADMIN) { ?>

                    <?php
                } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= HOST . 'backOffice.html'; ?>">back office
                        </a>
                    </li>
                <?php }
                ?>


                <?php
                if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Connexion </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?= HOST . 'loginPage.html' ?>">Se Connecter</a>
                            <a class="dropdown-item" href="<?= HOST . 'registrer.html' ?>">S'enregistrer</a>
                        </div>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= HOST . 'logout' ?>">Se déconnecter</a>
                    </li><?php
                }
                ?>


            </ul>
        </div>
    </nav>
</header>
<div class="container-fluid">
    <div class="row">
        <div class="nav flex-column col-md-2 pl-3 pt-3">
            <a href="<?= HOST . 'backOffice.html' ?>">Retour au dashboard</a>
            <a href="<?= HOST . 'listOfUsers.html'?>">Gestion des membres enregistrés</a>
        </div>
        <div class="offset-md-2 col-md-6">
            <div class="row">
                <?php echo $contentPage; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    const editorsElts = document.querySelectorAll('.editor');
    for (editorElt of editorsElts) {
        ClassicEditor.create(editorElt);
    }

</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<!--script footer-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
<footer class="page-footer font-small teal pt-5 bg-light">

    <!-- Footer Text -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase font-weight-bold">Footer text 1</h5>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita sapiente sint, nulla, nihil
                    repudiandae commodi voluptatibus corrupti animi sequi aliquid magnam debitis, maxime quam recusandae
                    harum esse fugiat. Itaque, culpa?</p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-6 mb-md-0 mb-3">

                <!-- Content -->
                <h5 class="text-uppercase font-weight-bold">Footer text 2</h5>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis modi earum
                    commodi aperiam temporibus quod nulla nesciunt aliquid debitis ullam omnis quos ipsam, aspernatur id
                    excepturi hic.</p>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Text -->


</footer>

</html>
