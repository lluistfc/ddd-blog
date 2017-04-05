<?php
namespace Blog\Application\Command\Post;

use Blog\Application\Command\Command;
use Blog\Domain\Entity\EntityInterface;

class UpdatePostCommand extends Command
{
    /**
     * @access public
     * @param EntityInterface $entity
     * @return void
     */
    public function execute(EntityInterface $entity)
    {
        $this->entityRepository->updateEntity($entity);
    }
}