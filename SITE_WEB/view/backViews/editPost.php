<div class="row">
    <table class="shadow table table-hover mr-3 mt-3 ">
        <form method="post">
            <?php foreach ($posts as $post) { ?>
                <thead>
                <tr>
                    <th class="text-center colspan='2'">Modificatin du post</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">
                        <input type="text" name="title" value="<?= $post->getTitle(); ?>">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center">
                        <textarea name="resume" class="editor" style=resize:both;min-width:100%;min-height:100px;max-width:200px;max-height:200px;>
                         <?= $post->getResume(); ?>
                        </textarea>

                    </td>
                </tr>
                <tr>
                    <td class="text-center rowspan='2'">
         <textarea name="content" class="editor">
            <?= $post->getcontent(); ?>
        </textarea>
                        <p><input type="submit" value="Submit"></p></td>


                </tr>
                <tr>
                    <td class="text-center">créé le <?php $date = $post->getcreatedAt();
                        $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                        echo $this->clean($dt->format('d/m/Y'));
                        ?>
                </tr>
                </tbody>
            <?php } ?>
        </form>
    </table>

</div>
