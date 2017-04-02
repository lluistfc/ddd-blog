<?php
namespace Blog\Application\Command;

use Blog\Domain\Entity\BaseEntity;
use Blog\Domain\Repository\PersistEntityRepository;

/**
 * Class CreationCommand
 * @package Blog\Application\Command
 */
abstract class CreationCommand
{
    /** @var  PersistEntityRepository */
    protected $entityRepository;

    public function __construct(PersistEntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    public abstract function create(BaseEntity $baseEntity);
}