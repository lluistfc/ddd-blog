<?php
namespace Tests\Application\Handler\Post;

use Blog\Application\Command\Post\CreatePostCommand;
use Blog\Application\Handler\CreatePostCommandHandler;
use Blog\Domain\Entity\Post;
use Blog\Domain\Exceptions\Validation\ValidationException;
use Blog\Domain\Validators\Post\CreatePostValidator;
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
        $createPostCommand = new CreatePostCommand($fakeRepository, new Post());
        $createPostValidator = new CreatePostValidator(FakePostCreator::createPostDefaultArrayValues());
        $handler = new CreatePostCommandHandler($createPostCommand, $createPostValidator);

        $handler->handle();

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
        $createPostCommand = new CreatePostCommand($fakeRepository, new Post());
        $createPostValidator = new CreatePostValidator(array());
        $handler = new CreatePostCommandHandler($createPostCommand, $createPostValidator);

        $handler->handle();
    }
}
