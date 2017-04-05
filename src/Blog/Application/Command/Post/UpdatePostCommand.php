<?php
namespace Blog\Application\Command\Post;

use Blog\Application\Command\BaseCommand;
use Blog\Application\Command\UpdateCommand;

class UpdatePostCommand extends UpdateCommand
{
    /**
     * @access protected
     * @return void
     */
    protected function update()
    {
        $this->entityRepository->updateEntity($this->entity);
    }
}