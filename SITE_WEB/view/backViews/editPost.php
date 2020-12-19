<div class="col">
    <h1>Modification du post</h1>
    <form method="post">
        <div class="form-group">
            <label for="editPostInputTitle">Titre</label>
            <input type="text" class="form-control" name="title" id="editPostInputTitle"
                   value="<?= $post->getTitle(); ?>">
        </div>

        <div class="form-group">
            <label for="editPostInputResume"> Résumé </label>
            <textarea name="resume" class="editor form-control" id="editPostInputResume">
             <?= $post->getResume(); ?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="editPostInputContent"> Contenu </label>
            <textarea name="content" class="form-control editor" id="editPostInputContent">
                    <?= $post->getcontent(); ?>
            </textarea>
        </div>
        <div class="form-group">
            <select class="form-control" name="authorId">
                <?php foreach ($listUsers as $user): ?>
                    <option value="<?php echo $user->getId() ?>"
                        <?= ($user->getId() === $post->getUserId()) ? "selected" : "" ?>>
                        <?= $user->getUsername() ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
    <p>Créé le <?php $date = $post->getcreatedAt();
        $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        echo $dt->format('d/m/Y');
        ?>
    </p>
</div>
