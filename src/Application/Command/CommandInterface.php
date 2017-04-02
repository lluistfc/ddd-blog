<?php
namespace Blog\Application\Command;

use Blog\Domain\Entity\EntityInterface;
use Blog\Domain\Repository\PersistEntityRepository;

/**
 * Interface CommandInterface
 * @package Blog\Application\Command
 */
interface CommandInterface
{
    /**
     * CommandInterface constructor.
     * @param PersistEntityRepository $entityRepository
     * @param EntityInterface $entity
     */
    public function __construct(PersistEntityRepository $entityRepository, EntityInterface $entity);

    /**
     * @access private
     * @return void
     */
    public function execute();
}