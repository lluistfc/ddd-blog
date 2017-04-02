<?php
namespace Blog\Tests\Application\Command;

use Blog\Application\Command\Post\CreatePostCommand;
use Blog\Tests\Application\Command\Stubs\FakeRepository;

/**
 * Class CreatePostCommandTest
 * @package Blog\Tests\Application\Command
 */
class CreatePostCommandTest extends PostCommandTestCase
{
    /**
     * @test
     */
    public function postWasCreated()
    {
        $repository = new FakeRepository();
        (new CreatePostCommand($repository, $this->defaultPost()))->execute();

        $this->assertTrue($repository->getEntityWasPersisted());
    }
}

