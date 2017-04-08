<?php
namespace Tests\Application\Handler\Post;

use Blog\Application\Command\User\CreateUser;
use Blog\Application\Handler\User\CreateUserHandler;
use Tests\Stubs\Post\FakePersistRepository;
use PHPUnit\Framework\TestCase;
use Tests\Stubs\User\FakeUserCreator;

/**
 * Class CreateUserCommandHandlerTest
 * @access public
 * @package Tests\Application\Handler\Post
 * @group application
 * @group application_command
 * @group application_command_handler
 */
class CreateUserHandlerTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function registerUserWasHandled()
    {
        $fakeRepository = new FakePersistRepository();
        $createPostCommand = new CreateUser($fakeRepository);
        $newPostToValidate = FakeUserCreator::createUserDefaultArrayValues();
        $handler = new CreateUserHandler($newPostToValidate);

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
        new CreateUserHandler(array());
    }
}
