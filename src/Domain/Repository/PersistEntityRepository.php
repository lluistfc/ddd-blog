<?php
namespace Blog\Domain\Repository;

use Blog\Domain\Entity\EntityInterface;

/**
 * Interface PersistEntityRepository
 * @package Blog\Domain\Repository
 */
interface PersistEntityRepository
{
    /**
     * @param EntityInterface $baseEntity
     * @return void
     */
    public function persistEntity(EntityInterface $baseEntity);

    /**
     * @param EntityInterface $baseEntity
     * @return void
     */
    public function removeEntity(EntityInterface $baseEntity);

    /**
     * @param EntityInterface $baseEntity
     * @return void
     */
    public function updateEntity(EntityInterface $baseEntity);
}