<?php
namespace Tests\Application\Handler\Post;

use Blog\Application\Command\Post\CreatePost;
use Blog\Application\Handler\Post\CreatePostHandler;
use Tests\Stubs\Post\FakePersistRepository;
use Tests\Stubs\Post\FakePostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class CreatePostCommandHandlerTest
 * @access public
 * @package Tests\Application\Handler\Post
 * @group application
 * @group application_command
 * @group application_command_handler
 */
class CreatePostCommandHandlerTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function createPostCommandWasHandled()
    {
        $fakeRepository = new FakePersistRepository();
        $createPostCommand = new CreatePost($fakeRepository);
        $newPostToValidate = FakePostCreator::createPostDefaultArrayValues();
        $handler = new CreatePostHandler($newPostToValidate);

        $handler->handle($createPostCommand);

        $this->assertTrue($fakeRepository->getEntityWasPersisted());
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\ValidationException
     */
    public function invalidDataThrowsValidationException()
    {
        $fakeRepository = new FakePersistRepository();
        $createPostCommand = new CreatePost($fakeRepository);
        $handler = new CreatePostHandler(array());

        $handler->handle($createPostCommand);
    }
}
