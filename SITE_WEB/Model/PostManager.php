<?php


namespace App\Model;


use Model\Entities\PostEntity;
use Model\Entities\UserEntity;
use PDO;

class PostManager extends Manager
{
    use HydratorTrait;


    /**
     * @return PostEntity[]
     */
    public function findAll(): array
    {

        /*** accès au model ***/
        $query = "SELECT p.*, u.firstname as user_firstname FROM post p INNER JOIN user u on p.user_id = u.id ORDER BY created_at DESC LIMIT 5";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $posts = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $post = new PostEntity();
            $post->hydrate($row);

            $user = new UserEntity();

            $user->hydrate($row);
            $user->setId($row['user_id']);
            $user->setFirstname($row['user_firstname']);
            $post->setUser($user);
            $posts[] = $post; // tableau d'objet
        };
        return $posts;

    }

    public function findById($id)
    {

        $query = "SELECT p.id as post_id,p.title,p.resume,p.content,p.user_id,p.created_at,u.id,u.username,u.firstname FROM post p 
        INNER JOIN user u on p.user_id = u.id WHERE p.id= :id";
        $req = $this->bdd->prepare($query);
        $req->execute(array('id' => $id));
        $row = $req->fetch(PDO::FETCH_ASSOC);

        if($row){
            $post = new PostEntity();
            $post->hydrate($row);
            $post->setId($row['post_id']);

            $user = new UserEntity();
            $user->setId($row['user_id']);
            $user->setFirstname($row['firstname']);
            $user->setUsername($row['username']);
            $post->setUser($user);
            return $post;
        }

    }

    public function updatePost($id, $title, $resume, $content,$user_id): bool
    {
        $req = $this->bdd->prepare('UPDATE post SET title = :nvtitle, resume= :nvresume, content = :nvcontent, updated_at =:update_date,user_id=:user_id WHERE id=:id');
        return $req->execute([
            'id' => $id,
            'nvtitle' => $title,
            'nvresume' => $resume,
            'nvcontent' => $content,
            'update_date' => date('Y-m-d H:i:s'),
            'user_id' =>$user_id
        ]);
    }

    public function deletePost($id)
    {
        $query = "DELETE FROM post WHERE id=:id";
        $req = $this->bdd->prepare($query);
        $result = $req->execute(['id' => $id]);
        return $result;
    }

    public function addPost($user_id,$title,$resume,$content)
    {
        $query = "INSERT INTO post (user_id,title,resume,content) VALUES (:user_id, :title,:resume, :content)";
        $req = $this->bdd->prepare($query);
        $req->bindParam(':title', $title);
        $req->bindParam(':resume', $resume);
        $req->bindParam(':content', $content);
        $req->bindParam(':user_id', $user_id);

        $result = $req->execute();
        return $result;
    }


}