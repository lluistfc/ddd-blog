<?php
namespace Blog\Domain\Repository;

use Blog\Domain\Entity\EntityInterface;

/**
 * Interface EntityPersistRepository
 * @package Blog\Domain\Repository
 */
interface EntityPersistRepository
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