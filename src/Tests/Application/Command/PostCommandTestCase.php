<?php
namespace Blog\Tests\Application\Command;

use Blog\Domain\Entity\Post;
use PHPUnit\Framework\TestCase;

class PostCommandTestCase extends TestCase
{
    /**
     * @return Post
     */
    public function defaultPost(): Post
    {
        $post = new Post();
        $post->setTitle('Fake Title');
        $post->setContent('fake content');

        return $post;
    }
}