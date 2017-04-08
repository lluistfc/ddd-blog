<?php
namespace Blog\Application\Command;

/**
 * Class BaseCommand
 * @package Blog\Application\Command
 */
interface CommandInterface
{
    /**
     * @param $data
     * @return void
     */
    public function execute($data);
}