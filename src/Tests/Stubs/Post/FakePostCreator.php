<?php
namespace Tests\Stubs\Post;

use Blog\Domain\DataObject\Identifier\Identifier;
use Blog\Domain\Entity\Post;
use Tests\Domain\Entity\PostTest;
use Tests\Stubs\User\FakeUserCreator;

/**
 * Class FakePostCreator
 * @package Tests\Stubs\Post
 */
class FakePostCreator
{
    /**
     * @access public
     * @param int $id
     * @return Post
     */
    public static function createPost(): Post
    {
        return Post::publish(
            'Fake Title',
            'fake content',
            'published',
            FakeUserCreator::create(),
            true,
            new \DateTime()
        );
    }

    public static function createPostWithoutKeys():array
    {
        $values = self::createPostDefaultArrayValues();

        foreach($values as $k => $value) {
            $values[] = $value;
            unset($values[$k]);
        }

        return $values;
    }

    /**
     * @access public
     * @return array
     */
    public static function createPostDefaultArrayValues(): array
    {
        return [
            Post::TITLE => PostTest::FAKE_TITLE,
            Post::CONTENT => PostTest::FAKE_CONTENT,
            Post::STATE => PostTest::FAKE_STATE,
            Post::AUTHOR => FakeUserCreator::create(),
            Post::PUBLISHED => PostTest::PUBLISHED,
            Post::PUBLISHEDAT => new \DateTime(),
        ];
    }

    public static function createPostFromArray($array)
    {
        return Post::publish(
            $array[Post::TITLE],
            $array[Post::CONTENT],
            $array[Post::STATE],
            $array[Post::AUTHOR],
            $array[Post::PUBLISHED],
            $array[Post::PUBLISHEDAT]
            );
    }
}