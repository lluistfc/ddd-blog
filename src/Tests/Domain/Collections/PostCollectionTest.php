<?php
namespace Blog\Tests\Domain\Collections;

use Blog\Domain\Collections\PostCollection;
use Blog\Domain\Entity\Post;
use Blog\Tests\Stubs\Post\TestPostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class PostCollectionTest
 * @package Blog\Tests\Domain\Collections
 * @group domain
 * @group domain_collection
 */
class PostCollectionTest extends TestCase
{
    /**
     * @test
     */
    public function collectionCanOnlyStorePosts()
    {
        $collection = new PostCollection();
        try {
            $collection->addPost(new class {});
        } catch (\Error $e) {
            $this->assertInstanceOf(\Error::class, $e);
        }
    }

    /**
     * @test
     */
    public function collectionStoresOnePost()
    {
        $collection = new PostCollection();
        $post = TestPostCreator::createPost();

        $collection->addPost($post);

        $this->assertCount(1, $collection->getIterator());
    }

    /**
     * @test
     * @dataProvider nPostCreatorProvider
     * @param $maxPosts
     */
    public function collectionStoresNPosts($maxPosts)
    {
        $collection = new PostCollection();

        for($i = 0; $i < $maxPosts ; $i++) {
            $collection->addPost(TestPostCreator::createPost($i));
        }

        $this->assertCount($maxPosts, $collection->getIterator());
    }

    /**
     * @test
     */
    public function collectionCanReturnItsFirstElement()
    {
        $firstPost = TestPostCreator::createPost();
        $secondPost = TestPostCreator::createPost(2);
        $collection = new PostCollection();
        $collection->addPost($firstPost);
        $collection->addPost($secondPost);

        $this->assertEquals($firstPost, $collection->getFirstPost());
    }

    /**
     * @test
     */
    public function collectionReturnsSpecifiedPost()
    {
        $post = TestPostCreator::createPost(1337);
        $collection = new PostCollection();
        $collection->addPost($post);

        $this->assertEquals($post, $collection->getPost(1337));
    }

    /**
     * @test
     * @expectedException \Blog\Domain\Exceptions\Collection\ElementDoesNotExistsInCollectionException
     */
    public function collectionThrowsExceptionIfPostDoesNotExists()
    {
        $collection = new PostCollection();
        $collection->getPost(1337);
    }

    /**
     * @test
     */
    public function shiftWithOneElementLeavesCollectionEmpty()
    {
        $post = TestPostCreator::createPost(1337);
        $collection = new PostCollection();
        $collection->addPost($post);

        $this->assertEquals($post, $collection->shift());
        $this->assertEmpty($collection->getAllPosts());
    }

    /**
     * @test
     */
    public function popWithOneElementLeavesCollectionEmpty()
    {
        $post = TestPostCreator::createPost(1337);
        $collection = new PostCollection();
        $collection->addPost($post);

        $this->assertEquals($post, $collection->pop());
        $this->assertEmpty($collection->getAllPosts());
    }

    /**
     * @test
     */
    public function shiftRemovesFirstElement()
    {
        $firstPost = TestPostCreator::createPost();
        $secondPost = TestPostCreator::createPost(2);
        $collection = new PostCollection();
        $collection->addPost($firstPost);
        $collection->addPost($secondPost);

        $this->assertEquals($firstPost, $collection->shift());
        $this->assertCount(1, $collection->getIterator());
        $this->assertEquals($secondPost, $collection->getFirstPost());
    }

    /**
     * @test
     */
    public function popRemovesLasElement()
    {
        $firstPost = TestPostCreator::createPost();
        $secondPost = TestPostCreator::createPost(2);
        $collection = new PostCollection();
        $collection->addPost($firstPost);
        $collection->addPost($secondPost);

        $this->assertEquals($secondPost, $collection->pop());
        $this->assertCount(1, $collection->getIterator());
        $this->assertEquals($firstPost, $collection->getLastPost());
    }

    /**
     * @test
     */
    public function collectionReturnsAllPosts()
    {
        $firstPost = TestPostCreator::createPost();
        $secondPost = TestPostCreator::createPost(2);
        $collection = new PostCollection();
        $collection->addPost($firstPost);
        $collection->addPost($secondPost);

        $this->assertCount(2, $collection->getAllPosts());
    }

    /**
     * @return array
     */
    public function nPostCreatorProvider()
    {
        return array(
            array(2),
            array(30),
            array(150)
        );
    }
}
