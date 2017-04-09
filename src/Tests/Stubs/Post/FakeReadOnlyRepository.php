<?php
namespace Tests\Stubs\Post;

use Blog\Application\Collections\EntityCollection;
use Blog\Application\Repository\PostQueriesInterface;
use Blog\Domain\DataObject\Identifier\Identifier;

/**
 * Class FakeReadOnlyRepository
 * @package Tests\Stubs\Post
 */
class FakeReadOnlyRepository implements PostQueriesInterface
{
    public function findOneById(Identifier $id)
    {
        return FakePostCreator::createPost($id->get());
    }

    public function findPostByTitle($title)
    {
        return null;
    }

    public function findNewestPost()
    {
        return FakePostCreator::createPost();
    }

    public function findAllPublishedPosts()
    {
        return new EntityCollection();
    }
}