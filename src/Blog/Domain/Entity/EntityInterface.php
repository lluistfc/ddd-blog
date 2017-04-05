<?php
namespace Blog\Domain\Entity;

/**
 * Class BaseEntity
 * @package Blog\Domain\Entity
 */
interface EntityInterface
{
    public function setId($id);
    public function setCreatedAt(\DateTime $createdAt);
    public function setUpdatedAt(\DateTime $updatedAt);

    public function getId();
    public function getCreatedAt();
    public function getUpdatedAt();
}