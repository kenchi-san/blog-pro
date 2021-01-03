<?php

namespace App\Model;


use Model\Entities\experienceEntity;
use PDO;

class ExperienceManager extends Manager
{

    use HydratorTrait;

    public function findAllExperiences()
    {

        /*** accès au model ***/
        $query = "SELECT * FROM experience ORDER BY created_at DESC ";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $experiences = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $experience = new experienceEntity();
            $experience->hydrate($row);
            $experiences[] = $experience; // tableau d'objet
        };
        return $experiences;
    }

    public function findExperienceById($id)
    {

        /*** accès au model ***/
        $query = "SELECT * FROM experience  WHERE id=:id ORDER BY created_at DESC LIMIT 10";
        $req = $this->bdd->prepare($query);
        $req->execute(['id' => $id]);
        $experiences = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $experience = new experienceEntity();
            $experience->hydrate($row);
            $experiences[] = $experience; // tableau d'objet
        }
        return $experiences;
    }

    function addExperience($user_id, $img, $title, $description, $link)
    {
        $query = "INSERT INTO experience (user_id, title, description,img, link) VALUES (:user_id, :title, :description,:img, :link)";
        $req = $this->bdd->prepare($query);
        $req->bindParam(':user_id', $user_id);
        $req->bindParam(':title', $title);
        $req->bindParam('description', $description);
        $req->bindParam('img', $img);
        $req->bindParam('link', $link);
        $result = $req->execute();
        return $result;
    }

    public function deleteExperience($id)
    {
        $query = "DELETE FROM experience WHERE id=:id";
        $req = $this->bdd->prepare($query);
        $result = $req->execute(['id' => $id]);
        return $result;
    }

    public function editExperience($id, $title,$description,$link, $img)
    {
//
        $req = $this->bdd->prepare('UPDATE experience SET title = :nvtitle, description= :nvdescription, link = :nvlink, img = :nvimg, updated_at =:update_date WHERE id=:id');

        $result = $req->execute([
            'id' => $id,
            'nvtitle' => $title,
            'nvdescription' => $description,
            'nvlink' => $link,
            'nvimg' => $img,
            'update_date' => date('Y-m-d H:i:s')
        ]);
        return $result;

    }

}