<?php
namespace Tests\Application\Handler\Post;

use Blog\Application\Command\Post\CreatePostCommand;
use Blog\Application\Handler\Post\CreatePost;
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
class CreatePostTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function createPostWasHandled()
    {
        $fakeRepository = new FakePersistRepository();
        $newPostToValidate = FakePostCreator::createPostDefaultArrayValues();
        $createPostCommand = new CreatePostCommand($fakeRepository);
        $handler = new CreatePost($newPostToValidate);

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
        new CreatePost(array());
    }
}
