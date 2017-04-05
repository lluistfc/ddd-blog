<?php
namespace Tests\Domain\DataObject\Email;

use Blog\Domain\DataObject\Email\Email;
use Blog\Domain\DataObject\Name\UserName;
use Blog\Domain\Exceptions\DataObject\Email\InvalidEmailHostException;
use Tests\Stubs\User\FakeUserCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class EmailTest
 * @package Tests\Domain\DataObject\Email
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
    public function emptyEmailReturnsOnlyAtSymbol()
    {
        $email = Email::create(UserName::create());
        $this->assertEquals('@', $email->get());
    }

    /**
     * @access public
     * @test
     */
    public function emailIsCreatedWithUserNameAndHost()
    {
        $userName = UserName::create(FakeUserCreator::USER_NAME);
        $expectedEmail = FakeUserCreator::USER_NAME . '@' . self::HOST;

        $this->assertEquals($expectedEmail, Email::create($userName, self::HOST)->get());
    }

    /**
     * @access public
     * @test
     */
    public function emailDataObjectCanBePrinted()
    {
        $userName = UserName::create(FakeUserCreator::USER_NAME);
        $expectedEmail = FakeUserCreator::USER_NAME . '@' . self::HOST;

        $this->assertEquals($expectedEmail, print_r((string) Email::create($userName, self::HOST), true));
    }
}
