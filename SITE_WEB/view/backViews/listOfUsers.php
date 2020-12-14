<table class="shadow table table-hover mr-3 mt-3">
    <caption>Liste des Membres</caption>

    <thead>
    <th>
        Pseudo
    </th>
    <th>
        Prénom
    </th>
    <th>
        Nom
    </th>
    <th>
        date d'adhésion
    </th>
    <th>
        Status
    </th>
    </thead>
    <tbody>
    <?php foreach ($listUsers as $user) { ?>
        <tr>
            <td>
                <?= $user->getuserName() ?>
            </td>
            <td>
                <?= $user->getFirstname() ?>
            </td>
            <td>
                <?= $user->getName() ?>
            </td>
            <td>
                <?php $date = $user->getCreateTime();
                $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                echo $dt->format('d/m/Y');
                ?>

            </td>
            <td>

                <form method="POST" action="listOfUsers.html?id=<?= $user->getId();?>">
                    <select name="StatusId">
                        <option value="1"<?= ($user->getUserStatusId() === "1") ? "selected" : "" ?>>Administrateur
                        </option>
                        <option value="2"<?= ($user->getUserStatusId() === "2") ? "selected" : "" ?>>Membre</option>
                        <option value='3'<?= ($user->getUserStatusId() === "3") ? "selected" : "" ?>>Banni</option>
                    </select>
                    <input type="submit" value="Changer">
                </form>
            </td>
        </tr>

    <?php } ?>
    </tbody>

</table>
