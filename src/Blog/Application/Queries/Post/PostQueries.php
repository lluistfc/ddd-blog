<?php
namespace Blog\Application\Queries\Post;

use Blog\Domain\Collections\PostCollection;
use Blog\Domain\Entity\Post;
use Blog\Domain\Repository\PostQueriesRepository;

/**
 * Class PostQueries
 * @package Blog\Application\Queries\Post
 */
class PostQueries
{
    /**
     * @access private
     * @var PostQueriesRepository
     */
    private $entityRepository;

    /**
     * PostQueries constructor.
     * @access public
     * @param PostQueriesRepository $entityRepository
     */
    public function __construct(PostQueriesRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    /**
     * @access public
     * @param $id
     * @return Post|null
     */
    public function findPostById($id)
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
     * @return PostCollection
     */
    public function findAllPublishedPosts()
    {
        return $this->entityRepository->findAllPublishedPosts();
    }
}