<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>blog pro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--footer css-->

    <link rel="stylesheet" href="<?php echo ASSERT . '/footer.css' ?>"/>
    <link rel="stylesheet" href="<?php echo ASSERT . '/contact.css' ?>"/>
    <link rel="stylesheet" href="<?php echo ASSERT . '/login.css' ?>"/>


</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo HOST . 'homePage.html' ?>">Accueil</a>
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
                    <a class="nav-link" href="<?php echo HOST . 'blogPage.html' ?>">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo HOST . 'contact.html' ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo HOST . '/public/CV_Hugo_Charon.pdf'; ?>" download="">Télécharger
                        mon CV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo HOST . 'backOffice.html'; ?>" download="">back office
                        mon CV</a>
                </li>

<?php
                if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Connection </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo HOST . 'loginPage.html' ?>">Se Connecter</a>
                        <a class="dropdown-item" href="#">S'enregistrer</a>
                    </div>
                </li>
                <?php
                }else{
                    ?>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo HOST.'destroySessionPage.html'?>">Se déconecter</a>
                </li><?php
                }
                ?>



            </ul>
        </div>
    </nav>
</header>

<!--template-->
<?php
echo $contentPage;
?>

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
<!--login script-->
<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
</body>
<footer>
    <!-- Footer -->
    <section id="footer">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a>
                        </li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-angle-double-right"></i>FAQ</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get
                                Started</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Videos</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a>
                        </li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-angle-double-right"></i>FAQ</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get
                                Started</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Videos</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a>
                        </li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-angle-double-right"></i>FAQ</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get
                                Started</a></li>
                        <li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i
                                        class="fa fa-angle-double-right"></i>Imprint</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i
                                        class="fa fa-google-plus"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i
                                        class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
                <hr>
            </div>

        </div>
    </section>
    <!-- ./Footer -->
</footer>
</html>
