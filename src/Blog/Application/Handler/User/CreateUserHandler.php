<?php
namespace Blog\Application\Handler\User;

use Blog\Application\Command\CommandInterface;
use Blog\Application\Handler\HandlerInterface;
use Blog\Domain\Validators\User\CreateUserValidator;

/**
 * Class CreateUserHandler
 * @package Blog\Application\Handler\User
 */
class CreateUserHandler implements HandlerInterface
{
    /**
     * @var array
     */
    private $userValues;

    public function __construct(array $userValues)
    {
        (new CreateUserValidator())->validate($userValues);
        $this->userValues = $userValues;
    }

    /**
     * @param CommandInterface $command
     */
    public function handle(CommandInterface $command)
    {
        $command->execute($this->userValues);
    }
}