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
        foreach ($elements as $element) {
            if (!$element instanceof Entity) {
                throw new InvalidElementInCollectionException();
            }
        }

        return true;
    }
}