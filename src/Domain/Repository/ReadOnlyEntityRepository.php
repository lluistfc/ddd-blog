<?php
namespace Blog\Domain\Repository;

use Blog\Domain\Entity\BaseEntity;

/**
 * Interface ReadOnlyEntityRepository
 * @package Blog\Domain\Repository
 */
interface ReadOnlyEntityRepository
{
    /**
     * @param integer
     * @return BaseEntity|null
     */
    public function findOneById(int $id);
}