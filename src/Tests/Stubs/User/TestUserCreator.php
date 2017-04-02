<?php
namespace Blog\Tests\Stubs\User;

use Blog\Domain\DataObject\PersonName;
use Blog\Domain\DataObject\UserName;
use Blog\Domain\Entity\User;

/**
 * Class TestUserCreator
 * @package Blog\Tests\Stubs
 */
class TestUserCreator
{
    const ID = 1;
    const PERSON_FIRSTNAME = 'John';
    const PERSON_LASTNAME = 'Doh';
    const PERSON_FULLNAME = self::PERSON_FIRSTNAME . ' ' . self::PERSON_LASTNAME;
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
        $user->setCreatedAt(new \DateTime());
        $user->setUpdatedAt(new \DateTime());

        return $user;
    }
}