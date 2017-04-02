<?php
namespace Blog\Application\Command\Post;

use Blog\Application\Command\CreationCommand;
use Blog\Domain\Entity\BaseEntity;

/**
 * Class CreatePostCommand
 * @package Blog\Application\Command\Post
 */
class CreatePostCommand extends CreationCommand
{
    public function create(BaseEntity $post)
    {
        $this->entityRepository->persistEntity($post);
    }
}