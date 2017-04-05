<?php
namespace Blog\Application\Command\Post;

use Blog\Application\Command\Command;
use Blog\Domain\Entity\EntityInterface;

/**
 * Class CreatePostCommand
 * @package Blog\Application\Command\Post
 */
class CreatePostCommand extends Command
{
    /**
     * @access public
     * @param EntityInterface $entity
     */
    public function execute(EntityInterface $entity)
    {
        $this->entityRepository->persistEntity($entity);
    }
}