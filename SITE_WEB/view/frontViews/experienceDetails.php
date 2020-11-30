
<div class="container">
    <div class="row">
        <table class="shadow table table-hover mr-3 mt-3 ">

            <?php foreach ($experiences as $experience) { ?>
                <thead>
                <tr><?php if ($auth = $session->isUserAuthenticated()) {
                        if ($auth->getUserStatusId() == 1) { ?>
                            <a class="btn btn-primary" href="<?= HOST . 'backOffice.html' ?>" role="button">retour au
                                back office</a>

                        <?php
                        }
                    } ?><a class="btn btn-primary" href="<?= HOST . 'homePage.html' ?>" role="button">retour à la page d'accueil</a>
                    <div id="blog" class="container pt-5">

                    <th class="text-center colspan='2'"><?= $experience->getTitle(); ?></th>
                    <td></td>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td class="text-center rowspan='3'"><?= $experience->getDescription(); ?></td>
                    <td class=" text-center"><img class="img-thumbnails" alt="<?= $experience->getImg(); ?>"
                                                  src="<?= $this->clean(IMG.$experience->getImg()); ?>"></td>

                </tr>
                <tr>
                    <td class="text-center colspan='2'"><a href="<?= 'http://www.' . $experience->getLink(); ?>"
                                                           target="_blank"><?= $experience->getLink(); ?></a></td>
                    <td class="text-center">créé le <?php $date = $experience->getcreatedAt();
                        $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                        echo $dt->format('d/m/Y');
                        ?>
                </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>

</div>