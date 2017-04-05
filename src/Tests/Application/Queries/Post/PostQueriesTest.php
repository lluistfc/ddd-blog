<?php
namespace Application\Queries\Post;

use Blog\Application\Queries\Post\PostQueries;
use Blog\Application\Collections\PostCollection;
use Blog\Domain\Entity\Post;
use Tests\Stubs\Post\FakeReadOnlyRepository;
use Tests\Stubs\Post\FakePostCreator;
use PHPUnit\Framework\TestCase;

/**
 * Class PostQueriesTest
 * @package Application\Queries\Post
 * @group application
 * @group application_query
 */
class PostQueriesTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function queryReturnsPostById()
    {
        $postQuery = new PostQueries(new FakeReadOnlyRepository());
        $this->assertInstanceOf(Post::class, $postQuery->findPostById(1));
    }

    /**
     * @access public
     * @test
     */
    public function queryFoundNothingByTitle()
    {
        $postQuery = new PostQueries(new FakeReadOnlyRepository());
        $this->assertNull($postQuery->findPostByTitle('fake title'));
    }

    /**
     * @access public
     * @test
     */
    public function queryReturnsEmptyCollectionWhenWeHaveNoPosts()
    {
        $emptyCollection = new PostCollection();
        $postQuery = new PostQueries(new FakeReadOnlyRepository());
        $this->assertEquals($emptyCollection, $postQuery->findAllPublishedPosts());
    }

    /**
     * @access public
     * @test
     */
    public function queryReturnsNewestPost()
    {
        $expectedPost = FakePostCreator::createPost();
        $postQuery = new PostQueries(new FakeReadOnlyRepository());
        $this->assertEquals($expectedPost, $postQuery->findNewestPost());
    }
}
