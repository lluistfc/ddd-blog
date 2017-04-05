<?php
namespace Blog\Application\Command\Post;

use Blog\Application\Command\CreationCommand;
use Blog\Domain\Entity\EntityInterface;

/**
 * Class CreatePostCommand
 * @package Blog\Application\Command\Post
 */
class CreatePostCommand extends CreationCommand
{
    /**
     * @access protected
     * @return void
     */
    protected function create()
    {
        $this->entityRepository->persistEntity($this->entity);
    }
}