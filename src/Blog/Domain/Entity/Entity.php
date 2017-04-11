<?php
namespace Blog\Domain\Entity;

use Blog\Domain\DataObject\Identifier\Identifier;

/**
 * Class BaseEntity
 * @package Blog\Domain\Entity
 */
abstract class Entity
{
    const ID            = 'id';
    const CREATED_AT    = 'createdAt';
    const UPDATED_AT    = 'updatedAt';

    /**
     * @access private
     * @var Identifier
     */
    protected $id;

    /**
     * @access protected
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @access protected
     * @var \DateTime
     */
    protected $updatedAt;


    protected function setId(Identifier $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id->get();
    }

    protected function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt($format = 'Y-m-d')
    {
        return $this->createdAt->format($format);
    }

    protected function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function getUpdatedAt($format = 'Y-m-d')
    {
        return $this->updatedAt->format($format);
    }

    protected function __construct()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }
}