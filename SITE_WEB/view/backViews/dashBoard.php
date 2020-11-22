<table class="shadow table table-hover mr-3 mt-3">
    <caption>Liste des expériences</caption>

    <thead>
    <tr>
        <th><a href="<?= HOST . 'addExperience.html' ?>" class="fa fa-plus-square mr-1"></a></th>
        <th class="text-center">projets</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($experiences as $experience) { ?>
        <tr>
            <td scope="row"><a href="<?= HOST . 'editExperience.html?experienceId=' . $this->clean($experience->getId()); ?>"
                               class="fa fa-pencil mr-1"></a>
                <a href="<?= HOST . 'deleteExperience?experienceId=' . $this->clean($experience->getId()); ?>"
                   class="fa fa-trash mr-1"></a>
            </td>
            <td>
                <a href="<?= HOST . 'showExperience.html?experienceId=' . $this->clean($experience->getId()); ?>"><?= $this->clean($experience->getTitle()); ?></a>
            </td>
            <?php if (!empty($experience->getUpdatedAt())) { ?>
                <td> modifier le :<?php $date = $experience->getUpdatedAt;
                    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                    echo $this->clean($dt->format('d/m/Y'));
                    ?></td>
            <?php } else { ?>

                <td>créer le :<?php $date = $experience->getCreatedAt();
                    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                    echo $this->clean($dt->format('d/m/Y')); ?>
                </td>
            <?php } ?>
        </tr>

    <?php } ?>
    </tbody>

</table>
<table class="shadow table table-hover mr-3 mt-3">
    <caption>Liste des posts</caption>

    <thead>
    <tr>
        <th><a href="<?= HOST . 'addPost.html' ?>" class="fa fa-plus-square mr-1"></a></th>
        <th class="text-center" colspan="4">Liste des posts</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post) { ?>
        <tr>
            <th scope="row"><a href="<?= HOST . 'editPost.html?postId=' . $this->clean($post->getId()); ?>"
                               class="fa fa-pencil mr-1"></a><a
                        href="<?= HOST . 'deletePost?postId=' . $this->clean($post->getId()); ?>" class="fa fa-trash mr-1"></a></th>
            <td><a href="<?= HOST . 'detail_post.html?postId=' . $this->clean($post->getId()); ?>"><?= $this->clean($post->getTitle()); ?></a>
            </td>

            <?php if (!empty($post->getUpdatedAt())) { ?>
                <td> modifier le :<?php $date = $post->getUpdatedAt();
                    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                    echo $this->clean($dt->format('d/m/Y'));
                    ?></td>
            <?php } else { ?>

                <td>créer le :<?php $date = $post->getcreatedAt();
                    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                    echo $this->clean($dt->format('d/m/Y')); ?>
                </td>
            <?php } ?>

        </tr>

    <?php } ?>
    </tbody>
</table>


<table class="shadow table table-hover mr-3 mt-3">
    <caption>Liste des commentaires</caption>

    <thead>
    <tr>
        <th><a href="<?= HOST . 'addComment.html' ?>" class="fa fa-plus-square mr-1"></a></th>
        <td class="text-center" colspan="4">Les nouveaux commentaires</td>

    </tr>
    </thead>
    <tbody>

    <?php foreach ($comments as $comment) { ?>
    <tr>
        <th scope="row"><a href="<?= HOST . 'editComment.html?commentId=' . $this->clean($comment->getId()); ?>"
                           class="fa fa-pencil mr-1"></a><a
                    href="<?= HOST . 'deleteComment?commentId=' . $this->clean($comment->getId()); ?>" class="fa fa-trash mr-1"></a>
        </th>
        <td>
            <a href="<?= HOST . 'detail_post.html?postId=' . $this->clean($comment->getId()); ?>"><?= $this->clean($comment->getUser()->getUsername()); ?></a>
        </td>

        <td> Crée le :<?php $date = $comment->getCreatedAt();
            $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
            echo $this->clean($dt->format('d/m/Y'));
            ?>
        </td>
        <td>status du commentaire:
            <form method="post" action="switchCommentStatus.html?id=<?= $comment->getId();?>">
                <select name="commentStatus" >
                <option value="1" <?= $this->clean(($comment->getStatusName()->getStatus() === "wait" ))? "selected" : "" ?>>En attente</option>
                <option value="2" <?= $this->clean(($comment->getStatusName()->getStatus() === "validated" ))? "selected" : "" ?>>Validé</option>
                <option value="3" <?= $this->clean(($comment->getStatusName()->getStatus() === "ban" ))? "selected" : "" ?>>Banni</option>
            </select><input type="submit" value="Valider">
            </form>
        </td>
        <td></td>
        <?php } ?>
    </tr>
    </tbody>
</table>
