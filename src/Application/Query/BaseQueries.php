<?php
namespace Blog\Application\Query;

use Blog\Domain\Repository\PersistEntityRepository;
use Blog\Domain\Repository\ReadOnlyEntityRepository;

/**
 * Class BaseQueries
 * @package Blog\Application\Query
 */
abstract class BaseQueries
{
    /**
     * @var PersistEntityRepository
     */
    protected $entityRepostiroy;

    /**
     * BaseQueries constructor.
     * @param ReadOnlyEntityRepository $entityRepository
     */
    public function __construct(ReadOnlyEntityRepository $entityRepository)
    {
        $this->entityRepostiroy = $entityRepository;
    }
}