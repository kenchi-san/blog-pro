<?php


namespace App\Model;


use Model\Entities\experienceEntity;
use PDO;

class ExperienceManager extends Manager
{

    use HydratorTrait;

    public function findExperiences()
    {

        /*** accès au model ***/
        $query = "SELECT * FROM experience";
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

    function addExperiences($dataExperience)
    {
        $query = "INSERT INTO experience (user_id, title, description,img, link) VALUES (:user_id, :title, :description,:img, :link)";
        $req = $this->bdd->prepare($query);
        $req->bindParam(':user_id', $dataExperience[0]['user_id']);
        $req->bindParam(':title', $dataExperience[0]['title']);
        $req->bindParam('description', $dataExperience[0]['description']);
        $req->bindParam('img', $dataExperience[0]['img']);
        $req->bindParam('link', $dataExperience[0]['link']);
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

    public function editExperience($id, $dataPost, $img)
    {

        $experience = new ExperienceEntity();
        $experience->getUpdatedAt();
        $data = array_merge(['id' => $id], $dataPost);
        $req = $this->bdd->prepare('UPDATE experience SET title = :nvtitle, description= :nvdescription, link = :nvlink, img = :nvimg WHERE id=:id');


        $result = $req->execute([
            'id' => $data['id'],
            'nvtitle' => $data['title'],
            'nvdescription' => $data['description'],
            'nvlink' => $data['link'],
            'nvimg' => $img
        ]);
        return $result;

    }

}