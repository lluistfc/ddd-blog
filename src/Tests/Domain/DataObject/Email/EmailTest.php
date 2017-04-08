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
     * @dataProvider  invalidDataProvider
     * @expectedException \Blog\Domain\Exceptions\Validation\InvalidEmailFormatException
     * @param $userName
     * @param $host
     */
    public function invalidDataThrowsException($userName, $host)
    {
        Email::create(UserName::create($userName), $host);
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

    public function invalidDataProvider()
    {
        return array(
            array('a', 'b'),
            array('host.com', 'tete'),
            array('tato', ''),
            array('tito', 'tute'),
            array('myname', '@host.com'),
        );
    }
}
