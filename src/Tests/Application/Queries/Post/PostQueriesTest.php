<?php
namespace Application\Queries\Post;

use Blog\Application\Queries\Post\PostQueries;
use Blog\Domain\Entity\Post;
use Blog\Tests\Stubs\Post\FakeReadOnlyRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class PostQueriesTest
 * @package Application\Queries\Post
 */
class PostQueriesTest extends TestCase
{
    /**
     * @access public
     * @test
     */
    public function queryReturnsPost()
    {
        $postQuery = new PostQueries(new FakeReadOnlyRepository());
        $this->assertInstanceOf(Post::class, $postQuery->findPostById(1));
    }

    /**
     * @access public
     * @test
     */
    public function queryFoundNothing()
    {
        $postQuery = new PostQueries(new FakeReadOnlyRepository());
        $this->assertNull($postQuery->findPostByTitle('fake title'));
    }
}
