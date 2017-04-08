<?php
namespace Tests\Domain\Validators\User;
use Blog\Domain\Entity\User;
use Blog\Domain\Validators\User\CreateUserValidator;
use PHPUnit\Framework\TestCase;
use Tests\Stubs\User\FakeUserCreator;


/**
 * Class CreateUserValidatorTest
 * @package Tests\Domain\Validators\User
 * @group domain
 * @group domain_validators
 */
class CreateUserValidatorTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function validationPasses()
    {
        (new CreateUserValidator())->validate(FakeUserCreator::createUserDefaultArrayValues());
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\InvalidArgumentException
     */
    public function validationFailsIfDataIsNotArray()
    {
        (new CreateUserValidator())->validate(null);
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\MissingIdentifierException
     */
    public function validationFailsIfNoId()
    {
        $valuesToValidate = FakeUserCreator::createUserDefaultArrayValues();
        unset($valuesToValidate[User::ID]);
        (new CreateUserValidator())->validate($valuesToValidate);
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\UserNeedsRealNameException
     */
    public function validationFailsIfNoRealName()
    {
        $valuesToValidate = FakeUserCreator::createUserDefaultArrayValues();
        unset($valuesToValidate[User::PERSON_NAME]);
        (new CreateUserValidator())->validate($valuesToValidate);
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\UserNeedsUserNameException
     */
    public function validationFailsIfNoUserName()
    {
        $valuesToValidate = FakeUserCreator::createUserDefaultArrayValues();
        unset($valuesToValidate[User::USER_NAME]);
        (new CreateUserValidator())->validate($valuesToValidate);
    }

     /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\UserNeedsEmailException
     */
    public function validationFailsIfNoEmail()
    {
        $valuesToValidate = FakeUserCreator::createUserDefaultArrayValues();
        unset($valuesToValidate[User::EMAIL]);
        (new CreateUserValidator())->validate($valuesToValidate);
    }
}
