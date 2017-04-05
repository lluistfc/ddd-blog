<?php
namespace Tests\Domain\Validators\DataObject\Post;

use Blog\Domain\Helper\BString;
use Blog\Domain\Validators\DataObject\Name\PersonNameValidator;
use Tests\Stubs\User\FakeUserCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class PersonNameValidatorTest
 * @package Tests\Domain\Validators\DataObject
 * @group domain
 * @group domain_validator
 */
class PersonNameValidatorTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function personNameIsValid()
    {
        $firstName = FakeUserCreator::PERSON_FIRSTNAME;
        $lastName = FakeUserCreator::PERSON_LASTNAME;

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
        $lastName = FakeUserCreator::PERSON_LASTNAME;

        (new PersonNameValidator($firstName, $lastName))->validate();
    }
}
