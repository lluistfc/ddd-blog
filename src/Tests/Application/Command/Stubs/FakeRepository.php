<?php
namespace Blog\Tests\Application\Command\Stubs;

use Blog\Domain\Entity\EntityInterface;
use Blog\Domain\Repository\PersistEntityRepository;

class FakeRepository implements PersistEntityRepository
{
    private $entityWasPersisted = false;
    private $entityWasUpdated = false;

    public function findOneBy(EntityInterface $baseEntity)
    {
    }

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