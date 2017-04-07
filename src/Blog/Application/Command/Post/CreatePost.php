<?php
namespace Blog\Application\Command\Post;

use Blog\Application\Command\Command;
use Blog\Domain\Entity\EntityInterface;
use Blog\Domain\Entity\Post;
use Blog\Domain\Validators\Post\CreatePostValidator;

/**
 * Class CreatePostCommand
 * @package Blog\Application\Command\Post
 */
class CreatePost extends Command
{
    /**
     * @access public
     * @param $postValues
     */
    public function execute($postValues)
    {
        $this->entityRepository->persistEntity(Post::register(
            $postValues[Post::TITLE],
            $postValues[Post::CONTENT],
            $postValues[Post::STATE],
            $postValues[Post::PUBLISHED],
            $postValues[Post::PUBLISHED_AT]
        ));
    }
}