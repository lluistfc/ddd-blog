<?php
namespace Blog\Tests\Application\Command\Post;

use Blog\Application\Command\Post\CreatePostCommand;
use Blog\Tests\Stubs\Post\FakePersistRepository;
use Blog\Tests\Stubs\Post\FakePostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class CreatePostCommandTest
 * @package Blog\Tests\Application\Command
 * @group application
 * @group application_command
 */
class CreateTest extends TestCase
{
    /**
     * @test
     */
    public function postWasCreated()
    {
        $repository = new FakePersistRepository();
        (new CreatePostCommand($repository, FakePostCreator::createPost()))->execute();

        $this->assertTrue($repository->getEntityWasPersisted());
    }
}

