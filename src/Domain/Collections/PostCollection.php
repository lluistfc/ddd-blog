<?php
namespace Blog\Domain\Collections;

use Blog\Domain\Entity\Post;
use Blog\Domain\Exceptions\Collection\ElementDoesNotExistsInCollectionException;
use Blog\Domain\Exceptions\Collection\InvalidElementInCollectionException;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PostCollection
 * @package Blog\Domain\Collections
 */
class PostCollection extends ArrayCollection
{
    /**
     * @param mixed $element
     * @returns bool
     * @throws InvalidElementInCollectionException
     */
    public function add($element)
    {
        if (!$element instanceof Post) {
            throw new InvalidElementInCollectionException();
        }

        return $this->addPost($element);
    }

    /**
     * @param Post $post
     * @returns bool
     */
    protected function addPost(Post $post)
    {
        $this->offsetSet($post->getId(), $post);
        return true;
    }

    /**
     * @param $id
     * @return Post
     * @throws ElementDoesNotExistsInCollectionException
     */
    public function getPost($id)
    {
        if (!$this->offsetExists($id)) {
            throw new ElementDoesNotExistsInCollectionException();
        }
        return $this->get($id);
    }

    /**
     * @return Post[]
     */
    public function getAll()
    {
        return $this->toArray();
    }

    /**
     * @return Post
     */
    public function getFirst()
    {
        return $this->first();
    }

    /**
     * @return Post
     */
    public function getLast()
    {
        return $this->last();
    }

    /**
     * @return Post
     */
    public function shift()
    {
        $post = $this->first();
        $this->removeElement($post);

        return $post;
    }

    /**
     * @return Post
     */
    public function pop()
    {
        $post = $this->last();
        $this->removeElement($post);

        return $post;
    }
}