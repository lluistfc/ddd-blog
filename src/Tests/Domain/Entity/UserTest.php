<?php
namespace Tests\Domain\Entity;

use Blog\Domain\Entity\User;
use Tests\Stubs\User\FakeUserCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 * @group domain
 * @group domain_entity
 * @package Tests\Domain\Entity
 */
class UserTest extends TestCase
{
    /**
     * @access public
     * @test
     * @expectedException \Exception
     */
    public function postCannotBeEmpty()
    {
        try {
            User::register(...array(null, null, null));
        } catch (\Error $e) {
            $this->assertInstanceOf(\Error::class, $e);
            throw new \Exception('This exception is thrown to ensure that this test fails if Post::register() implementation changes');
        }
    }


    /**
     * @access public
     * @test
     */
    public function userHasAllFieldsFilled()
    {
        $user = FakeUserCreator::create();
        $expectedDateFormat = (new \DateTime())->format('Y-m-d');

        $this->assertEquals(1, $user->getId());
        $this->assertEquals(FakeUserCreator::PERSON_FIRSTNAME, $user->getFirstName());
        $this->assertEquals(FakeUserCreator::PERSON_LASTNAME, $user->getLastName());
        $this->assertEquals(FakeUserCreator::PERSON_FULLNAME, $user->getFullName());
        $this->assertEquals(FakeUserCreator::USER_NAME, $user->getUserName());
        $this->assertEquals($expectedDateFormat, $user->getCreatedAt());
        $this->assertEquals($expectedDateFormat, $user->getUpdatedAt());
    }
}
