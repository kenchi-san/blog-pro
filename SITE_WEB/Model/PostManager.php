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
        $posts = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $post = new PostEntity();
            $post->hydrate($row);
            $post->setId($row['post_id']);

            $user = new UserEntity();
            $user->setId($row['user_id']);
            $user->setFirstname($row['firstname']);
            $user->setUsername($row['username']);
            $post->setUser($user);

            $posts[] = $post; // tableau d'objet
        };
        return $posts;
    }

    /**
     * @param $dataForm
     * @param $id
     * @return PostEntity[]
     */
    public function updatePost($dataForm, $id): array
    {
        $post = new PostEntity();
        $newDate = $post->getUpdatedAt();
        $data = array_merge($dataForm, ['updated_at' => $newDate, 'id' => $id]);
        $req = $this->bdd->prepare('UPDATE post SET title = :nvtitle, resume= :nvresume, content = :nvcontent, updated_at =:update_date WHERE id=:id');
        $result = $req->execute([
            'id' => $data['id'],
            'nvtitle' => $data['title'],
            'nvresume' => $data['resume'],
            'nvcontent' => $data['content'],
            'update_date' => $data['updated_at']
//
        ]);
        $posts[] = $result;
        return $posts;
    }

    public function deletePost($id)
    {
        $query = "DELETE FROM post WHERE id=:id";
        $req = $this->bdd->prepare($query);
        $result = $req->execute(['id' => $id]);
        return $result;
    }

    public function addPost($dataPost)
    {
        $query = "INSERT INTO post (user_id,title,resume,content) VALUES (:user_id, :title,:resume, :content)";
        $req = $this->bdd->prepare($query);
        $req->bindParam(':title', $dataPost['0']['title']);
        $req->bindParam(':resume', $dataPost['0']['resume']);
        $req->bindParam(':content', $dataPost['0']['content']);
        $req->bindParam(':user_id', $dataPost['0']['user_id']);

        $result = $req->execute();
        return $result;
    }


}