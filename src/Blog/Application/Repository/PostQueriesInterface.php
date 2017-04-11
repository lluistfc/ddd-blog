<?php
namespace Blog\Application\Repository;

use Blog\Application\Collections\EntityCollection;
use Blog\Domain\DataObject\Identifier\Identifier;
use Blog\Domain\Entity\Post;

/**
 * Interface PostQueriesInterface
 * @package Blog\Application\Repository
 */
interface PostQueriesInterface
{
    /**
     * @access public
     * @param Identifier $id
     * @return Post|null
     */
    public function findOneById(Identifier $id);

    /**
     * @access public
     * @param string $title
     * @return Post|null
     */
    public function findPostByTitle($title);

    /**
     * @access public
     * @return Post|null
     */
    public function findNewestPost();

    /**
     * @access public
     * @return EntityCollection
     */
    public function findAllPublishedPosts();
}