<?php
namespace Blog\Domain\Repository;

use Blog\Domain\Collections\PostCollection;
use Blog\Domain\Entity\Post;

/**
 * Interface PostQueriesInterface
 * @package Blog\Domain\Repository
 */
interface PostQueriesInterface
{
    /**
     * @access public
     * @param int $id
     * @return Post|null
     */
    public function findOneById(int $id);

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
     * @return PostCollection
     */
    public function findAllPublishedPosts();
}