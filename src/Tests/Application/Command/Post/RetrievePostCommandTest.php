<?php
namespace Tests\Application\Command\Post;

use Blog\Application\Command\Post\RetrievePostCommand;
use Blog\Domain\DataObject\Identifier\Identifier;
use PHPUnit\Framework\TestCase;
use Tests\Stubs\Post\FakePostCreator;
use Tests\Stubs\Post\FakeReadOnlyRepository;

/**
 * Class ShowPostCommandTest
 * @package Tests\Application\Command\Post
 * @group application
 * @group application_command
 * @group application_command_post
 */
class RetrievePostCommandTest extends TestCase
{
    /**
     * @test
     */
    public function postWasRetrieved()
    {
        $repository = new FakeReadOnlyRepository();
        (new RetrievePostCommand($repository))->execute(Identifier::create(1));

        $this->assertEquals(
            FakePostCreator::createPost(1),
            $repository->findOneById(Identifier::create(1))
        );
    }

    /**
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\InvalidArgumentException
     */
    public function validIdentifierNeededToExecute()
    {
        $repository = new FakeReadOnlyRepository();
        (new RetrievePostCommand($repository))->execute(1);
    }
}