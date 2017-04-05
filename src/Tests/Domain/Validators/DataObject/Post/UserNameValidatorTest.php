<?php
namespace Blog\Tests\Domain\Validators\DataObject\Post;

use Blog\Domain\Helper\BString;
use Blog\Domain\Validators\DataObject\Name\UserNameValidator;
use Blog\Tests\Stubs\User\FakeUserCreator;
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
    public function userNameIsValid()
    {
        $firstName = FakeUserCreator::USER_NAME;

        $validator = new UserNameValidator($firstName);
        $this->assertTrue($validator->validate());
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\FirstNameCannotBeEmptyInUserNameException
     */
    public function userNameNeedsFirstName()
    {
        $firstName = BString::BLANK;

        (new UserNameValidator($firstName))->validate();
    }
}
