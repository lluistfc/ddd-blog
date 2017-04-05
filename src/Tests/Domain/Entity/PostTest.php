<?php
namespace Tests\Domain\Entity;

use Blog\Domain\Entity\Post;
use PHPUnit\Framework\TestCase;

/**
 * Class PostTest
 * @package Tests\Domain
 * @group domain
 * @group domain_entity
 */
class PostTest extends TestCase
{
    const FAKE_TITLE = 'Fake Title';
    const FAKE_CONTENT = 'fake content';
    const FAKE_STATE = 'fake state';
    const PUBLISHED = true;
    const NOT_PUBLISHED = false;

    /**
     * @access public
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

    /**
     * @access public
     * @test
     */
    public function titleIsSet()
    {
        $post = new Post();
        $post->setTitle(self::FAKE_TITLE);
        $this->assertEquals(self::FAKE_TITLE, $post->getTitle());
    }

    /**
     * @access public
     * @test
     */
    public function contentIsSet()
    {
        $post = new Post();
        $post->setContent(self::FAKE_CONTENT);
        $this->assertEquals(self::FAKE_CONTENT, $post->getContent());
    }

    /**
     * @access public
     * @test
     */
    public function stateIsSet()
    {
        $post = new Post();
        $post->setState(self::FAKE_STATE);
        $this->assertEquals(self::FAKE_STATE, $post->getState());
    }

    /**
     * @access public
     * @test
     */
    public function postIsPublished()
    {
        $post = new Post();
        $post->setPublished(self::PUBLISHED);
        $this->assertTrue($post->isPublished());
    }

    /**
     * @access public
     * @test
     */
    public function postIsNotPublished()
    {
        $post = new Post();
        $post->setPublished(self::NOT_PUBLISHED);
        $this->assertFalse($post->isPublished());
    }

    /**
     * @access public
     * @test
     */
    public function postCreatedAtIsSet()
    {
        $post = new Post();
        $post->setCreatedAt(new \DateTime());
        $this->assertInstanceOf(\DateTime::class, $post->getCreatedAt());
    }

    /**
     * @access public
     * @test
     */
    public function postPublisheddAtIsSet()
    {
        $post = new Post();
        $post->setPublishedAt(new \DateTime());
        $this->assertInstanceOf(\DateTime::class, $post->getPublishedAt());
    }

    /**
     * @access public
     * @test
     */
    public function postUpdatedAtIsSet()
    {
        $post = new Post();
        $post->setUpdatedAt(new \DateTime());
        $this->assertInstanceOf(\DateTime::class, $post->getUpdatedAt());
    }
}
