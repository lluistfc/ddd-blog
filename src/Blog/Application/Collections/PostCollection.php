<?php
namespace Blog\Application\Collections;

use Blog\Domain\Entity\EntityInterface;
use Blog\Domain\Entity\Post;
use Blog\Domain\Exceptions\Collection\ElementDoesNotExistsInCollectionException;

/**
 * Class PostCollection
 * @package Blog\Application\Collections
 */
class PostCollection extends Collection
{
    /**
     * @param Post $post
     * @returns bool
     */
    public function addPost(Post $post)
    {
        return $this->add($post);
    }

    /**
     * @param $id
     * @return Post|EntityInterface
     * @throws ElementDoesNotExistsInCollectionException
     */
    public function getPost($id)
    {
        return $this->get($id);
    }

    /**
     * @return Post[]
     */
    public function getAllPosts()
    {
        return $this->toArray();
    }

    /**
     * @return Post|EntityInterface|bool
     */
    public function getFirstPost()
    {
        return $this->first();
    }

    /**
     * @return Post|EntityInterface|bool
     */
    public function getLastPost()
    {
        return $this->last();
    }

    /**
     * @return Post|EntityInterface|bool
     */
    public function getNextPost()
    {
        return $this->next();
    }

    /**
     * @return Post|EntityInterface|bool
     */
    public function getPrevPost()
    {
        return $this->prev();
    }
}