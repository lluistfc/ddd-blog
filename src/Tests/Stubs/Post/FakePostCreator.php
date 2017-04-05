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
        $post = new Post();
        $post->setId($id);
        $post->setTitle('Fake Title');
        $post->setContent('fake content');
        $post->setPublished(true);
        $post->setCreatedAt(new \DateTime());
        $post->setPublishedAt(new \DateTime());
        $post->setUpdatedAt(new \DateTime());

        return $post;
    }

    /**
     * @access public
     * @return array
     */
    public static function createPostDefaultArrayValues(): array
    {
        return [
            Post::ID => 1,
            Post::TITLE => 'Fake Title',
            Post::CONTENT => 'fake content',
            Post::PUBLISHED => true,
            Post::CREATED_AT => new \DateTime(),
            Post::PUBLISHED_AT => new \DateTime(),
            Post::UPDATED_AT => new \DateTime()
        ];
    }
}