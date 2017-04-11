<?php
namespace Blog\Application\Collections;

use Blog\Domain\DataObject\Identifier\Identifier;
use Blog\Domain\Entity\Entity;
use Blog\Domain\Exceptions\Collection\ElementDoesNotExistsInCollectionException;
use Blog\Application\Validators\Collection\CollectionCreationValidator;

/**
 * Class Collection
 * @package Blog\Domain\Collections
 */
class EntityCollection
{
    /**
     * @var Entity[]
     */
    private $elements;

    /**
     * Collection constructor.
     * @param Entity[] $elements
     */
    public function __construct(array $elements = array())
    {
        $this->validateInput($elements);
        $this->elements = $elements;
    }

    /**
     * @access public
     * @return Entity|bool
     */
    public function first()
    {
        return reset($this->elements);
    }

    /**
     * @access public
     * @return Entity|bool
     */
    public function next()
    {
        return next($this->elements);
    }

    /**
     * @access public
     * @return Entity|bool
     */
    public function prev()
    {
        return prev($this->elements);
    }

    /**
     * @access public
     * @return Entity
     */
    public function last()
    {
        return end($this->elements);
    }

    /**
     * @param Entity $element
     * @return bool
     * @throws ElementDoesNotExistsInCollectionException
     */
    public function add(Entity $element)
    {
        $this->elements[$element->getId()] = $element;
        return $this->exists(Identifier::createFromValue($element->getId()));
    }

    /**
     * @access public
     * @param $index
     * @return Entity
     * @throws ElementDoesNotExistsInCollectionException
     */
    public function get(Identifier $index)
    {
        $this->checkIfElementExists($index);
        return $this->elements[$index->get()];
    }

    /**
     * @access public
     * @param $index
     * @return bool
     */
    public function exists(Identifier $index):bool
    {
        return !empty($this->elements[$index->get()]);
    }

    /**
     * @access public
     * @param Identifier $index
     */
    public function remove(Identifier $index)
    {
        $this->checkIfElementExists($index);
        unset($this->elements[$index->get()]);
    }

    /**
     * @access public
     * @return Entity
     */
    public function shift()
    {
        $element = $this->first();
        $this->remove(Identifier::createFromValue($element->getId()));

        return $element;
    }

    /**
     * @access public
     * @return Entity
     */
    public function pop()
    {
        $element = $this->last();
        $this->remove(Identifier::createFromValue($element->getId()));

        return $element;
    }

    /**
     * @return array|Entity[]
     */
    public function toArray()
    {
        return $this->elements;
    }

    /**
     * @param $index
     * @throws ElementDoesNotExistsInCollectionException
     */
    private function checkIfElementExists(Identifier $index)
    {
        if (!$this->exists($index)) {
            throw new ElementDoesNotExistsInCollectionException();
        }
    }

    /**
     * @param $elements
     * @return bool
     */
    private function validateInput($elements): bool
    {
        return (new CollectionCreationValidator())->validate($elements);
    }
}