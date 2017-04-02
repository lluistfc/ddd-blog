<?php
namespace Blog\Tests\Application\Handler\Post;

use Blog\Application\Command\Post\CreatePostCommand;
use Blog\Application\Handler\CreatePostCommandHandler;
use Blog\Domain\Entity\Post;
use Blog\Domain\Exceptions\Validation\ValidationException;
use Blog\Domain\Validators\Post\CreatePostValidator;
use Blog\Tests\Stubs\Post\FakeRepository;
use Blog\Tests\Stubs\Post\TestPostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class CreatePostCommandHandlerTest
 * @access public
 * @package Blog\Tests\Application\Handler\Post
 */
class CreatePostCommandHandlerTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function createPostCommandWasHandled()
    {
        $fakeRepository = new FakeRepository();
        $createPostCommand = new CreatePostCommand($fakeRepository, new Post());
        $createPostValidator = new CreatePostValidator(TestPostCreator::createPostDefaultArrayValues());
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
        $fakeRepository = new FakeRepository();
        $createPostCommand = new CreatePostCommand($fakeRepository, new Post());
        $createPostValidator = new CreatePostValidator(array());
        $handler = new CreatePostCommandHandler($createPostCommand, $createPostValidator);

        $handler->handle();
    }
}