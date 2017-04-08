<?php
namespace Blog\Domain\Repository;

use Blog\Domain\Entity\Entity;

/**
 * Interface EntityPersistRepository
 * @package Blog\Domain\Repository
 */
interface EntityPersistRepository
{
    /**
     * @param Entity $baseEntity
     * @return void
     */
    public function persistEntity(Entity $baseEntity);

    /**
     * @param Entity $baseEntity
     * @return void
     */
    public function removeEntity(Entity $baseEntity);

    /**
     * @param Entity $baseEntity
     * @return void
     */
    public function updateEntity(Entity $baseEntity);
}