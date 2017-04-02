<?php
namespace Blog\Domain\Entity;

/**
 * Class BaseEntity
 * @package Blog\Domain\Entity
 */
abstract class BaseEntity
{
    protected $id;

    protected abstract function setId($id);

    public abstract function getId();
}