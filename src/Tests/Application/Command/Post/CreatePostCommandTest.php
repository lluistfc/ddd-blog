<?php
namespace Blog\Tests\Application\Command\Post;

use Blog\Application\Command\Post\CreatePostCommand;
use Blog\Tests\Stubs\Post\FakeRepository;
use Blog\Tests\Stubs\Post\TestPostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class CreatePostCommandTest
 * @package Blog\Tests\Application\Command
 */
class CreateTest extends TestCase
{
    /**
     * @test
     */
    public function postWasCreated()
    {
        $repository = new FakeRepository();
        (new CreatePostCommand($repository, TestPostCreator::createPost()))->execute();

        $this->assertTrue($repository->getEntityWasPersisted());
    }
}

