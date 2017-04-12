<?php
namespace Blog\Application\Hydrator;

/**
 * Interface Hydrator
 * @package Blog\Application\Hydrator
 */
interface Hydrator
{
    public function hydrate(array $data);
}