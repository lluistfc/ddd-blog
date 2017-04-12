<?php
namespace Blog\Domain\Validators\User;

use Blog\Domain\Entity\User;
use Blog\Domain\Exceptions\Validation\InvalidArgumentException;
use Blog\Domain\Exceptions\Validation\UserNeedsEmailException;
use Blog\Domain\Exceptions\Validation\UserNeedsRealNameException;
use Blog\Domain\Exceptions\Validation\UserNeedsUserNameException;
use Blog\Domain\Validators\SingleRules\VerifyValueInAssociativeAndNormalArray;
use Blog\Domain\Validators\ValidatorInterface;

/**
 * Class CreateUserValidation
 * @package Blog\Domain\Validators\User
 */
class CreateUserValidator implements ValidatorInterface
{
    use VerifyValueInAssociativeAndNormalArray;

    const EXPECTED_PERSON_NAME_INDEX = 0;
    const EXPECTED_USER_NAME_INDEX = 1;
    const EXPECTED_EMAIL_INDEX = 2;

    public function validate($valuesToValidate)
    {
        if (!is_array($valuesToValidate)) {
            throw new InvalidArgumentException();
        }

        $userValues = [
            User::PERSON_NAME => $this->getValue($valuesToValidate, User::PERSON_NAME, self::EXPECTED_PERSON_NAME_INDEX),
            User::USER_NAME => $this->getValue($valuesToValidate, User::USER_NAME, self::EXPECTED_USER_NAME_INDEX),
            User::EMAIL => $this->getValue($valuesToValidate, User::EMAIL, self::EXPECTED_EMAIL_INDEX),
        ];

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