
<div class="row">
    <table class="shadow table table-hover mr-3 mt-3 ">
        <form enctype="multipart/form-data" method="post">

                <thead>
                <tr>
                    <th class="text-center colspan='2'">Ajout de l'expérience</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">
                        <label for="labelTitleAdd" class="sr-only">Titre</label>
                        <input id="labelTitleAdd" type="text" name="title">
                    </td>
                    <td><label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer l'image :</label>
                        <input name="img" type="file" id="fichier_a_uploader" /></td>
                </tr>
                <tr>
                    <td class="text-center rowspan='2'">
         <textarea name="description" class="editor">
        </textarea>
                        <p>
                            <label for="labelSubmit" class="sr-only"></label>
                            <input id="labelSubmit" type="submit" value="Submit"></p>
                    </td>


                    <td class=" text-center"><img class="w-10"></td>

                </tr>
                <tr>
                    <td class="text-center colspan='2'"><input type="text" name="link"
                    </td>

                </tr>
                </tbody>

        </form>
    </table>
</div>




