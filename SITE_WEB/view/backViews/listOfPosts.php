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
            <th scope="row"><a href="<?= HOST . 'editPost.html?postId=' . $post->getId(); ?>"
                               class="fa fa-pencil mr-1"></a><a
                    href="<?= HOST . 'deletePost?postId=' . $post->getId(); ?>" class="fa fa-trash mr-1"></a></th>
            <td><a href="<?= HOST . 'detail_post.html?postId=' . $post->getId(); ?>"><?= $post->getTitle(); ?></a>
            </td>

            <?php if (!empty($post->getUpdatedAt())) { ?>
                <td> modifier le : <?php $date = $post->getUpdatedAt();
                    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                    echo $dt->format('d/m/Y');
                    ?></td>

            <?php } else { ?>

                <td>créer le : <?php $date = $post->getCreatedAt();
                    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                    echo $dt->format('d/m/Y');  ?>
                </td>
            <?php } ?>
        </tr>

    <?php } ?>
    </tbody>
</table>
