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
     * @expectedException \Blog\Domain\Exceptions\Collection\InvalidElementInCollectionException
     */
    public function collectionCanOnlyStorePosts()
    {
        $collection = new PostCollection();

        $collection->add(new class {});
    }

    /**
     * @test
     */
    public function collectionStoresOnePost()
    {
        $collection = new PostCollection();
        $post = TestPostCreator::createPost();

        $collection->add($post);

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
            $collection->add(TestPostCreator::createPost($i));
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
        $collection->add($firstPost);
        $collection->add($secondPost);

        $this->assertEquals($firstPost, $collection->getFirst());
    }

    /**
     * @test
     */
    public function collectionReturnsSpecifiedPost()
    {
        $post = TestPostCreator::createPost(1337);
        $collection = new PostCollection();
        $collection->add($post);

        $this->assertEquals($post, $collection->getPost(1337));
    }

    /**
     * @test
     * @expectedException \Blog\Domain\Exceptions\Collection\ElementDoesNotExistsInCollectionException
     */
    public function collectionThrowsExceptionIfPostDoesNotExists()
    {
        $collection = new PostCollection();
        $this->assertNull($collection->getPost(1337));
    }

    /**
     * @test
     */
    public function shiftWithOneElementLeavesCollectionEmpty()
    {
        $post = TestPostCreator::createPost(1337);
        $collection = new PostCollection();
        $collection->add($post);

        $this->assertEquals($post, $collection->shift());
        $this->assertEmpty($collection->getAll());
    }

    /**
     * @test
     */
    public function popWithOneElementLeavesCollectionEmpty()
    {
        $post = TestPostCreator::createPost(1337);
        $collection = new PostCollection();
        $collection->add($post);

        $this->assertEquals($post, $collection->pop());
        $this->assertEmpty($collection->getAll());
    }

    /**
     * @test
     */
    public function shiftRemovesFirstElement()
    {
        $firstPost = TestPostCreator::createPost();
        $secondPost = TestPostCreator::createPost(2);
        $collection = new PostCollection();
        $collection->add($firstPost);
        $collection->add($secondPost);

        $this->assertEquals($firstPost, $collection->shift());
        $this->assertCount(1, $collection->getIterator());
        $this->assertEquals($secondPost, $collection->getFirst());
    }

    /**
     * @test
     */
    public function popRemovesLasElement()
    {
        $firstPost = TestPostCreator::createPost();
        $secondPost = TestPostCreator::createPost(2);
        $collection = new PostCollection();
        $collection->add($firstPost);
        $collection->add($secondPost);

        $this->assertEquals($secondPost, $collection->pop());
        $this->assertCount(1, $collection->getIterator());
        $this->assertEquals($firstPost, $collection->getLast());
    }

    /**
     * @test
     */
    public function collectionReturnsAllPosts()
    {
        $firstPost = TestPostCreator::createPost();
        $secondPost = TestPostCreator::createPost(2);
        $collection = new PostCollection();
        $collection->add($firstPost);
        $collection->add($secondPost);

        $this->assertCount(2, $collection->getAll());
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
