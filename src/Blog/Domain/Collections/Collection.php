<?php
namespace Blog\Domain\Collections;

use Blog\Domain\Entity\EntityInterface;
use Blog\Domain\Exceptions\Collection\ElementDoesNotExistsInCollectionException;
use Blog\Domain\Exceptions\Collections\ElementCouldNotBeAddedException;
use Blog\Domain\Validators\Collection\CollectionCreationValidator;

/**
 * Class Collection
 * @package Blog\Domain\Collections
 */
abstract class Collection extends \ArrayObject
{
    /**
     * @var EntityInterface[]
     */
    private $elements;

    /**
     * Collection constructor.
     * @param EntityInterface[] $elements
     */
    public function __construct(array $elements = array())
    {
        $this->validateInput($elements);
        $this->elements = $elements;
    }

    /**
     * @access protected
     * @return EntityInterface|bool
     */
    protected function first()
    {
        return reset($this->elements);
    }

    /**
     * @access protected
     * @return EntityInterface|bool
     */
    protected function next()
    {
        return next($this->elements);
    }

    /**
     * @access protected
     * @return EntityInterface|bool
     */
    protected function prev()
    {
        return prev($this->elements);
    }

    /**
     * @access protected
     * @return EntityInterface
     */
    protected function last()
    {
        return end($this->elements);
    }

    /**
     * @param EntityInterface $element
     * @return bool
     * @throws ElementCouldNotBeAddedException
     */
    protected function add(EntityInterface $element)
    {
        $this->elements[$element->getId()] = $element;
        try {
            return $this->exists(($element->getId()));
        } catch (ElementDoesNotExistsInCollectionException $e) {
            throw new ElementCouldNotBeAddedException();
        }
    }

    /**
     * @access protected
     * @param $index
     * @return EntityInterface
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
     * @return EntityInterface
     */
    public function shift()
    {
        $element = $this->first();
        $this->remove($element->getId());

        return $element;
    }

    /**
     * @access public
     * @return EntityInterface
     */
    public function pop()
    {
        $element = $this->last();
        $this->remove($element->getId());

        return $element;
    }

    /**
     * @return array|EntityInterface[]
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
        $validator = new CollectionCreationValidator($elements);
        return $validator->validate();
    }
}