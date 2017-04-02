<?php
namespace Blog\Tests\Domain\Validators\DataObject\Email;

use Blog\Domain\Helper\BString;
use Blog\Domain\Validators\DataObject\Email\EmailValidator;
use Blog\Tests\Domain\DataObject\Email\EmailTest;
use Blog\Tests\Stubs\User\TestUserCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class EmailValidatorTest
 * @package Blog\Domain\Validators\DataObject
 * @group domain
 * @group domain_validator
 */
class EmailValidatorTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function emailIsValid()
    {
        $email = TestUserCreator::USER_NAME . BString::AT . EmailTest::HOST;
        $this->assertTrue((new EmailValidator($email))->validate());
    }

    /**
     * @access public
     * @test
     * @dataProvider invalidEmailsProvider
     * @expectedException \Blog\Domain\Exceptions\Validation\InvalidEmailFormatException
     */
    public function invalidEmailFormat($invalidEmail)
    {
        (new EmailValidator($invalidEmail))->validate();
    }

    /**
     * @return array
     */
    public function invalidEmailsProvider()
    {
        return array(
            array('not an email'),
            array('not.an.email'),
            array('not@atemail'),
            array('@notanemail'),
            array('@notanma.il'),
            array(1),
            array(true),
        );
    }
}
