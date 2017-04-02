<?php
namespace Blog\Tests\Domain\Validators\Post;

use Blog\Domain\Entity\Post;
use Blog\Domain\Validators\Post\CreatePostValidator;
use PHPUnit\Framework\TestCase;

/**
 * Class CreatePostValidatorsTest
 * @package Blog\Tests\Domain\Validators\Post
 */
class CreatePostValidatorTest extends TestCase
{
    /**
     * @test
     */
    public function createNewPost()
    {
        $postValues = $this->defaultPostValues();

        $this->assertTrue((new CreatePostValidator($postValues))->validate());
    }

    /**
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\PostNeedsTitleException
     */
    public function postNeedsTitleToBeCreated()
    {
        $postValues = $this->defaultPostValues();
        unset($postValues[Post::TITLE]);

        (new CreatePostValidator($postValues))->validate();
    }

    /**
     * @test
     * @expectedException \Blog\Domain\Exceptions\Validation\PostNeedsContentException
     */
    public function postNeedsContentToBeCreated()
    {
        $postValues = $this->defaultPostValues();
        unset($postValues[Post::CONTENT]);

        (new CreatePostValidator($postValues))->validate();
    }

    /**
     * @return array
     */
    public function defaultPostValues(): array
    {
        return array(
            Post::TITLE => 'Fake Title',
            Post::CONTENT => 'fake content',
            Post::PUBLISHED => true,
            Post::CREATED_AT => new \DateTime(),
            Post::PUBLISHED_AT => new \DateTime(),
            Post::UPDATED_AT => new \DateTime()
        );
    }
}
