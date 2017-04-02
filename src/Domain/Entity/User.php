<?php
namespace Domain\Entity;


use Blog\Domain\Entity\EntityInterface;
use DataObject\PersonName;
use DataObject\UserName;

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
     * @var
     */
    private $phone;

    /**
     * @access private
     * @var
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
     * @access public
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
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