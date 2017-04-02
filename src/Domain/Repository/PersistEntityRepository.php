<?php
namespace Blog\Domain\Repository;

use Blog\Domain\Entity\BaseEntity;

/**
 * Interface PersistEntityRepository
 * @package Blog\Domain\Repository
 */
interface PersistEntityRepository
{
    /**
     * @param BaseEntity $baseEntity
     * @return void
     */
    public function persistEntity(BaseEntity $baseEntity);

    /**
     * @param BaseEntity $baseEntity
     * @return void
     */
    public function removeEntity(BaseEntity $baseEntity);

    /**
     * @param BaseEntity $baseEntity
     * @return void
     */
    public function updateEntity(BaseEntity $baseEntity);
}