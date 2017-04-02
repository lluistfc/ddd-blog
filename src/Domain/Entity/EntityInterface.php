<?php
namespace Blog\Domain\Entity;

/**
 * Class BaseEntity
 * @package Blog\Domain\Entity
 */
interface EntityInterface
{
    public function setId($id);
    public function getId();
}