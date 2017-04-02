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
    const HOST = 'foo.bar';

    /**
     * @access public
     * @test
     */
    public function emailIsCreatedEmpty()
    {
        $this->assertEmpty(Email::create(UserName::create())->get());
    }

    /**
     * @access public
     * @test
     */
    public function emailIsCreatedWithUserNameAndHost()
    {
        $userName = UserName::create(TestUserCreator::USER_NAME);
        $host = self::HOST;
        $expectedEmail = TestUserCreator::USER_NAME . '@' . $host;

        $this->assertEquals($expectedEmail, Email::create($userName, $host)->get());
    }
}
