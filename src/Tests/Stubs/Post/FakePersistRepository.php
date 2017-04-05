<?php
namespace Tests\Stubs\Post;

use Blog\Domain\Entity\EntityInterface;
use Blog\Domain\Repository\PersistEntityRepository;

class FakePersistRepository implements PersistEntityRepository
{
    private $entityWasPersisted = false;
    private $entityWasUpdated = false;

    public function persistEntity(EntityInterface $baseEntity)
    {
        $this->entityWasPersisted = true;
    }

    public function removeEntity(EntityInterface $baseEntity)
    {
    }

    public function updateEntity(EntityInterface $baseEntity)
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