<?php
namespace Blog\Tests\Domain\Entity;

use Blog\Domain\Entity\Post;
use PHPUnit\Framework\TestCase;

/**
 * Class PostTest
 * @package Blog\Tests\Domain
 */
class PostTest extends TestCase
{
    /**
     * @test
     */
    public function postIsCreatedEmpty()
    {
        $post = new Post();
        $this->assertInstanceOf(Post::class, $post);
        $this->assertEmpty($post->getTitle());
        $this->assertEmpty($post->getContent());
        $this->assertEmpty($post->getState());
        $this->assertEmpty($post->isPublished());
        $this->assertEmpty($post->getCreatedAt());
        $this->assertEmpty($post->getUpdatedAt());
        $this->assertEmpty($post->getPublishedAt());
    }
}
