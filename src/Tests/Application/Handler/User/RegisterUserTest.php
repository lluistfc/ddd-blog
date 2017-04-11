<?php
namespace Tests\Application\Handler\Post;

use Blog\Application\Command\User\RegisterUserCommand;
use Blog\Application\Handler\User\RegisterUser;
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
class RegisterUserTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function registerUserWasHandled()
    {
        $fakeRepository = new FakePersistRepository();
        $createPostCommand = new RegisterUserCommand($fakeRepository);
        $newPostToValidate = FakeUserCreator::createUserDefaultArrayValues();
        $handler = new RegisterUser($newPostToValidate);

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
        new RegisterUser(array());
    }
}
