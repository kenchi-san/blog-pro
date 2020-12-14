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
                @unlink(DL_IMG . "/public/img/" . $lastImg );
        }
        $newName = uniqid().$name;
        move_uploaded_file($tmpName, DL_IMG . '/public/img/' .  $newName);
        return $newName;
    }

}



// Pas d'image soumise
//if (isset($img['img']['name']) && empty($img['img']['name'])) {
//    return $lastImg;
//}
//
////Une image est soumise
//if (isset($lastImg) && !empty($lastImg)) {
//    @unlink(DL_IMG . "/public/img/" . $lastImg );
//}
//$name = uniqid().$img['img']['name'];
//move_uploaded_file($img['img']['tmp_name'], DL_IMG . '/public/img/' .  $name);
//return $name;