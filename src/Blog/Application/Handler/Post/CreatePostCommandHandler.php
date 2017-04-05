<?php
namespace Blog\Application\Handler;

use Blog\Domain\Entity\EntityInterface;
use Blog\Domain\Entity\Post;
use Blog\Domain\Validators\Post\CreatePostValidator;

/**
 * Class CreatePostCommandHandler
 * @package Blog\Application\Handler
 */
class CreatePostCommandHandler extends CommandHandler
{
    public function handle($entity)
    {
        $this->validator = new CreatePostValidator($entity);
        if ($this->validator->validate()) {
            $this->command->execute($entity);
        }
    }
}