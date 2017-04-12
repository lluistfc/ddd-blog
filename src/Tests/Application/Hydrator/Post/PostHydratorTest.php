<?php
namespace Tests\Blog\Application\Hydrator\Post;

use Blog\Application\Hydrator\Post\PostHydrator;
use Blog\Domain\Entity\Post;
use PHPUnit\Framework\TestCase;
use Tests\Stubs\Post\FakePostCreator;

/**
 * Class PostHydratorTest
 * @package Tests\Blog\Application\Hydrator\Post
 * @group application
 * @group application_hydrator
 * @group application_hydrator_post
 */
class PostHydratorTest extends TestCase
{
    /**
     * @test
     */
    public function postIsHydratedFromNonAssociativeArray()
    {
        $sut = new PostHydrator();
        $values = FakePostCreator::createPostWithoutKeys();
        array_unshift($values, '1');

        $post = $sut->hydrate($values);

        $this->assertEquals(1, $post->getId());
    }

    /**
     * @test
     */
    public function postIsHydratedFromAssociativeArray()
    {
        $sut = new PostHydrator();
        $values[Post::ID] = 1;
        $values = array_merge($values, FakePostCreator::createPostDefaultArrayValues());

        $post = $sut->hydrate($values);

        $this->assertEquals(1, $post->getId());
    }
}
