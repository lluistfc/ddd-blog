<?php
namespace Blog\Application\CommandHandler;

use Blog\Application\Command\CommandInterface;
use Blog\Domain\Validators\ValidatorInterface;

/**
 * Class Handler
 * @package Blog\Application\Command
 */
Interface CommandHandlerInterface
{
    /**
     * CommandHandlerInterface constructor.
     * @access public
     * @param CommandInterface $command
     * @param ValidatorInterface $validator
     */
    public function __construct(CommandInterface $command, ValidatorInterface $validator);

    /**
     * @access public
     * @return void
     */
    public function handle();
}