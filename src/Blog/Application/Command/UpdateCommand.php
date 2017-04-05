<?php
namespace Blog\Application\Command;

/**
 * Class UpdateCommand
 * @package Blog\Application\Command
 */
abstract class UpdateCommand implements CommandInterface
{
    use BaseCommand;

    public function execute()
    {
        $this->update();
    }

    protected abstract function update();
}