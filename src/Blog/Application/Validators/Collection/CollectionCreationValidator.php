<?php
namespace Blog\Application\Validators\Collection;

use Blog\Domain\Entity\Entity;
use Blog\Domain\Exceptions\Collection\InvalidElementInCollectionException;
use Blog\Domain\Validators\ValidatorInterface;

class CollectionCreationValidator implements ValidatorInterface
{
    /**
     * @param $elements
     * @return bool
     * @throws InvalidElementInCollectionException
     */
    public function validate($elements)
    {
        if (empty($elements) || !is_array($elements)) {
            return true;
        }

        foreach ($elements as $element) {
            if (!array_search(Entity::class, class_implements($element))) {
                throw new InvalidElementInCollectionException();
            }
        }

        return true;
    }
}