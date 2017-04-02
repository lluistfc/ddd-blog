<?php
namespace Blog\Application\Handler;

use Blog\Application\Command\CommandInterface;
use Blog\Application\CommandHandler\CommandHandlerInterface;
use Blog\Domain\Exceptions\Validation\ValidationException;
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
     * @param ValidatorInterface $validator
     */
    public function __construct(CommandInterface $command, ValidatorInterface $validator)
    {

        $this->command = $command;
        $this->validator = $validator;
    }

    /**
     * @access public
     * @return void
     * @throws ValidationException
     */
    public abstract function handle();
}