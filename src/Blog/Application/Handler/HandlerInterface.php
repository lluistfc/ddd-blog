<?php
namespace Blog\Application\Handler;

use Blog\Application\Command\CommandInterface;

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