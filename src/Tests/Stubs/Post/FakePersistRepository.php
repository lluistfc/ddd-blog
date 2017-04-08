<?php
namespace Tests\Stubs\Post;

use Blog\Domain\Entity\Entity;
use Blog\Application\Repository\EntityPersistRepository;

/**
 * Class FakePersistRepository
 * @package Tests\Stubs\Post
 */
class FakePersistRepository implements EntityPersistRepository
{
    private $entityWasPersisted = false;
    private $entityWasUpdated = false;

    public function persistEntity(Entity $baseEntity)
    {
        $this->entityWasPersisted = true;
    }

    public function removeEntity(Entity $baseEntity)
    {
    }

    public function updateEntity(Entity $baseEntity)
    {
        $this->entityWasUpdated = true;
    }

    public function getEntityWasPersisted()
    {
        return $this->entityWasPersisted;
    }

    public function getEntityWasUpdated()
    {
        return $this->entityWasUpdated;
    }
}