<?php
namespace Blog\Application\Queries\Post;

use Blog\Application\Collections\EntityCollection;
use Blog\Domain\DataObject\Identifier\Identifier;
use Blog\Domain\Entity\Post;
use Blog\Application\Repository\PostQueriesInterface;

/**
 * Class PostQueries
 * @package Blog\Application\Queries\Post
 */
class PostQueries
{
    /**
     * @access private
     * @var PostQueriesInterface
     */
    private $entityRepository;

    /**
     * PostQueries constructor.
     * @access public
     * @param PostQueriesInterface $entityRepository
     */
    public function __construct(PostQueriesInterface $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    /**
     * @access public
     * @param $id
     * @return Post|null
     */
    public function findThisPost(Identifier $id)
    {
        return $this->entityRepository->findOneById($id);
    }

    /**
     * @access public
     * @param $title
     * @return Post|null
     */
    public function findPostByTitle($title)
    {
        return $this->entityRepository->findPostByTitle($title);
    }

    /**
     * @access public
     * @return Post|null
     */
    public function findNewestPost()
    {
        return $this->entityRepository->findNewestPost();
    }

    /**
     * @access public
     * @return EntityCollection
     */
    public function findAllPublishedPosts()
    {
        return $this->entityRepository->findAllPublishedPosts();
    }
}