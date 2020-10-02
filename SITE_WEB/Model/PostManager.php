<?php


namespace App\Model;


use Model\Entities\PostEntity;
use PDO;

class PostManager
{

    /**
     * frontManager constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=blop_pro;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    /**
     * @return PostEntity[]
     */
    public function findAll(): array
    {
        $bdd = $this->bdd;
        /*** accès au model ***/
        $query = "SELECT * FROM post";
        $req = $bdd->prepare($query);
        $req->execute();
        $posts = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $post = new PostEntity();
            $post->setId($row['id']);
            $post->setTitle($row['title']);
            $post->setContent($row['content']);
            $post->setResume($row['resume']);
            $post->setCreatedAt($row['created_at']);
            $post->setUpdatedAt($row['updated_at']);
            $post->setUserId($row['user_id']);

            $posts[] = $post; // tableau d'objet

        };
        return $posts;

    }



}