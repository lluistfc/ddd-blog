<?php
namespace Blog\Domain\Entity;

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
     * @var integer
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

    protected abstract function setId($id);
    public abstract function getId();
    protected abstract function setCreatedAt(\DateTime $createdAt);
    public abstract function getCreatedAt();
    protected abstract function setUpdatedAt(\DateTime $updatedAt);
    public abstract function getUpdatedAt();

    protected function construct()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }
}