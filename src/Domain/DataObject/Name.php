<?php
namespace Blog\Domain\DataObject;


abstract class Name
{
    protected $firstName;

    public abstract function getFirstName():string;
    protected abstract function setFirstName(string $firstName);

    public function __toString()
    {
        return $this->getFirstName();
    }
}