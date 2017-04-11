<?php
namespace Tests\Application\Command\User;

use Blog\Application\Command\User\RegisterUserCommand;
use PHPUnit\Framework\TestCase;
use Tests\Stubs\Post\FakePersistRepository;
use Tests\Stubs\User\FakeUserCreator;

/**
 * Class CreateUserTest
 * @package Tests\Application\Command\User
 * @group application
 * @group application_command
 * @group application_command_user
 */
class RegisterUserCommandTest extends TestCase
{
    /**
     * @test
     */
    public function userWasRegistered()
    {
        $repository = new FakePersistRepository();
        (new RegisterUserCommand($repository))->execute(FakeUserCreator::createUserDefaultArrayValues());

        $this->assertTrue($repository->getEntityWasPersisted());
    }
}
