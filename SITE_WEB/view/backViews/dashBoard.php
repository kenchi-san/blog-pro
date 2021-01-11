
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
            <td scope="row"><a href="<?= HOST . 'editExperience.html?experienceId=' . $experience->getId(); ?>"
                               class="fa fa-pencil mr-1"></a>
                <a href="<?= HOST . 'deleteExperience?experienceId=' . $experience->getId(); ?>"
                   class="fa fa-trash mr-1"></a>
            </td>
            <td>
                <a href="<?= HOST . 'showExperience.html?experienceId=' . $experience->getId(); ?>"><?= $experience->getTitle(); ?></a>
            </td>
            <?php if (!empty($experience->getUpdatedAt())) { ?>
                <td> modifier le :<?php
                    $date = $experience->getUpdatedAt();
                    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                    echo $dt->format('d/m/Y');
                    ?></td>
            <?php } else { ?>

                <td>créer le :<?php $date = $experience->getCreatedAt();
                    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                    echo($dt->format('d/m/Y')) ?>
                </td>
            <?php } ?>
        </tr>

    <?php } ?>
    </tbody>

</table>
