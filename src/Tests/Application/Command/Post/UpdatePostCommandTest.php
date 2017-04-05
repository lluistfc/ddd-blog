<?php
namespace Tests\Application\Command\Post;

use Blog\Application\Command\Post\UpdatePostCommand;
use Tests\Stubs\Post\FakePersistRepository;
use Tests\Stubs\Post\FakePostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdatePostCommandTest
 * @package Tests\Application\Command
 * @group application
 * @group application_command
 */
class UpdateTest extends TestCase
{
    /**
     * @test
     */
    public function postWasUpdated()
    {
        $repository = new FakePersistRepository();
        (new UpdatePostCommand($repository))->execute(FakePostCreator::createPost());

        $this->assertTrue($repository->getEntityWasUpdated());
    }
}
