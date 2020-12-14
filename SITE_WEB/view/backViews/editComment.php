<div class="row">
    <table class="shadow table table-hover mr-3 mt-3 ">
        <form method="post">
            <?php foreach ($comments as $comment) { ?>
                <thead>
                <tr>
                    <th class="text-center colspan='2'">Modificatin du commentaire</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td class="text-center rowspan='2'">
         <textarea name="content" class="editor">
            <?= $this->clean($comment->getcontent()); ?>
        </textarea>
                        <p><input type="submit" value="Submit"></p></td>


                </tr>
                <tr>
                    <td class="text-center">créé le <?= $date = $comment->getcreatedAt();
                        $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                        $dt->format('d/m/Y');
                        ?>
                </tr>
                </tbody>
            <?php } ?>
        </form>
    </table>

</div>
