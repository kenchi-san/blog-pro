<?php if ($auth = $session->isUserAuthenticated()) {
    if ($auth->getUserStatusId() == \Model\Entities\UserEntity::STATUS_ADMIN) { ?>
        <a class="btn btn-primary" href="<?= HOST . 'backOffice.html' ?>" role="button">retour au
            back office</a>

        <?php
    }
} ?>
<a class="btn btn-primary" href="<?= HOST . 'blogPage.html' ?>" role="button">retour à la liste des posts</a>
<div id="blog" class="container pt-5">

    <div class="row block-blog">

        <h2 class="text-center">

            <?= $post->getTitle(); ?>
        </h2>
        <p>
            <?= $post->getResume(); ?>
        </p>


        <p>
            <?= $post->getContent() ?>
        </p>
        <div class="row pl-5 pb-2">
            créé le <?php $date = $post->getcreatedAt();
            $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
            echo $dt->format('d/m/Y');
            ?>


            par <?php echo $post->getUser()->getUsername() ?>
        </div>


    </div>

    <?php foreach ($comments as $comment) {
        if ($comment->getPostId() == $_GET['postId']) {
            ?>
            <?php if ($comment->getcommentStatusId() == \App\Model\Entities\CommentEntity::STATUS_VALIDATED) { ?>
                <div class="row comment-block">
                    <div class="col-ms-12 col-md-12 col-lg-12">
                        <h3>Publié par: <?= $this->clean($comment->getUser()->getUsername()); ?></h3>
                        <small>date de création: <?php $date = $comment->getcreatedAt();
                            $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                            echo $dt->format('d/m/Y');
                            ?></small>
                    </div>
                    <div class="col-ms-12 col-md-12 col-lg-12">
                        <?php echo $this->clean($comment->getContent()); ?>
                    </div>
                </div>
            <?php }
            if ($this->clean($comment->getcommentStatusId()) == \App\Model\Entities\CommentEntity::STATUS_BANN) { ?>
                <div class="alert alert-danger" role="alert">
                    Le commentaire a été banni.
                </div>
            <?php }
            if ($this->clean($comment->getcommentStatusId()) == \App\Model\Entities\CommentEntity::STATUS_WAIT) { ?>
                <div class="alert alert-warning" role="alert">
                    Le commentaire est en cours de validation.
                </div>

            <?php }
        }
    } ?>

    <?php if ($session->isUserAuthenticated()) { ?>
        <div class="container">
        <form method="post" action="<?= "addComment.html?postId=".$post->getId()?>">
            <div class="row">

                <div class="col-sm-8 offset-sm-1">
                    <label for="comment" class="sr-only">Votre commentaire:</label>
                    <textarea name="content" id="comment"
                              placeholder="Votre commentaire" style="width: 100%; height: 6rem;"><?php
                    ?></textarea>
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
