<?php
namespace Blog\Tests\Domain\DataObject\Email;

use Blog\Domain\DataObject\Email\Email;
use Blog\Domain\DataObject\Name\UserName;
use Blog\Tests\Stubs\User\FakeUserCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class EmailTest
 * @package Blog\Tests\Domain\DataObject\Email
 * @group domain
 * @group domain_dataObject
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
        $userName = UserName::create(FakeUserCreator::USER_NAME);
        $host = self::HOST;
        $expectedEmail = FakeUserCreator::USER_NAME . '@' . $host;

        $this->assertEquals($expectedEmail, Email::create($userName, $host)->get());
    }

    /**
     * @access public
     * @test
     */
    public function emailCanBePrinted()
    {
        $userName = UserName::create(FakeUserCreator::USER_NAME);
        $host = self::HOST;
        $expectedEmail = FakeUserCreator::USER_NAME . '@' . $host;

        $this->assertEquals($expectedEmail, print_r((string) Email::create($userName, $host), true));
    }
}
