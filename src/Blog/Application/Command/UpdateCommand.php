<?php
namespace Blog\Application\Command;

/**
 * Class UpdateCommand
 * @package Blog\Application\Command
 */
abstract class UpdateCommand extends BaseCommand implements CommandInterface
{
    public function execute()
    {
        $this->update();
    }

    protected abstract function update();
}