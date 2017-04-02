<?php
namespace Blog\Tests\Application\Command;

use Blog\Application\Command\Post\CreatePostCommand;
use Blog\Domain\Entity\BaseEntity;
use Blog\Domain\Entity\Post;
use Blog\Domain\Repository\PersistEntityRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class CreatePostCommandTest
 * @package Blog\Tests\Application\Command
 */
class CreatePostCommandTest extends TestCase
{
    /**
     * @test
     */
    public function postWasCreated()
    {
        $repository = new PostRepositoryPersist();
        $cmd = new CreatePostCommand($repository);

        $cmd->create($this->defaultPost());

        $this->assertTrue($repository->getEntityWasPersisted());
    }

    /**
     * @return Post
     */
    public function defaultPost(): Post
    {
        $post = new Post();
        $post->setTitle('Fake Title');
        $post->setContent('fake content');

        return $post;
    }
}

class PostRepositoryPersist implements PersistEntityRepository
{
    private $entityWasPersisted = false;

    public function findOneBy(BaseEntity $baseEntity)
    {
    }

    public function persistEntity(BaseEntity $baseEntity)
    {
        $this->entityWasPersisted = true;
    }

    public function removeEntity(BaseEntity $baseEntity)
    {
    }

    public function updateEntity(BaseEntity $baseEntity)
    {
    }

    public function getEntityWasPersisted()
    {
        return $this->entityWasPersisted;
    }
}
