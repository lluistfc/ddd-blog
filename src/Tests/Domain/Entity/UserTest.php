<?php
namespace Blog\Tests\Domain\Entity;

use Blog\Domain\Entity\User;
use Blog\Tests\Stubs\User\FakeUserCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 * @group domain
 * @group domain_entity
 * @package Blog\Tests\Domain\Entity
 */
class UserTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function userIsCreatedEmpty()
    {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
        $this->assertEmpty($user->getId());
        $this->assertEmpty($user->getFullName());
        $this->assertEmpty($user->getUserName());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getCreatedAt());
        $this->assertEmpty($user->getUpdatedAt());
    }

    /**
     * @access public
     * @test
     */
    public function userHasAllFieldsFilled()
    {
        $user = FakeUserCreator::create();

        $this->assertEquals(FakeUserCreator::ID, $user->getId());
        $this->assertEquals(FakeUserCreator::PERSON_FIRSTNAME, $user->getFirstName());
        $this->assertEquals(FakeUserCreator::PERSON_LASTNAME, $user->getLastName());
        $this->assertEquals(FakeUserCreator::PERSON_FULLNAME, $user->getFullName());
        $this->assertEquals(FakeUserCreator::USER_NAME, $user->getUserName());
        $this->assertInstanceOf(\DateTime::class, $user->getCreatedAt());
        $this->assertInstanceOf(\DateTime::class, $user->getUpdatedAt());
    }
}
