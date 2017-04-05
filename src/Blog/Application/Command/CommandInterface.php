<?php
namespace Blog\Application\Command;

use Blog\Domain\Entity\EntityInterface;
use Blog\Domain\Repository\EntityPersistRepository;

/**
 * Class BaseCommand
 * @package Blog\Application\Command
 */
interface CommandInterface
{
    /**
     * CommandInterface constructor.
     * @param EntityPersistRepository $entityRepository
     */
    public function __construct(EntityPersistRepository $entityRepository);

    /**
     * @param EntityInterface $entity
     * @return void
     */
    public function execute(EntityInterface $entity);
}