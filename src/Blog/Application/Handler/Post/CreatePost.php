<?php
namespace Blog\Application\Handler\Post;

use Blog\Application\Command\CommandInterface;
use Blog\Application\Handler\HandlerInterface;
use Blog\Domain\Validators\Post\CreatePostValidator;

/**
 * Class CreatePost
 * @package Blog\Application\Handler
 */
class CreatePost implements HandlerInterface
{
    /**
     * @var array
     */
    private $postValues;

    public function __construct(array $postValues)
    {
        (new CreatePostValidator())->validate($postValues);
        $this->postValues = $postValues;
    }

    public function handle(CommandInterface $command)
    {
        $command->execute($this->postValues);
    }
}