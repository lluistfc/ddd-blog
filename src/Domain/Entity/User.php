<?php
namespace Blog\Domain\Entity;

use Blog\Domain\DataObject\Email\Email;
use Blog\Domain\DataObject\Name\PersonName;
use Blog\Domain\DataObject\Name\UserName;

/**
 * Class User
 * @package Domain\Entity
 */
class User implements EntityInterface
{
    /**
     * @access private
     * @var integer
     */
    private $id;

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
     * @access private
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @access private
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * User constructor.
     * @access public
     */
    public function __construct()
    {
        $this->realName = PersonName::create();
        $this->userName = UserName::create();
        $this->email = Email::create($this->userName, '');
    }

    /**
     * @access public
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @access public
     * @param PersonName $personName
     */
    public function setRealName(PersonName $personName)
    {
        $this->realName = $personName;
    }

    /**
     * @access public
     * @param UserName $userName
     */
    public function setUserName(UserName $userName)
    {
        $this->userName = $userName;
    }

    /**
     * @access public
     * @param Email $email
     */
    public function setEmail(Email $email)
    {
        $this->email = $email;
    }

    /**
     * @access public
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @access public
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @access public
     * @return int
     */
    public function getId()
    {
        return $this->id;
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

    public function getEmail()
    {
        return $this->email->get();
    }

    /**
     * @access public
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @access public
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}