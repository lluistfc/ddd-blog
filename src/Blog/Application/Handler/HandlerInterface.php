<?php
namespace Blog\Application\Handler;

use Blog\Application\Command\CommandInterface;

/**
 * Class Handler
 * @package Blog\Application\Command
 */
Interface HandlerInterface
{
    public function handle(CommandInterface $command);
}