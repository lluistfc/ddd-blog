<?php
namespace Blog\Application\Command;

/**
 * Class CreationCommand
 * @package Blog\Application\Command
 */
abstract class CreationCommand implements CommandInterface
{
    use BaseCommand;

    public function execute()
    {
        $this->create();
    }

    protected abstract function create();
}