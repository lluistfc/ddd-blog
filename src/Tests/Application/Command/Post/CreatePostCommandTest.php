<?php
namespace Tests\Application\Command\Post;

use Blog\Application\Command\Post\CreatePostCommand;
use Tests\Stubs\Post\FakePersistRepository;
use Tests\Stubs\Post\FakePostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class CreatePostCommandTest
 * @package Tests\Application\Command
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
        (new CreatePostCommand($repository))->execute(FakePostCreator::createPost());

        $this->assertTrue($repository->getEntityWasPersisted());
    }
}

