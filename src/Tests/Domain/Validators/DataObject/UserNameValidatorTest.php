<?php
namespace Blog\Tests\Domain\Validators\DataObject;

use Blog\Domain\Helper\BString;
use Blog\Domain\Validators\DataObject\Name\UserNameValidator;
use Blog\Tests\Stubs\User\TestUserCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class UserNameValidatorTest
 * @package Blog\Tests\Domain\Validators\DataObject
 * @group domain
 * @group domain_validator
 */
class UserNameValidatorTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function personNameIsValid()
    {
        $firstName = TestUserCreator::USER_NAME;

        $validator = new UserNameValidator($firstName);
        $this->assertTrue($validator->validate());
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\FirstNameCannotBeEmptyInUserNameException
     */
    public function personNameNeedsAtLeastFirstName()
    {
        $firstName = BString::BLANK;

        (new UserNameValidator($firstName))->validate();
    }
}
