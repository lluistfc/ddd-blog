<?php
namespace Blog\Application\Handler;

use Blog\Application\Command\CommandInterface;
use Blog\Application\CommandHandler\CommandHandlerInterface;
use Blog\Domain\Validators\ValidatorInterface;

abstract class CommandHandler implements CommandHandlerInterface
{
    /**
     * @var CommandInterface
     */
    protected $command;
    /**
     * @access private
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * CommandHandler constructor.
     * @param CommandInterface $command
     */
    public function __construct(CommandInterface $command)
    {
        $this->command = $command;
    }
}