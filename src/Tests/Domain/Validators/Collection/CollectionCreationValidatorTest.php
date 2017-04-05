<?php
namespace Tests\Domain\Validators\Collection;

use Blog\Domain\Exceptions\Collection\InvalidElementInCollectionException;
use Tests\Stubs\Post\FakePostCreator;
use Blog\Domain\Validators\Collection\CollectionCreationValidator;
use PHPUnit\Framework\TestCase;

/**
 * Class CollectionCreationValidatorTest
 * @package Tests\Domain\Validators\Collection
 */
class CollectionCreationValidatorTest extends TestCase
{
    /**
     * @test
     */
    public function collectionCreationtValidatesInput()
    {
        $post = FakePostCreator::createPost(1);
        $this->assertTrue((new CollectionCreationValidator(array($post)))->validate());
    }

    /**
     * @test
     * @expectedException \Blog\Domain\Exceptions\Collection\InvalidElementInCollectionException
     */
    public function collectionThrowsExceptionIfInvalidElementsInInput()
    {
        $collectionCreationValidator = new CollectionCreationValidator(array(new class{}));

        $collectionCreationValidator->validate();
    }
}
