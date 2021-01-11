<table class="shadow table table-hover mr-3 mt-3">
    <caption>Liste des commentaires</caption>

    <thead>
    <tr>
        <td></td>
        <td class="text-center" colspan="4">Les nouveaux commentaires</td>

    </tr>
    </thead>
    <tbody>

    <?php foreach ($comments as $comment) { ?>
    <tr>
        <th scope="row"><a href="<?= HOST . 'editComment.html?commentId=' . $comment->getId(); ?>"
                           class="fa fa-pencil mr-1"></a><a
                href="<?= HOST . 'deleteComment?commentId=' . $comment->getId(); ?>" class="fa fa-trash mr-1"></a>
        </th>
        <td>
            <a href="<?= HOST . 'detail_comment.html?commentId=' . $comment->getId(); ?>"><?= $this->clean($comment->getUser()->getUsername()); ?></a>
        </td>

        <td> Crée le :<?php $date = $comment->getCreatedAt();
            $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
            echo $dt->format('d/m/Y');
            ?>
        </td>
        <td>
            <?= $this->clean($comment->getContent()) ?>
        </td>
        <td>status du commentaire:
            <form method="POST" action="switchCommentStatus.html?id=<?= $comment->getId();?>">
                <select name="commentStatus" >
                    <option value="<?= \App\Model\Entities\CommentEntity::STATUS_WAIT ?>"<?= ($comment->getStatusName()->getStatus() === "wait" )? "selected" : "" ?>>En attente</option>
                    <option value="<?= \App\Model\Entities\CommentEntity::STATUS_VALIDATED ?>"<?= ($comment->getStatusName()->getStatus() === "validated" )? "selected" : "" ?>>Validé</option>
                    <option value="<?= \App\Model\Entities\CommentEntity::STATUS_BANN?>" <?= ($comment->getStatusName()->getStatus() === "ban" )? "selected" : "" ?>>Banni</option>
                </select><input type="submit" value="Valider">
            </form>
        </td>
        <td></td>
        <?php } ?>
    </tr>
    </tbody>
</table>
