<?php
namespace Tests\Application\Handler\Post;

use Blog\Application\Command\CommandInterface;
use Blog\Application\Command\Post\CreatePostCommand;
use Blog\Application\Handler\Post\CreatePost;
use Blog\Application\Handler\Post\RetrievePost;
use Blog\Domain\DataObject\Identifier\Identifier;
use Tests\Stubs\Post\FakePersistRepository;
use Tests\Stubs\Post\FakePostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class RetrievePostTest
 * @access public
 * @package Tests\Application\Handler\Post
 * @group application
 * @group application_command
 * @group application_command_handler
 */
class RetrievePostTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function retrievePostWasHandled()
    {
        $fakeCommand = new class implements CommandInterface {
            public function execute($id)
            {
                /** @var Identifier $id */
                return FakePostCreator::createPost($id->get());
            }
        };

        $this->assertEquals(
            FakePostCreator::createPost(1),
            (new RetrievePost(Identifier::create(1)))->handle($fakeCommand)
        );
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\ValidationException
     */
    public function invalidDataThrowsValidationException()
    {
        new RetrievePost(Identifier::create('a'));
    }
}
