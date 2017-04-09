<?php
namespace Tests\Application\Collections;

use Blog\Application\Collections\EntityCollection;
use Blog\Domain\DataObject\Identifier\Identifier;
use Tests\Stubs\Post\FakePostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class PostCollectionTest
 * @package Tests\Domain\Collections
 * @group application
 * @group application_collection
 */
class PostCollectionTest extends TestCase
{
    /**
     * @test
     */
    public function collectionCanOnlyStorePosts()
    {
        $collection = new EntityCollection();
        try {
            $collection->add(new class {});
        } catch (\Error $e) {
            $this->assertInstanceOf(\Error::class, $e);
        }
    }

    /**
     * @test
     */
    public function collectionStoresOnePost()
    {
        $collection = new EntityCollection();
        $post = FakePostCreator::createPost();

        $collection->add($post);
        $this->assertCount(1, $collection->toArray());
    }

    /**
     * @test
     * @dataProvider nPostCreatorProvider
     * @param $maxPosts
     */
    public function collectionStoresNPosts($maxPosts)
    {
        $collection = new EntityCollection();

        for($i = 1; $i <= $maxPosts; $i++) {
            $collection->add(FakePostCreator::createPost($i));
        }

        $this->assertCount($maxPosts, $collection->toArray());
    }

    /**
     * @test
     */
    public function collectionCanReturnItsFirstElement()
    {
        $firstPost = FakePostCreator::createPost();
        $secondPost = FakePostCreator::createPost(2);
        $collection = new EntityCollection();
        $collection->add($firstPost);
        $collection->add($secondPost);

        $this->assertEquals($firstPost, $collection->first());
    }

    /**
     * @test
     */
    public function collectionReturnsSpecifiedPost()
    {
        $post = FakePostCreator::createPost(1337);
        $collection = new EntityCollection();
        $collection->add($post);

        $this->assertEquals($post, $collection->get(Identifier::create(1337)));
    }

    /**
     * @test
     * @expectedException \Blog\Domain\Exceptions\Collection\ElementDoesNotExistsInCollectionException
     */
    public function collectionThrowsExceptionIfPostDoesNotExists()
    {
        $collection = new EntityCollection();
        $collection->get(Identifier::create(1337));
    }

    /**
     * @test
     */
    public function shiftWithOneElementLeavesCollectionEmpty()
    {
        $post = FakePostCreator::createPost(1337);
        $collection = new EntityCollection();
        $collection->add($post);

        $this->assertEquals($post, $collection->shift());
        $this->assertEmpty($collection->toArray());
    }

    /**
     * @test
     */
    public function popWithOneElementLeavesCollectionEmpty()
    {
        $post = FakePostCreator::createPost(1337);
        $collection = new EntityCollection();
        $collection->add($post);

        $this->assertEquals($post, $collection->pop());
        $this->assertEmpty($collection->toArray());
    }

    /**
     * @test
     */
    public function shiftRemovesFirstElement()
    {
        $firstPost = FakePostCreator::createPost();
        $secondPost = FakePostCreator::createPost(2);
        $collection = new EntityCollection();
        $collection->add($firstPost);
        $collection->add($secondPost);

        $this->assertEquals($firstPost, $collection->shift());
        $this->assertCount(1, $collection->toArray());
        $this->assertEquals($secondPost, $collection->first());
    }

    /**
     * @test
     */
    public function popRemovesLasElement()
    {
        $firstPost = FakePostCreator::createPost();
        $secondPost = FakePostCreator::createPost(2);
        $collection = new EntityCollection();
        $collection->add($firstPost);
        $collection->add($secondPost);

        $this->assertEquals($secondPost, $collection->pop());
        $this->assertCount(1, $collection->toArray());
        $this->assertEquals($firstPost, $collection->first());
    }

    /**
     * @test
     */
    public function collectionReturnsAllPosts()
    {
        $firstPost = FakePostCreator::createPost();
        $secondPost = FakePostCreator::createPost(2);
        $collection = new EntityCollection();
        $collection->add($firstPost);
        $collection->add($secondPost);

        $this->assertCount(2, $collection->toArray());
    }

    /**
     * @access public
     * @test
     */
    public function collectionReturnsNextElement()
    {
        $firstPost = FakePostCreator::createPost();
        $secondPost = FakePostCreator::createPost(2);
        $collection = new EntityCollection();
        $collection->add($firstPost);
        $collection->add($secondPost);

        $this->assertEquals($secondPost, $collection->next());
    }

    /**
     * @access public
     * @test
     */
    public function collectionNextElementDoesNotExist()
    {
        $firstPost = FakePostCreator::createPost();
        $collection = new EntityCollection();
        $collection->add($firstPost);

        $this->assertFalse($collection->next());
    }

    /**
     * @access public
     * @test
     */
    public function collectionReturnsPrevElement()
    {
        $firstPost = FakePostCreator::createPost();
        $secondPost = FakePostCreator::createPost(2);
        $collection = new EntityCollection();
        $collection->add($firstPost);
        $collection->add($secondPost);

        $collection->next();

        $this->assertEquals($firstPost, $collection->prev());
    }

    /**
     * @access public
     * @test
     */
    public function collectionPrevElementDoesNotExist()
    {
        $firstPost = FakePostCreator::createPost();
        $collection = new EntityCollection();
        $collection->add($firstPost);

        $this->assertFalse($collection->prev());
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
