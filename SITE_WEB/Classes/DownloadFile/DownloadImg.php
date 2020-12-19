<?php


namespace App\Classes\DownloadFile;


class DownloadImg
{

    public function imgFromForm($name,$tmpName,$lastImg = null)
    {
        // Pas d'image soumise
        if (isset($name) && empty($name)) {
            return $lastImg;
        }

        //Une image est soumise
        if (isset($lastImg) && !empty($lastImg)) {
                @unlink(DL_IMG. $lastImg );
        }
        $newName = uniqid().$name;
        move_uploaded_file($tmpName, DL_IMG.  $newName);
        return $newName;
    }

}