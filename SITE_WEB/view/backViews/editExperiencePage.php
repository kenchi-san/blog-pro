<?php //foreach ($experiences as $experience) {
//    var_dump($experiences);
//} ?>

<div class="row">
    <table class="shadow table table-hover mr-3 mt-3 ">
        <form  enctype="multipart/form-data" method="post">
        <?php foreach ($exp as $experience) { ?>
            <thead>
            <tr>
                <th class="text-center colspan='3'">Modificatin de l'expérience</th>
<th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center">
                    <input type="text" name="title" value="<?= $experience->getTitle(); ?>">
       </td>
<td><label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer l'image :</label>
    <input name="img" type="file" id="fichier_a_uploader" /></td>


            </tr>
            <tr>
                <td class="text-center rowspan='2'">
         <textarea name="description" class="editor">
            <?= $experience->getDescription(); ?>
        </textarea>
                        <p><input type="submit" value="Valider"></p>
                    </td>








                <td class=" text-center"><img class="w-10" alt="<?= $this->clean($experience->getImg()); ?>"
                                   src="<?= IMG . $this->clean($experience->getImg()) . '.jpeg'; ?>"></td>

            </tr>
            <tr>
                <td class="text-center colspan='2'"><input type="text" name="link" value="<?= $experience->getLink(); ?>"></td>
            <td class="text-center" >créé le <?php $date = $experience->getcreatedAt();
                $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                echo $this->clean($dt->format('d/m/Y'));
                ?>
            </tr>
            </tbody>
        <?php } ?>
        </form>
    </table>

</div>




