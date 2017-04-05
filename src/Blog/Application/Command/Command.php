<?php
namespace Blog\Application\Command;


use Blog\Domain\Repository\EntityPersistRepository;

abstract class Command implements CommandInterface
{
    /**
     * @var EntityPersistRepository
     */
    protected $entityRepository;

    /**
     * Command constructor.
     * @access public
     * @param EntityPersistRepository $entityRepository
     */
    public function __construct(EntityPersistRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }
}