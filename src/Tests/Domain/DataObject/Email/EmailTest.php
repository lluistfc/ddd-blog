<?php
namespace Blog\Tests\Domain\DataObject\Email;

use Blog\Domain\DataObject\Email\Email;
use Blog\Domain\DataObject\Name\UserName;
use Blog\Tests\Stubs\User\TestUserCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class EmailTest
 * @package Blog\Tests\Domain\DataObject\Email
 */
class EmailTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function emailIsCreatedEmpty()
    {
        $this->assertEquals('@', Email::create(UserName::create()));
    }

    /**
     * @access public
     * @test
     */
    public function emailIsCreatedWithUserNameAndHost()
    {
        $userName = UserName::create(TestUserCreator::USER_NAME);
        $host = 'foo.bar';
        $expectedEmail = TestUserCreator::USER_NAME . '@' . $host;

        $this->assertEquals($expectedEmail, Email::create($userName, $host)->get());
    }
}
