<?php if ($auth = $session->isUserAuthenticated()) {
    if ($auth->getUserStatusId() == 1) { ?>
        <a class="btn btn-primary" href="<?= HOST . 'backOffice.html' ?>" role="button">retour au
            back office</a>

        <?php
    }
} ?>
<a class="btn btn-primary" href="<?= HOST . 'blogPage.html' ?>" role="button">retour à la liste des posts</a>
<div id="blog" class="container pt-5">

    <div class="row block-blog">
        <?php foreach ($posts as $post) { ?>
            <h2 class="text-center">
                <?= $post->getTitle() ?>
            </h2>
            <p>
                <?= $post->getResume() ?>
            </p>


            <p>
                <?php echo $post->getContent() ?>
            </p>
            <div class="row pl-5 pb-2">
                créé le <?php $date = $post->getcreatedAt();
                $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                echo $dt->format('d/m/Y');
                ?>
                par <?php echo $post->getUser()->getFirstname() ?>
            </div>


        <?php } ?>
    </div>

    <?php foreach ($comments as $comment) {
        if ($comment->getPostId() == $post->getId()) {
            ?>
            <?php if ($comment->getcommentStatusId() == 2) { ?>
                <div class="row comment-block">
                    <div class="col-ms-12 col-md-12 col-lg-12">
                        <h3>Publié par: <?php echo $comment->getUser()->getUsername(); ?></h3>
                        <small>date de création: <?php $date = $comment->getcreatedAt();
                            $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                            echo $dt->format('d/m/Y');
                            ?></small>
                    </div>
                    <div class="col-ms-12 col-md-12 col-lg-12">
                        <?php echo $comment->getContent(); ?>
                    </div>
                </div>
            <?php }
            if ($comment->getcommentStatusId() == 3) { ?>
                <div class="alert alert-danger" role="alert">
                    Le commentaire a été banni.
                </div>
            <?php }
            if ($comment->getcommentStatusId() == 1) { ?>
                <div class="alert alert-warning" role="alert">
                    Le commentaire est en cours de validation.
                </div>

            <?php }
        }
    } ?>

    <?php if ($session->isUserAuthenticated()) { ?>
        <div class="container">
        <form method="post">
            <div class="row">

                <div class="col-sm-8 offset-sm-1">
                <textarea name="content" class="editor" placeholder="Votre commentaire">
                        </textarea>
                </div>
            </div>
            <div class="col-sm-8 offset-sm-1">
                <input type="submit" value="valider">
            </div>
        </form>

    <?php } else { ?>
        Veuillez vous <a href="<?= HOST . "loginPage.html" ?>"> connectez</a> ou vous <a
                href="<?= HOST . "registrer.html" ?>">enregistrez</a> pour laisser un commentaire


        </div>
    <?php } ?>

</div>
