<?php
namespace Blog\Domain\Entity;

use Blog\Domain\DataObject\Email\Email;
use Blog\Domain\DataObject\Name\PersonName;
use Blog\Domain\DataObject\Name\UserName;

/**
 * Class User
 * @package Domain\Entity
 */
class User extends Entity
{
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

    public static function register($id, PersonName $personNamem, UserName $userName, Email $email)
    {
        return new User($id, $personNamem, $userName, $email);
    }

    /**
     * User constructor.
     * @access public
     * @param PersonName $personNamem
     * @param UserName $userName
     * @param Email $email
     */
    protected function __construct($id, PersonName $personNamem, UserName $userName, Email $email)
    {
        $this->setId($id);
        $this->setRealName($personNamem);
        $this->setUserName($userName);
        $this->setEmail($email);

        parent::__construct();
    }

    protected function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
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