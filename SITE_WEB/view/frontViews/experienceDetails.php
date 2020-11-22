<?php //foreach ($experiences as $experience) {
//    var_dump($experiences);
//} ?>
<div class="container">
    <div class="row">
        <table class="shadow table table-hover mr-3 mt-3 ">

            <?php foreach ($experiences

                           as $experience) { ?>
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
                    <td class="text-center rowspan='3'"><?= $this->clean($experience->getDescription()); ?></td>
                    <td class=" text-center"><img class="img-thumbnails" alt="<?= $this->clean($experience->getImg()); ?>"
                                                  src="<?= IMG . $this->clean($experience->getImg()) . '.jpeg'; ?>"></td>

                </tr>
                <tr>
                    <td class="text-center colspan='2'"><a href="<?= 'http://www.' . $this->clean($experience->getLink()); ?>"
                                                           target="_blank"><?= $this->clean($experience->getLink()); ?></a></td>
                    <td class="text-center">créé le <?php $date = $experience->getcreatedAt();
                        $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                        echo $this->clean($dt->format('d/m/Y'));
                        ?>
                </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>

</div>