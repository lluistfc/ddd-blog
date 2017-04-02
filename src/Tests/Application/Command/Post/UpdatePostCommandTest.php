<?php
namespace Blog\Tests\Application\Command\Post;

use Blog\Application\Command\Post\UpdatePostCommand;
use Blog\Tests\Stubs\Post\FakeRepository;
use Blog\Tests\Stubs\Post\TestPostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdatePostCommandTest
 * @package Blog\Tests\Application\Command
 */
class UpdateTest extends TestCase
{
    /**
     * @test
     */
    public function postWasUpdated()
    {
        $repository = new FakeRepository();
        (new UpdatePostCommand($repository, TestPostCreator::createPost()))->execute();

        $this->assertTrue($repository->getEntityWasUpdated());
    }
}
