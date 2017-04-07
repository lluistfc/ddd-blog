<?php
namespace Blog\Application\Handler;

use Blog\Application\Command\CommandInterface;
use Blog\Domain\Entity\EntityInterface;
use Blog\Domain\Validators\ValidatorInterface;

/**
 * Class Handler
 * @package Blog\Application\Command
 */
Interface HandlerInterface
{
    /**
     * @access public
     * @param CommandInterface $command
     * @return void
     */
    public function handle(CommandInterface $command);
}