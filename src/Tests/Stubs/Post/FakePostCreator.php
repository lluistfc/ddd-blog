<?php
namespace Tests\Stubs\Post;

use Blog\Domain\Entity\Post;
use Tests\Domain\Entity\PostTest;

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
            $id,
            'Fake Title',
            'fake content',
            'published',
            true,
            new \DateTime()
        );
    }

    /**
     * @access public
     * @param int $id
     * @return array
     */
    public static function createPostDefaultArrayValues($id = 1): array
    {
        return [
            Post::ID => $id,
            Post::TITLE => PostTest::FAKE_TITLE,
            Post::CONTENT => PostTest::FAKE_CONTENT,
            Post::STATE => PostTest::FAKE_STATE,
            Post::PUBLISHED => PostTest::PUBLISHED,
            Post::PUBLISHED_AT => new \DateTime(),
        ];
    }

    public static function createPostFromArray($array)
    {
        return Post::register(
            $array[Post::ID],
            $array[Post::TITLE],
            $array[Post::CONTENT],
            $array[Post::STATE],
            $array[Post::PUBLISHED],
            $array[Post::PUBLISHED_AT]
            );
    }
}