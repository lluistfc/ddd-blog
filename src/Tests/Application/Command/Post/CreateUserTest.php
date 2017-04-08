<?php
namespace Tests\Application\Command\Post;

use Blog\Application\Command\Post\CreateUser;
use PHPUnit\Framework\TestCase;
use Tests\Stubs\Post\FakePersistRepository;
use Tests\Stubs\User\FakeUserCreator;

/**
 * Class CreateUserTest
 * @package Tests\Application\Command\Post
 */
class CreateUserTest extends TestCase
{
    /**
     * @test
     */
    public function userWasRegistered()
    {
        $repository = new FakePersistRepository();
        (new CreateUser($repository))->execute(FakeUserCreator::createUserDefaultArrayValues());

        $this->assertTrue($repository->getEntityWasPersisted());
    }
}
