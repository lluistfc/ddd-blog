<?php
namespace Tests\Application\Command\Post;

use Blog\Application\Command\Post\RetrievePostCommand;
use Blog\Domain\DataObject\Identifier\Identifier;
use Blog\Domain\Entity\Post;
use PHPUnit\Framework\TestCase;
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
        $this->assertInstanceOf(Post::class, (new RetrievePostCommand($repository))->execute(Identifier::create()));
    }

    /**
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\InvalidArgumentException
     */
    public function invalidIdentifierCausesException()
    {
        $repository = new FakeReadOnlyRepository();
        $this->assertInstanceOf(Post::class, (new RetrievePostCommand($repository))->execute(1));
    }
}
