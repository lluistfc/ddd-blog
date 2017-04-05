<?php
namespace Blog\Application\Validators\Collection;

use Blog\Domain\Entity\EntityInterface;
use Blog\Domain\Exceptions\Collection\InvalidElementInCollectionException;
use Blog\Domain\Validators\ValidatorInterface;

class CollectionCreationValidator implements ValidatorInterface
{
    /** @var  array */
    private $elements;

    /**
     * CollectionCreationValidator constructor.
     * @param array $elements
     */
    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    /**
     * @returns bool
     * @throws InvalidElementInCollectionException
     */
    public function validate()
    {
        foreach ($this->elements as $element) {
            if (!array_search(EntityInterface::class, class_implements($element))) {
                throw new InvalidElementInCollectionException();
            }
        }

        return true;
    }
}