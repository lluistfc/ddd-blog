<?php
namespace Blog\Application\Command\Post;

use Blog\Application\Command\CommandInterface;
use Blog\Application\Repository\EntityPersistRepository;
use Blog\Domain\Entity\Post;

/**
 * Class CreatePost
 * @package Blog\Application\Command\Post
 */
class CreatePostCommand implements CommandInterface
{
    /**
     * @var EntityPersistRepository
     */
    protected $entityRepository;

    /**
     * Command constructor.
     * @access public
     * @param EntityPersistRepository $entityRepository
     */
    public function __construct(EntityPersistRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }
    /**
     * @access public
     * @param $postValues
     */
    public function execute($postValues)
    {
        $this->entityRepository->persistEntity(Post::publish(
            $postValues[Post::TITLE],
            $postValues[Post::CONTENT],
            $postValues[Post::STATE],
            $postValues[Post::AUTHOR],
            $postValues[Post::PUBLISHED],
            $postValues[Post::PUBLISHEDAT]
        ));
    }
}