<?php


namespace App\Model;


use App\Model\Entities\CommentEntity;
use App\Model\Entities\CommentStatusEntity;
use Model\Entities\PostEntity;
use Model\Entities\UserEntity;
use PDO;

class CommentManager extends Manager
{

    use HydratorTrait;

    /**
     * @return CommentEntity[]
     */
    public function findIdCommentFromOnePost($id): array
    {
        /*** accès au model ***/
        $query = "SELECT * FROM comment INNER JOIN user u on comment.user_id = u.id WHERE post_id = :id ORDER BY created_at 
    DESC LIMIT 5";
        $req = $this->bdd->prepare($query);
        $req->execute(array('id' => $id));
        $comments = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $comment = new CommentEntity();

            $comment->Hydrate($row);
            $comment->setCommentStatusId($row['comment_status_id']);
            $comment->setPostId($row['post_id']);

            $user = new UserEntity();
            $user->setUsername($row['username']);
            $comment->setUser($user);
            $comments[] = $comment;
        };
        return $comments;

    }

    public function AddCommentFromOnePostId($userId,$postId,$content)
    {
        $query = "INSERT INTO comment ( user_id,post_id,content) VALUES (:user_id,:post_id,:content) ";
        $req = $this->bdd->prepare($query);
        $req->bindParam(':content', $content);
        $req->bindParam(':user_id', $userId);
        $req->bindParam(':post_id', $postId);
        $req->execute();

    }

    public function findAllComments()
    {
        /*** accès au model ***/
        $query = "SELECT c.id as comment_id,c.content,c.created_at,c.post_id,c.comment_status_id ,c.user_id,u.username,cs.id, cs.status FROM comment c 
    INNER JOIN user u on c.user_id = u.id 
    INNER JOIN comment_status cs on c.comment_status_id = cs.id 
    ORDER BY created_at 
    DESC LIMIT 5 ";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $comments = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $comment = new CommentEntity();
            $comment->Hydrate($row);
            $comment->setId($row['comment_id']);

            $commentStatus = new CommentStatusEntity();
            $commentStatus->setStatus($row['status']);
            $comment->setStatusName($commentStatus);

            $user = new UserEntity();
            $user->setUsername($row['username']);
            $comment->setUser($user);

            $comments[] = $comment;

        };
        return $comments;
    }

    public function switchStatus($idComment, $idStatus)
    {


        $req = $this->bdd->prepare('UPDATE comment SET comment_status_id  =:nvstatus WHERE id=:id');
        $result = $req->execute([
            'id' => $idComment,
            'nvstatus' => $idStatus

        ]);
        return $result;
    }

    public function deleteComment($id)
    {
        $query = "DELETE FROM comment WHERE id=:id";
        $req = $this->bdd->prepare($query);
        $result = $req->execute(['id' => $id]);
        return $result;
    }
    public function findById(int $commentId)
    {
        $query = "SELECT c.id as comment_id,c.content,c.created_at,c.user_id,u.id,u.username,u.firstname FROM comment c 
        INNER JOIN user u on c.user_id = u.id WHERE c.id= :id";
        $req = $this->bdd->prepare($query);
        $req->execute(array('id' => $commentId));
        $row = $req->fetch(PDO::FETCH_ASSOC);

        if($row){
            $comment = new CommentEntity();
            $comment->hydrate($row);
            $comment->setId($row['comment_id']);

            $user = new UserEntity();
            $user->setId($row['user_id']);
            $user->setFirstname($row['firstname']);
            $user->setUsername($row['username']);
            $comment->setUser($user);
            return $comment;
        }
    }

}