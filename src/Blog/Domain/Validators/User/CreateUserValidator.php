<?php
namespace Blog\Domain\Validators\User;

use Blog\Domain\Entity\User;
use Blog\Domain\Exceptions\Validation\InvalidArgumentException;
use Blog\Domain\Exceptions\Validation\MissingIdentifierException;
use Blog\Domain\Exceptions\Validation\UserNeedsEmailException;
use Blog\Domain\Exceptions\Validation\UserNeedsRealNameException;
use Blog\Domain\Exceptions\Validation\UserNeedsUserNameException;
use Blog\Domain\Validators\SingleRules\VerifyValueInAssociativeAndNormalArray;

/**
 * Class CreateUserValidation
 * @package Blog\Domain\Validators\User
 */
class CreateUserValidator
{
    use VerifyValueInAssociativeAndNormalArray;

    const EXPECTED_ID_INDEX = 0;
    const EXPECTED_PERSON_NAME_INDEX = 1;
    const EXPECTED_USER_NAME_INDEX = 2;
    const EXPECTED_EMAIL_INDEX = 3;

    public function validate($valuesToValidate)
    {
        if (!is_array($valuesToValidate)) {
            throw new InvalidArgumentException();
        }

        $userValues = [
            User::ID => $this->getValue($valuesToValidate, User::ID, self::EXPECTED_ID_INDEX),
            User::PERSON_NAME => $this->getValue($valuesToValidate, User::PERSON_NAME, self::EXPECTED_PERSON_NAME_INDEX),
            User::USER_NAME => $this->getValue($valuesToValidate, User::USER_NAME, self::EXPECTED_USER_NAME_INDEX),
            User::EMAIL => $this->getValue($valuesToValidate, User::EMAIL, self::EXPECTED_EMAIL_INDEX),
        ];

        if (empty($userValues[User::ID])) {
            throw new MissingIdentifierException();
        }

        if (empty($userValues[User::PERSON_NAME])) {
            throw new UserNeedsRealNameException();
        }

        if (empty($userValues[User::USER_NAME])) {
            throw new UserNeedsUserNameException();
        }

        if (empty($userValues[User::EMAIL])) {
            throw new UserNeedsEmailException();
        }
    }
}