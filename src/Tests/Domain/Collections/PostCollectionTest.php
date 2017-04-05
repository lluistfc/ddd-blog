<?php
namespace Tests\Domain\Collections;

use Blog\Domain\Collections\PostCollection;
use Tests\Stubs\Post\FakePostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class PostCollectionTest
 * @package Tests\Domain\Collections
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
        $post = FakePostCreator::createPost();

        $collection->addPost($post);
        $this->assertCount(1, $collection->getAllPosts());
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
            $collection->addPost(FakePostCreator::createPost($i));
        }

        $this->assertCount($maxPosts, $collection->getAllPosts());
    }

    /**
     * @test
     */
    public function collectionCanReturnItsFirstElement()
    {
        $firstPost = FakePostCreator::createPost();
        $secondPost = FakePostCreator::createPost(2);
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
        $post = FakePostCreator::createPost(1337);
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
        $post = FakePostCreator::createPost(1337);
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
        $post = FakePostCreator::createPost(1337);
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
        $firstPost = FakePostCreator::createPost();
        $secondPost = FakePostCreator::createPost(2);
        $collection = new PostCollection();
        $collection->addPost($firstPost);
        $collection->addPost($secondPost);

        $this->assertEquals($firstPost, $collection->shift());
        $this->assertCount(1, $collection->getAllPosts());
        $this->assertEquals($secondPost, $collection->getFirstPost());
    }

    /**
     * @test
     */
    public function popRemovesLasElement()
    {
        $firstPost = FakePostCreator::createPost();
        $secondPost = FakePostCreator::createPost(2);
        $collection = new PostCollection();
        $collection->addPost($firstPost);
        $collection->addPost($secondPost);

        $this->assertEquals($secondPost, $collection->pop());
        $this->assertCount(1, $collection->getAllPosts());
        $this->assertEquals($firstPost, $collection->getLastPost());
    }

    /**
     * @test
     */
    public function collectionReturnsAllPosts()
    {
        $firstPost = FakePostCreator::createPost();
        $secondPost = FakePostCreator::createPost(2);
        $collection = new PostCollection();
        $collection->addPost($firstPost);
        $collection->addPost($secondPost);

        $this->assertCount(2, $collection->getAllPosts());
    }

    /**
     * @access public
     * @test
     */
    public function collectionReturnsNextElement()
    {
        $firstPost = FakePostCreator::createPost();
        $secondPost = FakePostCreator::createPost(2);
        $collection = new PostCollection();
        $collection->addPost($firstPost);
        $collection->addPost($secondPost);

        $this->assertEquals($secondPost, $collection->getNextPost());
    }

    /**
     * @access public
     * @test
     */
    public function collectionNextElementDoesNotExist()
    {
        $firstPost = FakePostCreator::createPost();
        $collection = new PostCollection();
        $collection->addPost($firstPost);

        $this->assertFalse($collection->getNextPost());
    }

    /**
     * @access public
     * @test
     */
    public function collectionReturnsPrevElement()
    {
        $firstPost = FakePostCreator::createPost();
        $secondPost = FakePostCreator::createPost(2);
        $collection = new PostCollection();
        $collection->addPost($firstPost);
        $collection->addPost($secondPost);

        $collection->getNextPost();

        $this->assertEquals($firstPost, $collection->getPrevPost());
    }

    /**
     * @access public
     * @test
     */
    public function collectionPrevElementDoesNotExist()
    {
        $firstPost = FakePostCreator::createPost();
        $collection = new PostCollection();
        $collection->addPost($firstPost);

        $this->assertFalse($collection->getPrevPost());
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
