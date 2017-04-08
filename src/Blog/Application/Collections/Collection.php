<?php
namespace Blog\Application\Collections;

use Blog\Domain\Entity\Entity;
use Blog\Domain\Exceptions\Collection\ElementDoesNotExistsInCollectionException;
use Blog\Application\Validators\Collection\CollectionCreationValidator;

/**
 * Class Collection
 * @package Blog\Domain\Collections
 */
abstract class Collection extends \ArrayObject
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
     * @access protected
     * @return Entity|bool
     */
    protected function first()
    {
        return reset($this->elements);
    }

    /**
     * @access protected
     * @return Entity|bool
     */
    protected function next()
    {
        return next($this->elements);
    }

    /**
     * @access protected
     * @return Entity|bool
     */
    protected function prev()
    {
        return prev($this->elements);
    }

    /**
     * @access protected
     * @return Entity
     */
    protected function last()
    {
        return end($this->elements);
    }

    /**
     * @param Entity $element
     * @return bool
     * @throws ElementDoesNotExistsInCollectionException
     */
    protected function add(Entity $element)
    {
        $this->elements[$element->getId()] = $element;
        return $this->exists(($element->getId()));
    }

    /**
     * @access protected
     * @param $index
     * @return Entity
     * @throws ElementDoesNotExistsInCollectionException
     */
    protected function get($index)
    {
        $this->checkIfElementExists($index);
        return $this->elements[$index];
    }

    /**
     * @access public
     * @param $index
     * @return bool
     */
    public function exists($index):bool
    {
        return !empty($this->elements[$index]);
    }

    /**
     * @access protected
     * @param int|string $index
     * @throws ElementDoesNotExistsInCollectionException
     */
    protected function remove($index)
    {
        $this->checkIfElementExists($index);
        unset($this->elements[$index]);
    }

    /**
     * @access public
     * @return Entity
     */
    public function shift()
    {
        $element = $this->first();
        $this->remove($element->getId());

        return $element;
    }

    /**
     * @access public
     * @return Entity
     */
    public function pop()
    {
        $element = $this->last();
        $this->remove($element->getId());

        return $element;
    }

    /**
     * @return array|Entity[]
     */
    protected function toArray()
    {
        return $this->elements;
    }

    /**
     * @param $index
     * @throws ElementDoesNotExistsInCollectionException
     */
    private function checkIfElementExists($index)
    {
        if (!$this->exists($index)) {
            throw new ElementDoesNotExistsInCollectionException();
        }
    }

    /**
     * @param $elements
     * @return bool
     */
    private function validateInput($elements)
    {
        return (new CollectionCreationValidator())->validate($elements);
    }
}