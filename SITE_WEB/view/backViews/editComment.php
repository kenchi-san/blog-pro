<div class="row">
    <table class="shadow table table-hover mr-3 mt-3 ">
        <form method="post" action="addComment.html?commentId=<?= $comment->getId(); ?>">
                <thead>
                <tr>
                    <th class="text-center colspan='2'">Modificatin du commentaire</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td class="text-center rowspan='2'">

                        <label for="comment" class="sr-only">Votre commentaire:</label>
                        <textarea name="content" id="comment"
                                  placeholder="Votre commentaire"  style="width: 100%; height: 6rem;"><?= $comment->getcontent()
                            ?></textarea>



                            <input type="submit" value="Submit"></td>


                </tr>
                <tr>
                    <td class="text-center">créé le <?= $date = $comment->getcreatedAt();
                        $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                        $dt->format('d/m/Y');
                        ?>
                </tr>
                </tbody>
        </form>
    </table>

</div>
