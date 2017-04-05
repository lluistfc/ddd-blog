<?php
namespace Blog\Application\CommandHandler;

use Blog\Application\Command\CommandInterface;
use Blog\Domain\Entity\EntityInterface;
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
     */
    public function __construct(CommandInterface $command);

    /**
     * @access public
     * @param  $entity
     * @return void
     */
    public function handle($entity);
}