<?php
namespace Tests\Stubs\Post;

use Blog\Domain\Entity\Post;

class FakePostCreator
{
    /**
     * @access public
     * @param int $id
     * @return Post
     */
    public static function createPost($id = 1): Post
    {
        return Post::register(
            'Fake Title',
            'fake content',
            'published',
            true,
            new \DateTime()
        );
    }

    /**
     * @access public
     * @return array
     */
    public static function createPostDefaultArrayValues(): array
    {
        return [
            Post::TITLE => 'Fake Title',
            Post::CONTENT => 'fake content',
            Post::STATE => 'published',
            Post::PUBLISHED => true,
            Post::PUBLISHED_AT => new \DateTime(),
        ];
    }
}