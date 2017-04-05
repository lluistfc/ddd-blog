<?php
namespace Blog\Application\Command;

/**
 * Class CreationCommand
 * @package Blog\Application\Command
 */
abstract class CreationCommand extends BaseCommand implements CommandInterface
{
    public function execute()
    {
        $this->create();
    }

    protected abstract function create();
}