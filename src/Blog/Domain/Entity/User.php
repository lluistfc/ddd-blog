<?php
namespace Blog\Domain\Entity;

use Blog\Domain\DataObject\Email\Email;
use Blog\Domain\DataObject\Identifier\Identifier;
use Blog\Domain\DataObject\Name\PersonName;
use Blog\Domain\DataObject\Name\UserName;

/**
 * Class User
 * @package Domain\Entity
 */
class User extends Entity
{
    const PERSON_NAME = 'personName';
    const USER_NAME = 'userName';
    const EMAIL = 'email';

    /**
     * @access private
     * @var PersonName
     */
    private $realName;

    /**
     * @access private
     * @var UserName
     */
    private $userName;

    /**
     * @access private
     * @var Email
     */
    private $email;

    /**
     * @param PersonName $personName
     * @param UserName $userName
     * @param Email $email
     * @return User
     */
    public static function register(PersonName $personName, UserName $userName, Email $email)
    {
        return new User($personName, $userName, $email);
    }

    /**
     * User constructor.
     * @access public
     * @param PersonName $personName
     * @param UserName $userName
     * @param Email $email
     */
    protected function __construct(PersonName $personName, UserName $userName, Email $email)
    {
        $this->setId(Identifier::create());
        $this->setRealName($personName);
        $this->setUserName($userName);
        $this->setEmail($email);

        parent::__construct();
    }

    /**
     * @return PersonName
     */
    public function getRealName(): PersonName
    {
        return $this->realName;
    }

    /**
     * @param PersonName $realName
     */
    private function setRealName(PersonName $realName)
    {
        $this->realName = $realName;
    }

    private function setUserName(UserName $userName)
    {
        $this->userName = $userName;
    }

    /**
     * @access public
     * @return string
     */
    public function getFullName()
    {
        return $this->realName->get();
    }

    /**
     * @access public
     * @return string
     */
    public function getFirstName()
    {
        return $this->realName->getFirstName();
    }

    /**
     * @access public
     * @return string
     */
    public function getLastName()
    {
        return $this->realName->getLastName();
    }

    /**
     * @access public
     * @return string
     */
    public function getUserName()
    {
        return $this->userName->getFirstName();
    }

    /**
     * @access public
     * @return string
     */
    public function getEmail()
    {
        return $this->email->get();
    }

    private function setEmail(Email $email)
    {
        $this->email = $email;
    }
}