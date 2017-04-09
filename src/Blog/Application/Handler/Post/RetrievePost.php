<?php
namespace Blog\Application\Handler\Post;

use Blog\Application\Command\CommandInterface;
use Blog\Application\Handler\HandlerInterface;
use Blog\Domain\DataObject\Identifier\Identifier;
use Blog\Domain\Exceptions\Validation\InvalidArgumentException;
use Blog\Domain\Validators\Post\CreatePostValidator;

/**
 * Class ShowPost
 * @package Blog\Application\Handler
 */
class RetrievePost implements HandlerInterface
{
    /**
     * @var array
     */
    private $postIdentifier;

    public function __construct(Identifier $identifier)
    {
        if (!is_numeric($identifier->get())) {
            throw new InvalidArgumentException();
        }

        $this->postIdentifier = $identifier;
    }

    public function handle(CommandInterface $command)
    {
        return $command->execute($this->postIdentifier);
    }
}