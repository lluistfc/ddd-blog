<?php
namespace Blog\Application\Handler;

/**
 * Class CreatePostCommandHandler
 * @package Blog\Application\Handler
 */
class CreatePostCommandHandler extends CommandHandler
{
    public function handle()
    {
        if ($this->validator->validate()) {
            $this->command->execute();
        }
    }
}