<?php
namespace Blog\Tests\Domain\Validators\Post;

use Blog\Domain\Entity\Post;
use Blog\Domain\Validators\Post\CreatePostValidator;
use Blog\Tests\Stubs\Post\FakePostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class CreatePostValidatorsTest
 * @package Blog\Tests\Domain\Validators\Post
 * @group domain
 * @group domain_validator
 */
class CreatePostValidatorTest extends TestCase
{
    /**
     * @test
     */
    public function createNewPost()
    {
        $postValues = FakePostCreator::createPostDefaultArrayValues();

        $this->assertTrue((new CreatePostValidator($postValues))->validate());
    }

    /**
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\PostNeedsTitleException
     */
    public function postNeedsTitleToBeCreated()
    {
        $postValues = FakePostCreator::createPostDefaultArrayValues();
        unset($postValues[Post::TITLE]);

        (new CreatePostValidator($postValues))->validate();
    }

    /**
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\PostNeedsContentException
     */
    public function postNeedsContentToBeCreated()
    {
        $postValues = FakePostCreator::createPostDefaultArrayValues();
        unset($postValues[Post::CONTENT]);

        (new CreatePostValidator($postValues))->validate();
    }
}
