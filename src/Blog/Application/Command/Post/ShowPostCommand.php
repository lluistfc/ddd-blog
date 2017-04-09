<?php
namespace Blog\Application\Command\Post;

use Blog\Application\Command\CommandInterface;
use Blog\Application\Queries\Post\PostQueries;
use Blog\Application\Repository\PostQueriesInterface;
use Blog\Domain\DataObject\Identifier\Identifier;
use Blog\Domain\Entity\Post;
use Blog\Domain\Exceptions\Validation\InvalidArgumentException;

class ShowPostCommand implements CommandInterface
{
    /**
     * @var PostQueries
     */
    private $entityRepository;

    /**
     * Command constructor.
     * @access public
     * @param PostQueriesInterface $entityRepository
     */
    public function __construct(PostQueriesInterface $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    /**
     * @param $identifier
     * @return Post|null
     * @throws InvalidArgumentException
     */
    public function execute($identifier)
    {
        if (!$identifier instanceof Identifier) {
            throw new InvalidArgumentException();
        }

        return $this->entityRepository->findThisPost($identifier);
    }
}