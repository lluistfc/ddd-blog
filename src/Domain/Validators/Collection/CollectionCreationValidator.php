<?php
namespace Domain\Validators\Collection;


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
     * @throws InvalidElementInCollectionException
     */
    public function validate()
    {
        foreach ($this->elements as $element) {
            if (!$element instanceof EntityInterface) {
                throw new InvalidElementInCollectionException();
            }
        }

        return true;
    }
}