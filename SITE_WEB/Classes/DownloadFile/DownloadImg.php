<?php


namespace App\Classes\DownloadFile;


class DownloadImg
{


    public function imgFromForm($img,$lastImg = null)
    {
        // Pas d'image soumise
        if (isset($img['img']['name']) && empty($img['img']['name'])) {
            return $lastImg;
        }

        //Une image est soumise
        if (isset($lastImg) && !empty($lastImg)) {
                @unlink(DL_IMG . "/public/img/" . $lastImg );
        }
        $name = uniqid().$_FILES['img']['name'];
        move_uploaded_file($img['img']['tmp_name'], DL_IMG . '/public/img/' .  $name);
        return $name;
    }

}
