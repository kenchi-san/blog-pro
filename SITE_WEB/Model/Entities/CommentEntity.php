<?php


namespace App\Model\Entities;


use App\Model\HydratorTrait;
use Model\Entities\UserEntity;

class CommentEntity
{


    use HydratorTrait;

    const STATUS_BANN = 3;
    const STATUS_VALIDATED = 2;
    const STATUS_WAIT = 1;

    private $id;
    private $content;
    private $created_at;
    private $post_id;
    private $comment_status_id;
    private $user_id;

    /**
     * @var UserEntity|null
     */
    private $user = null;

    private $statusName = null;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId($post_id): void
    {
        $this->post_id = $post_id;

    }



    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return UserEntity|null
     */
    public function getUser(): ?UserEntity
    {
        return $this->user;
    }

    /**
     * @param UserEntity|null $user
     */
    public function setUser(?UserEntity $user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getCommentStatusId()
    {
        return $this->comment_status_id;
    }

    /**
     * @param mixed $comment_status_id
     */
    public function setCommentStatusId($comment_status_id): void
    {
        $this->comment_status_id = $comment_status_id;
    }


    /**
     * @return mixed
     */
    public function getStatusName(): ?CommentStatusEntity
    {
        return $this->statusName;
    }

    /**
     * @param CommentStatusEntity|null $statusName
     */
    public function setStatusName(?CommentStatusEntity $statusName): void
    {
        $this->statusName = $statusName;
    }

}