<?php
namespace Blog\Tests\Domain\Collections;

use Blog\Domain\Collections\PostCollection;
use Blog\Domain\Entity\Post;
use PHPUnit\Framework\TestCase;

/**
 * Class PostCollectionTest
 * @package Blog\Tests\Domain\Collections
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
        $post = $this->defaultPost();

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
            $collection->add($this->defaultPost($i));
        }

        $this->assertCount($maxPosts, $collection->getIterator());
    }

    /**
     * @test
     */
    public function collectionCanReturnItsFirstElement()
    {
        $firstPost = $this->defaultPost();
        $secondPost = $this->defaultPost(2);
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
        $post = $this->defaultPost(1337);
        $collection = new PostCollection();
        $collection->add($post);

        $this->assertEquals($post, $collection->get(1337));
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
        $post = $this->defaultPost(1337);
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
        $post = $this->defaultPost(1337);
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
        $firstPost = $this->defaultPost();
        $secondPost = $this->defaultPost(2);
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
        $firstPost = $this->defaultPost();
        $secondPost = $this->defaultPost(2);
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
        $firstPost = $this->defaultPost();
        $secondPost = $this->defaultPost(2);
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
    /**
     * @param int $id
     * @return Post
     */
    private function defaultPost($id = 1): Post
    {
        $post = new Post();
        $post->setId($id);
        $post->setTitle('Fake Title');
        $post->setContent('fake content');

        return $post;
    }
}
