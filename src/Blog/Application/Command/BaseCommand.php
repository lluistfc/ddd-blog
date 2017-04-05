<?php
namespace Blog\Application\Command;

use Blog\Domain\Entity\EntityInterface;
use Blog\Domain\Repository\PersistEntityRepository;

/**
 * Class BaseCommand
 * @package Blog\Application\Command
 */
abstract class BaseCommand
{
    /**
     * @var PersistEntityRepository
     */
    protected $entityRepository;

    /**
     * @var EntityInterface
     */
    protected $entity;

    public function __construct(PersistEntityRepository $entityRepository, EntityInterface $entity)
    {
        $this->entityRepository = $entityRepository;
        $this->entity = $entity;
    }
}