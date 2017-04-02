<?php
namespace Blog\Tests\Domain\Validators\DataObject;

use Blog\Domain\Helper\BString;
use Blog\Domain\Validators\DataObject\Name\PersonNameValidator;
use Blog\Tests\Stubs\User\TestUserCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class PersonNameValidatorTest
 * @package Blog\Tests\Domain\Validators\DataObject
 */
class PersonNameValidatorTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function personNameIsValid()
    {
        $firstName = TestUserCreator::PERSON_FIRSTNAME;
        $lastName = TestUserCreator::PERSON_LASTNAME;

        $validator = new PersonNameValidator($firstName, $lastName);
        $this->assertTrue($validator->validate());
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\FirstNameCannotBeEmptyInPersonNameException
     */
    public function personNameNeedsAtLeastFirstName()
    {
        $firstName = BString::BLANK;
        $lastName = TestUserCreator::PERSON_LASTNAME;

        (new PersonNameValidator($firstName, $lastName))->validate();
    }
}
