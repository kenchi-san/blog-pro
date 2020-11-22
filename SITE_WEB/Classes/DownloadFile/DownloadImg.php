<?php


namespace App\Classes\DownloadFile;


class DownloadImg
{


    public function imgFromForm($img = null, $lastImg = null)
    {


        /** ne change rien car on change que le text**/
        if (isset($lastImg) && !empty($lastImg)) {
            if (isset($_FILES['img']['name']) && empty($_FILES['img']['name'])) {
                return $lastImg;
            }

        }
        /** change une image déjà existante**/
        if (isset($lastImg) && !empty($lastImg)) {
            if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
                unlink(DL_IMG . "/public/img/" . $lastImg . ".jpeg");
                rename($_FILES['img']['tmp_name'], DL_IMG . '/public/img/' . $_FILES['img']['name'] . '.jpeg');
                return $_FILES['img']['name'];

            }
            return true;
        }
        /** met en place une première image**/
        if (isset($lastImg) && empty($lastImg)) {
            if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
                rename($_FILES['img']['tmp_name'], DL_IMG . '/public/img/' . $_FILES['img']['name'] . '.jpeg');
                return $_FILES['img']['name'];
            }
            return true;
        }
        if (isset($lastImg) && empty($lastImg)) {
            if (isset($_FILES['img']['name']) && empty($_FILES['img']['name'])) {
                return null;
            }

        }

    }

}
