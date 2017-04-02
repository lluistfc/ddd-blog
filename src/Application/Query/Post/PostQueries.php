<?php
namespace Blog\Application\Query\Post;

use Blog\Application\Query\BaseQueries;
use Blog\Domain\Collections\PostCollection;
use Blog\Domain\Entity\BaseEntity;
use Blog\Domain\Entity\Post;
use Blog\Domain\Repository\PostQueriesInterface;

/**
 * Class PostQueries
 * @package Blog\Application\Query\Post
 */
class PostQueries extends BaseQueries implements PostQueriesInterface
{
    /**
     * @param $id
     * @return BaseEntity|null
     */
    public function findPostById($id)
    {
        return $this->entityRepostiroy->findOneById($id);
    }

    public function findPostByTitle($title)
    {
        // TODO: Implement findPostByTitle() method.
    }

    public function findNewestPost()
    {
        // TODO: Implement findNewestPost() method.
    }

    public function findAllPublishedPosts()
    {
        // TODO: Implement findAllPublishedPosts() method.
    }
}