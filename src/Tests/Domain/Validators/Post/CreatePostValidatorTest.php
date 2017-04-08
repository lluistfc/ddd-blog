<?php
namespace Tests\Domain\Validators\Post;

use Blog\Domain\Entity\Post;
use Blog\Domain\Validators\Post\CreatePostValidator;
use PHPUnit\Framework\TestCase;
use Tests\Stubs\Post\FakePostCreator;

/**
 * Class CreatePostValidatorTest
 * @package Tests\Domain\Validators\Post
 * @group domain
 * @group domain_validators
 */
class CreatePostValidatorTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function validationPasses()
    {
        (new CreatePostValidator())->validate(FakePostCreator::createPostDefaultArrayValues());
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\InvalidArgumentException
     */
    public function validationFailsIfDataIsNotArray()
    {
        (new CreatePostValidator())->validate(null);
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\MissingIdentifierException
     */
    public function validationFailsIfNoId()
    {
        $valuesToValidate = FakePostCreator::createPostDefaultArrayValues();
        unset($valuesToValidate[Post::ID]);
        (new CreatePostValidator())->validate($valuesToValidate);
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\PostNeedsTitleException
     */
    public function validationFailsIfNoTitle()
    {
        $valuesToValidate = FakePostCreator::createPostDefaultArrayValues();
        unset($valuesToValidate[Post::TITLE]);
        (new CreatePostValidator())->validate($valuesToValidate);
    }

    /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\PostNeedsContentException
     */
    public function validationFailsIfNoContent()
    {
        $valuesToValidate = FakePostCreator::createPostDefaultArrayValues();
        unset($valuesToValidate[Post::CONTENT]);
        (new CreatePostValidator())->validate($valuesToValidate);
    }

     /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\PostNeedsStateException
     */
    public function validationFailsIfNoState()
    {
        $valuesToValidate = FakePostCreator::createPostDefaultArrayValues();
        unset($valuesToValidate[Post::STATE]);
        (new CreatePostValidator())->validate($valuesToValidate);
    }

     /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\PostMustBeCreatedByAnAuthorException
     */
    public function validationFailsIfNoAuthor()
    {
        $valuesToValidate = FakePostCreator::createPostDefaultArrayValues();
        unset($valuesToValidate[Post::AUTHOR]);
        (new CreatePostValidator())->validate($valuesToValidate);
    }

     /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\InvalidArgumentException
     */
    public function validationFailsIfNoPublished()
    {
        $valuesToValidate = FakePostCreator::createPostDefaultArrayValues();
        unset($valuesToValidate[Post::PUBLISHED]);
        (new CreatePostValidator())->validate($valuesToValidate);
    }

     /**
     * @access public
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\InvalidArgumentException
     */
    public function validationFailsIfNoPublishedAt()
    {
        $valuesToValidate = FakePostCreator::createPostDefaultArrayValues();
        unset($valuesToValidate[Post::PUBLISHEDAT]);
        (new CreatePostValidator())->validate($valuesToValidate);
    }
}
