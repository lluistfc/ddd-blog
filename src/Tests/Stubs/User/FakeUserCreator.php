<?php
namespace Tests\Stubs\User;

use Blog\Domain\DataObject\Email\Email;
use Blog\Domain\DataObject\Identifier\Identifier;
use Blog\Domain\DataObject\Name\PersonName;
use Blog\Domain\DataObject\Name\UserName;
use Blog\Domain\Entity\User;
use Blog\Domain\Tools\BString;
use Tests\Domain\DataObject\Email\EmailTest;

/**
 * Class TestUserCreator
 * @package Tests\Stubs
 */
class FakeUserCreator
{
    const PERSON_FIRSTNAME = 'John';
    const PERSON_LASTNAME = 'Doh';
    const PERSON_FULLNAME = self::PERSON_FIRSTNAME . BString::SPACE . self::PERSON_LASTNAME;
    const USER_NAME = 'bettyboom';

    /**
     * @access public
     * @param int $id
     * @return User
     */
    public static function create($id = 1)
    {
        return User::register(
            Identifier::create($id),
            PersonName::create(self::PERSON_FIRSTNAME, self::PERSON_LASTNAME),
            UserName::create(self::USER_NAME),
            Email::create(UserName::create(self::USER_NAME), EmailTest::HOST)
        );
    }

    /**
     * @param int $id
     * @return array
     */
    public static function createUserDefaultArrayValues($id = 1)
    {
        return [
            User::ID => Identifier::create($id),
            User::PERSON_NAME => PersonName::create(self::PERSON_FIRSTNAME, self::PERSON_LASTNAME),
            User::USER_NAME => UserName::create(self::USER_NAME),
            User::EMAIL => Email::create(UserName::create(self::USER_NAME), EmailTest::HOST)
        ];
    }

    /**
     * @param $userData
     * @return User
     */
    public static function createFromArray($userData)
    {
        return User::register(
            $userData[User::ID],
            $userData[User::PERSON_NAME],
            $userData[User::USER_NAME],
            $userData[User::EMAIL]
        );
    }
}