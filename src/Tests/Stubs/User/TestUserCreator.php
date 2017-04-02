<?php
namespace Blog\Tests\Stubs\User;

use Blog\Domain\DataObject\Email\Email;
use Blog\Domain\DataObject\Name\PersonName;
use Blog\Domain\DataObject\Name\UserName;
use Blog\Domain\Entity\User;
use Blog\Domain\Helper\BString;
use Blog\Tests\Domain\DataObject\Email\EmailTest;

/**
 * Class TestUserCreator
 * @package Blog\Tests\Stubs
 */
class TestUserCreator
{
    const ID = 1;
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
        $user = new User();
        $user->setId($id);
        $user->setRealName(PersonName::create(self::PERSON_FIRSTNAME, self::PERSON_LASTNAME));
        $user->setUserName(UserName::create(self::USER_NAME));
        $user->setEmail(Email::create(UserName::create(self::USER_NAME), EmailTest::HOST));
        $user->setCreatedAt(new \DateTime());
        $user->setUpdatedAt(new \DateTime());

        return $user;
    }
}