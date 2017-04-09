<?php
namespace Blog\Application\Command;

/**
 * Class BaseCommand
 * @package Blog\Application\Command
 */
interface CommandInterface
{
    public function execute($data);
}