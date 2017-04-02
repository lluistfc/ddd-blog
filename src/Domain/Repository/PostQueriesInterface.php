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
     * @param string $title
     * @return Post|null
     */
    public function findPostByTitle($title);

    /**
     * @return Post|null
     */
    public function findNewestPost();

    /**
     * @return PostCollection
     */
    public function findAllPublishedPosts();
}