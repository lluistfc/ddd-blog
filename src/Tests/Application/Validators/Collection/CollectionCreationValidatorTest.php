<?php
namespace Tests\Application\Validators\Collection;

use Tests\Stubs\Post\FakePostCreator;
use Blog\Application\Validators\Collection\CollectionCreationValidator;
use PHPUnit\Framework\TestCase;

/**
 * Class CollectionCreationValidatorTest
 * @package Tests\Domain\Validators\Collection
 * @group application
 * @group application_validators
 * @group application_validators_collections
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
